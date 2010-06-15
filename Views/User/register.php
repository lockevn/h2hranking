<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <? include("Views/scripts.php"); ?>
        <script type="text/javascript" src="Views/User/register.js"></script> 
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
                <form action="index.php?target=User&do=create" method="post" name="frmRegister" id="frmRegister">
                    <div id="divSuccess"><center><span class="label">Cảm ơn bạn đã đăng ký tham gia website. Bạn có thể dùng tài khoản của mình để tham gia ngay từ lúc này.</span></center></div>
                    <div id="divFailed"><span class="label"></span></div>
                    <div id="divForm">
                        <div class="title">Đăng ký thành viên</div>                        
                        <div class="tableRow" id="divValidation"><span class="errorText">Bạn cần phải cung cấp đầy đủ thông tin để đăng ký</span></div>
                        <div class="tableRow" id="divValidationErrors"><ul class="errorText"></ul></div>
                        <div class="subTitle">Thông tin cơ bản</div>                        
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Tên truy nhập</span></div>
                            <div class="columnRight"><input type="text" class="edit" name="txtUsername2" id="txtUsername2"/>&nbsp;*</div>
                        </div>
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Mật khẩu</span></div>
                            <div class="columnRight"><input type="password" class="edit" name="txtPassword2" id="txtPassword2" />&nbsp;*</div>
                        </div>
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Xác nhận mật khẩu</span></div>
                            <div class="columnRight"><input type="password" class="edit" name="txtConfirm" id="txtConfirm" /></div>
                        </div>
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Email</span></div>
                            <div class="columnRight"><input type="text" class="edit" name="txtEmail" id="txtEmail" />&nbsp;*</div>
                        </div>
                        <div class="subTitle">Thông tin chi tiết</div>                        
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Tên đầy đủ</span></div>
                            <div class="columnRight"><input type="text" class="longEdit" name="txtFullName" id="txtFullName" />&nbsp;*</div>
                        </div>
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Ngày sinh</span></div>
                            <div class="columnRight"><input type="text" class="edit" name="txtBirthday" id="txtBirthday" readonly="readonly" value="01/01/82" /></div>
                        </div>
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Lớp<span></div>
                            <div class="columnRight">
                                <select name="cboClass" class="edit" id="cboClass">
                                    <option value="1">9 Toán</option>
                                    <option value="2">9 Văn</option>
                                    <option value="3">Khác</option>
                                </select>
                            </div>
                        </div>                                                                                                       
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Công việc hiện tại</span></div>
                            <div class="columnRight"><input type="text" class="longEdit" name="txtWork" id="txtWork"></input></div>
                        </div>
                        <div class="subTitle">Liên lạc</div>                        
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Địa chỉ liên lạc</span></div>
                            <div class="columnRight"><input type="text" class="longEdit" name="txtAddress" id="txtAddress" /></div>
                        </div>
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Số điện thoại</span></div>
                            <div class="columnRight"><input type="text" class="edit" name="txtPhone" id="txtPhone" /></div>
                        </div>
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Số di động</span></div>
                            <div class="columnRight"><input type="text" class="edit" name="txtMobile" id="txtMobile" /></div>
                        </div>
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Yahoo</span></div>
                            <div class="columnRight"><input type="text" class="edit" name="txtYahooID" id="txtYahooID" /></div>
                        </div>                                                      
                        <div class="subTitle">Bổ sung</div>                        
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Ảnh đại diện</span></div>
                            <div class="columnRight">
                                <input type="text" class="longEdit" name="txtAvatar" id="txtAvatar" />&nbsp;
                                <input type="button" value="Tải lên" id="btnUpload" class="btn" />
                                <div id="divUploadDialog" ><iframe src="upload.html" frameborder="0" scrolling="no"></iframe></div>
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="columnLeft"><span class="label">Đôi lời giới thiệu về bạn</span></div>
                            <div class="columnRight"><textarea name="txtDescription" class="richEdit" id="txtDescription"></textarea></div>
                        </div>
                        <div><center><input type="submit" class="btn" name="btnRegister" id="btnRegister" value="Đăng ký" /></center></div>
                    </div>            
                </form>
            </div>
            <div id="divFooter"><? include("Views/footer.php"); ?></div>
        </div>
    </body>
</html>