<?php
   //Creating an XMLReader
   $reader = new XMLReader();

   //Opening a reader
   $reader->open("mydata.xml");

   //Reading the contents
   $reader->read();

   $data = $reader->readInnerXml();
   print($data);

   //Closing the reader
   $reader->close();
?>
