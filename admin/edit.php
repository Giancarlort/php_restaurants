<?php include('header.php'); ?>
<div class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Restaurants</h4>
        </div>
        <div class="card-body">
      <form action="functions.php?f=update&id=<?php echo $_GET['id']; ?>" method="post">
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
        <input type="submit" value="Update" class="btn btn-primary">
        <a href="index.php">Cancel</a>
      </form>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       var r = JSON.parse(xhttp.responseText)
       document.querySelector('input[name=name]').value=r[0].name;
       document.querySelector('input[name=location]').value=r[0].location;
       document.querySelector('input[name=picture]').value=r[0].picture;
       document.querySelector('select[name=price]').value=r[0].price;
    }
};
xhttp.open("GET", "functions.php?f=getRestaurant&id=<?php echo $_GET['id']; ?>)", true);
xhttp.send();
</script>


<?php include('footer.php'); ?>