<?php include('header.php'); ?>
<div class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">List of Restaurants</h4>
        </div>
        <div id="restaurants" class="card-body">Getting restaurant list....</div>
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
       var html='<div class="table-responsive"><table class="table">';
       html+='<thead class=" text-primary"><tr><th>Image</th><th>Restaurant Name</th><th>Location</th><th>Controls</th></tr></thead>';
       var rs=[];
        for(let i = 0; i < r.length; i++){
          html+='<tr id="r-'+r[i].id+'">';
          html+='<td>';
          if(r[i].picture!='') html+='<img src="../images/'+r[i].picture+'" class="img-fluid h50">';
          html+='</td>';
          html+='<td>'+r[i].name+'</td>';
          html+='<td>'+r[i].location+'</td>';
          html+='<td>';
          // html+='<a id="likes-'+r[i].id+'" href="functions.php?f=like&id='+r[i].id+'">Like</a>';
          html+='<a href="edit.php?id='+r[i].id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a><br>';
          html+='<a href="functions.php?f=deleteRestaurant&id='+r[i].id+'"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></td>';
          html+='</tr>';
          rs.push(r[i].id);
        }
        html+='</table></div>';
       document.getElementById("restaurants").innerHTML = html;
       for(var i=0;i<rs.length;i++){
        getLikes(rs[i]);
        doILikeIt(rs[i]);
      }

    }
};
xhttp.open("GET", "functions.php?f=getRestaurants<?php
  if(isset($_GET['search'])) echo '&search='.$_GET['search'];
?>
  ", true);
xhttp.send();

function getLikes(id){
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       var r = JSON.parse(xhttp.responseText)
       document.getElementById("likes-"+id).innerHTML = 'Like ('+xhttp.responseText+')';
    }
};
xhttp.open("GET", "functions.php?f=getLikes&id="+id, true);
xhttp.send();
}
function doILikeIt(id){
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       if(parseInt(xhttp.responseText)>0){
          var a = document.getElementById("likes-"+id).innerHTML;
          a = a.replace("Like (", "");
          a = a.replace(")", "");
         document.getElementById("likes-"+id).innerHTML = 'Unlike ('+a+')';
         document.getElementById("likes-"+id).attributes.href.value = "functions.php?f=unlike&id="+id;
         console.log('I like '+id);
       }
    }
};
xhttp.open("GET", "functions.php?f=doILikeIt&id="+id, true);
xhttp.send();
}
</script>

<?php include('footer.php'); ?>