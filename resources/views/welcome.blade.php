<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="../css/homeStyle.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--webfonts-->
    <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    <!--//webfonts-->
</head>
<body>
<div class="main">
    <div class="logo">
        <img src="../logo.png" alt="">
    </div>
    <div class="social-icons">
        <div class="col_1_of_f span_1_of_f"><a href="#">
                <ul class='facebook'>
                    <i class="fb"> </i>
                    <a href="../login/facebook"><li>Sign In with Facebook</li></a>
                    <div class='clear'> </div>
                </ul>
            </a>
        </div>
        <div class="col_1_of_f span_1_of_f"><a href="#">
                <ul class='twitter'>
                    <i class="tw"> </i>
                    <li>Sign In with Twitter</li>
                    <div class='clear'> </div>
                </ul>
            </a>
        </div>
        <div class="clear"> </div>
    </div>
    <h2>Or Signup with</h2>
    <form method="POST" action="auth/login">
        {!! csrf_field() !!}
        <div class="lable-2">
            <input type="text" class="text" name="email" value="your@email.com " onfocus="this.value = '';" >
            <input type="password" name="password" class="text" value="Password " onfocus="this.value = '';">
        </div>
        <h3>By creating an account, you agree to our <span class="term"><a href="#">Terms & Conditions</a></span></h3>
        <div class="submit">
            <input type="submit" value="Create account" >
        </div>
        <div class="clear"> </div>
    </form>
    <!-----//end-main---->
</div>

</body>
</html>