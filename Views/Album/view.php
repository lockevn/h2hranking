<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <? include("Views/scripts.php"); ?>
        <script type="text/javascript" src="Views/Album/view.js"></script> 
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
                <form action="index.php?target=Album&do=addPicture" method="post" name="frmAddPicture" id="frmAddPicture">
                    <div id="divSuccess"><span class="label"></span></div>
                    <div id="divFailed"><span class="label"></span></div>
                    <div id="divForm">
                        <div class="title"><?= $data["album"]["Title"] ?></div>
                        <div class="tableRow" id="divValidation"><span class="errorText"></span></div>
                        <div class="tableRow" id="divValidationErrors"><ul class="errorText"></ul></div>
                        <div class="tableRow"><span class="label"><?= $data["album"]["Description"] ?></span></div>
                        <div class="tableRow" id="divPictures">   
                            <? foreach ($data["pictures"] as $picture) {?>
                            <div style="float: left; padding: 10px" id="divPicture<?= $picture["PictureID"] ?>">
                                <a href="<?= $picture["Path"] ?>" title="<?= $picture["Description"] ?>">
                                    <img border="0px" width="200px" src="<?= $picture["Path"] ?>" />
                                </a>
                            </div>
                            <? } ?>
                        </div>
                        <? if (isset($_SESSION["IsAdmin"])) { ?>
                        <div class="tableRow"><span class="label">Thêm ảnh mới</span><input type="hidden" id="hidAlbumID" name="hidAlbumID" value="<?= $data["album"]["AlbumID"] ?>" /></div>
                        <div class="tableRow"><input type="text" class="extraLongEdit" id="txtPath" name="txtPath" /></div>
                        <div class="tableRow"><textarea class="largeRichEdit" id="txtDescription" name="txtDescription"></textarea></div>
                        <div class="tableRow"><center><input type="submit" id="btnAdd" class="btn" value="Thêm" /></center></div>
                        <? } ?>
                    </div>            
                    <div id="divSuccess"><span class="label"></span></div>
                    <div id="divFailed"><span class="label"></span></div>
                </form>
            </div>
            <div id="divFooter"><? include("Views/footer.php"); ?></div>
        </div>
    </body>
</html>