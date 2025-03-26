define([
    'uiComponent',
    'ko'
], function (
    Component,
    ko
) {
    'use strict';

    return Component.extend({
        defaults: {
            template: "Dimas_DeliveryInstructions/shipping/custom-field"
        },
        deliveryInstructionsValue: ko.observable(''),

        initialize: function () {
            this._super();

            this.deliveryInstructionsValue.subscribe(function (newValue) {
                let shippingAddress = quote.shippingAddress();

                if (shippingAddress['extension_attributes'] === undefined) {
                    shippingAddress['extension_attributes'] = {};
                }
                
                shippingAddress['extension_attributes']['delivery_instructions'] = newValue;
            });

            return this;
        },

        onValueChange: function (value) {
            this.deliveryInstructionsValue(value);
        }
    });
});