<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Weather Scrapper</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" type="text/css" href="weather.css" />
    
  </head>
  
  <body>
    
    <div class="container">
        
        <div class="row">
            
            <div class="col-md-6 col-md-offset-3 center" id="wrap">
                
                <h1 class="center white">Weather</h1>
                <p class="lead center white">Enter your city below</p>
                
                <form>
                    
                    <div class="form-group">
                        
                        <input type="text" class="form-control" id="city" name="city" />
                        <button type="button" class="btn btn-success btn-lg" id="getWeather" placeholder="New York, Chicago, Philadelpia">Get Weather</button>
                    </div>
                    
                </form>
                
                <div id="success" class="alert alert-success weather"></div>
                <div id="failed" class="alert alert-danger weather">Could not locate weather for that city. Please try again.</div>
                <div id="empty" class="alert alert-danger weather">Enter a city</div>
                
                
            </div>
            
        </div>
        
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
    <script>
        
        $("#getWeather").click( function(event) {
           
           event.preventDefault();
           
           $(".weather").hide();
           
           if ($("#city").val() != "") {
                
                
                $.get("scrapper.php?city=" + $("#city").val(), function( data ) {
                  
                  errorCheck = (data.match(/404 Not Found/g));
                  
                  if (errorCheck =='404 Not Found') {
                        
                        $("#failed").fadeIn();
                    }
                    
                    else {
                        
                        $("#success").html(data).fadeIn();
                    }
            
                })
           }
           
           else {
            
             $("#empty").fadeIn();
             
            }
           
           
        });
        
    </script>
    
    
  </body>
</html>
