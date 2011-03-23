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
	
// intline input titles
$(document).ready(function() {
 $('input[title]').each(function() {
  if($(this).val() === '') {
   $(this).val($(this).attr('title')); 
  }
  
  $(this).focus(function() {
   if($(this).val() === $(this).attr('title')) {
    $(this).val('').addClass('focused'); 
   }
  });
  
  $(this).blur(function() {
   if($(this).val() === '') {
    $(this).val($(this).attr('title')).removeClass('focused'); 
   }
  });
 });
});


//slideshow
$(document).ready(function() {
    $('.cycle').cycle({
		fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		speedIn:  500, 
	    speedOut: 500, 
	   timeout:  8000 
	});
	$('.cycle').css("display", "block");
});
//slideshow text
$(document).ready(function() {
    $('.cycletext').cycle({
		fx: 'scrollUp', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		speedIn:  500, 
	    speedOut: 500, 
	   timeout:  8000 
	});
	$('.cycletext').css("display", "block");

});


//sidebox slideshow
$(document).ready(function() {
    $('.cycleside').cycle({
		fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		speedIn:  500, 
	    speedOut: 500, 
	   timeout:  8000 
	});
	$('.cycleside').css("display", "block");
});
	

//leasedesk-slider

	
	$(document).ready(function() {
    $('.leasedesk-cycle').cycle({
		fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		speedIn:  1250, 
	    speedOut: 1250, 
	   timeout:  6000 
	});
	$('.leasedesk-cycle').css("display", "block");
});

// popup dialog for channel partner thing
$.fx.speeds._default = 300;
$(document).ready(function() {
	$('#dialog').dialog({
		autoOpen: false,
		show: "blind",
		modal: true,
		width:500,
		height:550
	});
	
	$('#openchannel').click(function() {
		$('#dialog').dialog('open');
		return false;
	});
});

// partners slider
  $(document).ready(function(){
        $('#partners').bxSlider({
            displaySlideQty: 5,
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

// buttons and jquery ui

	$(function() {
		$("#datepicker").datepicker({showOtherMonths: true, selectOtherMonths: true, dateFormat: 'D, dd M yy' });
	});

	$(function() {
		$("button, input:submit").button();
		
		
	});