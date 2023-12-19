<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="initial-scale=1">
    <title>Scott Hanenberg - <?php echo $menuChoice; ?></title>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="scott.css">
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script>
        $( document ).ready(function() {
            $('.fix-search').html($('.default-menu').html());
        });
        $(window).on("scroll", function(e) {
          if ($(window).scrollTop() > 147) {
            $(".fix-container").show();   
          } else {
            $(".fix-container").hide();
          }
        });
    </script>
</head>
<body>
    <div class="fix-container" style="display:none;">
        <div class="fix-search menu-bar"></div>
        <hr class="grade-line">
    </div>
    <div class="main-container">
        <div id="header">
            <br style="margin-top:50px;">
            <!--<img src="images/menu.png" alt="decoration: guitar banner">-->
            <div class="default-menu menu-bar">                
                <a <?php if ($menuChoice == 'Home') echo 'class="selected" '?>href="./">Home</a>
                <a <?php if ($menuChoice == 'Sounds') echo 'class="selected" '?>href="sounds.php">Sounds</a>
                <a <?php if ($menuChoice == 'Words') echo 'class="selected" '?>href="words.php">Words</a>
            </div>
        </div>
        <hr class="grade-line">