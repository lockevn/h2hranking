<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <? include("Views/scripts.php"); ?>
        <script type="text/javascript" src="Views/Album/new.js"></script> 
    </head>
    <body>        
        <div id="divLayout">
            <div id="divHeader"><? include("Views/header.php"); ?></div>
            <div id="divMenu"><? include("Views/topmenu.php"); ?></div>
            <div id="divLeft">
                <div><? include("Views/menu.php"); ?></div>
                <div><? include("Views/login.php"); ?></div>
            </div>
            <div id="divMain">
                <form action="index.php?target=Album&do=create" method="post" name="frmAlbum" id="frmAlbum">
                    <div id="divSuccess"><center><span class="label">Tạo album thành công. Đang chuyển ...</span></center></div>
                    <div id="divFailed"><span class="label"></span></div>
                    <div id="divForm">
                        <div class="title">Album mới</div>
                        <div class="tableRow" id="divValidation"><span class="errorText">Bạn làm ơn xem lại thông tin</span></div>
                        <div class="tableRow" id="divValidationErrors"><ul class="errorText"></ul></div>
                        <div class="tableRow">
                            <div class="compactColumnLeft"><span class="label">Tiêu đề</span></div>
                            <div class="columnRight"><input type="text" class="extraLongEdit" name="txtTitle" id="txtTitle"/>&nbsp;*</div>
                        </div>
                        <div class="tableRow">
                            <span class="label">Mô tả</span>
                        </div>
                        <div class="tableRow"><textarea class="largeRichEdit" name="txtDescription" id="txtDescription"></textarea></div>
                        <div class="tableRow"><center><input class="btn" type="submit" name="btnPost" id="btnPost" value="Gửi" /></center></div>
                    </div>            
                </form>
            </div>
            <div id="divFooter"><? include("Views/footer.php"); ?></div>
        </div>
    </body>
</html>