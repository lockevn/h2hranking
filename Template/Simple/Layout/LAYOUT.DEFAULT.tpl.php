<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="expires" content="0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GURUCORE.com - information and communication technology, online service, hi tech, software design, web</title>
<meta name="robots" content="index,follow" /> 
<meta name="description" content="Nhóm nghiên cứu công nghệ thông tin và truyền thông GURUCORE, cung cấp các dịch vụ tư vấn, R&D và thiết kế phần mềm, đặc biệt là các hệ thống web online có công suất cao" /> 
<meta name="keywords" content="GURUCORE, guru core, guru, web framework, framework, dịch vụ tư vấn, dich vu tu van, tư vấn, tu van, thiết kế phần mềm, thiet ke phan mem, thiết kế, thiet ke, dịch vụ web, dich vu web, dịch vụ, dich vu, Google, Yahoo, Microsoft, WordPress, Webmaster, Việt Nam, Vietnam, Viet Nam, Blog, Website" /> 

<!-- Framework CSS -->
<link rel="stylesheet" href="/css/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="/css/print.css" type="text/css" media="print">
<!--[if IE]>
	<link rel="stylesheet" href="/css/ie.css" type="text/css" media="screen, projection" />
<![endif]-->
<link rel="stylesheet" href="/css/style.css" type="text/css" media="screen, projection" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery/plugin/jquery.blockUI.js"></script>
<script type="text/javascript" >
var QAPI_URL = "http://smartlms.dyndns.org";
var PAGE = {AUpu : '<?= $this->AUpu ?>', AUpid : <?= (empty($this->AUpid) ? 0 : $this->AUpid) ?>, pu : '<?= $this->pu ?>', pid : <?= (empty($this->pid) ? 0 : $this->pid) ?>, mod : '<?= $this->mod ?>', tab : '<?= $this->tab ?>'};
</script>
<script type="text/javascript" src="/js/app.js"></script>
<script type="text/javascript" language="javascript" src="/js/lib/jtpl.js" ></script>
</head>
<body>
<div class="container">
	<div class="span-24 aqua last">
		<?php echo $this->ZONE_TopBar ?>
	</div>
	<hr />
	<div id="logobar" class="span-24 aqua last">
		<div class="span-5"><a href="/dashboard"><img src="/image/logo.jpg" alt="Logo" /></a></div>
		<div class="span-19 last"><?php echo $this->ZONE_Top ?></div>
	</div>
	<hr />
	<div id="SuperTopBanner" class="span-24 last">
		<?php echo $this->ZONE_TopInfo ?>
	</div>
	<div class="span-4 yellow" id="leftsidebar">
		<?php echo $this->ZONE_Left ?>
		&nbsp;
	</div>

	<div class="span-16" id="content">
		<?php echo $this->ZONE_MainContent ?>
		&nbsp;
	</div>

	<div class="span-4 last blue hide" id="rightsidebar">
		<?php echo $this->ZONE_Right ?>        
	</div>
	<div id="bottom" class="span-24 green last">
		<p><?=$this->ZONE_Bottom ?></p>
	</div>
	<hr />
	<div id="footer" class="span-24 last">
		<p><?=$this->ZONE_Footer ?></p>
	</div>
</div>

<!-- prettyPhoto -->
<link rel="stylesheet" href="/js/jquery/plugin/photo/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
<script src="/js/jquery/plugin/photo/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<!-- prettyPhoto -->

<script language="javascript">
$(document).ready(function(){
	$('#rightsidebar').fadeIn(3000);
});
</script>
</body>
</html>