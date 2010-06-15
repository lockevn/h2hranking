$(document).ready(function() {
    new nicEditor({
        iconsPath : "js/nicEditorIcons.gif"
    }).panelInstance("txtContent");

    $("#txtTime").datepicker({
        changeMonth: true,
        changeYear: true
    });
    
    $("#frmEvent").validate({
        debug: true,
        errorContainer: "#divValidationErrors, #divValidation",
        errorLabelContainer: "#divValidationErrors ul",
        wrapper: "li",
        rules: {
            txtTitle: {
                required: true,
                maxlength: 500
            },
            txtTime: {
                required: true
            },
            txtPlace: {
                required: true,
                maxlength: 500
            },
            txtContent: {
                required: true,
                maxlength: 10000
            }
        },
        messages: {
            txtTitle: {
                required: "Thiếu tên sự kiện",
                maxlength: "Tên sự kiện không được dài hơn 500 ký tự"
            },
            txtTime: {
                required: "Thiếu thời điểm"
            },
            txtPlace: {
                required: "Thiếu địa điểm",
                maxlength: "Địa điểm không được dài hơn 500 ký tự"
            },
            txtContent: {
                required: "Thiếu nội dung bài viết",
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