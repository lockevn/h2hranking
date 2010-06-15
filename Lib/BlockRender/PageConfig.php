<?

class PageConfig
{
	const PAGELET_PREFIX = 'pagelet_';
	/**
	*@desc assocarray (key = pagename (mod name), value = assocarray (key = 'zonename', 'pageletname1,pageletname2'))
	*/
	public static $PageMap = array(
		'home' => array(
			'ZONE_MainContent' => array('', '',''),
			'ZONE_Right' => array('ModuleH2HRanking/mashup1')
		),        
		'contact' => array(
			'ZONE_MainContent' => array('', '',''),
			'ZONE_Right' => array('', '')
		)
	);


	public static $AllowedCustomModule = array(
	);
	
	public static $PageLayoutMap = array(        
		'pagelet_for_mashup' => 'pagelet_for_mashup'
	); 
}

?>