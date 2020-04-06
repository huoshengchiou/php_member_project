<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TandemAdmin</title>
    <link rel="stylesheet/less" type="text/css" href="./login.less" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>
    
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <h1>Tandem</h1>

            <form class="form" name="myForm" method="post" action="./login.php">
                <input type="text" name="admname" value="" placeholder="Username">
                <input type="password" name="pwd" value="" placeholder="Password">
                <button type="submit" value="登入">Login</button>
            </form>
        </div>

        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <script>
$("#login-button").click(function(event){
		 event.preventDefault();
	 
	 $('form').fadeOut(500);
	 $('.wrapper').addClass('form-success');
});
</script>  
</body>


</html>