<?php include('header.php'); ?>
<div class="content">
  <div class="row">
    <div class="col-3"></div>
    <div class="col-6">
      <h1>Login here</h1>
      <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
      <form action="functions.php?f=login" method="post">
        Email Address: <br><input type="text" name="email" class="form-control"><br>
        Password: <br><input type="password" name="password" class="form-control"><br>
        <input type="submit" value="Login" class="btn btn-primary">
        <a href="register.php">Register</a>
        <br><br>
        <?php
        if(isset($_GET['m'])){
          ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $_GET['m']; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
        }
        ?>          
        </div>
      </div>
    </div>
    <div class="col-3"></div>
  </div>
</div>

<?php include('footer.php'); ?>