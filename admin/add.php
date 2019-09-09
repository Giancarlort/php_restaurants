<?php include('header.php'); ?>
<div class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Add a new restaurant</h4>
        </div>
        <div class="card-body">
      <form action="functions.php?f=add" method="post">
        Name:<br><input type="text" name="name" class="form-control"><br>
        Location:<br><input type="text" name="location" class="form-control"><br>
        Type of food:<br><input type="text" name="type" class="form-control"><br>
        Price range:<br><select name="price" class="form-control">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
        Picture: <br><input type="text" name="picture" class="form-control"><br>
        <input type="submit" value="Register" class="btn btn-primary">
        <a href="index.php">Cancel</a>
      </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>