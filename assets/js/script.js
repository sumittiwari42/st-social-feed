/**
 * st social feed
 * 
 * 
 * @package WordPress
 * @subpackage st-social-feed
 * @author Sumit Tiwari
 */

(function($){

	$(document).ready(function(){
    
    setTimeout(function(){
	    //fetching number of row
	    var st_row = $('.st-insta-feed-wrapp').attr('row');
	    if(st_row == '') {
	    	st_row = 1;
	    }

	    //fetching list of feed	
			var st_feed_list = $('.st-insta-box').length;
			var st_feed_with = 100/st_feed_list*st_row;
			$('.st-insta-box').css('width',st_feed_with+'%');
		},100);

	 });	 

})(jQuery);