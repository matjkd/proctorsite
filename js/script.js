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
// popup dialog for calc
$.fx.speeds._default = 200;
$(function()  {
    $('#calc').dialog({
        autoOpen: false,
        show: "Fade",
        modal: true,
        width:550,
        height:480
    });
		
    $('#calcbutton').click(function() {
        $('#calc').dialog('open');
        return false;
    });
});

// popup dialog for newsletter signup
$.fx.speeds._default = 200;
$(function()  {
    $('#newsletter').dialog({
        autoOpen: false,
        show: "Fade",
        modal: true,
        width:550,
        height:480
    });

    $('#newsletterbutton').click(function() {
        $('#newsletter').dialog('open');
        return false;
    });
});

    
// popup dialog for channel partner thing
$.fx.speeds._default = 200;
$(function()  {
    $('#dialog').dialog({
        autoOpen: false,
        show: "Fade",
        modal: true,
        width:400,
        height:550
    });
		
    $('#openchannel').click(function() {
        $('#dialog').dialog('open');
        return false;
    });
});
	
// popup dialog for send info
	
$(function()  {
    $('#dialog2').dialog({
        autoOpen: false,
        show: "Fade",
        modal: true,
        width:400,
        height:550
    });
		
    $('#openchannel2').click(function() {
        $('#dialog2').dialog('open');
        return false;
    });
});
// popup dialog for request a demo
	
