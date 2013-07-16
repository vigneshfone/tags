<?php
$errStatus = '';
require_once 'style.php';
include('ImgResizer.php');
include('functions.php');
    if(isset($_FILES['fileUpload']))
    {
        $width=$_REQUEST["optionsRadios"];
        $isWatermark = $_REQUEST['actions'];
        //$upload_dir = "Upload/";
        $uploadfile = RESIZE_UPLOAD_FOLDER.preg_replace('/\s+/', '-', basename($_FILES['fileUpload']['name']));
        $uploadfilename = basename($uploadfile);
        $uploadfilename = substr($uploadfile,0,strrpos($uploadfile,"."));
        $extension = substr($uploadfile,strrpos($uploadfile,".")+1);
        $webImage = $uploadfilename.'_small.'.$extension ;

        if (file_exists(RESIZE_UPLOAD_FOLDER) && is_writable(RESIZE_UPLOAD_FOLDER)) {
            if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $uploadfile)) {
                $size = getimagesize($uploadfile);
                $type = $size['mime'];
                if($type == "image/jpeg" || $type == "image/png")
                {
                $work = new ImgResizer($uploadfile);
                $work -> resize($width,$webImage,$extension);
                if(!empty($isWatermark)){
                ApplyWatermarkResize($webImage,$extension);               
                }
                }
                else
                {
                    $errStatus = "Uploaded file is not a valid image";
                }
            } else {
                var_dump($_FILES);
            }
        }
        else {
            $errStatus = 'Upload directory is not writable, or does not exist.';
        }

    }
?>
<div class="hero-unit span10">    
    <h2>Image Uploader</h2>
    <div class="row span4">
    <form enctype="multipart/form-data" action="resize.php" method="POST" name="frmResize" id="frmResize">
    <div id="wrapper">
        <div class="control-group well">
                <label class="control-label">Select the Image to Resize:</label>
            <div class="controls">
                <input type="file" name="fileUpload" id="fileUpload" />
            </div>
         </div>
          <div class="control-group span5" id="actions">
                    <label class="radio inline">
                    <input type="radio" name="actions" value="1" checked>
                    Resize & Watermark
                    </label>
                    <label class="radio inline">
                    <input type="radio" name="actions" value="0">
                    Resize only
                    </label>
          </div>
          <div class="control-group span5">
                    <label class="radio inline">
                    <input type="radio" name="optionsRadios" value="574" checked>
                    Width 574px
                    </label>
                    <label class="radio inline">
                    <input type="radio" name="optionsRadios" value="1148">
                    Width 1148px
                    </label>
          </div>
          <div class="row">
                <div class="span10">
                <button class="btn btn-large btn-info" type="submit" name="submit" id="submit">Upload</button>
                </div>
             </div>
        <?php echo $errStatus ?>
    </div>
    </form>
 </div>
<div class="row span4">
        <?php
        if(isset($webImage)){
            $imgSize= format_size(filesize($webImage));
            
            print<<<HTML
              <img src="{$webImage}"/>
              Right-click and save link as <a href="{$webImage}"/>Download File</a><br/>
              Image size is $imgSize
            
HTML;
              
        }
   ?>
</div>
</div>
</div>
<script type = "text/javascript">
$(document).ready(function()
{
$('button#submit').click(function(){
var ext = $('#fileUpload').val().split('.').pop().toLowerCase();

if($.inArray(ext, ['jpg','jpeg','gif','png']) == -1) {
    alert('You forgot to select any images or may be Invalid Files! Use only image Files!');
	return false;
}

});
});
</script>
    </body>
</body>
</html>