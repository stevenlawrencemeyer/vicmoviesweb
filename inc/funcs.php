<?php

    function ReadTxt($fname) {
        $r_array = file($fname) or die("Cannot read file " . $fname);
        return $r_array;
    }; // end ReadTxt
    
   function Parsing($in_array, $separator, $selector, $ref_array) {
       $out_array = array();
       $i = 0;
       $n = sizeof($ref_array);
       foreach($in_array as $record) {
           $x = str_getcsv($record, $separator);
           if ($x[0] == $selector || $selector == "") {
               for ($j=0; $j<$n; $j++) {
                   $key = $ref_array[$j];
                   $out_array[$i][$key] = $x[$j];
                   
               };// end for
               $i++;
               
           };// end if
           
       };// end foreach
       return $out_array;
       
   };// end Parsing


    function AddTime($add_array) {
        
        date_default_timezone_set("Australia/Melbourne"); 
        
        $hour = date("H") + $add_array[0];
        $minute = date("i") + $add_array[1];
        $second = date("s") + $add_array[2];
        $month = date("n") + $add_array[3];
        $day = date("j") + $add_array[4];
        $year = date("Y") + $add_array[5];
        
        $d = mktime($hour, $minute, $second, $month, $day, $year);

        return $d;
        
    }; // end AddTime

    function create_ymdhm_string($in_dt) {
        $fmt = "%Y%m%d%H%M";
        $out_dt_str = strftime($fmt, $in_dt);
        return $out_dt_str;
    }; // end create_ymdh_string



?>