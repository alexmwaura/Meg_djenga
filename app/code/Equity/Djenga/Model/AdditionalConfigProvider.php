<?php
namespace Equity\Djenga\Model;

use Magento\Checkout\Model\ConfigProviderInterface;

/**
 * Class SampleConfigProvider
 */
class AdditionalConfigProvider implements ConfigProviderInterface
{

    /**
     * Retrieve assoc array of checkout configuration
     *
     * @return array
     */

    public $auth_key = 'Basic VHJ2azY2MXRkUnNDQ01kUm0ydTM2M2ZtZk9BcHhNdTA6SFVNNjdsOGV5Tk5YdWJEcw==';
    public $merchant_code = "4188171122";
    public $url = "https://api-test.equitybankgroup.com/v1/token";
    public $pass_word = "TGvBoRGAcdzuhCs1l0NW2219IsgXQvLU";
    public $grant_type = "password";



    public function getConfig()
    {


        $authkey=$this->auth_key;
        $grant_type = $this->grant_type;
        $pass_word = $this->pass_word;
        $merchant_code = $this->merchant_code;
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
        curl_close ($ch);


        $config = [];
        $config['paymentToken'] = $token['payment-token'];
        return $config;


    }


}


































