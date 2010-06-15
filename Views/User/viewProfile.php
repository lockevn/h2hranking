<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <? include("Views/scripts.php"); ?>
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
                <form action="" method="post" name="frmViewProfile" id="frmViewProfile">
                    <div id="divSuccess"><center><span class="label">Đã cập nhật thành công</span></center></div>
                    <div id="divFailed"><span class="label"></span></div>
                    <div id="divForm">
                        <div class="title"><?= $data["FullName"] ?></div>                        
                        <div class="tableRow" id="divValidation"><span class="errorText">Bạn cần phải cung cấp đầy đủ thông tin cần thiết</span></div>
                        <div class="tableRow" id="divValidationErrors"><ul class="errorText"></ul></div>
                        <div class="tableRow">
                            <div style="float: left; padding-right: 20px;"><img src="<?= (trim($data["Avatar"]) != "") ? $data["Avatar"] : "/images/no_avatar.gif" ?>" width="200px" /></div>
                            <div style="margin: 15px;"><span class="label"><strong>Sinh nhật:&nbsp;</strong><?= date("d-m-y",strtotime($data["Birthday"])) ?></span></div>
                            <div style="margin: 15px;"><span class="label"><strong>Thành viên lớp:&nbsp;</strong><? if ($data["Class"] == 1) { echo "9 Toán"; } else if ($data["Class"] == 1) { echo "9 Văn"; } ?></span></div>
                            <div style="margin: 15px;"><span class="label"><strong>Địa chỉ:&nbsp;</strong><?= $data["Address"] ?></span></div>
                            <div style="margin: 15px;"><span class="label"><strong>Số điện thoại:&nbsp;</strong><?= $data["Phone"] ?></span></div>
                            <div style="margin: 15px;"><span class="label"><strong>Số di động:&nbsp;</strong><?= $data["Mobile"] ?></span></div>
                            <div style="margin: 15px;"><span class="label"><strong>Email:&nbsp;</strong><a href="mailto:<?= $data["Email"] ?>"><?= $data["Email"] ?></a></span></div>
                            <div style="margin: 15px;"><span class="label"><strong>Yahoo:&nbsp;</strong><a href="ymsgr:SendIM?<?= $data["YahooID"] ?>"><?= $data["YahooID"] ?></a></span></div>
                            <div style="margin: 15px;"><span class="label"><strong>Công việc hiện tại:&nbsp;</strong><?= $data["Work"] ?></span></div>
                            <div style="margin: 15px;"><span class="label"><?= $data["Description"] ?></span></div>
                        </div>
                    </div>            
                </form>
            </div>
            <div id="divFooter"><? include("Views/footer.php"); ?></div>
        </div>
    </body>
</html>