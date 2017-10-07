<HTML>
<head>
<title>
Loginpage</title>
<link rel="stylesheet" type="text/css" href="stylefile.css">
</head>
<body>
  <?php
    include "header.php";
  ?>
  <div class="container">
    <h1>Login</h1>
    <form action="login.php" method="post">
      <div class="login" >
        <label>Username: </label>
        <input type="text" name="username" value=""  placeholder="Username"  autofocus required /><br/>
      </div>
      <div class="login" >
        <label>Password: </label>
        <input type="password" name="password" value="" placeholder="Password"  required /><br/>
      </div>
      <div class="login">
        <input type="submit" name="login" value="Login"><br/>
      </div>
  </form>
  </div>
</body>
</html>
