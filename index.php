<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style1.css">
       <title>MOVIES</title>
    </head>
    <body>
    <?php 
        include 'inc/funcs.php';
    ?>
    <div class="container-fluid">  
    <div class="slm-container" id="slm-movie-btns">
        
    <div class="jumbotron">
        <h4>Select a movie</h4>
    </div><!--  end jumbotron ------------------------------------------------------->
        
    <div class="slm-uber-btns" id="slm-movie-btns-id">
    <?php
        $fname = "txtfiles/movie_key_name_list.txt";
        $r_array = ReadTxt($fname);
        $ref_array = array("movie_key", "movie_name");
        $separator = "|";
        $selector = "";
        $m_array = Parsing($r_array, $separator, $selector, $ref_array);
        foreach($m_array as $m) {
            
            $x = '<button class="btn btn-primary slm-movie-btn" id="' . $m['movie_key'] . '" data-movie-name="';
            $x.= $m['movie_name'] . '">';             
            $x.= $m['movie_name'] . '</button>';
            echo($x);
        }
?>
</div><!--  END SLM-UBER-BTNS ------------------------------------> 
</div><!-- End slm-container ------------------------------->

        
<!--------------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------->
        
        
        
        
        
<div class="slm-container" id="slm-session-blocks">
    

</div><!-- End slm-container ----------------------------------->

<!--------------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------->

<div class="slm-container" id="slm-sessions">
<div id="sess-results">
<h1>Sess results</h1>    

</div> <!-- end sess-results ----------------------------------------------------->
</div> <!-- end slm-container -------------------------------------------------->
        
<!--------------------------------------------------------------------------------------------------------------------->
        
<div class="slm-container" id="slm-houses">

<h1>Select movie house</h1>

    

        
</div><!-- end slm-container houses ---------------------------------------------------->        
        


</div><!--    END CONTAINER-FLUID --------------------------------------------------->
    <footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/slm1.js"></script>
    </footer>
    </body>
</html>
