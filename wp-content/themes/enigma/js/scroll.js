//delete active class and add to first
	jQuery(document).ready(function(){
		jQuery('li.menu-item').removeClass('active');
		jQuery('#menu-item-30').addClass('active');
	});

/*============================================
	Scrolling Animations
	==============================================*/
	jQuery('.scrollimation').waypoint(function(){
		jQuery(this).addClass('in');
	},{offset:'100%'});
	
	//find the span element, then trace back to its parent: <a href="#..">, get its href then scroll to the position
	jQuery('span.menu_scroll').parent().click(function (){
		//alert(jQuery(this).attr('href').split('#')[1]);
		var id='/wordpress/'.jQuery(this).attr('href').split('#')[1]; 			//get last word as a id clue
		localtion.href =id;
		//alert(id);
		//document.getElementById(id).scrollIntoView(true);	//scroll to this position
	});
	
	