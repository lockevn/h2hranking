<?php

/************************************************************************/
/* GURUCORE - Define the absolute constant for using in other place     */
/************************************************************************/
define('ABSPATH', dirname(__FILE__).'/'); // LockeVN: ABSPATH has value=where this config.php is laid

class PATH
{
	const FILE = '/files';
}

class CONFIG
{    
	const API_URL = 'http://ranking.gurucore.com:99/api/';
	const WEB_URL = 'http://ranking.gurucore.com:99/';
	const ITEMPERPAGE = 20;    
	const CFG_EMAIL = 'RANKING.gurucore.com <lockevn@gurucore.com>';
	
	/**
	*@desc you put server name, you get serverinfo (address,username,password)
	*/
	public static $DB_Server_Mapping =
	array(
		'docebo'=>
		array(
			'address'=>'smartlms.dyndns.org',
			'username'=>'root',
			'password'=>'guruunited2008'
		)
	);    
}

class DB_PREFIX
{
	const RANKING = 'granking';	
}

?>