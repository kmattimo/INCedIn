<?php
function doSentence($sentence) {
  
  $sentence2 = base64_encode ($sentence);
  // $mystring = system('python test.py', $retval);
  exec("python MHacks6v9.py .$sentence2", $output, $ret_code);
  
  // var_dump($output[0]);
  // echo $output[1];
  return floatval($output[0]);
}

?>