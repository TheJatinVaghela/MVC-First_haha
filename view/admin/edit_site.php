

<h3>Drag and Drop Image Upload</h3>
<p>Drag the image file into the box below:</p>

<form id="uploadForm" action="" method="post" enctype="multipart/form-data">
  <input type="file" id="fileUpload" name="fileUpload" accept="image/*" style="display:none"/>
  <div id="drop_zone" name="input_img" style="width:200px; height:200px; border:1px solid #ccc; text-align:center; line-height:180px; overflow:none;">
    Drop image here
  </div>
  <input type="submit" value="Upload Image" name="submit">
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



