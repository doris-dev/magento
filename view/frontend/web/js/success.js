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
        'DorisWidget'
    ], function (
        Component,
        DorisWidget
    ) {
        'use strict';

        return Component.extend({

            initialize: function () {
                this._super();

                const items = this.items.map(item => {
                    return item?.sku
                })

                DorisWidget.order(items)
            }
        });
    }
);
