$(document).ready(function(){
    
    
    $("#slm-session-blocks").hide();
    $("#slm-sessions").hide();
    $("#slm-houses").hide();
    
    $("body").on("click", "button#slm-goto-movies-1", function(){
        $("#slm-movie-btns").show();
        $("#slm-session-blocks").hide();
    });
    
    $("body").on("click", "button#slm-goto-movies-2", function(){
        $("#slm-movie-btns").show();
        $("#slm-houses").hide();
    });
        
    $("body").on("click", "button#slm-goto-session-blocks", function() {
        $("#slm-session-blocks").show();
        $("#slm-houses").hide();
    });
    
    $("body").on("click", "button#slm-goto-movies-3", function() {
        $("#slm-movie-btns").show();
        $("#slm-sessions").hide();
    });
    
    $("body").on("click", "button#slm-goto-blocks-2", function(){
        $("#slm-session-blocks").show();
        $("#slm-sessions").hide();
        
    });
  
    $("body").on("click", "button#slm-goto-houses-2", function(){
        $("#slm-houses").show();
        $("#slm-sessions").hide();
        
    });
    
        


// Session blocks    
    $("body").on("click", 'button[class*="slm-movie-btn"]', function(){
        $("#slm-session-blocks").show();
        movieKey = $(this).attr("id");
        movieName = $(this).attr("data-movie-name");
        $.ajax({
            url:"phpAjax/get_session_blocks.php",
            type: "POST",
            data: {movie_key:movieKey, movie_name:movieName},
            error: function() {
                $("#slm-session-blocks").html("<h4>Phooey! From get sesskion blocks<?h4>");
            },
            success: function(x) {
                $("#slm-session-blocks").html(x);
            }
            
        });// end ajax
        
        $("#slm-movie-btns").hide();
        

    }); // end movie btn click
// Houses   
    $("body").on("click", 'button[class*="slm-block-btn"]', function(){
        $("#slm-houses").show();
        tCode = $(this).attr("data-tcode");
//        alert("You clicked");
//        alert("you clicked " + tCode + " " + movieKey + " " + movieName);
        
        $.ajax({
            url:"phpAjax/get_houses.php",
            type:"POST",
            data:{movie_key:movieKey, time_code:tCode, movie_name:movieName},
            error: function(){
                $("div#slm-houses").html("Phooey");
                
            },
            success: function(x) {
                $("div#slm-houses").html(x);
            }
        }); // end ajax
        $("#slm-session-blocks").hide();
    }); // end day-btn click
    
// Sessions
    $("body").on("click", 'button[class*="slm-house-btn"]', function(){
        $("#slm-sessions").show();
        houseKey = $(this).attr("data-house-key");
        chain = $(this).attr("data-chain");
        houseName = $(this).attr("data-house");
//        alert("you clicked " + houseKey + " " + chain);
        
        $.ajax({
            
            url:"phpAjax/get_sessions.php",
            type: "POST",
            data:{movie_key:movieKey, movie_name:movieName, time_code:tCode, 
                 house_key:houseKey, chain:chain, house_name:houseName},
            error: function() {
                $("div#slm-sessions").html("<h1>Phooey</h1>");
            },
            success: function(x) {
                $("div#slm-sessions").html(x);
            }
        }); // end ajax
        
        $("#slm-houses").hide();

        
    });  // end click house button
    
    
    
}) // end ready