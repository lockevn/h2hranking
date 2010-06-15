<?php
/* 
 * Ranking system
 * # Hệ thống tính điểm: hỗ trợ nhiều hệ thống, mỗi hệ thống là một list các player (ghi metafield rankingsystem trong player)

    * ranking_system_list_read
    * lưu dữ liệu trong json file
    * tương lai nếu phát triển, website này sẽ cho phép tạo group các player tham gia bảng xếp hạng
 */

/**
 * Description of RankingSystem
 *
 * @author ngng
 */
class RankingSystemDTO {
    //put your code here
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
?>
