<?php
    require_once("Lib/MessioFramework/Model.class.php");

    class UserModel extends Model {
        public function createUser($user) {      
            $sql = "SELECT Count(UserID) FROM tblUser WHERE Username='" . $this->formatString($user["Username"]) . "'";
            $count = $this->executeSqlScalar($sql);
            if ($count > 0) {
                return false;
            }
            else {
                $sql = "INSERT INTO tblUser " .
                       "(Username, Password, FullName, Birthday, Class, Avatar, Description, Address, Email, Work, Mobile, Phone, YahooID, IsAdmin, Status) " .
                       "VALUES (" .
                       "'" . $this->formatString($user["Username"]) . "'," .
                       "'" . md5($user["Password"]) . "'," .
                       "'" . $this->formatString($user["FullName"]) . "'," .
                       "'" . $this->formatString(date("Y-m-d", strtotime($user["Birthday"]))) . "'," .
                       $this->formatString($user["Class"]) . "," .
                       "'" . $this->formatString($user["Avatar"]) . "'," .
                       "'" . $this->formatString($user["Description"]) . "'," .
                       "'" . $this->formatString($user["Address"]) . "'," .
                       "'" . $this->formatString($user["Email"]) . "'," .
                       "'" . $this->formatString($user["Work"]) . "'," .
                       "'" . $this->formatString($user["Mobile"]) . "'," .
                       "'" . $this->formatString($user["Phone"]) . "'," .
                       "'" . $this->formatString($user["YahooID"]) . "'," .
                       "0, " .  //not an admin
                       "0 " .   //0: registered, 1: confirmed, 2: banned
                       ")";
                
                $this->executeSqlUpdate($sql);
                
                return true;
            }
        }
        
        public function updateUser($user) {      
            $sql = "UPDATE tblUser " .
                   "SET " .
                   "FullName = '" . $this->formatString($user["FullName"]) . "'," .
                   "Birthday = '" . $this->formatString(date("Y-m-d", strtotime($user["Birthday"]))) . "'," .
                   "Class = " . $this->formatString($user["Class"]) . "," .
                   "Avatar = '" . $this->formatString($user["Avatar"]) . "'," .
                   "Description = '" . $this->formatString($user["Description"]) . "'," .
                   "Address = '" . $this->formatString($user["Address"]) . "'," .
                   "Email = '" . $this->formatString($user["Email"]) . "'," .
                   "Work = '" . $this->formatString($user["Work"]) . "'," .
                   "Mobile = '" . $this->formatString($user["Mobile"]) . "'," .
                   "Phone = '" . $this->formatString($user["Phone"]) . "'," .
                   "YahooID = '" . $this->formatString($user["YahooID"]) . "' " .
                   "WHERE UserID = " . $user["UserID"];
            
            $this->executeSqlUpdate($sql);
            
            return true;
        }
        
        public function checkLogin($username, $password) {
			return true;
			
            $sql = "SELECT UserID, IsAdmin, FullName FROM tblUser WHERE Username='" . $this->formatString($username) . 
                "' AND Password = '" . md5($password) . "'";
            $rows = $this->executeSqlQuery($sql);
            
            if (sizeof($rows) > 0) {
                return $rows[0];
            }
            else {
                return null;
            }
        }

        public function getLatestUsers() {
            $sql = "SELECT UserID, FullName FROM tblUser" .
            " WHERE IsAdmin <> 1 ORDER BY UserID DESC LIMIT 0,5";
            return $this->executeSqlQuery($sql);
        }
        
        public function getUser($id) {
            if (!is_numeric($id)) {
                return null;
            }
            $sql = "SELECT Username, Password, FullName, Birthday, Class, Avatar, Description, Address, Email, Work, Mobile, Phone, YahooID, IsAdmin, Status " .
                " FROM tblUser " .
                " WHERE UserID=" . $id; 
            $rows = $this->executeSqlQuery($sql);
            
            if (sizeof($rows) > 0) {
                return $rows[0];
            }
            else {
                return null;
            }
                    
        }
        public function getAllUsers() {
            $sql = "SELECT UserID, FullName, Birthday, Class, Avatar, Description, Address, Email, Work, Mobile, Phone, YahooID  FROM tblUser" .
            " WHERE IsAdmin <> 1 ORDER BY UserID DESC";
            return $this->executeSqlQuery($sql);
        }                
    }
?>
