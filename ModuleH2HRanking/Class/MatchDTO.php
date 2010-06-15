<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MatchDTO
 *
 * @author ngng
 */
class MatchDTO {
    //put your code here
	
	/**
	 * State = "waiting", "completed"
	 * trạng thái về mặt thi đấu của trận
	 */
	public $Progress;
	

	/**
	 * trang thai ve mat tinh trung thuc cua tran
	 * "pending", "confirmed"
	 */
	public $VerificationState;

	/**
	 * match score
	 *6-1,2-6,7-6(8)
	 * @var string
	 */
	public $Score;
	
	public $Player1;
	public $Player2;
	public $Player3;
	public $Player4;

	/**
	 * Hệ số nhân của trận, tính toán dựa trên chỉ số ranking của các player
	 * @var <type> 
	 */
	public $Multiply;
	
	/**
	 *this point will divide into 2 for 2 winner players if playing double
	 * @var <type>
	 */
	public $Point;


}
?>
