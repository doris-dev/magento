/**
 * OneJobCode
 *
 * NOTICE OF LICENSE
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to https://www.onejobcode.com for more information.
 *
 * @category OneJobCode
 *
 * @copyright Copyright (c) 2021 One Job Code (https://www.onejobcode.com)
 *
 * @author One Job Code <engineer@onejobcode.com>
 */
define(
    [
        'uiComponent',
        'ko',
        'DorisWidget'
    ], function (
        Component,
        ko,
        DorisWidget
    ) {
        'use strict';

        return Component.extend({
            canTryon: ko.observable(false),

            initialize: function () {
                this._super();

                DorisWidget.verify({sku: this.product?.sku, apiKey: this.options.api_key})
                    .then(response => {
                        this.canTryon(response);
                    })
                    .catch(error => console.log({error}))
            },

            start: function () {
                DorisWidget.start(this.product?.sku)
            }
        });
    }
);
