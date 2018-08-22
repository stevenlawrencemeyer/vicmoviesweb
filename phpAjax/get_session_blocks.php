<?php

include  "../inc/funcs.php";

date_default_timezone_set("Australia/Melbourne"); 

$tcode_array = array("Today before 1pm", "Today 1pm to 7pm", "Today after 7pm",
                   "Tomorrow before 1pm", "Tomorrow 1pm to 7pm", "Tomorrow after 7pm",
                   "Day after tomorrow before 1pm", "Day after tomorrow 1pm to 7pm", "Day after tomorrow after 7pm");


$movie_name = $_POST['movie_name'];
$movie_key = $_POST['movie_key'];

$curr_dt = time();
$fmt = "%A, %d-%b-%Y at %I:%M %p";
$curr_dtx = strftime($fmt, $curr_dt);

$x = '<div class="jumbotron">';
$x.= '<button class="btn btn-primary" id="slm-goto-movies-1">Return to movie list</button><br><br>';
$x.= "<h4>Session blocks</h4><br>";
$x.= "<p>Select a session block for " . $movie_name . "<br>It is now " . $curr_dtx . "</p>";
$x.= "</div>";  // end jumbotron

$x.= '<div id="slm-block-btns">';



$fname = "../txtfiles/movie_tcode.txt";
$ref_array = array("movie_key", "time_code");

$r_array = ReadTxt($fname);
$m_array = Parsing($r_array, "|", $movie_key, $ref_array);

foreach($m_array as $m)  {
    $tcode = (integer) $m['time_code'] - 1;
    $desc = $tcode_array[$tcode];
    $type1 = gettype($tcode);
    
    $x.= '<button class="btn btn-basic slm-block-btn" data-tcode="' . $m['time_code'] . '">';
    $x.= $desc . '</button>';

};

$x.= "</div>";

echo($x);

/*



//$x = "<h2>" . $movie_name . " " . $movie_key . " " . $time_code . "</h2>";
//echo($x);

$fname = "../txtfiles/house_tcode.txt";
$ref_array = array("movie_key", "house_key", "house_name", "chain", "tcode");

$r_array = ReadTxt($fname);
$h_array = Parsing($r_array, "|", $movie_key, $ref_array);

$house_ctr = 0;

$x = "<h4>" . $movie_name . "</h4><br>";
foreach($h_array as $h) {
    
    if ($h['tcode'] == $time_code) {
        
        $x.= '<br><button class="btn btn-primary slm-house-btn" data-house-key="' . $h['house_key'] . '" ';
        $x.= 'data-chain="' . $h['chain'] . '">'. $h['house_name'] . ' ' . $h['chain'] . '</button><br>';
        $house_ctr++;
        
    }; // end if  
    
}; // end foreach

if ($house_ctr == 0) {
    $x = "<h4>No movie houses for this session block</h4>";
};

echo($x);
*/

?>

