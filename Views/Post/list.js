function deletePost(_id) {
    if (confirm("Xóa bài viết này?")) {
        $.ajax({
            type: "GET",
            url: "index.php?target=Post&do=deletePost",
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
}

