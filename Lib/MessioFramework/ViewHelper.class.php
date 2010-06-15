<?php
    require_once("Models/PostModel.class.php");
    require_once("Models/EventModel.class.php");
    require_once("Models/UserModel.class.php");

    class ViewHelper {
        public function getLatestPosts() {
            $model = new PostModel();
            $rows = $model->getLatestPosts();
            return $rows;
        }

        public function getLatestCommentedPosts() {
            $model = new PostModel();
            $rows = $model->getLatestCommentedPosts();
            return $rows;
        }
        
        public function getLatestUsers() {
            $model = new UserModel();
            $rows = $model->getLatestUsers();
            return $rows;
        }
        
        public function getComingEvents() {
            $model = new EventModel();
            $rows = $model->getComingEvents();
            return $rows;
        }

        public function getDiscussionCategories() {
            $model = new PostModel();
            $rows = $model->getDiscussionCategories();
            return $rows;
        }
    }
?>
