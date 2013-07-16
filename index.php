<?php
      include_once 'style.php';  // put your code here
?>
<div class="hero-unit span10">    
    <div class="row-fluid span10">
        <form name="tagForm" id="tagForm" method="post">
        <div class="row-fluid">
       <div class="span8">
        <div class="control-group">
        <label class="control-label">Do you need Normal tagging or Comparison Tagging?</label>
            <div class="controls">
            <div class="switch span4" data-on="info" data-off="danger" data-on-label="Normal" data-off-label="Comparison" id="high">
                <input type="checkbox" id="isComparison" name="isComparison" checked/>
            </div>
            </div>
        </div>
       </div>
        </div><br/>
         <div class="row-fluid">
            <div class="control-group">
            <label class="control-label">Brand:</label>
                <div class="controls">
                <input class="input-xlarge" type="text" name="brand" id="brand" placeholder="Brand Name" required>
                </div>
            </div>
            
            <div class="control-group">
            <label class="control-label">Product:</label>
                <div class="controls">
                <input class="input-xxlarge" type="text" name="product" id="product" placeholder="Product Name" required>
                </div>
            </div>
            
            <div class="control-group">
            <label class="control-label">Model:</label>
                <div class="controls">
                <input class="input-xxlarge" type="text" name="model" id="model" placeholder="Model Name" required>
                </div>
            </div>
        </div>
        <div class="row-fluid well span12" id="normal">
            <div class="control-group">
                <label class="radio inline">
                <input type="radio" name="optionsRadios" id="unboxing" value="Unboxing">
                Unboxing
                </label>
                <label class="radio inline">
                <input type="radio" name="optionsRadios" id="benchmarks" value="Benchmarks">
                Benchmarks
                </label>
                  <label class="radio inline">
                <input type="radio" name="optionsRadios" id="gameplay" value="Gameplay">
                Gameplay
                </label>
                  <label class="radio inline">
                <input type="radio" name="optionsRadios" id="gaming" value="Gaming Review">
                Gaming Review
                </label>
                  <label class="radio inline">
                <input type="radio" name="optionsRadios" id="camera" value="Camera Review">
                Camera Review
                </label>
                  <label class="radio inline">
                <input type="radio" name="optionsRadios" id="review" value="Review">
                Review
                </label>
            </div>
             <div class="control-group" id="optionCheckbox">
                 <div class="unboxing">
                <label class="checkbox inline">
                <input type="checkbox" value="Fonearena">
                Fonearena
                </label>       
				<label class="checkbox inline">
                <input type="checkbox" value="India">
                India
                </label> 				
                 </div>
                 <div class="benchmarks">
                 <label class="checkbox inline">
                <input type="checkbox" value="Antutu">
                Antutu
                </label>
                <label class="checkbox inline">
                <input type="checkbox" value="Quadrant">
                Quadrant
                </label>
                  <label class="checkbox inline">
                <input type="checkbox" value="GL Bench">
                GL Bench
                </label>
                <label class="checkbox inline">
                <input type="checkbox" value="Vellamo">
                Vellamo
                </label>
                <label class="checkbox inline">
                <input type="checkbox" value="Basemark X">
                Basemark X
                </label>
                <label class="checkbox inline">
                <input type="checkbox" value="Nenamark">
                Nenamark
                </label>
                <label class="checkbox inline">
                <input type="checkbox" value="Linpack">
                Linpack
                </label>
                 </div>
                 <div class="gameplay">
                  <label class="checkbox inline">
                <input type="checkbox" value="Asphalt7">
                Asphalt7
                </label>
                  <label class="checkbox inline">
                <input type="checkbox" value="Modern Combat 4">
                Modern Combat 4
                </label>
                <label class="checkbox inline">
                <input type="checkbox" value="Temple Run 2">
                Temple Run 2
                </label>
                  <label class="checkbox inline">
                <input type="checkbox" value="Subway Surfers">
                Subway Surfers
                </label>
                 <label class="checkbox inline">
                <input type="checkbox" value="Dead Trigger">
                Dead Trigger
                </label>
                  <label class="checkbox inline">
                <input type="checkbox" value="Shadow Gun">
                Shadow Gun
                </label>
                      <label class="checkbox inline">
                <input type="checkbox" value="Need For Speed Most Wanted">
                Need For Speed Most Wanted
                </label>
                 </div>
                 <div class="gaming">
                   <label class="checkbox inline">
                <input type="checkbox" value="Asphalt7">
                Asphalt7
                </label>
                  <label class="checkbox inline">
                <input type="checkbox" value="Modern Combat 4">
                Modern Combat 4
                </label>
                <label class="checkbox inline">
                <input type="checkbox" value="Temple Run 2">
                Temple Run 2
                </label>
                  <label class="checkbox inline">
                <input type="checkbox" value="Subway Surfers">
                Subway Surfers
                </label>
                 <label class="checkbox inline">
                <input type="checkbox" value="Dead Trigger">
                Dead Trigger
                </label>
                  <label class="checkbox inline">
                <input type="checkbox" value="Shadow Gun">
                Shadow Gun
                </label>
                <label class="checkbox inline">
                <input type="checkbox" value="Need For Speed Most Wanted">
                Need For Speed Most Wanted
                </label>
                 </div>
                   <div class="camera">
                  <label class="checkbox inline">
                <input type="checkbox" value="India">
                India
                </label>
                  <label class="checkbox inline">
                <input type="checkbox" value="Fonearena">
                Fonearena
                </label>
                 </div>
                 <div class="review">           
                <label class="checkbox inline">
                <input type="checkbox" value="fonearena">
                Fonearena
                </label>
                 </div>
            </div>
            
        </div>
        <div class="row-fluid" id="comparison" style="display:none">
             <div class="control-group">
            <label class="control-label">Brand 2:</label>
                <div class="controls">
                <input class="input-xlarge" type="text" name="brand2" id="brand2" placeholder="Brand Name">
                </div>
            </div>
            
            <div class="control-group">
            <label class="control-label">Product 2:</label>
                <div class="controls">
                <input class="input-xxlarge" type="text" name="product2" id="product2" placeholder="Product Name">
                </div>
            </div>
            
            <div class="control-group">
            <label class="control-label">Model 2:</label>
                <div class="controls">
                <input class="input-xxlarge" type="text" name="model2" id="model2" placeholder="Model Name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span10">
            <button class="btn btn-large" type="submit" name="generate" id="generate">Generate Tags</button>
            <button class="btn btn-large" type="reset" name="reset" id="reset">Reset</button>
            </div>
         </div>
 </form> 
    </div>


       <div class="row-fluid ">
             <div class="control-group">
            <label class="control-label">Generated Tags:</label>
                <div class="controls">
                <textarea rows="5" class="span8" name="tags" id="tags" required="required"></textarea>
                </div>
            </div>
            <button class="btn btn-large" type="button" name="copy" id="copy">Copy To Clipboard</button>
        </div>
</div>

</div>
<script src="js/functions.js"></script>
    </body>
</html>
