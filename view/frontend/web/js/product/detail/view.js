define([
        'jquery',
        'Magento_Ui/js/modal/alert'
    ],
    function ($, alert) {
        var formData = $('#frm-gift-card');
        var form = $("#gift-card-form");
        var view = $("#gift-card-view");
        var name = $("#receiver_name");
        var message = $("#receiver_message");

        return function (config) {
            $(document).ready(function () {
                info = $.cookie(config.cookieName);
                setFormData($.parseJSON(info));
            });
            //Submit
            $("#btn-save").click(function () {
                if (formData.validation() && formData.validation('isValid')) {
                    var data = {name: name.val(), message: message.val()};
                    var result = {response: false, data: null};
                    submitRequest(data, config.submitUrl, result).done(function () {
                        if (result.response === true) {
                            show(view);
                            if (result.data != null) {
                                setFormData($.parseJSON(result.data));
                            }
                        }
                    })
                }
            });
            //Delete
            $("#btn-delete").click(function () {
                var result = {response: false, data: null};
                submitRequest(null, config.deleteUrl, result).done(function () {
                    if (result.response === true) {
                        setFormData();
                        show(form);
                    }
                });
            });
            //Edit
            $("#gift-card-view-edit").click(function () {
                show(form);
            });

            function submitRequest(data, url, result) {
                var wait = $.Deferred();
                $.ajax({
                    url: url,
                    showLoader: true,
                    method: 'POST',
                    data: data,
                    success: function (response) {
                        if (!response.errMsg) {
                            result.response = true;
                            result.data = response.data;
                        } else {
                            alert({
                                content: response.errMsg
                            });
                            result.response = false;
                        }
                        wait.resolve();
                    },
                    error: function () {
                        console.log("error");
                        result.response = false;
                    }
                });
                return wait.promise();
            }

            function setFormData(info = null) {
                if (info !== null) {
                    name.val(info["name"]);
                    message.val(info["message"]);
                    $("#view_receiver_name").html(info["name"]);
                    $("#view_receiver_message").html(info["message"]);
                } else {
                    name.val("");
                    message.val("");
                    $("#view_receiver_name").html();
                    $("#view_receiver_message").html();
                }
            }

            function show(name) {
                switch (name) {
                    case form:
                        form.show();
                        view.hide();
                        break;
                    case view:
                        view.show();
                        form.hide();
                        break;
                    default:
                        form.hide();
                        view.hide();
                }
            }
        }
    }
);
