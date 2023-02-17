<?php 
$datetime_1 = '2022-04-10 11:00:00 AM'; 
$datetime_2 = '2022-04-11 11:00:00 PM'; 
 
$from_time = strtotime($datetime_1); 
$to_time = strtotime($datetime_2); 
echo $diff_minutes = round(abs($from_time - $to_time) / 3600,2). " H";
      
?>
