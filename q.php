<?php

$GLOBALS['next_request_header'] = null;

require_once './phpdocumentdb.php';
require_once './params.php';
require_once './analyzeshit.php';

$host = 'https://incedin.documents.azure.com';
$master_key = 'mCOxEEB0+RmUH8D9r/BsmSIV9Xzjy7DA+hnSk/HQmnFnLekS2M/zf8cxfYxobX17C04q9/yrJiVJBSpMnV5YAA==';
// $master_key =mCOxEEB0+RmUH8D9r/BsmSIV9Xzjy7DA+hnSk/HQmnFnLekS2M/zf8cxfYxobX17C04q9/yrJiVJBSpMnV5YAA==
// connect DocumentDB
//LOLOLOLOL
//need to init curl first lol first argument 
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');

 
// $documentdb = new DocumentDB($host, $master_key);
$documentdb = new DocumentDB($host, $master_key, true);

// var_dump($documentdb);
// // select Database or create
 // exit();
$db = $documentdb->selectDB("incedin");
// 

// // select Collection or create
$col = $db->selectCollection("test");
// 




while(true) {
  
  $mysqli = new mysqli($mysql_host, $mysql_user, $mysql_password, 'inc');
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  
echo "next: " .  $GLOBALS['next_request_header'];
// // run query
$json = $col->query("SELECT * FROM test");
// 
// // Debug
$object = json_decode($json);
 

// 
// $mysqli->autocommit(FALSE);
// $mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
foreach ($object->Documents as $key => $value) {
  // print($value->body);
  
  // print("--------------------------\n\n\n\n");
  // $realbody = $mysqli->real_escape_string($value->body);
    
  // $sql =  "INSERT INTO sentence (body, score, subreddit, author, jsonID, created_utc, controversiality, ups, downs) VALUES (  )";
  
  $sentences = explode('. ', $value->body);
  // var_dump($sentences);
  
  foreach ($sentences as $key => $sentence) {
    
    $sentimentScore = doSentence($sentence);

    $stmt = $mysqli->prepare("INSERT INTO sentence(body, score, subreddit, author, jsonID, created_utc, controversiality, ups, downs, sentiment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
    
    //
    
    // echo $stmt->param_count." parameters\n";
    // var_dump("is tasldkfj" . $sentence);

    $stmt->bind_param( 'sdssisdiid', $sentence, $value->score, $value->subreddit, $value->author, $value->id, $value->created_utc, $value->controversiality, $value->ups, $value->downs, $sentimentScore);
    
    // var_dump($stmt);
    
    // var_dump($sentimentScore);

    
    $stmt->execute();
  }
  
}
  
// if (!$mysqli->commit()) {
//     print("Transaction commit failed\n");
//     exit();
// }

$mysqli->close();

}


print("made it");
?>