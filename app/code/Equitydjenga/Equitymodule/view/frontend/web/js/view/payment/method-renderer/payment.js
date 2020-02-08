define([
  'Equitydjenga_Equitymodule/js/view/payment/cc-form',
  'jquery',
  'Magento_Payment/js/model/credit-card-validation/validator'
 ], function (Component, $) {
     'use strict';
        return Component.extend({
             defaults: {
                template: 'Equitydjenga_Equitymodule/payment/payment'
             },
            getCode: function() {  	           return 'djengapayment';
	           },
 	       isActive: function() {
 	          return true;
 	       },
 	       validate: function() { 		          var $form = $('#' + this.getCode() + '-form');
 		     return $form.validation() && $form.validation('isValid');
             }
       });
});