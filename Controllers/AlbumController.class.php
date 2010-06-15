<?php
    require_once("Lib/MessioFramework/Controller.class.php");
    require_once("Lib/MessioFramework/AjaxPostResult.class.php");
    require_once("Models/AlbumModel.class.php");
    
    class AlbumController extends Controller {
        public function new_() {
            //check right            
            if (isset($_SESSION["IsAdmin"])) {
                $this->renderView("new", null);
            }
            else {
                $this->accessDenied();
            }
        }
        
        public function create() {
            try {
                $album = array();
                $album["Title"] = $_REQUEST["txtTitle"];
                $album["Description"] = $_REQUEST["txtDescription"];
                $album["CreatedBy"] = $_SESSION["UserID"]; //get from session
                
                $model = new AlbumModel();
                $ret = $model->newAlbum($album);
                
                if ($ret) {
                    $this->returnJSON(new AjaxPostResult(true, "", null));
                }
                else {
                    $this->returnJSON(new AjaxPostResult(false, "Xảy ra lỗi trong quá trình xử lý. Bạn hãy thử làm lại. Thành thật xin lỗi!", null));
                }
            }
            catch (Exception $ex) {
                $this->returnJSON(new AjaxPostResult(false, "Xảy ra lỗi trong quá trình xử lý. Bạn hãy thử làm lại. Thành thật xin lỗi!", null));
            }
        }
        
        public function list_() {
            $model = new AlbumModel();
            $albums = $model->getAllAlbums();
            
            $this->renderView("list", $albums);
        }
        
        public function view() {
            $albumID = $_REQUEST["id"];
            $data=array();

            $model = new AlbumModel();
            
            $data["album"] = $model->getAlbum($albumID);
            $data["pictures"] = $model->getPictures($albumID);

            $this->renderView("view", $data);
        }
        
        public function addPicture() {
            try {
                $picture = array();
                $picture["AlbumID"] = $_REQUEST["hidAlbumID"];
                $picture["Path"] = $_REQUEST["txtPath"];
                $picture["Description"] = $_REQUEST["txtDescription"];
                
                $model = new AlbumModel();
                $ret = $model->addPicture($picture);
                
                if ($ret["PictureID"] > 0) {                    
                    $this->returnJSON(new AjaxPostResult(true, "", $ret));
                }
                else {
                    $this->returnJSON(new AjaxPostResult(false, "Xảy ra lỗi trong quá trình xử lý. Bạn hãy thử làm lại. Thành thật xin lỗi!", null));
                }
            }
            catch (Exception $ex) {
                $this->returnJSON(new AjaxPostResult(false, "Xảy ra lỗi trong quá trình xử lý. Bạn hãy thử làm lại. Thành thật xin lỗi!", null));
            }
        }
    }
?>
