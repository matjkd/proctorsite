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
	

//hover
$('.logo').hover(
		
		  function() {
		  
		    $(this)
			  .animate({height: '220px'}) 
		  },
		  function() {
		   
			  $(this)
			  .animate({height: '100px'}) 
		  });

// parallax scrolling background

$('div.parallax').parallax({
	  'elements': [
	    {
	      'selector': 'body',
	      'properties': {
	        'x': {
	          'background-position-x': {
	            'initial': 0,
	            'multiplier': 0.008,
	            'invert': true
	          }
	        }
	      }
	    },
	    {
	      'selector': 'div.header',
	      'properties': {
	        'x': {
	          'background-position-x': {
	            'initial': 5,
	            'multiplier': 0.01,
	            
	            	'invert': true
	          }
	        }
	      }
	    },

	    {
		      'selector': 'div.footer1',
		      'properties': {
		        'x': {
		          'background-position-x': {
		            'initial': 5,
		            'multiplier': 0.003,
		            
		            	'invert': true
		          }
		        }
		      }
		    }
	   
	  ]
	});
	
