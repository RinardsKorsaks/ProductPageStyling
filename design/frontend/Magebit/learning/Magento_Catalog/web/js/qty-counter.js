/**
 * This file is part of the Magebit learning package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit PageListWidget
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2019 Magebit, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

'use strict';

define([
    'ko',
    'uiElement'
], function (ko, Element) {
    return Element.extend({
        defaults: {
            template: 'Magento_Catalog/input-counter'
        },
        qty: ko.observable(),

        initialize: function(config){
            this._super();
            this.qty = ko.observable(this.qty);
            this.maxQty = config.maxQty;
            this.qty.subscribe(function(newQty){
                if (parseInt(newQty) > this.maxQty){
                    this.qty(this.maxQty);
                }
                if (parseInt(newQty) < 0){
                    this.qty(1);
                }
            }.bind(this))
        },
        decreaseQty: function() {
            var newQty = this.qty() - 1;
            if (newQty < 1)
            {
                newQty = 1;
            }
            this.qty(newQty);
        },
        increaseQty: function() {

            var newQty = this.qty() + 1;
            if (newQty > this.maxQty)
            {
                newQty = this.maxQty;
            }
            this.qty(newQty);
        }
    });

});
