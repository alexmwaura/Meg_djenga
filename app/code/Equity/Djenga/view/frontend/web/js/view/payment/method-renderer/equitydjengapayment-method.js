define(
    [
        'Magento_Checkout/js/view/payment/default',

    ],
    function (Component) {
        'use strict';
        var token = window.checkoutConfig.paymentToken
        var total = window.checkoutConfig.quoteData.grand_total * 100
        var ref = window.checkoutConfig.formKey
        var name = window.checkoutConfig.customerData.email

        return Component.extend({

            defaults: {
                template: 'Equity_Djenga/payment/equitydjengapayment',

            },
            paymentToken: `${token}`,
            orderTotal: `${total}`,
            orderRef: `${ref}`,
            custName: `${name}`,

            /** Returns send check to info */
            getMailingAddress: function() {
                return window.checkoutConfig.payment.checkmo.mailingAddress;
            },

        });
    }
);