$(function()  {
    $('#request_demo').dialog({
        autoOpen: false,
        show: "blind",
        modal: false,
        width:400,
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

//image makes widebox image darken
$(function() {

    $('.widebox_image').hover(function () {
        $(this).animate({

            opacity: 0.85

        }, 100 );

    },
    function () {
        $(this).animate({

            opacity: 1

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
    $("#datepicker").datepicker({
        showOtherMonths: true, 
        selectOtherMonths: true, 
        dateFormat: 'D, dd M yy'
    });
});

$(function() {
    $("button, input:submit").button();
		
		
});
	
//tips
$(function() {
    $('#tips1').tipsy({
        gravity: 'w', 
        fade: true
    });
    $('#tips2').tipsy({
        gravity: 'w', 
        fade: true
    });
    $('#tips3').tipsy({
        gravity: 'w', 
        fade: true
    });
    $('#tips4').tipsy({
        gravity: 'w', 
        fade: true
    });
    $('#tips5').tipsy({
        gravity: 'w', 
        fade: true
    });
    $('#tips6').tipsy({
        gravity: 'w', 
        fade: true
    });
		
    $('#desc1').tipsy({
        delayIn: 500, 
        delayOut: 1000, 
        gravity: 'e', 
        fade: true, 
        offset: 20
    });
    $('#desc2').tipsy({
        delayIn: 500, 
        delayOut: 1000, 
        gravity: 'e', 
        fade: true, 
        offset: 20
    });
    $('#desc3').tipsy({
        delayIn: 500, 
        delayOut: 1000, 
        gravity: 'e', 
        fade: true, 
        offset: 20
    });
    $('#desc4').tipsy({
        delayIn: 500, 
        delayOut: 1000, 
        gravity: 'e', 
        fade: true, 
        offset: 20
    });
		
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
        var horizontal = $(".scrollable").scrollable({
            circular: true
        }).navigator(".navi");
		 
		 
        // when page loads setup keyboard focus on the first horzontal scrollable
        horizontal.eq(0).data("scrollable").focus();
		 
    });
}
//calculator

$('.buttonsend').click(function (event) {
 	
    //stop from submitting normally
    event.preventDefault();
 	
    //add validation here
 	
 	
 	
    //add a loading image
    $("#results").html("<img src='/images/ajax-loader.gif'/>");
 	
 	
    // get values from form
    var $form = $(this),
    url = $form.attr('action');
 	
    var capitalType = $("#capitalType option:selected").val();
    var capitalamount =  $('input[name="amount_type"]').val();
    var interestType = $("#interestType option:selected").val();
    var interestamount =  $('input[name="calculate_by"]').val();
    var paymentType =  $("#paymentType option:selected").val();
    var paymentFrequency =  $("#paymentFrequency option:selected").val();
    var initial =  $('input[name="initial"]').val();
    var regular =  $('input[name="regular"]').val();
	
    $.post('/forms/calc_results', {
        capitalType: capitalType, 
        capitalamount: capitalamount, 
        interestType: interestType, 
        interestamount: interestamount, 
        paymentType: paymentType, 
        paymentFrequency: paymentFrequency, 
        initial: initial, 
        regular: regular
    },
    function(data) {
   		
        $("#results").html(data);
   	
        
    }
    );
});

window.___gcfg = {
    lang: 'en-GB'
};

(function() {
    var po = document.createElement('script');
    po.type = 'text/javascript';
    po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);
})();



//Mailchimp script
var fnames = new Array();
var ftypes = new Array();
fnames[0]='EMAIL';
ftypes[0]='email';
fnames[1]='FNAME';
ftypes[1]='text';
fnames[2]='LNAME';
ftypes[2]='text';
try {
    var jqueryLoaded=jQuery;
    jqueryLoaded=true;
} catch(err) {
    var jqueryLoaded=false;
}
var head= document.getElementsByTagName('head')[0];
if (!jqueryLoaded) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js';
    head.appendChild(script);
    if (script.readyState && script.onload!==null){
        script.onreadystatechange= function () {
            if (this.readyState == 'complete') mce_preload_check();
        }
    }
}
var script = document.createElement('script');
script.type = 'text/javascript';
script.src = 'http://downloads.mailchimp.com/js/jquery.form-n-validate.js';
head.appendChild(script);
var err_style = '';
try{
    err_style = mc_custom_error_style;
} catch(e){
    err_style = 'margin: 1em 0 0 0; padding: 1em 0.5em 0.5em 0.5em; background: FFEEEE none repeat scroll 0% 0%; font-weight: bold; float: left; z-index: 1; width: 80%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; color: FF0000;';
}
var head= document.getElementsByTagName('head')[0];
var style= document.createElement('style');
style.type= 'text/css';
if (style.styleSheet) {
    style.styleSheet.cssText = '.mce_inline_error {' + err_style + '}';
} else {
    style.appendChild(document.createTextNode('.mce_inline_error {' + err_style + '}'));
}
head.appendChild(style);
setTimeout('mce_preload_check();', 250);

var mce_preload_checks = 0;
function mce_preload_check(){
    if (mce_preload_checks>40) return;
    mce_preload_checks++;
    try {
        var jqueryLoaded=jQuery;
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    try {
        var validatorLoaded=jQuery("#fake-form").validate({});
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    mce_init_form();
}
function mce_init_form(){
    jQuery(document).ready( function($) {
        var options = {
            errorClass: 'mce_inline_error', 
            errorElement: 'div', 
            onkeyup: function(){}, 
            onfocusout:function(){}, 
            onblur:function(){}
        };
    var mce_validator = $("#mc-embedded-subscribe-form").validate(options);
        $("#mc-embedded-subscribe-form").unbind('submit');//remove the validator so we can get into beforeSubmit on the ajaxform, which then calls the validator
        options = {
            url: 'http://lease-desk.us1.list-manage2.com/subscribe/post-json?u=1bd520fd21537df925588eed5&id=c535bc8d38&c=?', 
            type: 'GET', 
            dataType: 'json', 
            contentType: "application/json; charset=utf-8",
            beforeSubmit: function(){
                $('#mce_tmp_error_msg').remove();
                $('.datefield','#mc_embed_signup').each(
                    function(){
                        var txt = 'filled';
                        var fields = new Array();
                        var i = 0;
                        $(':text', this).each(
                            function(){
                                fields[i] = this;
                                i++;
                            });
                        $(':hidden', this).each(
                            function(){
                                var bday = false;
                                if (fields.length == 2){
                                    bday = true;
                                    fields[2] = {
                                        'value':1970
                                    };//trick birthdays into having years
                                }
                                if ( fields[0].value=='MM' && fields[1].value=='DD' && (fields[2].value=='YYYY' || (bday && fields[2].value==1970) ) ){
                                    this.value = '';
                                } else if ( fields[0].value=='' && fields[1].value=='' && (fields[2].value=='' || (bday && fields[2].value==1970) ) ){
                                    this.value = '';
                                } else {
                                    this.value = fields[0].value+'/'+fields[1].value+'/'+fields[2].value;
                                }
                            });
                    });
                return mce_validator.form();
            },
            success: mce_success_cb
        };
        $('#mc-embedded-subscribe-form').ajaxForm(options);

    });
}
function mce_success_cb(resp){
    $('#mce-success-response').hide();
    $('#mce-error-response').hide();
    if (resp.result=="success"){
        $('#mce-'+resp.result+'-response').show();
        $('#mce-'+resp.result+'-response').html(resp.msg);
        $('#mc-embedded-subscribe-form').each(function(){
            this.reset();
        });
    } else {
        var index = -1;
        var msg;
        try {
            var parts = resp.msg.split(' - ',2);
            if (parts[1]==undefined){
                msg = resp.msg;
            } else {
                i = parseInt(parts[0]);
                if (i.toString() == parts[0]){
                    index = parts[0];
                    msg = parts[1];
                } else {
                    index = -1;
                    msg = resp.msg;
                }
            }
        } catch(e){
            index = -1;
            msg = resp.msg;
        }
        try{
            if (index== -1){
                $('#mce-'+resp.result+'-response').show();
                $('#mce-'+resp.result+'-response').html(msg);
            } else {
                err_id = 'mce_tmp_error_msg';
                html = '<div id="'+err_id+'" style="'+err_style+'"> '+msg+'</div>';

                var input_id = '#mc_embed_signup';
                var f = $(input_id);
                if (ftypes[index]=='address'){
                    input_id = '#mce-'+fnames[index]+'-addr1';
                    f = $(input_id).parent().parent().get(0);
                } else if (ftypes[index]=='date'){
                    input_id = '#mce-'+fnames[index]+'-month';
                    f = $(input_id).parent().parent().get(0);
                } else {
                    input_id = '#mce-'+fnames[index];
                    f = $().parent(input_id).get(0);
                }
                if (f){
                    $(f).append(html);
                    $(input_id).focus();
                } else {
                    $('#mce-'+resp.result+'-response').show();
                    $('#mce-'+resp.result+'-response').html(msg);
                }
            }
        } catch(e){
            $('#mce-'+resp.result+'-response').show();
            $('#mce-'+resp.result+'-response').html(msg);
        }
    }
}


	

