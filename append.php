<?php
//get the code coverage result
$coverage_report = xdebug_get_code_coverage();
//debug
//echo "<pre>Code coverage array: ";print_r($coverage_report);echo "</pre>";
//jsonify the code coverage report
$coverage_report = json_encode($coverage_report);
//close the code coverage
xdebug_stop_code_coverage();
//write the code coverage result to the log file
$unique_str = substr(str_shuffle(md5(time())), 0, 4);
$time = time();
$myFile = "../../logs/code_coverage/".$time."_code_coverage_".$unique_str.".txt";
$fh = fopen($myFile, 'w') or die("Can't open file");
fwrite($fh, $coverage_report);
fclose($fh);
//debug
//echo "<pre>--";print_r("Out from htaccess !");echo "</pre>";
?>