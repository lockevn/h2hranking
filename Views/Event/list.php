<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <? include("Views/scripts.php"); ?>
        <script type="text/javascript" src="Views/Event/list.js"></script> 
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
                    <div class="title">Sự kiện</div>
                    <div class="tableRow" id="divValidation"><span class="errorText"></span></div>
                    <div class="tableRow" id="divValidationErrors"><ul class="errorText"></ul></div>
                    <? foreach ($data as $event) {?>
                    <div class="tableRow" id="divAlbum<?= $event["EventID"] ?>">
                        <div style="float:left; padding-right=20px;"><img src="images/large-calendar.jpg" /></div>
                        <div class="postTitle">
                            <?= $event["Title"] ?>
                            <? if (isset($_SESSION["IsAdmin"])) { ?>
                            (<a class="label" href="javascript:deleteEvent(<?= $event["EventID"] ?>)" >Xóa</a>)
                            (<a class="label" href="index.php?target=Event&do=edit&id=<?= $event["EventID"] ?>" >Sửa</a>)
                            <? } ?>
                        </div>
                        <div class="postContent">Địa điểm: <?= $event["Place"] ?></div>
                        <div class="postContent">Thời gian: <?= date("d-m-y", strtotime($event["EventDate"])) ?></div>
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