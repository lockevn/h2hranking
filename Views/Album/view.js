function deletePicture(_id) {
    /*
    if (confirm("Xóa album này?")) {
        $.ajax({
            type: "GET",
            url: "index.php?target=Album&do=deletePost",
            data: {
                id: _id 
            },
            success: function(data){
                var objData = eval('(' + data + ')');
                if (objData._isSuccess) {
                    $("#divPost" + _id).remove();
                    alert("Đã xóa");
                }
                else {
                    alert(data._message);
                }
            }
        });
    } 
    */
}

function showAddedPicture(_id, _path, _description) {
    var divPicture = $("<div style=\"float: left; padding: 10px\" id=\"divPicture\"" + _id + "\">");

    var link = $("<a href=\"" + _path + "\" title=\"" + _description + "\">");
    
    var img = $("<center><p><img border=\"0px\" width=\"200px\" src=\"" + _path + "\" /></p></center>");
    
    link.append(img);
    divPicture.append(link);
    
    $("#divPictures").append(divPicture);
}

$(document).ready(function() {
    if ($("#hidAlbumID").val() != null) {        
        new nicEditor({
            iconsPath : "js/nicEditorIcons.gif"
        }).panelInstance("txtDescription");
    }
    
    $('#divPictures a').lightBox();
    
    $("#frmAddPicture").validate({
        debug: true,
        errorContainer: "#divValidationErrors, #divValidation",
        errorLabelContainer: "#divValidationErrors ul",
        wrapper: "li",
        rules: {
            txtPath: {
                required: true,
                maxlength: 1500
            },
            txtDescription: {
                required: true,
                maxlength: 10000
            }
        },
        messages: {
            txtPath: {
                required: "Thiếu link",
                maxlength: "Link không được dài hơn 1500 ký tự"
            },
            txtDescription: {
                required: "Thiếu mô tả",
                maxlength: "Mô tả không được dài hơn 10000 ký tự"
            }
        },
        errorClass: "errorText",
        submitHandler: 
            function(form) {
                $.blockUI({message: "Đang xử lý"});
                jQuery(form).ajaxSubmit({
                    success: function(data) {
                        $.unblockUI();
                        //$("#divForm").hide();
                        var objData = eval("(" + data + ")");
                        if (objData._isSuccess) {
                            showAddedPicture(objData._data.PictureID,objData._data.Path,objData._data.Description);
                            //$("#divSuccess").show();
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

