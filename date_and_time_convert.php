<?php 

echo !empty($value['release_date']) ? date('d M Y', strtotime($value['release_date'])) : ''; 

echo !empty($value['duration']) ? $hours = intdiv($value['duration'], 60) . 'hr ' . ($value['duration'] % 60) . 'min' : ''; 

?>
