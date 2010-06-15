<div class="widgetBorder">
    <div class="widgetTitle">CHUYÊN MỤC</div>
    <ul>
    <? 
        require_once("Lib/MessioFramework/ViewHelper.class.php");
        
        $helper = new ViewHelper();

        $cats = $helper->getDiscussionCategories();
        
        foreach ($cats as $cat) {
    ?>
    <li class="label"><a href="index.php?target=Post&do=list_&cat=<?= $cat["CategoryID"] ?>"><?= $cat["Name"] ?></a></li>
    <?  } ?>
    <li class="label"><a href="forum/index.php">Diễn đàn</a></li>
    </ul>
</div>

<div class="widgetBorder">
    <div class="widgetTitle">BÀI MỚI</div>
    <marquee direction="up" scrolldelay="500">
        <ul>
        <? 
            $posts = $helper->getLatestPosts();
            
            foreach ($posts as $post) {
        ?>
        <li class="label"><a href="index.php?target=Post&do=view&id=<?= $post["PostID"] ?>"><?= $post["Title"] ?></a></li>
        <?  } ?>
        </ul>
    </marquee>
</div>

<div class="widgetBorder">
    <div class="widgetTitle">BÌNH LUẬN MỚI</div>
    <marquee direction="up" scrolldelay="500">
        <ul>
        <? 
            $posts1 = $helper->getLatestCommentedPosts();
            
            foreach ($posts1 as $post) {
        ?>
        <li class="label"><a href="index.php?target=Post&do=view&id=<?= $post["PostID"] ?>"><?= $post["Title"] ?></a></li>
        <?  } ?>
        </ul>
    </marquee>
</div>
<div class="widgetBorder">
    <div class="widgetTitle">THÀNH VIÊN MỚI</div>
    <ul>
    <? 
        $users = $helper->getLatestUsers();
        
        foreach ($users as $user) {
    ?>
    <li class="label"><a href="index.php?target=User&do=viewProfile&id=<?= $user["UserID"] ?>"><?= $user["FullName"] ?></a></li>
    <?  } ?>
    </ul>
</div>
