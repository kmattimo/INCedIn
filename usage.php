<?php
$testfile = __DIR__.'/example.json'; //https://gist.github.com/soyuka/a1d83ff9ff1a6c5cc269

$listener = new ObjectListener(function($obj) {
    var_dump($obj);
});

$stream = fopen($testfile, 'r');
try {  
    $parser = new JsonStreamingParser_Parser($stream, $listener);
    $parser->parse();
} catch (Exception $e) {
    fclose($stream);
    throw $e;
}