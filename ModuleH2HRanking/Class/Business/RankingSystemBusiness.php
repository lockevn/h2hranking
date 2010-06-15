<?php
require_once(ABSPATH."ModuleH2HRanking/Class/DTO/RankingSystemDTO.php");


/**
 * Description of RankingSystem
 *
 * @author ngng
 */
class RankingSystemBusiness {

	function GetByID($id)
	{
		$ret = new RankingSystemDTO();
		$ret->Name = 'Test name';
		$ret->Desc = 'Test desc';
		return $ret;
	}

	/**
	 * list of player and rank in this ranking system
	 */
	function GetRankingList(RankingSystemDTO $rsystem)
	{
		// TODO: caching
		
	}

	/**
	 *tính lại thứ hạng sau một thời gian (chứ ko tính realtime), tương tự như ATP ranking
	 * @param RankingSystemDTO $rsystem
	 */
	function CaculateRanking(RankingSystemDTO $rsystem)
	{
	}

	/**
	 *    * Reset toàn bộ điểm số và ranking
          o reset về 0
          o reset bằng cách trừ điểm (tránh lạm phát điểm, người sau có khả năng đuổi kịp người trước nếu đủ trình độ và tiến nhanh)

	 * @param RankingSystemDTO $rsystem
	 */
	function ResetPoint(RankingSystemDTO $rsystem)
	{
	}
}
?>
