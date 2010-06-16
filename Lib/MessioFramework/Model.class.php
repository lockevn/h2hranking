<?php
    require_once("Config.class.php");

    class Model {
        protected function connectDB() {
            $conn = mysql_connect(Config::$db_host, Config::$db_user, Config::$db_pwd);
            mysql_select_db(Config::$db_name, $conn);        
            return $conn;
        }
        
        protected function closeDB($conn) {
            mysql_close($conn);
        }
        
        protected function executeSqlQuery($sql) {
            $conn = $this->connectDB();            
            $rows = $this->executeSqlQueryConn($sql, $conn);            
            $this->closeDB($conn);
            return $rows;
        }
        
        protected function executeSqlQueryConn($sql, $conn) {
            $result = mysql_query($sql, $conn);            

            $rows = array();
            $index = 0;
            while ($row = mysql_fetch_assoc($result)) {
                $rows[$index] = $row;
                $index++;
            }
            
            return $rows;
        }
        
        protected function executeSqlUpdate($sql) {
            $conn = $this->connectDB();

            $result = $this->executeSqlUpdateConn($sql, $conn);
                
            $this->closeDB($conn);
            return $result;
        }
        
        protected function executeSqlUpdateConn($sql, $conn) {
            mysql_query($sql, $conn);
            $result = mysql_affected_rows($conn);
            return $result;
        }
        
        protected function executeSqlScalar($sql) {
            $conn = $this->connectDB();

            $result = $this->executeSqlScalarConn($sql, $conn);
                
            $this->closeDB($conn);
            return $result;
        }
        
        protected function executeSqlScalarConn($sql, $conn) {
            $result = mysql_query($sql, $conn);
            $fetch = mysql_fetch_array($result);
            
            return $fetch[0];
        }
        
        protected function formatString($string) {
            return str_replace("'","''",mysql_escape_string($string));
        }
    }
?>