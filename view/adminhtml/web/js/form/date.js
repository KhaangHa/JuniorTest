require([
    "jquery",
    "mage/calendar"
], function ($) {
    $('input[name="magenest[date]"]').datepicker({
        dateFormat: "yy-mm-dd",
        timeFormat: "H:m:s",
        changeMonth: true,
        changeYear: true,
        showsTime: true
    });
});