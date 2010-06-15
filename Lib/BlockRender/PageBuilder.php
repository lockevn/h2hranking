<?php

require_once("PageConfig.php");

class PageBuilder
{
	const PAGELET_PREFIX = 'pagelet_';
	
	public static function Render($mod, $tpl)
	{
		$moduleConfig = PageConfig::$PageMap[$mod];
		foreach ((array)$moduleConfig as $zonename => $arrPagelet)
		{
			$zonecontent = '';
			foreach ((array)$arrPagelet as $pagelet)
			{
				if($pagelet)
				{
					require_once(ABSPATH."$pagelet.php");
					$zonecontent .= ${PageBuilder::PAGELET_PREFIX.$pagelet};
				}
			}
			$tpl->assign($zonename, $zonecontent);
		}

		return true;
	}

}

?>