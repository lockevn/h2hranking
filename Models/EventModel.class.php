<?php
    require_once("Framework/Model.class.php");

    class EventModel extends Model {
        public function newEvent($event) {
            $sql = "INSERT INTO tblEvent " .
                   "(CreatedBy, Title, Content, EventDate, Place) " .
                   "VALUES (" .
                   $event["CreatedBy"] . "," .
                   "'" . $this->formatString($event["Title"]) . "'," .
                   "'" . $this->formatString($event["Content"]) . "'," .
                   "'" . $this->formatString(date("Y-m-d", strtotime($event["EventDate"]))) . "'," .   
                   "'" . $this->formatString($event["Place"]) . "'" .
                   ")";
            
            $this->executeSqlUpdate($sql);
            
            return true;
        }  
        
        public function getComingEvents() {
            //need change
            $sql = "SELECT EventID, EventDate, Title, Place FROM tblEvent" .
            " WHERE EventDate > '" . $this->formatString(date("Y-m-d")) . "'" .
            " ORDER BY EventID DESC LIMIT 0,1";
            return $this->executeSqlQuery($sql);
        }      
        
        public function getAllEvents() {
            $sql = "SELECT EventID, Title, Content, Place, EventDate FROM tblEvent" .
            " ORDER BY EventID DESC";
            return $this->executeSqlQuery($sql);
        }                
    }  
?>
