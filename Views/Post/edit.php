<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <? include("Views/scripts.php"); ?>
        <script type="text/javascript" src="Views/Post/edit.js"></script> 
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
                <form action="index.php?target=Post&do=save" method="post" name="frmEdit" id="frmEdit">
                    <div id="divSuccess"><center><span class="label">Sửa bài thành công.</span></center></div>
                    <div id="divFailed"><span class="label"></span></div>
                    <div id="divForm">
                        <div class="title">Sửa bài viết</div>
                        <div class="tableRow" id="divValidation"><span class="errorText">Bạn làm ơn xem lại bài viết</span></div>
                        <div class="tableRow" id="divValidationErrors"><ul class="errorText"></ul></div>
                        <div class="tableRow">
                            <input type="hidden" id="hidPostID" name="hidPostID" value="<?= $data["post"]["PostID"] ?>" />
                            <div class="compactColumnLeft"><span class="label">Tiêu đề</span></div>
                            <div class="columnRight"><input type="text" class="extraLongEdit" name="txtTitle" id="txtTitle" value="<?= $data["post"]["Title"] ?>"/>&nbsp;*</div>
                        </div>
                        <div class="tableRow">
                            <div class="compactColumnLeft"><span class="label">Mục</span>&nbsp;</div>
                            <div class="columnRight">
                                <select class="longEdit" name="cboCategory" id="cboCategory">
                                    <? foreach ($data["categories"] as $cat) { 
                                        if ($cat["CategoryID"] == $data["post"]["CategoryID"]) {
                                    ?>                                    
                                    <option value="<?= $cat["CategoryID"] ?>" selected="selected"><?= $cat["Name"] ?></option>
                                    <?  } else { ?>
                                    <option value="<?= $cat["CategoryID"] ?>"><?= $cat["Name"] ?></option>
                                    <?  }} ?>
                                </select>&nbsp;*
                            </div>
                        </div>
                        <div class="tableRow">
                            <span class="label">Nội dung</span>
                        </div>
                        <div class="tableRow"><textarea class="largeRichEdit" name="txtContent" id="txtContent"><?= $data["post"]["Content"] ?></textarea></div>
                        <div class="tableRow"><center><input class="btn" type="submit" name="btnPost" id="btnPost" value="Gửi" /></center></div>
                    </div>            
                </form>
            </div>
            <div id="divFooter"><? include("Views/footer.php"); ?></div>
        </div>
    </body>
</html>