<?php
namespace Equity\Djenga\Controller\Index;

use \Magento\Framework\App\Action\Context;
use \Equity\Djenga\Helper\Data as Helper;

class Index extends \Magento\Framework\App\Action\Action
{   protected $grant_type;
    protected $_helper;
    public $url = "https://api-test.equitybankgroup.com/v1/token";

    public function __construct(
        Context $context,
        Helper $helper,
        PageFactory $resultPageFactory
    )
    {
        $this->_helper = $helper;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function getToken(){
        $authkey = $this->_helper->getConfig("payment/equitydjengapayment/api_key");
        $merchant_code = $this->_helper->getConfig("payment/equitydjengapayment/merchantCode");
        $pass_word = $this->_helper->getConfig("payment/equitydjengapayment/password");
        $grant_type = "password";


        $url = $this->url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array(
            "Authorization: ${authkey}",
            'Content-Type: application/x-www-form-urlencoded'
        ));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"merchantCode=${merchant_code}&password=${pass_word}&grant_type=${grant_type}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        $token = json_decode($server_output, true);
       
        echo $token['payment-token'];
        // echo $merchant_code;
        curl_close ($ch);  
    

    }
    

    public function execute() {
        $resultPage = $this->resultPageFactory->create();
        $authToken = $this->getToken();
        $merchantCode = $this->_helper->getConfig("payment/equitydjengapayment/merchantCode");


        $resultPage->getConfig()->getTitle()->prepend(__($authToken));
        $resultPage->getConfig()->getTitle()->prepend(__($merchantCode));


        return $resultPage;
        

    }
}