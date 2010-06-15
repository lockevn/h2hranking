<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <? include("Views/scripts.php"); ?>
        <script type="text/javascript" src="Views/User/editProfile.js"></script> 
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
                <form action="index.php?target=User&do=update" method="post" name="frmEditProfile" id="frmEditProfile">
                    <div id="divSuccess"><center><span class="label">Đã cập nhật thành công</span></center></div>
                    <div id="divFailed"><span class="label"></span></div>
                    <div id="divForm">
                        <div class="title">Sửa thông tin cá nhân</div>                        
                        <div class="tableRow" id="divValidation"><span class="errorText">Bạn cần phải cung cấp đầy đủ thông tin cần thiết</span></div>
                        <div class="tableRow" id="divValidationErrors"><ul class="errorText"></ul></div>
                        <div class="subTitle">Thông tin cơ bản</div>                        
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Tên truy nhập</span></div>
                            <div class="columnRight"><input type="text" class="edit" name="txtUsername2" id="txtUsername2" readonly="readonly" value="<?= $data["Username"] ?>"/>&nbsp;*</div>
                        </div>
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Email</span></div>
                            <div class="columnRight"><input type="text" class="edit" name="txtEmail" id="txtEmail" value="<?= $data["Email"] ?>"/>&nbsp;*</div>
                        </div>
                        <div class="subTitle">Thông tin chi tiết</div>                        
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Tên đầy đủ</span></div>
                            <div class="columnRight"><input type="text" class="longEdit" name="txtFullName" id="txtFullName" value="<?= $data["FullName"] ?>"/>&nbsp;*</div>
                        </div>
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Ngày sinh</span></div>
                            <div class="columnRight"><input type="text" class="edit" name="txtBirthday" id="txtBirthday" readonly="true" value="<?= date("m/d/y", strtotime($data["Birthday"])) ?>"/></div>
                        </div>
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Lớp<span></div>
                            <div class="columnRight">
                                <select name="cboClass" class="edit" id="cboClass">
                                    <? if ($data["Class"] == 1) {?>
                                    <option value="1" selected="selected">9 Toán</option>
                                    <? } else { ?>
                                    <option value="1">9 Toán</option>
                                    <? } ?>
                                    <? if ($data["Class"] == 2) {?>
                                    <option value="2" selected="selected">9 Văn</option>
                                    <? } else { ?>
                                    <option value="2">9 Văn</option>
                                    <? } ?>
                                    <? if ($data["Class"] == 3) {?>
                                    <option value="3" selected="selected">Khác</option>
                                    <? } else { ?>
                                    <option value="3">Khác</option>
                                    <? } ?>
                                </select>
                            </div>
                        </div>                                                                                                       
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Công việc hiện tại</span></div>
                            <div class="columnRight"><input type="text" class="longEdit" name="txtWork" id="txtWork" value="<?= $data["Work"] ?>"></input></div>
                        </div>
                        <div class="subTitle">Liên lạc</div>                        
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Địa chỉ liên lạc</span></div>
                            <div class="columnRight"><input type="text" class="longEdit" name="txtAddress" id="txtAddress" value="<?= $data["Address"] ?>"/></div>
                        </div>
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Số điện thoại</span></div>
                            <div class="columnRight"><input type="text" class="edit" name="txtPhone" id="txtPhone" value="<?= $data["Phone"] ?>"/></div>
                        </div>
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Số di động</span></div>
                            <div class="columnRight"><input type="text" class="edit" name="txtMobile" id="txtMobile" value="<?= $data["Mobile"] ?>"/></div>
                        </div>
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Yahoo</span></div>
                            <div class="columnRight"><input type="text" class="edit" name="txtYahooID" id="txtYahooID" value="<?= $data["YahooID"] ?>"/></div>
                        </div>                                                      
                        <div class="subTitle">Bổ sung</div>                        
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Ảnh đại diện</span></div>
                            <div class="columnRight">
                                <input type="text" class="longEdit" name="txtAvatar" id="txtAvatar" value="<?= $data["Avatar"] ?>" />&nbsp;
                                <input type="button" value="Tải lên" id="btnUpload" class="btn" />
                                <div id="divUploadDialog" ><iframe src="upload.html" frameborder="0" scrolling="no"></iframe></div>
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Đôi lời giới thiệu về bạn</span></div>
                            <div class="columnRight"><textarea name="txtDescription" class="richEdit" id="txtDescription"><?= $data["Description"] ?></textarea></div>
                        </div>
                        <div><center><input type="submit" class="btn" name="btnRegister" id="btnRegister" value="Cập nhật" /></center></div>
                    </div>            
                </form>
            </div>
            <div id="divFooter"><? include("Views/footer.php"); ?></div>
        </div>
    </body>
</html>