<?php
require_once("Lib/MessioFramework/Model.class.php");

class TournamentModel extends Model {

	/**
	 *
	 * @param <type> $user
	 * @return <type> 
	 */
	public function create($user) {
		$sql = "SELECT Count(UserID) FROM tblUser WHERE Username='" . $this->formatString($user["Username"]) . "'";
		$count = $this->executeSqlScalar($sql);
		if ($count > 0) 
			return false;

		
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
?>
