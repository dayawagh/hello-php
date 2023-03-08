<?php
	
    $date1 = new DateTime('2022-03-07');
    $date2 = new DateTime(date("Y-m-d"));
    $interval = $date1->diff($date2);
                            
   echo $age = $interval->y.'---';
   echo  $months = $interval->m.'---';
   echo  $days = $interval->d;
   echo '<pre>';
   print_r($interval);
                            
?>
