// remap jQuery to $
(function($){

 





 



})(this.jQuery);



// usage: log('inside coolFunc',this,arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
  log.history = log.history || [];   // store logs to an array for reference
  log.history.push(arguments);
  if(this.console){
    console.log( Array.prototype.slice.call(arguments) );
  }
};


// catch all document.write() calls
(function(doc){
  var write = doc.write;
  doc.write = function(q){ 
    log('document.write(): ',arguments); 
    if (/docwriteregexwhitelist/.test(q)) write.apply(doc,arguments);  
  };
})(document);

//button replace

	$(function() {
		$("button").button();
		
		
	});
	


	
//slideshow
$(document).ready(function() {
    $('.cycle').cycle({
		fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		speedIn:  3500, 
	    speedOut: 3500, 
	   timeout:  8000 
	});
	$('.cycle').css("display", "block");
});

	

//leasedesk-slider

	
	$(document).ready(function() {
    $('.leasedesk-cycle').cycle({
		fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		speedIn:  1500, 
	    speedOut: 1500, 
	   timeout:  8000 
	});
	$('.leasedesk-cycle').css("display", "block");
});



// partners slider
  $(document).ready(function(){
        $('#partners').bxSlider({
            displaySlideQty: 4,
            moveSlideQty: 1,
            infiniteLoop: true,
            auto: false,  
            easing: 'easeOutQuad',
            speed: 1500,
            pause:  18000
            
        });
    });


    
//team profile fader
	
	$(function() {
		var fadedelay = 300;
		 $('.profile').fadeOut(fadedelay);
	    $('#button7').click(function () {
	    	 $('.profile').fadeOut(fadedelay);
	        $('#profile7').delay(fadedelay).fadeIn(fadedelay);
	         
	    });
	    
	    $('#button8').click(function () {
	    	 $('.profile').fadeOut(fadedelay);
	        $('#profile8').delay(fadedelay).fadeIn(fadedelay);
	         
	    });
	    $('#button9').click(function () {
	    	 $('.profile').fadeOut(fadedelay);
	        $('#profile9').delay(fadedelay).fadeIn(fadedelay);
	         
	    });
	    $('#button10').click(function () {
	    	 $('.profile').fadeOut(fadedelay);
	        $('#profile10').delay(fadedelay).fadeIn(fadedelay);
	         
	    });
	    $('#button11').click(function () {
	    	 $('.profile').fadeOut(fadedelay);
	        $('#profile11').delay(fadedelay).fadeIn(fadedelay);
	         
	    });
	    
	 });	
//pretty photo

$(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto();
		});
		
// team slider
  $(document).ready(function(){
        $('#team').bxSlider({
            displaySlideQty: 5,
            moveSlideQty: 1,
            infiniteLoop: true,
            auto: false,  
            easing: 'easeOutQuad',
            speed: 1500,
            pause:  18000    
        });
    });

// editor
jQuery(function() {
	jQuery('.wymeditor').cleditor({
	    });
});

$(function() {
		$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
	});