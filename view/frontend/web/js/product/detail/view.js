define([
        'jquery',
        'Magento_Ui/js/modal/alert'
    ],
    function ($, alert) {
        var formData = $('#frm-gift-card');
        var form = $("#gift-card-form");
        var view = $("#gift-card-view");
        return function (config) {
            $("#btn-save").click(function () {
                if (formData.validation() && formData.validation('isValid')) {
                    var name = $("#receiver_name").val();
                    var message = $("#receiver_message").val();
                    var data = {name: name, message: message};
                    saveMessage(data);
                }
            });

            function saveMessage(data) {
                var url = config.submitUrl;
                $.ajax({
                    url: url,
                    showLoader: true,
                    method: 'POST',
                    data: data,
                    success: function (response) {
                        if (!response.errMsg) {
                            form.hide();
                            view.show();
                        } else {
                            alert({
                                content: response.errMsg
                            })
                        }
                    },
                    error: function () {
                        console.log("error");
                    }
                });
            }
        }
    }
);
