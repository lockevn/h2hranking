<?php require_once("config.php");

// use session for web request
session_start();

require_once(ABSPATH."Lib/HttpNavigation.php");
require_once(ABSPATH."Lib/URLParamHelper.php");
require_once(ABSPATH."Lib/BlockRender/PageBuilder.php");

require_once(ABSPATH."Lib/External/Savant3.php");
//// LockeVN: init share Template Savant engine here
$tpl = new Savant3();
$tpl->setPath('template', array('template', '.'));


//********************* Set some ENVIRONMENT VAR for client side render **********************//
$mod = GetParamSafe('mod');
$mod = empty($mod) ? 'home' : $mod;
$tab = GetParamSafe('tab');

$tpl->assign('mod', $mod);
$tpl->assign('tab', $tab);
$tpl->assign('URL', $_SERVER['REQUEST_URI']);


// browser compat render
if (isset($_SERVER['HTTP_USER_AGENT']) && (stripos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.0') !== false))
{
	$tpl->assign("ie6", true);
}
if (isset($_SERVER['HTTP_USER_AGENT']) && (stripos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
{
	$tpl->assign("ieBrowser", true);
}



//********************* SECURITY ACCESS RESITRICT **********************//
$arrayNotAllowGuest = array(
	'home','setting', 'resetpwd',
	'advanced_post'
);

$authkey = '';
if(in_array($mod, $arrayNotAllowGuest))
{
	//$authkey = Security::GetCurrentAUauthkey(true);
}
else
{
	//$authkey = Security::GetCurrentAUauthkey();
}

if($authkey)
{
	$tpl->assign('authkey', $authkey);
	$pinfo = Security::GetCurrentAUProfileInfo($authkey);
	$tpl->assign('AUpid', $pinfo->id);
	$tpl->assign('AUpu', strtolower($pinfo->u));
}
else
{
	if(in_array($mod, $arrayNotAllowGuest))
	{
		// Security::Logout('/login');
	}
	else
	{
		// Security::Logout();
	}
}



//********************* CONTEXT PARAM **********************//
//$pinfo = Common::GetCurrentProfileInfo();
//$tpl->assign('pid', $pinfo['id']);
//$tpl->assign('pu', strtolower($pinfo['u']));


// RENDER HTML BASE ON RENDER TYPE
$rendertype = GetParamSafe('rendertype');
if($rendertype === "Pagelet")
{
	$pagelet = Text::removeNonAlphaNumericChar(GetParamSafe('pagelet'));
	$customlayout = Text::removeNonAlphaNumericChar(GetParamSafe('customlayout'));
	
	$zonecontent = '';
	require_once(ABSPATH."Template/Simple/Pagelet/$pagelet.php");
	$zonecontent .= $$pagelet;    
	$tpl->assign('ZONE', $zonecontent);
	
	// if customlayout is allow, use it.
	$customlayout = in_array($customlayout, array_values(PageConfig::$PageLayoutMap), true) ? $customlayout : 'raw_empty_for_pagelet';
	$tpl->display("LAYOUT.$customlayout.tpl.php");    
}
else
{		
	// not single pagelet render, we continue with PAGE RENDER
	//********************* PAGE RENDER **********************//
	if(in_array($mod, PageConfig::$AllowedCustomModule))
	{
		// if use "manual setting" Page
		require_once(ABSPATH."Template/Simple/Page/$mod.php");
	}
	else
	{
		// render page by render each pagelet, then add to page
		if(array_key_exists($mod, PageConfig::$PageMap))
		{
			PageBuilder::Render($mod, $tpl);
		}
		else
		{
			// if page is not configured, echo not found
			HttpNavigation::OutputRedirectToBrowser('/pagenotfound.php');			
		}
	}


	/************ EVERY PAGE HAS HEADER AND FOOTER, So render it manually here to avoid configure Header and Footer in each PageConfig ****************/
	require_once(ABSPATH."Template/Simple/Pagelet/header.php");
	$tpl->assign('ZONE_TopBar', ${PageBuilder::PAGELET_PREFIX.'Pagelet/header'});
	require_once(ABSPATH."Template/Simple/Pagelet/footer.php");
	$tpl->assign('ZONE_Footer', ${PageBuilder::PAGELET_PREFIX.'Pagelet/footer'});


	// if page use customlayout
	if(array_key_exists($mod, PageConfig::$PageLayoutMap))
	{
		// use custom layout define in PageBuilder    
		$customlayout = PageConfig::$PageLayoutMap[$mod];
		$tpl->display("LAYOUT.$customlayout.tpl.php");
	}
	else
	{
		// use default LAYOUT.DEFAULT.tpl.php
		$tpl->display('LAYOUT.DEFAULT.tpl.php');
	}
}

?>