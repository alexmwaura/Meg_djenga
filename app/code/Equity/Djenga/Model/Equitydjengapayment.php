<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Equity\Djenga\Model;



/**
 * Pay In Store payment method model
 */
class Equitydjengapayment extends \Magento\Payment\Model\Method\AbstractMethod
{

    /**
     * Payment code
     *
     * @var string
     */
    protected $_code = 'equitydjengapayment';

    /**
     * Availability option
     *
     * @var bool
     */
    protected $_isOffline = true;


  

}
