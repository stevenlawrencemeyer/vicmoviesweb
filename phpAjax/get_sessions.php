<?php

include  "../inc/funcs.php";

date_default_timezone_set("Australia/Melbourne"); 

$dt_fmt = "%A, %d-%b-%Y, %I:%M %p";

$movie_name = $_POST['movie_name'];
$movie_key = $_POST['movie_key'];
$time_code = $_POST['time_code'];
$house_key = $_POST['house_key'];
$house_name = $_POST['house_name'];
$chain = $_POST['chain'];

$curr_dt = time();
$fmt = "%A, %d-%b-%Y at %I:%M %p";
$curr_dtx = strftime($fmt, $curr_dt);
$curr_dt_ymdhm = create_ymdhm_string($curr_dt);




$ref_array = array("movie_key", "movie_name", "house_key", "house_name", "chain", "sess_link", "year", "month",
                  "day", "hour", "minute", "time_code");

$fname = "../txtfiles/" . $movie_key . '.txt';
$r_array = ReadTxt($fname);
$m_array = Parsing($r_array, "|", "", $ref_array);


$x = '<div class="jumbotron">';

$x.= '<button class="btn btn-primaery" id="slm-goto-movies-3">Return to movie list</button> ';
$x.= '<button class="btn btn-primaery" id="slm-goto-blocks-2">Return to session blocks</button> ';
$x.= '<button class="btn btn-primaery" id="slm-goto-houses-2">Return to movie house list</button><br>';
$x.= "<h4>Movie: " . $movie_name . "</h4><br>";
$x.= '<p>Cinema: ' . $house_name . ' ' . $chain . '</p>';
$x.= '<p>It is now ' . $curr_dtx . '</p>';

$x.= "</div>";

$sess_ctr = 0;
$x.= '<div class="slm-session-btns">';

foreach($m_array as $m) {

    if($m['house_key'] == $house_key  && $m['time_code'] == $time_code) {
        $sess_ctr++;      
        $unix_dt = mktime($m['hour'], $m['minute'], 0, $m['month'], $m['day'], $m['year']);
        $unix_dt_ymdhm = create_ymdhm_string($unix_dt);
        $too_late = "";
        if ($unix_dt_ymdhm < $curr_dt_ymdhm) {
            $too_late = "<br>Too late!";
        }
        $fmt_dt = strftime($fmt, $unix_dt);
        $x.= '<p><a href="' . $m['sess_link'] .'" target="_blank">' .$fmt_dt . '</a>' . $too_late . '</p>';
    }// end if
} // end foreach


if ($sess_ctr == 0) {
    $x.= "<br><h2>No sessions for this movie in this block</h2>";
}

$x.= "</div>";

echo($x);


?>

