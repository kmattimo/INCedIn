<?php

$chunk_size = 300;

$handle = fopen("D:/dump/RC_2015-01/RC_2015-01", "r") or die("Couldn't get handle");
if ($handle) {
    while (!feof($handle)) {
      
        $buffer = fgets($handle, 4096);
        // Process buffer here..
        $test = json_decode($buffer);
        
        
        
        
        
        
        
    }
    fclose($handle);
}


?>