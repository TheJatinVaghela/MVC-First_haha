

<h3>Drag and Drop Image Upload</h3>
<p>Drag the image file into the box below:</p>

<form id="uploadForm" action="" method="post" enctype="multipart/form-data">
  <label for="drop_zone">Hero IMG</label>
  <input type="file" id="fileUpload" name="fileUpload" accept="image/*" style="display:none"/>
  <div id="drop_zone" name="input_img" style="width:200px; height:200px; border:1px solid #ccc; text-align:center; line-height:180px; overflow:none;">
    Drop image here
  </div>

  <label for="drop_zone">Hero IMG</label>
  <input type="file" id="fileUpload" name="fileUpload" accept="image/*" style="display:none"/>
  <div id="drop_zone" name="input_img" style="width:200px; height:200px; border:1px solid #ccc; text-align:center; line-height:180px; overflow:none;">
    Drop image here
  </div>
  <input type="submit" value="HeroIMG" name="submit">
</form>

<br>
<?php //print_r( $_SESSION["edituserinfo"]);
?>
<?php 
if(isset($_SESSION["edituserinfo"])){
  echo "<h1>EDIT USER</h1>";
  foreach ($_SESSION["edituserinfo"] as $key => $value) { ?>
  <form action="" method="post" >
  <?php 

  if($key == 'guest_admin'){?>
       <select class="dropdown form-control" name="<?php echo $key;?>" id="">
        <option value="1">Admin</option>
        <option value="0">User</option>
      </select> 
      <?php break;}
      else if($key == 'u_id'){
        continue;
      }
      else{ ?>
        <label class="form-label" for=""><?php echo $key;?></label>
        <input class="form-controle" type="text" name="<?php echo $key;?>" placeholder="<?php echo $value;?> "  value="<?php echo $value;?>">

     <?php } ?>
      
    
     <?php }
     $id= $_SESSION["edituserinfo"]->u_id;
     print_r("<button type='submit' name='u_id' value='$id'>save</button>");
     echo '</form>';
    } ;?>
  
<h1>ADD USER</h1>
<form action="" method="post">
  <label for="adduser_name">name</label>
  <input type="text" name="user_name" id="adduser_name" required placeholder="name">

  <label for="adduser_mail">mail</label>
  <input type="text" name="user_mail" id="adduser_mail" required placeholder="mail">

  <label for="adduser_phone">phone</label>
  <input type="text" name="user_mobile" pattern="[6789][0-9]{9}" id="adduser_phone" required placeholder="phone">
  
  <label for="adduser_password">password</label>
  <input type="text" name="user_password" id="adduser_password" required placeholder="password">

  <select class="dropdown form-control" name="guest_admin" id="">
    <option value="0">User</option>
    <option value="1">Admin</option>
  </select> 

  <button type="submit" name="add_new_user" value="add_new_user">ADD USER</button>
</form>



<script>
document.getElementById("drop_zone").ondragover = function(event) {
  event.preventDefault();
};

document.getElementById("drop_zone").ondrop = function(event) {
  event.preventDefault();
  var file = event.dataTransfer.files[0];
  if (file.type.match('image.*')) {
    var reader = new FileReader();
    reader.onload = function(event) {
      var img = document.createElement("img");
      img.src = event.target.result;
      document.getElementById("drop_zone").innerHTML = '';
      document.getElementById("drop_zone").appendChild(img);
    };
    reader.readAsDataURL(file);
    document.getElementById("fileUpload").files = event.dataTransfer.files;
  } else {
    alert("Please drop an image file.");
  }
};
</script>



