<?php


define('ABSPATH', dirname(__FILE__).'/'); // LockeVN: ABSPATH has value=where this config.php is laid


class H2HRANKING_CONFIG
{
	const MINPOINT_RANKC = 10;
	const MINPOINT_RANKB = 100;
	const MINPOINT_RANKBPLUS = 200;
	const MINPOINT_RANKA = 500;
	const MINPOINT_RANKAPLUS = 1000;

	/**
	 * Số người tối thiểu confirm trận đấu để ghi nhận kết quả
	 */
	const MIN_VIEWER_TO_CONFIRM_MATCH = 2;
}

?>