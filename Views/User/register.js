$(document).ready(function() {
    $("#txtBirthday").datepicker({
        changeMonth: true,
        changeYear: true
    });
    
    $("#divUploadDialog").dialog({
        modal: true,
        autoOpen: false,
        show: "slide",
        title: "Tải ảnh đại diện lên",
        resizable: false,
        width: 450,
        height:250
    });
                                                   
    $("#btnUpload").click(function() {
        $("#divUploadDialog").dialog("open");
    });

    new nicEditor({
        iconsPath : "js/nicEditorIcons.gif", 
        buttonList : [
            "fontSize",
            "bold",
            "italic",
            "underline",
            "strikeThrough",
            "subscript",
            "superscript",
            "forecolor",
            "bgcolor"
        ]
    }).panelInstance('txtDescription');
    
    $("#frmRegister").validate({
        debug: true,
        errorContainer: "#divValidationErrors, #divValidation",
        errorLabelContainer: "#divValidationErrors ul",
        wrapper: "li",
        rules: {
            txtUsername2: {
                required: true,
                minlength: 5,
                maxlength: 20
            },
            txtPassword2: {
                required: true,
                minlength: 6,
                maxlength: 200
            },
            /*txtConfirm: {
                equalTo: "#txtPassword"
            },*/
            txtEmail: {
                required: true,
                email: true
            },
            txtFullname: {
                required: true,
                maxlength: 200
            }
        },
        messages: {
            txtUsername2: {
                required: "Thiếu tên truy nhập",
                minlength: "Tên truy nhập phải có ít nhất 5 ký tự",
                maxlength: "Tên truy nhập không được dài hơn 20 ký tự"
            },
            txtPassword2: {
                required: "Thiếu mật khẩu",
                minlength: "Mật khẩu phải có ít nhất 6 ký tự",
                maxlength: "Mật khẩu không được dài hơn 200 ký tự"
            },
            /*txtConfirm: {
                equalTo: "Xác nhận mật khẩu không khớp"
            }, */
            txtEmail: {
                required: "Thiếu địa chỉ email",
                email: "Địa chỉ email không hợp lệ"
            },
            txtFullname: {
                required: "Thiếu tên đầy đủ",
                maxlength: "Tên không được dài hơn 200 ký tự"
            }
        },
        errorClass: "errorText",
        submitHandler: 
            function(form) {
                $.blockUI({message: "Đang xử lý"});
                jQuery(form).ajaxSubmit({
                    success: function(data) {
                        $.unblockUI();
                        var objData = eval("(" + data + ")");
                        if (objData._isSuccess) {
                            $("#divForm").hide();
                            $("#divSuccess").show();
                        }
                        else {
                            $("#divFailed").html(objData._message);
                            $("#divFailed").show();
                        }
                    }
                });
            }  
    });
});
