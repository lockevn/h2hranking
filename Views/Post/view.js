function deleteComment(_id) {
    if (confirm("Xóa bình luận này?")) {
        $.ajax({
            type: "GET",
            url: "index.php?target=Post&do=deleteComment",
            data: {
                id: _id 
            },
            success: function(data){
                var objData = eval("(" + data + ")");
                if (objData._isSuccess) {
                    $("#divComment" + _id).remove();
                    alert("Đã xóa");
                }
                else {
                    alert(data._message);
                }
            }
        });
    }
}

function showAddedComment(_id, _author, _authorName, _postDate) {
    var divComment = $("<div class=\"tableRow\" id=\"divComment" + _id + "\">");

    var divInfo = $("<div>");
    divInfo.html("<span class=\"commentInfo\"><a href=\"index.php?target=User&do=viewProfile&id=" + _author + "\">" + _authorName + "</a> viết ngày " + _postDate + "</span>");    
    divComment.append(divInfo);
    
    var divContent = $("<div>");
    divContent.addClass("commentContent");
    divContent.html(nicEditors.findEditor("txtComment").getContent());
    nicEditors.findEditor("txtComment").setContent("");
    divComment.append(divContent);
    
    $("#divComments").append(divComment);
}

$(document).ready(function() {
    new nicEditor({
        iconsPath : "js/nicEditorIcons.gif"
    }).panelInstance("txtComment");
    
    $("#frmComment").validate({
        debug: true,
        errorContainer: "#divValidationErrors, #divValidation",
        errorLabelContainer: "#divValidationErrors ul",
        wrapper: "li",
        errorClass: "errorText",
        rules: {
            txtComment: {
                required: true,
                maxlength: 10000
            }
        },
        messages: {
            txtComment: {
                required: "Thiếu nội dung bài viết",
                maxlength: "Nội dung không được dài hơn 10000 ký tự"
            }
        },
        submitHandler: 
            function(form) {
                $.blockUI({message: "Đang xử lý"});
                jQuery(form).ajaxSubmit({
                    success: function(data) {
                        $.unblockUI();
                        var objData = eval('(' + data + ')');
                        if (objData._isSuccess) {
                            showAddedComment(objData._data.CommentID,objData._data.Author,objData._data.AuthorName,objData._data.PostDate);
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