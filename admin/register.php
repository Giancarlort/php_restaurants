<?php include('header.php'); ?>
  <div class="row justify-content-md-center">
    <div class="col-md-auto">
      <h1>Register here</h1>
      <form action="functions.php?f=register" method="post">
        Email Address: <br><input type="text" name="email" class="form-control"><br>
        Password: <br><input type="password" name="password" class="form-control"><br>
        <input type="submit" value="Register" class="btn btn-primary">
        <a href="login.php">Cancel</a>
    </div>
  </div>
<?php include('footer.php'); ?>