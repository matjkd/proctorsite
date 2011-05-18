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
	
// inline input titles
$(function()  {
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
$(function() {
    $('.cycle').cycle({
		fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		speedIn:  500, 
	    speedOut: 500, 
	   timeout:  8000 
	});
	$('.cycle').css("display", "block");
});
//slideshow text
$(function() {
    $('.cycletext').cycle({
		fx: 'scrollUp', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		speedIn:  500, 
	    speedOut: 500, 
	   timeout:  8000 
	});
	$('.cycletext').css("display", "block");

});


//sidebox slideshow
$(function()  {
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

//Dialog boxes
	// popup dialog for channel partner thing
	$.fx.speeds._default = 300;
	$(function()  {
		$('#dialog').dialog({
			autoOpen: false,
			show: "blind",
			modal: false,
			width:500,
			height:550
		});
		
		$('#openchannel').click(function() {
			$('#dialog').dialog('open');
			return false;
		});
	});
	// popup dialog for send info
	
	$(function()  {
		$('#sendinfo').dialog({
			autoOpen: false,
			show: "blind",
			modal: false,
			width:500,
			height:550
		});
		
		$('#open_send_info').click(function() {
			$('#sendinfo').dialog('open');
			return false;
		});
	});
	// popup dialog for request a demo
	
	$(function()  {
		$('#request_demo').dialog({
			autoOpen: false,
			show: "blind",
			modal: false,
			width:500,
			height:550
		});
		
		$('#open_request_demo').click(function() {
			$('#request_demo').dialog('open');
			return false;
		});
	});
// partners slider
$(function() {
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

// top menu fader
 	$(function() {
		var fadedelay = 100;
	    $('#top_menu li a').hover(function () {
	        $(this).animate({
					
					color: "#cccccc"
					
				}, 100 );
			
	    },
	    function () {
	        $(this).animate({
					
					color: "#ffffff"
					
				}, 100 );
			
	    });
	     
	 });
//big buttons fader
	$(function() {
		var fadedelay = 100;
	    $('.widebox a').hover(function () {
	        $(this).closest('.widebox').animate({
					
					backgroundColor: "#bdc4c6"
					
				}, 100 );
			
	    },
	    function () {
	        $(this).closest('.widebox').animate({
					
					backgroundColor: "#dce0e1"
					
				}, 100 );
			
	    });
	     
	 });
//social links hover
$(function() {
		var fadedelay = 100;
	    $('#social_links img').hover(function () {
	        
			//over	
	        $(this).animate({
					
					opacity:"0.5"
					
				}, fadedelay );
			
	    },
	    function () {
	    	$('#social_links img').not(this).animate({
					
					opacity:"1"
					
				}, fadedelay );
	        $(this).animate({
					
					opacity:"1"
					
				}, fadedelay );
			
	    });
	     
	 });

//login fader
$(function() {
		var logindelay = 300;
		
	    $('#channelbutton').click(function () {
	    	$('#site_login').fadeOut(logindelay);
	    	$('#customer_login').fadeOut(logindelay);
	        $('#channel_login').delay(logindelay).fadeIn(logindelay);
	         
	    });
	    
	    $('#customerbutton').click(function () {
	    	$('#site_login').fadeOut(logindelay);
	    	$('#channel_login').fadeOut(logindelay);
	        $('#customer_login').delay(logindelay).fadeIn(logindelay);
	         
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

$(function() {
			$("a[rel^='prettyPhoto']").prettyPhoto();
		});
		
// team slider
 $(function() {
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
	
//tips
	$(function() {
		$('#tips1').tipsy({gravity: 'w', fade: true});
		$('#tips2').tipsy({gravity: 'w', fade: true});
		$('#tips3').tipsy({gravity: 'w', fade: true});
		$('#tips4').tipsy({gravity: 'w', fade: true});
		$('#tips5').tipsy({gravity: 'w', fade: true});
		$('#tips6').tipsy({gravity: 'w', fade: true});
		
		$('#desc1').tipsy({delayIn: 500, delayOut: 1000, gravity: 'e', fade: true, offset: 20 });
		$('#desc2').tipsy({delayIn: 500, delayOut: 1000, gravity: 'e', fade: true, offset: 20 });
		$('#desc3').tipsy({delayIn: 500, delayOut: 1000, gravity: 'e', fade: true, offset: 20 });
		
	});
	
//software scroller

if($("#main_navi").length>0) {
		    // do 
		    //horizontal scroller
		$(document).ready(function() {
		 
		//remove fixed height
		$('#widecolumntop').css('height', 'auto'); 
		 
		// main vertical scroll
		$("#mainscroller").scrollable({
		 
			// basic settings
			vertical: true,
		 
			// up/down keys will always control this scrollable
			keyboard: 'static',
		 
			// assign left/right keys to the actively viewed scrollable
			onSeek: function(event, i) {
				horizontal.eq(i).data("scrollable").focus();
			}
		 
		// main navigator (thumbnail images)
		}).navigator("#main_navi");
		 
		// horizontal scrollables. each one is circular and has its own navigator instance
		var horizontal = $(".scrollable").scrollable({ circular: true }).navigator(".navi");
		 
		 
		// when page loads setup keyboard focus on the first horzontal scrollable
		horizontal.eq(0).data("scrollable").focus();
		 
		});
}