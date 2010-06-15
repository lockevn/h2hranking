<?php
    require_once("Framework/Model.class.php");

    class PostModel extends Model {
        public function newPost($post) {
            $sql = "INSERT INTO tblPost " .
                   "(CategoryID, Title, Content, Author, PostDate) " .
                   "VALUES (" .
                   $post["CategoryID"] . "," .
                   "'" . $this->formatString($post["Title"]) . "'," .
                   "'" . $this->formatString($post["Content"]) . "'," .
                   $post["Author"] . "," .
                   "'" . $this->formatString(date("Y-m-d")) . "'" .   
                   ")";
                        
            $conn = $this->connectDB();
            $this->executeSqlUpdateConn($sql, $conn);

            $id = mysql_insert_id();
            
            $this->closeDB($conn);
            
            return $id;
        }
        
        public function savePost($post) {
            if (!is_numeric($post["PostID"])) {
                return -1;
            }
            $sql = "UPDATE tblPost " .
                   "SET " .
                   "CategoryID = " . $post["CategoryID"] . ", " .
                   "Title = '" . $this->formatString($post["Title"]) . "', " .
                   "Content ='" . $this->formatString($post["Content"]) . "' " .
                   //"Author = " . $post["Author"] . " " .
                   "WHERE " .   
                   "PostID = " . $post["PostID"];
            
            $this->executeSqlUpdate($sql);
            
            return $post["PostID"];
        }
        
        public function getLatestPosts() {
            $sql = "SELECT PostID, CategoryID, Title, Content, Author, tblUser.FullName AS AuthorName, PostDate FROM tblPost" .
            " LEFT OUTER JOIN tblUser ON tblPost.Author = tblUser.UserID" .
            " ORDER BY PostID DESC LIMIT 0,10";
            return $this->executeSqlQuery($sql);
        }
        
        public function getLatestCommentedPosts() {
            $sql = 
                " SELECT tblPost.PostID, CategoryID, Title, tblPost.Content, tblPost.Author, tblUser.FullName AS AuthorName, tblPost.PostDate, MAX( tblComment.CommentID ) AS LastCommentID " .
                " FROM tblPost " .
                " INNER JOIN tblComment ON tblPost.PostID = tblComment.PostID " .
                " LEFT OUTER JOIN tblUser ON tblPost.Author = tblUser.UserID " .
                " GROUP BY tblPost.PostID, CategoryID, Title, tblPost.Content, tblPost.Author, tblUser.FullName, tblPost.PostDate " .
                " ORDER BY LastCommentID DESC " .
                " LIMIT 0 , 10 ";
            return $this->executeSqlQuery($sql);
        }
        
        public function getAllPosts($catID) {
            if (!is_numeric($catID)) {
                return null;
            }
            if (isset($catID)) {
                $sql = "SELECT PostID, CategoryID, Title, Content, Author, tblUser.FullName AS AuthorName, PostDate FROM tblPost" .
                " LEFT OUTER JOIN tblUser ON tblPost.Author = tblUser.UserID" .
                " WHERE CategoryID = " . $catID . " ORDER BY PostID DESC";
            }
            else {
                $sql = "SELECT PostID, CategoryID, Title, Content, Author, tblUser.FullName AS AuthorName, PostDate FROM tblPost" .
                " LEFT OUTER JOIN tblUser ON tblPost.Author = tblUser.UserID" .
                " ORDER BY PostID DESC";
            }
            return $this->executeSqlQuery($sql);
        }
        
        public function getAllCategories() {
            $sql = "SELECT CategoryID, Name, Description FROM tblCategory ORDER BY DisplayOrder";
            return $this->executeSqlQuery($sql);
        }
        
        public function getDiscussionCategories() {
            $sql = "SELECT CategoryID, Name, Description FROM tblCategory WHERE Discussion=1 ORDER BY DisplayOrder";
            return $this->executeSqlQuery($sql);
        }
        
        public function getCategory($id) {
            if (!is_numeric($id)) {
                return null;
            }
            $sql = "SELECT CategoryID, Name, Description FROM tblCategory" .
            " WHERE CategoryID = " . $id;
            $rows = $this->executeSqlQuery($sql);
            return $rows[0];
        }
        
        public function getPost($id) {
            if (!is_numeric($id)) {
                return null;
            }
            $sql = "SELECT PostID, CategoryID, Title, Content, Author, tblUser.FullName AS AuthorName, PostDate FROM tblPost" .
            " LEFT OUTER JOIN tblUser ON tblPost.Author = tblUser.UserID" .
            " WHERE PostID = " . $id;
            
            $rows = $this->executeSqlQuery($sql);
            
            return $rows[0];
        }
        
        public function deletePost($id) {
            $sql = "DELETE FROM tblComment WHERE PostID = " . $id;            
            $this->executeSqlUpdate($sql);
            
            $sql = "DELETE FROM tblPost WHERE PostID = " . $id;            
            $this->executeSqlUpdate($sql);
            
            return true;
        }

        public function getComments($postID) {
            if (!is_numeric($postID)) {
                return null;
            }
            $sql = "SELECT CommentID, Content, Author, tblUser.FullName AS AuthorName, PostDate FROM tblComment" .
            " LEFT OUTER JOIN tblUser ON tblComment.Author = tblUser.UserID" .
            " WHERE PostID = " . $postID .
            " ORDER BY CommentID ASC ";

            return $this->executeSqlQuery($sql);
        }
        
        public function addComment($comment) {
            if (!is_numeric($comment["PostID"])) {
                return null;
            }
            
            $postDate = $this->formatString(date("Y-m-d")); 
            
            $conn = $this->connectDB();
            
            $sql = "INSERT INTO tblComment " .
                   "(PostID, Author, Content, PostDate) " .
                   "VALUES (" .
                   $comment["PostID"] . "," .
                   $comment["Author"] . "," .
                   "'" . $this->formatString($comment["Content"]) . "'," .
                   "'" . $postDate . "'" .   
                   ") ";
            
            $this->executeSqlUpdateConn($sql, $conn);
            
            $commentID = mysql_insert_id();
            
            $sql = "SELECT CommentID, Author, tblUser.FullName AS AuthorName, PostDate FROM tblComment" .
            " LEFT OUTER JOIN tblUser ON tblComment.Author = tblUser.UserID" .
            " WHERE CommentID = " . $commentID;
            
            $rows = $this->executeSqlQueryConn($sql, $conn);
            
            $this->closeDB($conn);
            
            $rows[0]["PostDate"] = date("d-m-y", strtotime($rows[0]["PostDate"]));
            
            return $rows[0];
        }
        
        public function deleteComment($id) {
            $sql = "DELETE FROM tblComment WHERE CommentID = " . $id;
            
            $this->executeSqlUpdate($sql);
            
            return true;
        }
    }
?>
