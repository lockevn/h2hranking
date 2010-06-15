<?php require_once($_SERVER['DOCUMENT_ROOT']."/config.php");
require_once(ABSPATH."Lib/URLParamHelper.php");
require_once(ABSPATH."Lib/HttpNavigation.php");

require_once(ABSPATH."ModuleH2HRanking/Class/Business/RankingSystemBusiness.php");
require_once(ABSPATH."ModuleH2HRanking/Class/Business/TournamentBusiness.php");


$rsystemid = URLParamHelper::GetParamSafe('rsystemid');

$svcrsystem = new RankingSystemBusiness();
$rsystem = $svcrsystem->GetByID($rsystemid);

$svctour = new TournamentBusiness();
$arrtour = $svctour->GetTournamentList($rsystem);


var_dump($arrtour);
?>