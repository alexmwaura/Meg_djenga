define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList,
    ) {
        'use strict';

        var token =window.checkoutConfig.paymentToken
        rendererList.push(
            {
                type: 'equitydjengapayment',
                component: 'Equity_Djenga/js/view/payment/method-renderer/equitydjengapayment-method',
                // paymentToken: `${customData:window.checkoutConfig.paymentToken}`
            }
        );
        /** Add view logic here if needed */
        return Component.extend({
            

        });

    }
);
