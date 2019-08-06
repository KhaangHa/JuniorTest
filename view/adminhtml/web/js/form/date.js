require([
    "jquery",
    "mage/calendar"
], function ($) {
    $(input=['magenest[end_date]']).datepicker({
        dateFormat: "yy-mm-dd",
        timeFormat: "H:m:s",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1,
        showsTime: true,
        minDate: new Date(2010, 0, 1),
        maxDate: new Date(2010, 5, 31),
    });
});
