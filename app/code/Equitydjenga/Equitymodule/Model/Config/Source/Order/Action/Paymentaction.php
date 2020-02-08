<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Equitydjenga\Equitymodule\Model\Config\Source\Order\Action;

use Magento\Sales\Model\Order;
use Magento\Sales\Model\Config\Source\Order\Status;



 /** * Order Status source model */
class Paymentaction 
{
    /**
     * @var string[] 
     */      public function toOptionArray(){
       return [ ['value' => 'authorize', 'label' => __('Authorize Only')], ['value' => 'authorize_capture', 'label' => __('Authorize and Capture')], ];
     }
}