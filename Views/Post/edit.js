$(document).ready(function() {
    new nicEditor({
        iconsPath : "js/nicEditorIcons.gif"
    }).panelInstance("txtContent");

    $("#frmEdit").validate({
        debug: true,
        errorContainer: "#divValidationErrors, #divValidation",
        errorLabelContainer: "#divValidationErrors ul",
        wrapper: "li",
        rules: {
            txtTitle: {
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
                required: "Thiếu tên bài viết",
                maxlength: "Tên bài viết không được dài hơn 500 ký tự"
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
                        var objData = eval('(' + data + ')');
                        if (objData._isSuccess) {
                            //alert($("#divSuccess"));
                            $("#divSuccess").show();
                            setTimeout(function(){
                                top.location.href = "index.php?target=Post&do=view&id=" + objData._data;
                            }, 1500);
                        }
                        else {
                            $("#divFailed").html(data._message);
                            $("#divFailed").show();
                        }
                    }
                });
            }  
    });
});