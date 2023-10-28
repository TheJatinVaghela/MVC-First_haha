

<h3>Drag and Drop Image Upload</h3>
<p>Drag the image file into the box below:</p>

<form id="uploadForm" action="" method="post" enctype="multipart/form-data">
  <input type="file" id="fileUpload" name="fileUpload" accept="image/*" style="display:none"/>
  <div id="drop_zone" name="input_img" style="width:200px; height:200px; border:1px solid #ccc; text-align:center; line-height:180px; overflow:none;">
    Drop image here
  </div>
  <input type="submit" value="Upload Image" name="submit">
</form>

<br>
<?php //print_r( $_SESSION["edituserinfo"]);?>
<form action="" method="post" >
  <?php foreach ($_SESSION["edituserinfo"] as $key => $value) { ?>
    <?php if($key == 'guest_admin'){?>
      <!-- <select class="dropdown form-control" name="<?php echo $key;?>" id="">
        <option value="1">Admin</option>
        <option value="0">User</option>
      </select> -->
      <?php break;}?>
    <label class="form-label" for=""><?php echo $key;?></label>
      <input class="form-controle" type="text" name="<?php echo $key;?>" placeholder="<?php echo $value;?> "  value="<?php echo $value;?>">
    
  <?php } ; ?>
  <button type="submit" name="saveuser" value="saveuser">save</button>
</form>

<?php print_r($_REQUEST["saveuser"])?>

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



