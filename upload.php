<?php
include_once 'style.php';
define('UPLOAD_FOLDER', "upload/");
if(isset($_FILES['photoUpload'])){
    
    $uploadfile = preg_replace('/\s+/', '-', basename($_FILES['photoUpload']['name']));
    if (file_exists(UPLOAD_FOLDER) && is_writable(UPLOAD_FOLDER)) {              
                   $allowedexts = array('png','jpg','jpeg');                   
                    $image_name = pathinfo($_FILES['photoUpload']['name']);
                    $extension = strtolower($image_name['extension']);
                    $size = getimagesize($_FILES['photoUpload']['tmp_name']);
                    $type = $size['mime'];
                    if(($type == "image/jpeg" ||$type == "image/png")&& in_array($extension,$allowedexts))
                    {
                        $today = date("Y-m-d").'/';
                        if(!file_exists(UPLOAD_FOLDER.$today)){
                            mkdir(UPLOAD_FOLDER.$today,0,true);
                            move_uploaded_file($_FILES['photoUpload']['tmp_name'], UPLOAD_FOLDER.$today.$uploadfile);
                        }else{
                            move_uploaded_file($_FILES['photoUpload']['tmp_name'], UPLOAD_FOLDER.$today.$uploadfile);
                        }
                        $status= "success";
                        $message = "Image Upload Succesful!";
                    }
                    else
                    {
                       $status ="error";
                        $message = "Invalid extension! Use only PNG images";
                    }
?>
            <div class="alert alert-<?php echo $status; ?>">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4><?php echo $message;   ?></h4>
            </div>      
<?php }
            else {
                echo 'Upload directory is not writable, or does not exist.';
            }
}
?>
<div class="hero-unit span10">    
    <h2>Image Uploader</h2>
    <div class="row span4">
        <form name="uploadForm" id="uploadForm" method="post" enctype="multipart/form-data" action="upload.php">
            <div class="control-group well">
            <label class="control-label">Select the Image Path to upload:</label>
                <div class="controls">
                <input class="input-xlarge" type="file" name="photoUpload" id="photoUpload">
                </div>
            </div>
             <div class="row">
            <div class="span10">
            <button class="btn btn-large btn-info" type="submit" name="submit" id="submit">Upload</button>
            </div>
         </div>
        </form>
    </div>
</div>
</div>
<script type = "text/javascript">
$(document).ready(function()
{
$('button#submit').click(function(){
var ext = $('#photoUpload').val().split('.').pop().toLowerCase();
if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
    alert('Invalid extension! Use only JPG and PNG images!');
	return false;
}
});
});
</script>
    </body>
</html>
