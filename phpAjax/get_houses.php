<?php

include  "../inc/funcs.php";

date_default_timezone_set("Australia/Melbourne"); 

$movie_name = $_POST['movie_name'];
$time_code = $_POST['time_code'];
$movie_key = $_POST['movie_key'];

$curr_dt = time();
$fmt = "%A, %d-%b-%Y at %I:%M %p";
$curr_dtx = strftime($fmt, $curr_dt);

$fname = "../txtfiles/house_tcode.txt";
$ref_array = array("movie_key", "house_key", "house_name", "chain", "tcode");

$r_array = ReadTxt($fname);
$h_array = Parsing($r_array, "|", $movie_key, $ref_array);

$house_ctr = 0;

$x = '<div class="jumbotron">';
$x.= '<h4>Movie Houses</h4><br>';
$x.= '<p>' . $movie_name . '</p>';
$x.= '<button class="btn btn-primary" id="slm-goto-movies-2">Return to movie list</button> ';
$x.= '<button class="btn btn-primary" id="slm-goto-session-blocks">Return to session blocks</button><br>';
$x.= "<p>Select a movie house: <br>It is now " . $curr_dtx . "</p>";

$x.= "</div>"; // end jumbotron

$x.= '<div id="slm-house-btns">';
foreach($h_array as $h) {
    
    if ($h['tcode'] == $time_code) {
        
        $x.= '<br><button class="btn btn-primary slm-house-btn" data-house-key="' . $h['house_key'] . '" ';
        $x.= 'data-chain="' . $h['chain'] . '" data-house="' . $h['house_name'] . '">'. $h['house_name'] . ' ' . $h['chain'] . '</button><br>';
        $house_ctr++;
        
    }; // end if  
    
}; // end foreach

if ($house_ctr == 0) {
    $x = "<h4>No movie houses for this session block</h4>";
};

$x.= "</div>";
echo($x);

?>

