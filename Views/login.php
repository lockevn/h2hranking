<? if (!isset($_SESSION["UserID"])) { ?>
<form id="frmLogin" name="frmLogin" method="post" action="index.php?target=User&do=login">
<? } else { ?>
<form id="frmLogin" name="frmLogin" method="post" action="index.php?target=User&do=logout">
<? } ?>
    <div class="widgetBorder">
        <div class="widgetTitle">ĐĂNG NHẬP</div>
        <? if (!isset($_SESSION["UserID"])) { ?>
        <div class="tableRow">
            <div class="compactColumnLeft"><span class="label">Tên</span></div>
            <div class="columnRight"><input type="text" class="compactEdit" name="txtUsername" id="txtUsername" /></div>
        </div>
        <div class="tableRow">
            <div class="compactColumnLeft"><span class="label">Mật khẩu</span></div>
            <div class="columnRight"><input type="password" class="compactEdit" name="txtPassword" id="txtPassword" /></div>
        </div>
        <center>
            <div class="tableRow"><input type="submit" name="btnLogin" id="btnLogin" value="Đăng nhập" class="btn"/></div>
            <div class="tableRow"><span class="label"><a href="index.php?target=User&do=register" >Đăng ký</a></span></div>
        </center>
        <? } else { ?>
        <center>
            <div class="tableRow"><span class="label">Chào bạn <a href="index.php?target=User&do=editProfile"><?= $_SESSION["FullName"] ?></a></span></div>
            <div class="tableRow"><span class="label">Chúc một ngày tốt lành</span></div>
            <div class="tableRow"><input type="submit" name="btnLogin" id="btnLogin" value="Thoát" class="btn"/></div>
        </center>
        <? } ?>
    </div>
</form>