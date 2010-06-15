<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <? include("Views/scripts.php"); ?>
        <script type="text/javascript" src="Views/User/list.js"></script> 
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
                <div id="divSuccess"><span class="label"></span></div>
                <div id="divFailed"><span class="label"></span></div>
                <div id="divForm">
                    <div class="title">Thành viên</div>
                    <div class="tableRow" id="divValidation"><span class="errorText"></span></div>
                    <div class="tableRow" id="divValidationErrors"><ul class="errorText"></ul></div>
                    <? foreach ($data as $user) {?>
                    <div class="tableRow" id="divAlbum<?= $user["UserID"] ?>">
                        <div style="float:left; padding-right:20px;"><img src="<?= (trim($user["Avatar"]) != "") ? $user["Avatar"] : "/images/no_avatar.gif" ?>" width="140px" /></div>
                        <div class="postTitle">
                            <?= $user["FullName"] ?>
                            <? if (isset($_SESSION["IsAdmin"])) { ?>
                            (<a class="label" href="javascript:deleteUser(<?= $user["UserID"] ?>)" >Xóa</a>)
                            (<a class="label" href="index.php?target=User&do=edit&id=<?= $user["UserID"] ?>" >Sửa</a>)
                            <? } ?>
                        </div>
                        <div class="postContent"><strong>Thành viên lớp:&nbsp;</strong><? if ($user["Class"] == 1) { echo "9 Toán"; } else if ($user["Class"] == 1) { echo "9 Văn"; } ?></div>
                        <div class="postContent"><strong>Địa chỉ:&nbsp;</strong><?= $user["Address"] ?></div>
                        <div class="postContent"><strong>Số di động:&nbsp;</strong><?= $data["Mobile"] ?></div>
                        <div class="postContent"><strong>Yahoo:&nbsp;</strong><a href="ymsgr:SendIM?<?= $user["YahooID"] ?>"><?= $user["YahooID"] ?></a></div>
                        <div class="postInfo"></div>
                    </div>
                    <? } ?>
                </div>            
                <div id="divSuccess"><span class="label"></span></div>
                <div id="divFailed"><span class="label"></span></div>
            </div>
            <div id="divFooter"><? include("Views/footer.php"); ?></div>
        </div>
    </body>
</html>