$(document).ready(function() {
    new nicEditor({
        iconsPath : "js/nicEditorIcons.gif"
    }).panelInstance("txtDescription");

    $("#frmAlbum").validate({
        debug: true,
        errorContainer: "#divValidationErrors, #divValidation",
        errorLabelContainer: "#divValidationErrors ul",
        wrapper: "li",
        rules: {
            txtTitle: {
                required: true,
                maxlength: 500
            },
            txtDescription: {
                required: true,
                maxlength: 10000
            }
        },
        messages: {
            txtTitle: {
                required: "Thiếu tên album",
                maxlength: "Tên album không được dài hơn 500 ký tự"
            },
            txtDescription: {
                required: "Thiếu nội dung album",
                maxlength: "Nội dung không được dài hơn 10000 ký tự"
            }
        },
        errorClass: "errorText",
        submitHandler: 
            function(form) {
                $.blockUI({message: "Đang xử lý"});
                jQuery(form).ajaxSubmit({
                    success: function(data) {
                        $.unblockUI();
                        $("#divForm").hide();
                        var objData = eval("(" + data + ")");
                        if (objData._isSuccess) {
                            $("#divSuccess").show();
                        }
                        else {
                            $("#divFailed").text(data._message);
                            $("#divFailed").show();
                        }
                    }
                });
            }  
    });
});