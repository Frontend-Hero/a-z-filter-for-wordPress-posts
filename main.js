jQuery(document).ready(function()
{	
	"use strict";
	
	let initial_first_letter = jQuery('#a-z li.active:eq(0)').data('letter');
	let click_first_char;
	let title_showing = jQuery('#title-status span');
	let az_li = jQuery('#a-z li');
	let title_show_all = jQuery('p#show-all');
	let posts_results_li = jQuery("#posts-results li");
	
	// Initial load
	jQuery("#posts-results li[data-letter="+initial_first_letter+"]").addClass('show');
	jQuery('az_li:eq(0)').addClass('current');
	title_showing.text(initial_first_letter);
	
	jQuery('#a-z li.active').click(function()
	{
		jQuery("#posts-results li").removeClass('show');
		
		click_first_char = jQuery(this).data('letter');
		jQuery('#a-z li.active').removeClass('current');
		title_showing.text(click_first_char);
		title_show_all.show();
		jQuery(this).addClass('current');
		jQuery("#posts-results li[data-letter="+click_first_char+"]").addClass('show');
	});
	
	// Show all posts
	title_show_all.click(function()
	{
		posts_results_li.addClass('show');
		title_showing.text('all');
		az_li.removeClass('current');
		jQuery(this).hide(); 
	}); 

});
