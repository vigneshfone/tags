<?php
require_once 'style.php';
require_once 'functions.php';

$folder[] = date("Y-m-d");
$folder[] = date("Y-m-d", time() - 86400);
$folder[] = date("Y-m-d", time() - 86400 * 2);
foreach ($folder as $value){
foreach(glob(UPLOAD_FOLDER.$value.'/*.*') as $filenames){
     $filename[] =$filenames;
 }
}
if(isset($_REQUEST['submit'])){
$text = strtoupper($_REQUEST['name']);
  if(!empty($_REQUEST['gameName'])){
        $gameName = strtoupper($_REQUEST['gameName']);
        }else {
        $gameName = "";
        }
if(!empty($_REQUEST['optionsRadios'])){
    $action = strtoupper($_REQUEST['optionsRadios']);
}else {
    $action = "";
}
$location= $_REQUEST['imageName'];
if(!empty($location)){
    if(isset($_REQUEST['isComparison'])){
    ApplyWatermark($location,$text,$action,$gameName);
    }else{
        if(!empty($_REQUEST['comp'])){
        $text2 = strtoupper($_REQUEST['comp']);
        }else {
        $text2 = "";
        }
    ApplyComparisonWatermark($location,$text,$text2);    
}
$watermarkLocation = 'watermark/'.basename($location);
?>
  <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4><?php echo 'Image watermarked Successfully!';
        ?></h4>
    </div>
<?php
}

}
?>
<div class="hero-unit span10">    
    <h2>Watermark Images</h2>
    <div class="row span5">
        <form name="watermarkForm" id="watermarkForm" method="post" action="watermark.php">
      <div class="row">
       <div class="span8">
        <div class="control-group">
        <label class="control-label">Do you need Normal or Comparison Watermark?</label>
            <div class="controls">
            <div class="switch span4" data-on="info" data-off="danger" data-on-label="Normal" data-off-label="Comparison" id="high">
                <input type="checkbox" id="isComparison" name="isComparison" checked/>
            </div>
            </div>
        </div>
       </div>
        </div><br/>
            <div class="control-group well">
            <label class="control-label">Select the Image to Watermark:</label>
                <div class="controls">
                    <select name="imageName" id="imageName">
                        <option value="" selected>Select any one of the Images</option>
                        <?php foreach($filename as $file){ ?>                        
                        <option value="<?php echo $file;?>"><?php echo basename($file)?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
  
            <div class="control-group">
            <label class="control-label">Text to be Ovelayed on the Image:</label>
                <div class="controls">
                <input class="input-large" type="text" name="name" id="name" placeholder="Image Name" required>
                </div>
            </div>
             <div class="control-group" id="comparison" style="display: none">
            <label class="control-label">Phone name to compare:</label>
                <div class="controls">
                <input class="input-large" type="text" name="comp" id="comp" placeholder="Image Name">
                </div>
            </div>
            <div class="control-group span5" id="actions">
                <label class="radio inline">
                <input type="radio" name="optionsRadios" id="unboxing" value="Unboxing">
                Unboxing
                </label>
                <label class="radio inline">
                <input type="radio" name="optionsRadios" id="benchmarks" value="Benchmarks">
                Benchmarks
                </label>
                <label class="radio inline">
                <input type="radio" name="optionsRadios" id="hands-on" value="Hands ON">
                Hands On
                </label>
            
                  <label class="radio inline">
                <input type="radio" name="optionsRadios" id="gaming" value="Gaming Review">
                Gaming Review
                </label><br/>
                  <label class="radio inline">
                <input type="radio" name="optionsRadios" id="camera" value="Camera Review">
                Camera Review
                </label>
                  <label class="radio inline">
                <input type="radio" name="optionsRadios" id="review" value="Review">
                Review
                </label>
                 <label class="radio inline">
                <input type="radio" name="optionsRadios" id="video-sample" value="Video Sample">
                Video Sample
                </label>
               <label class="radio inline">
                <input type="radio" name="optionsRadios" id="gameplay" value="Gameplay">
                Gameplay
                </label><br/>
           
            </div>
         <div class="control-group">            
                <div class="controls">
                <input class="input-large" type="text" name="gameName" id="gameName" style="display: none" placeholder="Game Name">
                </div>
            </div>
             <div class="row">
            <div class="span10">
            <button class="btn btn-large btn-info" type="submit" name="submit" id="submit">Generate Image</button>
            </div>
         </div>
        </form>
    </div>
    <div class="row span4">
        <?php
        if(isset($watermarkLocation)){
            $imgSize= format_size(filesize($watermarkLocation));
            print<<<HTML
              <img src="{$watermarkLocation}"/>
              Right-click and save link as <a href="{$watermarkLocation}"/>Download File</a><br/>
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
var switcher = "on";
$('#high').on('switch-change', function (e, data) {
    if(data.value == true){
		switcher = "on";
                //alert(data.value);
		$('#comparison').slideUp(500).hide();
                $('#actions').show();
                
	}else{
		
                $('#comparison').slideDown(500);		
                $('#actions').hide();
		switcher = "off";
               // alert(data.value);
	}
});
$("#gameplay:radio").click(function(){
    $('#gameName').show();
});
$("#actions :radio").not('#gameplay:radio').click(function(){
    $('#gameName').hide();
});
});
</script>
    </body>
</html>
