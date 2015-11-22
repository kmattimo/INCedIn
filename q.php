<?php

include 'goodwords.php';
include 'badwords.php';
// require_once './phpdocumentdb.php';
require_once './params.php';
// require_once './analyzeshit.php';
require_once './anal.php';


// 

$mysqli = new mysqli($mysql_host, $mysql_user, $mysql_password, 'inc');
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


// $handle = fopen("D:/dump/RC_2015-01/RC_2015-01", "r") or die("Couldn't get handle");
$handle = fopen("RC_2015-01", "r") or die("Couldn't get handle");

if ($handle) {
    while (!feof($handle)) {
      
      $buffer = fgets($handle, 4096);
      // Process buffer here..
      $value= json_decode($buffer);
       
      // $mysqli->autocommit(FALSE);
      // $mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
        // $sql =  "INSERT INTO sentence (body, score, subreddit, author, jsonID, created_utc, controversiality, ups, downs) VALUES (  )";
        
        if(isset($value->body)) {
          $sentences = explode('. ', $value->body);
          // var_dump($sentences);
          
          foreach ($sentences as $key => $sentence) {
            
            $sentimentScore = doSentence($sentence);

            $stmt = $mysqli->prepare("INSERT INTO sentence(body, score, subreddit, author, jsonID, created_utc, controversiality, ups, downs, sentiment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
            // echo $stmt->param_count." parameters\n";
            // var_dump("is tasldkfj" . $sentence);

            $stmt->bind_param( 'sdssisdiid', $sentence, $value->score, $value->subreddit, $value->author, $value->id, $value->created_utc, $value->controversiality, $value->ups, $value->downs, $sentimentScore);
            $stmt->execute();
          }
        }
        else {
          echo "NO  BODY?";
        }
        echo "!";
      }     
}
fclose($handle);
$mysqli->close();


print("made it");
?>