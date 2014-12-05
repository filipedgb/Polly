

function addOptionRequest(){
	
	$("#addOption").before(
		 "<label for=\"username\">Option:</label>",
		"<input id=\"text\" class=\"txtfield\" tabindex=\"4\" type=\"text\" name=\"option[]\">"

		);


}



$(function(){
    $("#addOption").click(addOptionRequest);
});



function loadDocument() {

	 //   $("#addOption").click(addOptionRequest);

	//var codeHTML = document.innerHTML;
//	var code = document.getElementById("products");
	//var line1 = firstTagChild(code);
	//var select = firstNamedChild(line1,"SELECT");
	//window.alert(line1);
	//window.alert(select);
	//loadProducts(select);
/*	$('.poll_item').hide();
	$('.poll_item_stat').hide();
	
	
	$(".basePanel").hide().fadeIn(1000, null);
	//$(".poll_item").hide().fadeIn(1000, null);


		
	$(".poll_item").each(function(index) {
    	$(this).delay(350*index).fadeIn(1000);
	});

	$(".poll_item_stat").each(function(index) {
    	$(this).delay(350*index).fadeIn(1000);
	});*/
}

window.addEventListener("load", loadDocument);

function printStatsBar(barWidth, barHeight, itemId, percentage){
	//window.alert(htmlElement.children().html());

	       var canvas = document.getElementById(itemId);
	     // alert(canvas.html);
	      var context = canvas.getContext('2d');
	     //alert(barWidth);
	    //  alert(barHeight);
	    
	    context.beginPath();
	    context.rect(0, 0, barWidth, barHeight);
	    context.fillStyle = 'grey';
	    context.fill();
	    context.stroke();
	    context.fillStyle = 'black';
	    context.fillText(percentage+"%",5,13,barWidth);

	//window.alert('abc');
	//htmlElement.append("<p>teste</>");
	
	//htmlElement.rect(x,y,width,height);
	/*var ctx=htmlElement.getContext("2d");
	ctx.rect(20,20,150,100);
	ctx.stroke(); */

}




/*

$(document).ready(function(){

	var $window = $(window); //You forgot this line in the above example

	$('div[data-type="poll_item"]').each(function(){
		var $bgobj = $(this); // assigning the object
		$(window).scroll(function() {
			var yPos = -($window.scrollTop() / $bgobj.data('speed'));
			// Put together our final background position
			var coords = '50% '+ yPos + 'px';
			// Move the background
			$bgobj.css({ backgroundPosition: coords });
		});
	});
});
*/



function wrongLogin(){
	   document.getElementById("loginmodal").style.display = 'block';
	
}

