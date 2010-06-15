<? 
    require_once("Lib/MessioFramework/ViewHelper.class.php");
    
    $helper = new ViewHelper();
    $events = $helper->getComingEvents();
    
    foreach ($events as $event) {
        $date = getdate(strtotime($event["EventDate"]));
        $time = ($date["hours"] != 0) ? " vào lúc " . date("H:i d-m-y", strtotime($event["EventDate"])) : " vào ngày " . date("d-m-y", strtotime($event["EventDate"]));
        $place = ($event["Place"] != "#") ? " tại " . $event["Place"] : "";
?>
    <img src="images/calendar.jpg" /><span class="label"><strong><?= $event["Title"] ?></strong><em><?= $time ?></em> <?= $place ?></span>
<?  } ?>