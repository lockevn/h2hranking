<?
include('config.php');

$ranking_system_file = file_get_contents('StaticData/ranking_system_list.json');
$ranking_system_data = json_decode($ranking_system_file);
// var_dump($ranking_system_data);
?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
			foreach ($ranking_system_data->ranking_system as $rsystem) {
				echo $rsystem;
			}
        ?>
    </body>
</html>