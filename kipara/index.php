<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login screen</title>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div class="wrapper">
	<div class="container" style=" margin-top: 10%;  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
		<h1>Welcome</h1>
		
		<form class="form" action="controler.php" method="post">
			<input type="text" name="username" placeholder="Username" required="">
			<input type="password" name="password" placeholder="Password" required="">
			<button type="submit" name="login" id="login">Login</button>
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
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
