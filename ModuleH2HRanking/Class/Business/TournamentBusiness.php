<?php
require_once(ABSPATH."ModuleH2HRanking/Class/DTO/TournamentDTO.php");

/**
 * Description of TournamentBusiness
 *
 * @author ngng
 */
class TournamentBusiness {

	/**
	 *
	 * @return <type>
	 */
	function CreateTournament()
	{
		return null;
	}

	
	function Update()
	{
	}
	

	/**
	 * # tạo giải đấu
	 * thiết lập hệ số nhân, là giá trị của giải
	 */
	function UpdateTournament($p_MultiplyValue, $p_Name)
	{
	}

	/**
	 * liệt kê danh sách giải (không có khái niệm giải thường niên, phải tự tạo giải cho năm sau nếu cần)
	 * @param RankingSystemDTO $rsystem
	 */
	function GetTournamentList(RankingSystemDTO $rsystem)
	{
		$e1 = new TournamentDTO(1);
		$e2 = new TournamentDTO(2);
		$arrret = array($e1, $e2);
		return $arrret;
	}

	/**
	 * cập nhật tin tức nóng , LIVE (sẽ làm sau)
	 * @param RankingSystemDTO $rsystem
	 */
	function GetRelatedNews(RankingSystemDTO $rsystem)
	{
	}

	/**
	 * load presentation html file
	 */
	function GetPresentationInfo(TournamentDTO $tour)
	{
	}
}
?>