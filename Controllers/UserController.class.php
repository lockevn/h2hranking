<?php
    require_once("Framework/Controller.class.php");
    require_once("Framework/AjaxPostResult.class.php");
    require_once("Models/UserModel.class.php");
    
    class UserController extends Controller{
        public function register() {
            $this->renderView("register", null);
        }
        
        public function editProfile() {
            $id = $_SESSION["UserID"];
            if (isset($id)) {
                $model = new UserModel();
                $user = $model->getUser($id);
                $this->renderView("editProfile", $user);
            }
            else {
                $this->accessDenied();
            }
        }
                                    
        public function viewProfile() {
            $id = $_REQUEST["id"];
            if (isset($id)) {
                $model = new UserModel();
                $user = $model->getUser($id);
                $this->renderView("viewProfile", $user);
            }
            else {
                $this->accessDenied();
            }
        }
                                    
        public function create() {
            try {
                $user = array();
                $user["Username"] = $_REQUEST["txtUsername2"];
                $user["Password"] = $_REQUEST["txtPassword2"];
                $user["FullName"] = $_REQUEST["txtFullName"];
                $user["Birthday"] = $_REQUEST["txtBirthday"];
                $user["Class"] = $_REQUEST["cboClass"];
                $user["Avatar"] = $_REQUEST["txtAvatar"];
                $user["Description"] = $_REQUEST["txtDescription"];
                $user["Address"] = $_REQUEST["txtAddress"];
                $user["Email"] = $_REQUEST["txtEmail"];
                $user["Work"] = $_REQUEST["txtWork"];
                $user["Mobile"] = $_REQUEST["txtMobile"];            
                $user["Phone"] = $_REQUEST["txtPhone"];            
                $user["YahooID"] = $_REQUEST["txtYahooID"];
                
                $model = new UserModel();
                $ret = $model->createUser($user);
                
                if ($ret) {
                    $this->returnJSON(new AjaxPostResult(true, "", null));
                }
                else {
                    $this->returnJSON(new AjaxPostResult(false, "Bạn hãy chọn một tên truy nhập khác. Tên truy nhập này đã được sử dụng", null));
                }
            }
            catch (Exception $ex) {
                $this->returnJSON(new AjaxPostResult(false, "Xảy ra lỗi trong quá trình xử lý. Bạn hãy thử làm lại. Thành thật xin lỗi!", null));
            }
        }
        
        public function update() {
            $id = $_SESSION["UserID"];
            if (!isset($id) || !isset($_REQUEST["txtFullName"])) {
                $this->accessDenied();
            }
            else {
                try {
                    $user = array();
                    $user["UserID"] = $id;
                    $user["FullName"] = $_REQUEST["txtFullName"];
                    $user["Birthday"] = $_REQUEST["txtBirthday"];
                    $user["Class"] = $_REQUEST["cboClass"];
                    $user["Avatar"] = $_REQUEST["txtAvatar"];
                    $user["Description"] = $_REQUEST["txtDescription"];
                    $user["Address"] = $_REQUEST["txtAddress"];
                    $user["Email"] = $_REQUEST["txtEmail"];
                    $user["Work"] = $_REQUEST["txtWork"];
                    $user["Mobile"] = $_REQUEST["txtMobile"];            
                    $user["Phone"] = $_REQUEST["txtPhone"];            
                    $user["YahooID"] = $_REQUEST["txtYahooID"];
                    
                    $model = new UserModel();
                    $ret = $model->updateUser($user);
                    
                    if ($ret) {
                        $this->returnJSON(new AjaxPostResult(true, "", null));
                    }
                    else {
                        $this->returnJSON(new AjaxPostResult(false, "Xảy ra lỗi, bạn hãy thử lại. Xin thông cảm", null));
                    }
                }
                catch (Exception $ex) {
                    $this->returnJSON(new AjaxPostResult(false, "Xảy ra lỗi trong quá trình xử lý. Bạn hãy thử làm lại. Thành thật xin lỗi!", null));
                }
            }
        }
        
        public function login() {
            $username = $_REQUEST["txtUsername"];
            $password = $_REQUEST["txtPassword"];            

            $model = new UserModel();
            $user = $model->checkLogin($username, $password);
                
            if (isset($user)) {
                $_SESSION["UserID"] = $user["UserID"];
                $_SESSION["FullName"] = $user["FullName"];
                if ($user["IsAdmin"] == 1) {
                    $_SESSION["IsAdmin"] = $user["IsAdmin"];
                }
            }                
            
            $this->home();
        }
        
        public function logout() {
            unset($_SESSION["UserID"]);
            unset($_SESSION["FullName"]);
            unset($_SESSION["IsAdmin"]);
            $this->home();
        }

        public function list_() {
            $model = new UserModel();
            $users = $model->getAllUsers();
            
            $this->renderView("list", $users);
        }                
    }
?>
