<?php
    include "../../settings1.php";
    $defaultlanguage = "en";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DivumWX Administration Login Page</title>
    <link rel="stylesheet" href=".\css\index.css"/>
    <script src=".\js\login.js"></script>
  </head>
  <body>
    <form id="login-form" onsubmit="return login()">
      <h1>LOGIN</h1>
      <input type="input" placeholder="name" name="name" required/>
      <input type="password" placeholder="Password" name="password" required/>
      <input type="submit" value="Sign In"/>
    </form>
  </body>
</html>