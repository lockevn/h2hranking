<?php

require_once "../../Lib/MessioFramework/DTObase.class.php";

class TournamentDTO extends DTObase {
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
}

class RankingSystemDTO extends DTObase  {
    
	/**
	 * đấu thủ được phép thách đấu (challenge) người có rank trong khoảng rank +-3 (VD: player A xếp thứ 5, anh được phép thách đấu với player xếp hạng 4 3 2 (có option cho bật tắt chế độ này,
	 */
	const OPTION_RESTRICT_RANK_TO_CHALLENGE = false;
	/**
	 * : player có thứ hạng thấp hơn chiến thắng, đổi chỗ rank cho nhau (VD player A có rank 5, đấu với player B có rank 2, nếu player A thắng, anh có rank mới là 2 và player B bị đánh tụt xuống rank 5).
	 */
	const OPTION_SWAP_RANK = false;

	public $Name;
	public $Desc;

	
}

class PlayerDTO extends DTObase  {
	
	/**
	 *
	 * This user belong to with UserSystem? vntennis, google
	 */
	public $IDProvider = "";

	public $Name;
	public $Desc;
	public $Hand;
	public $Backhand;
	public $Pros;
	public $Cons;




}

class MatchDTO extends DTObase  {

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

class FeedEntryDTO extends DTObase  {

	public $Title;
	public $Body;
}

class ClubDTO extends DTObase  {
    public $Name;
	public $Leader;
}


?>
