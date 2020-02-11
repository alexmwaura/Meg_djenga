define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'equitydjengapayment',
                component: 'Equity_Djenga/js/view/payment/method-renderer/equitydjengapayment-method'
            }
        );
        /** Add view logic here if needed */
        return Component.extend({});
    }
);