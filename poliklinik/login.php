<?php
include_once("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
    <title>Poliklinik</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='styleku.css'>
	<style>
        .centered-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
		.login-box {
            width: 300px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #f5f5f5;
        }
        .login-box label {
            display: block;
            text-align: left;
        }
        .login-box input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        .login-box input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
    </style>
	
</head>
<body translate="no">
<body class="hero-anime">	
<div class="container text text-left">    
</br></div>

	</div>
	</div>
	</div>
	</div>
<br>
<br>
<br>
<div class="centered-content">
        <div class="login-box">
            <h2>Login</h2>
            <form action="proses_login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>

      <script id="rendered-js" >
/* Please ❤ this if you like it! */


(function ($) {"use strict";

  $(function () {
    var header = $(".start-style");
    $(window).scroll(function () {
      var scroll = $(window).scrollTop();

      if (scroll >= 10) {
        header.removeClass('start-style').addClass("scroll-on");
      } else {
        header.removeClass("scroll-on").addClass('start-style');
      }
    });
  });

  //Animation

  $(document).ready(function () {
    $('body.hero-anime').removeClass('hero-anime');
  });

  //Menu On Hover

  $('body').on('mouseenter mouseleave', '.nav-item', function (e) {
    if ($(window).width() > 750) {
      var _d = $(e.target).closest('.nav-item');_d.addClass('show');
      setTimeout(function () {
        _d[_d.is(':hover') ? 'addClass' : 'removeClass']('show');
      }, 1);
    }
  });

  //Switch light/dark

//   $("#switch").on('click', function () {
//     if ($("body").hasClass("dark")) {
//       $("body").removeClass("dark");
//       $("#switch").removeClass("switched");
//     } else
//     {
//       $("body").addClass("dark");
//       $("#switch").addClass("switched");
//     }
//   });

})(jQuery);
//# sourceURL=pen.js
    </script>

  
</body>

</html>
<?php