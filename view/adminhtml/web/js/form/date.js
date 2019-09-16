require([
    "jquery",
    "mage/calendar"
], function ($) {
    $("input[name = 'magenest[end_date]']").datepicker({
        beforeShowDay: function(date) {
            var day = date.getDay();
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            var ddates =  disabledDate.indexOf(string) == -1 ;
            var dday = disabledDay.indexOf(day) === -1 ;
            return [dday && ddates];
        }
    });
});
