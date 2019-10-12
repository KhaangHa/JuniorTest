define([
    "jquery",
    "Magento_Ui/js/form/element/date"
], function ($, date) {
    return date.extend({
            defaults: {
                options: {
                    beforeShowDay: function (value) {
                        var availableDates = [8,9,10,11,12];
                        if ($.inArray(value.getDate(), availableDates) != -1) {
                            return [true, "", "Available"];
                        } else {
                            return [false, "", "unAvailable"];
                        }
                    }
                },
            }
        }
    )
});