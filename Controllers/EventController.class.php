<?php
    require_once("Framework/Controller.class.php");
    require_once("Framework/AjaxPostResult.class.php");
    require_once("Models/EventModel.class.php");
    
    class EventController extends Controller {
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
                $event = array();
                $event["Title"] = $_REQUEST["txtTitle"];
                $event["Content"] = $_REQUEST["txtContent"];
                $event["EventDate"] = $_REQUEST["txtTime"];
                $event["CreatedBy"] = $_SESSION["UserID"]; //get from session
                $event["Place"] = $_REQUEST["txtPlace"];
                
                $model = new EventModel();
                $ret = $model->newEvent($event);
                
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
            $model = new EventModel();
            $events = $model->getAllEvents();
            
            $this->renderView("list", $events);
        }        
    }
?>
