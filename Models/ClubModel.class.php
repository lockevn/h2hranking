<?php
require_once("Lib/MessioFramework/Model.class.php");

class ClubModel extends Model {

	/**
	 *
	 * @param <type> $dto
	 * @return <type>
	 */
	public function create($dto) {
		$sql = "SELECT Count(id) FROM " .CONFIG::$db_prefix.$dto->_tablename.
				" WHERE id=" . $this->formatString($dto->ID);
		$count = $this->executeSqlScalar($sql);
		if ($count > 0)
			return false;

		$sql = "INSERT INTO  " .
		
		CONFIG::$db_prefix.$dto->_tablename.
			   "(name, leader) " .
					
			   "VALUES (" .
			   "'" . $this->formatString($dto['name']) . "'," .
			   "'" . $this->formatString($dto['leader']) .
			   ")";

		$this->executeSqlUpdate($sql);
		return true;
	}

	public function updateUser($dto) {
            $sql = "UPDATE  " .CONFIG::$db_prefix.$dto->_tablename.
                   "SET " .
                   "name = '" . $this->formatString($dto["name"]) . "'," .
                   "desc = '" . $this->formatString($dto["desc"]) . "'," .
                   "type = '" . $this->formatString($dto["type"]) . "'," .
                   "multiply = '" . $this->formatString($dto["multiply"]) . "' " .
                   "WHERE id = " . $dto["id"];

            $this->executeSqlUpdate($sql);

            return true;
        }

		public function get($id)
		{
			return array();
		}

		public function listAll() {
            $sql = "SELECT id, name, desc, type, multiply FROM " .CONFIG::$db_prefix.$dto->_tablename;
            return $this->executeSqlQuery($sql);
        }

		public function getRankingHistoryList() {
            return array(1,2,3,4,5,4,3,2,1);
        }
}
?>