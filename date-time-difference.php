<?php 
        $datetime1 = new DateTime('2011-01-03 01:00:00');
        $datetime2 = new DateTime('2011-01-03 17:13:00');
        $interval = $datetime1->diff($datetime2);
        $elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
        echo $elapsed;
?>
