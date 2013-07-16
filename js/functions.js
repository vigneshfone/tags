/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function()
{
    var switcher = "on";
$('#high').on('switch-change', function (e, data) {
    if(data.value == true){
		switcher = "on";
                //alert(data.value);
		$('#comparison').slideUp(500).hide();
                $('#normal').slideDown(500);
	}else{
		$('#normal').slideUp(500).hide();
                $('#comparison').slideDown(500);		
		switcher = "off";
               // alert(data.value);
	}
});
$("#optionCheckbox :checkbox").attr("disabled", true);

$(":radio").change(function(){
    $("#optionCheckbox > :not(."+this.id+")").hide("fast",function(){
            $("#optionCheckbox :not(."+this.className+") :checkbox").attr("disabled", true);            
    });
    $("#optionCheckbox > ."+this.id).show("fast",function(){
            $("#optionCheckbox ."+this.className+" :checkbox").removeAttr("disabled");             
    });
    
});
$("#tagForm").submit(function(e){
    e.preventDefault();
    var isComparison = $('#high').bootstrapSwitch('status');
    var brand = $("#brand").val();
    var product = $("#product").val();
    var model = $("#model").val();
    var checkbox = new Array();
    if(isComparison){
        var options = $('input:radio[name="optionsRadios"]:checked').val();
//        var checkbox = $('#optionCheckbox :checkbox:checked').val();
       var checkedVals = $('#optionCheckbox :checkbox:checked').map(function() {
        return this.value;
        }).get();             
        
        var total = new Array(brand,product,model,options);
        //var fullText = brand+" "+product+" "+model+" "+options;
        var halfText =  brand+" "+product+" "+model;
        var promod = product+" "+model;
        var bramod=  brand+" "+product;
        var optmod = promod+" "+options;
        var fullText =  total.join(" ");
          if(checkedVals.length){
            var checkbT= checkedVals.join(", ");
            var checkprod = new Array();
            var checkhalfprod = new Array();
            for(i=0;i<checkedVals.length;i++){
                checkprod[i] = halfText+" "+checkedVals[i]+" "+options;
                checkhalfprod[i] = promod+" "+checkedVals[i]+" "+options;
                //alert(checkprod);
            }
            var discheck = checkprod.join(", ");
            var dischhf = checkhalfprod.join(", "); 
            //alert(discheck);
            var result = fullText+", "+halfText+", "+checkbT+", "+options+", "+promod+", "+optmod+", "+brand+", "+bramod+", "+product+", "+model+", "+discheck+", "+dischhf;
        }else{
            var result = fullText+", "+halfText+", "+options+", "+promod+", "+optmod+", "+brand+", "+bramod+", "+product+", "+model;
        }
        
        //var result= splitg(total,fullText,halfText,checkbT);
    }else{               
        var brand2 = $("#brand2").val();
        var product2 = $("#product2").val();
        var model2 = $("#model2").val();
        var total = new Array(brand,product,model,'vs',brand2,product2,model2);
        var fullText =  total.join(" ");
        var halfText = product+" "+model+" "+"vs"+" "+product2+" "+model2;
        var halfText2 = brand+" "+product+" "+model;
        var halfText3 = brand2+" "+product2+" "+model2;
        var halfText4 = product+" "+model;
        var halfText5 = product2+" "+model2;
        var result= fullText+", "+halfText+", "+halfText2+", "+halfText3+", "+halfText4+", "+halfText5+", "+"comparison";
    }
    
    
    $("#tags").text(result);
});

function copyToClipboard (text) {
  window.prompt ("Copy to clipboard: Ctrl+C, Enter", text);
}
$("#copy").click(function(){
    var genText= $("#tags").text();
    copyToClipboard(genText);
});
//function splitg(arr,fullText,halfText,checkbT){
//
//var res= fullText+", "+halfText+", "+checkbT;
//
//
//for(i=0; i < arr.length ; i++){
//if(res== ""){
//    res=res + "" + arr[i];
//}else{
//res=res + ", " + arr[i];
//}
//for(j=0; j< arr.length; j++){
//if(i != j && j>i){
//res=res + ", " + arr[i] +" "+ arr[j];
//}
//}
//}
//return res;
//
//}

$("#reset").click(function(){
    $("#tags").text("");
});
});