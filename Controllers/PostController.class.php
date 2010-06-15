<?php
    require_once("Framework/Controller.class.php");
    require_once("Framework/AjaxPostResult.class.php");
    require_once("Models/PostModel.class.php");
    
    class PostController extends Controller {
        public function new_() {
            //check right            
            if (isset($_SESSION["UserID"])) {
                $model = new PostModel();
                $cats = $model->getAllCategories();
                $this->renderView("new", $cats);
            }
            else {
                $this->accessDenied();
            }
        }
        
        public function edit() {
            $postID = $_REQUEST["id"];
            $data=array();
            
            $model = new PostModel();
            
            $data["categories"] = $model->getAllCategories();
            $data["post"] = $model->getPost($postID);
            
            //check right            
            if (($data["post"]["Author"] == $_SESSION["UserID"]) || (isset($_SESSION["IsAdmin"]))) {
                $this->renderView("edit", $data);
            } else {
                $this->accessDenied();
            }
        }
        
        public function view() {
            $postID = $_REQUEST["id"];
            $data=array();

            $model = new PostModel();
            
            $data["post"] = $model->getPost($postID);
            $data["comments"] = $model->getComments($postID);

            $this->renderView("view", $data);
        }
        
        public function list_() {
            $catID = $_REQUEST["cat"];
            $model = new PostModel();
            $posts = $model->getAllPosts($catID);
            $category = $model->getCategory($catID);
            
            $data = array();
            $data["posts"] = $posts;
            $data["category"] = $category;
            
            $this->renderView("list", $data);
        }
        
        public function create() {
            try {
                $post = array();
                $post["Title"] = $_REQUEST["txtTitle"];
                $post["Content"] = $_REQUEST["txtContent"];
                $post["CategoryID"] = $_REQUEST["cboCategory"];
                $post["Author"] = $_SESSION["UserID"]; //get from session
                
                $model = new PostModel();
                $ret = $model->newPost($post);
                
                if ($ret > 0) {
                    $this->returnJSON(new AjaxPostResult(true, "", $ret));
                }
                else {
                    $this->returnJSON(new AjaxPostResult(false, "Xảy ra lỗi trong quá trình xử lý. Bạn hãy thử làm lại. Thành thật xin lỗi!", $ret));
                }
            }
            catch (Exception $ex) {
                $this->returnJSON(new AjaxPostResult(false, "Xảy ra lỗi trong quá trình xử lý. Bạn hãy thử làm lại. Thành thật xin lỗi!", null));
            }
        }
        
        public function save() {
            try {
                $post = array();
                $post["PostID"] = $_REQUEST["hidPostID"];
                $post["Title"] = $_REQUEST["txtTitle"];
                $post["Content"] = $_REQUEST["txtContent"];
                $post["CategoryID"] = $_REQUEST["cboCategory"];
                //$post["Author"] = 1; //get from session
                
                $model = new PostModel();
                $ret = $model->savePost($post);
                
                if ($ret > 0) {
                    $this->returnJSON(new AjaxPostResult(true, "", $ret));
                }
                else {
                    $this->returnJSON(new AjaxPostResult(false, "Xảy ra lỗi trong quá trình xử lý. Bạn hãy thử làm lại. Thành thật xin lỗi!", $ret));
                }
            }
            catch (Exception $ex) {
                $this->returnJSON(new AjaxPostResult(false, "Xảy ra lỗi trong quá trình xử lý. Bạn hãy thử làm lại. Thành thật xin lỗi!", null));
            }
        }
        
        public function comment() {
            try {
                $comment = array();
                $comment["PostID"] = $_REQUEST["hidPostID"];
                $comment["Content"] = $_REQUEST["txtComment"];
                $comment["Author"] = $_SESSION["UserID"];
                
                $model = new PostModel();
                $ret = $model->addComment($comment);
                
                if ($ret["CommentID"] > 0) {                    
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
        
        public function deleteComment() {
            if (!isset($_SESSION["IsAdmin"])) {
                $this->accessDenied();
            }
            else {
                try {
                    $commentID = $_REQUEST["id"];
                    
                    $model = new PostModel();
                    $ret = $model->deleteComment($commentID);
                    
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
        }
        
        public function deletePost() {
            if (!isset($_SESSION["IsAdmin"])) {
                $this->accessDenied();
            }
            else {
                try {
                    $postID = $_REQUEST["id"];
                    
                    $model = new PostModel();
                    $ret = $model->deletePost($postID);
                    
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
        }
    }
?>
