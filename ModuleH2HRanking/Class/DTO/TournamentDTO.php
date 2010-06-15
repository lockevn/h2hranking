<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TournamentDTO
 *
 * @author ngng
 */
class TournamentDTO {
    //put your code here

	/**
	 * Name
	 * @var <type>
	 */
	public $Name;

	/**
	 * Meta
	 * @var <type>
	 */
	public $Type;

	/**
	 * Hệ số nhân
	 * @var int
	 */
	public $Multiply;

	/**
	 * Thông tin về nhà tài trợ, ...
	 * @var <type>
	 */
	public $Desc;

	function __construct($arg){
         $this->Name = "Test Name $arg";
		 $this->Type = "Test Type $arg";
		 $this->Multiply = "Test Multiply $arg";
		 $this->Desc = "Test Desc $arg";
    }
}
?>
