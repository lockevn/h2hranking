<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClubBusiness
 *
 * @author ngng
 */
class ClubBusiness {

	/**
	 *
	 * @param ClubDTO $club 
	 */
	function GetMemberList(ClubDTO $club)
	{
	}

	/**
	 *
	 * @param ClubDTO $club
	 * @param PlayerDTO $leader 
	 */
	function SetLeader(ClubDTO $club, PlayerDTO $leader)
	{
	}

	/**
	 *
	 * @param <type> $ClubDTO
	 */
	function GetCurrentRank(ClubDTO $club)
	{
		// foreach member, count
		// 
		// TODO: cache
	}

	/**
	 *thứ hạng trong sự nghiệp của câu lạc bộ
	 * @param ClubDTO $club
	 */
	function GetRankingHistoryList(ClubDTO $club)
	{
	}

	/**
	 * load presentation html file
	 * @param ClubDTO $club
	 */
	function GetPresentationInfo(ClubDTO $club)
	{
	}
}
?>
