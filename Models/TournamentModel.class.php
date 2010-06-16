<?php
require_once("Lib/MessioFramework/Model.class.php");

class TournamentModel extends Model {

	/**
	 *
	 * @param <type> $dto
	 * @return <type> 
	 */
	public function create(TournamentDTO $dto) {
		$sql = "SELECT Count(id) FROM " .CONFIG::$db_prefix.$dto->_tablename.
				" WHERE id=" . $this->formatString($dto->ID);
		$count = $this->executeSqlScalar($sql);
		if ($count > 0) 
			return false;
		
		$sql = "INSERT INTO  " .

			   "(name, desc, type, multiply) " .
					CONFIG::$db_prefix.$dto->_tablename.
			   "VALUES (" .
			   "'" . $this->formatString($dto->Name) . "'," .
			   "'" . $this->formatString($dto->Desc) . "'," .
			   "'" . $this->formatString($dto->Type) . "'," .
			   "'" . $this->formatString($dto->Multiply) . 
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

		public function listAll() {
            $sql = "SELECT id, name, desc, type, multiply FROM " .CONFIG::$db_prefix.$dto->_tablename;
            return $this->executeSqlQuery($sql);
        }
}
?>