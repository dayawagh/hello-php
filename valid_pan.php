<?php
if (!preg_match("/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/", $pannumber)) {
  echo "Invalid pan number";
}
?>
