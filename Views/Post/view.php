<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <? include("Views/scripts.php"); ?>
        <script type="text/javascript" src="Views/Post/view.js"></script> 
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
                <form action="index.php?target=Post&do=comment" method="post" name="frmComment" id="frmComment">
                    <div id="divSuccess"><span class="label"></span></div>
                    <div id="divFailed"><span class="label"></span></div>
                    <div id="divForm">
                        <div class="tableRow" id="divValidation"><span class="errorText"></span></div>
                        <div class="tableRow" id="divValidationErrors"><ul class="errorText"></ul></div>                        
                        <div class="tableRow">                        
                            <div class="postTitle">
                                <input type="hidden" value="<?= $data["post"]["PostID"] ?>" id="hidPostID" name="hidPostID" />
                                <input type="hidden"  value="<?= count($data["comments"]) ?>" id="hidCommentCount" name="hidCommentCount" />
                                <span><?= $data["post"]["Title"] ?></span>
                            </div>
                            <div class="postContent"><?= $data["post"]["Content"] ?></div>
                            <div class="postInfo"><a href="index.php?target=User&do=viewProfile&id=<?= $data["post"]["Author"] ?>"><?= $data["post"]["AuthorName"] ?></a> viết ngày <?= date("d-m-y", strtotime($data["post"]["PostDate"])) ?></div>
                        </div>
                        <div class="tableRow" id="divComments">
                            <? foreach ($data["comments"] as $comment ){ ?>
                            <div id="divComment<?= $comment["CommentID"] ?>">
                                <div><span class="commentInfo"><a href="index.php?target=User&do=viewProfile&id=<?= $comment["Author"] ?>"><?= $comment["AuthorName"] ?></a> viết ngày <?= date("d-m-y", strtotime($comment["PostDate"])) ?>&nbsp;
                                    <? if (isset($_SESSION["IsAdmin"])) { ?>
                                    (<a class="label" href="javascript:deleteComment(<?= $comment["CommentID"] ?>)" >Xóa</a>)
                                    <? } ?>
                                </span></div>
                                <div class="commentContent"><?= $comment["Content"] ?></div>
                            </div>
                            <? } ?>
                        </div>
                        <div class="tableRow"><span class="label">Bình luận:</span></div>
                        <div class="tableRow"><textarea class="largeRichEdit" name="txtComment" id="txtComment"></textarea></div>
                        <? if (isset($_SESSION["UserID"])) { ?>
                        <div class="tableRow"><center><input class="btn" type="submit" value="Gửi" name="btnPost" id="btnPost"/></center></div>
                        <? } else { ?>
                        <div class="tableRow"><span class="label">Bạn hãy đăng nhập để bình luận bài viết này</span></div>
                        <? } ?>
                    </div>            
                </form>
            </div>
            <div id="divFooter"><? include("Views/footer.php"); ?></div>
        </div>
    </body>
</html>