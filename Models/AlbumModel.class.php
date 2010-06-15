<?php
    require_once("Framework/Model.class.php");

    class AlbumModel extends Model {
        public function newAlbum($album) {
            $sql = "INSERT INTO tblAlbum " .
                   "(CreatedBy, Title, Description, PostDate) " .
                   "VALUES (" .
                   $album["CreatedBy"] . "," .
                   "'" . $this->formatString($album["Title"]) . "'," .
                   "'" . $this->formatString($album["Description"]) . "'," .
                   "'" . $this->formatString(date("Y-m-d")) . "'" .   
                   ")";
            
            $this->executeSqlUpdate($sql);
            
            return true;
        }  
        
        public function getAllAlbums() {
            $sql = "SELECT AlbumID, Title, tblAlbum.Description, CreatedBy, tblUser.FullName AS AuthorName, PostDate FROM tblAlbum" .
            " LEFT OUTER JOIN tblUser ON tblAlbum.CreatedBy = tblUser.UserID" .
            " ORDER BY AlbumID DESC";
            return $this->executeSqlQuery($sql);
        }        

        public function getAlbum($id) {
            if (!is_numeric($id)) {
                return null;
            }
            $sql = "SELECT AlbumID, Title, tblAlbum.Description, CreatedBy, tblUser.FullName AS AuthorName, PostDate FROM tblAlbum" .
            " LEFT OUTER JOIN tblUser ON tblAlbum.CreatedBy = tblUser.UserID" .
            " WHERE AlbumID = " . $id;
            
            $rows = $this->executeSqlQuery($sql);
            
            return $rows[0];
        }
        
        public function addPicture($picture) {
            if (!is_numeric($picture["AlbumID"])) {
                return null;
            }
                        
            $conn = $this->connectDB();
            
            $sql = "INSERT INTO tblPicture " .
                   "(AlbumID, Path, Description) " .
                   "VALUES (" .
                   $picture["AlbumID"] . "," .
                   "'" . $this->formatString($picture["Path"]) . "'," .
                   "'" . $this->formatString($picture["Description"]) . "'" .
                   ") ";
            
            $this->executeSqlUpdateConn($sql, $conn);
            
            $pictureID = mysql_insert_id();
            
            $sql = "SELECT PictureID, Path, Description FROM tblPicture" .
            " WHERE PictureID = " . $pictureID;
            
            $rows = $this->executeSqlQueryConn($sql, $conn);
            
            $this->closeDB($conn);
            
            return $rows[0];
        }        
        
        public function getPictures($albumID) {
            if (!is_numeric($albumID)) {
                return null;
            }
            $sql = "SELECT PictureID, Path, Description FROM tblPicture" .
            " WHERE AlbumID = " . $albumID .
            " ORDER BY PictureID ASC ";

            return $this->executeSqlQuery($sql);
        }        
    }  
?>
