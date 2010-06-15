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
    
    $("#frmEditProfile").validate({
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
                        $("#divLoading").dialog("close");
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
