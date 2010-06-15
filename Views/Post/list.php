<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <? include("Views/scripts.php"); ?>
        <script type="text/javascript" src="Views/Post/list.js"></script> 
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
                    <div class="title">
                        <?= $data["category"]["Name"] ?>
                        <? if (isset($_SESSION["UserID"])) { ?>
                        &nbsp;(<a class="label" href="index.php?target=Post&do=new_&cat=<?= $data["category"]["CategoryID"] ?>" >Viết bài</a>)
                        <? } ?>
                    </div>
                    <div class="tableRow" id="divValidation"><span class="errorText"></span></div>
                    <div class="tableRow" id="divValidationErrors"><ul class="errorText"></ul></div>
                    <? foreach ($data["posts"] as $post) {?>
                    <div class="tableRow" id="divPost<?= $post["PostID"] ?>">
                        <div class="postTitle">
                            <?= $post["Title"] ?>
                            &nbsp;
                            <? if (isset($_SESSION["IsAdmin"])) { ?>
                            (<a class="label" href="javascript:deletePost(<?= $post["PostID"] ?>)" >Xóa</a>)
                            <? } ?>
                            <? if (isset($_SESSION["IsAdmin"]) || ($_SESSION["UserID"] == $post["Author"])) { ?>
                            (<a class="label" href="index.php?target=Post&do=edit&id=<?= $post["PostID"] ?>" >Sửa</a>)
                            <? } ?>
                        </div>
                        <div class="postContent"><?= substr(strip_tags($post["Content"]),0,320) ?>...&nbsp;<a href="index.php?target=Post&do=view&id=<?= $post["PostID"] ?>">Xem tiếp</a></div>
                        <div class="postInfo"><a href="index.php?target=User&do=viewProfile&id=<?= $post["Author"] ?>"><?= $post["AuthorName"] ?></a> viết ngày <?= date("d-m-y", strtotime($post["PostDate"])) ?></div>
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