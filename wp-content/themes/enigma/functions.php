<?php
/** Theme Name	: Enigma
* Theme Core Functions and Codes
*/
/**
 * Includes required resources here*
 */
require_once ($_SERVER['DOCUMENT_ROOT'].'/WordPress/wp-load.php');
define ( 'WL_TEMPLATE_DIR_URI', get_template_directory_uri () );//relative path
define ( 'WL_TEMPLATE_DIR', get_template_directory () );	//absolute path
define ( 'WL_TEMPLATE_DIR_CORE', WL_TEMPLATE_DIR . '/core' );

require (WL_TEMPLATE_DIR_CORE . '/menu/wlkr_bootstrap_navwalker.php');
require (WL_TEMPLATE_DIR_CORE . '/scripts/css_js.php'); // Enquiring Resources here
require (WL_TEMPLATE_DIR_CORE . '/comment-function.php');
require (WL_TEMPLATE_DIR_CORE . '/flickr-widget.php');

////////////////////////////
//  add customized page to admin menu//
///////////////////////////
require_once('guests.php');	//guests setting page
require_once('guest-update.php'); //guest add & edit page
require_once('activity-update.php'); //activity manage page
require_once 'register.php';	//display users registered for movie2.0

//remove wordpress logo information
function wps_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu ( 'wp-logo' );
	$wp_admin_bar->remove_menu ( 'about' );
	$wp_admin_bar->remove_menu ( 'wporg' );
	$wp_admin_bar->remove_menu ( 'documentation' );
	$wp_admin_bar->remove_menu ( 'support-forums' );
	$wp_admin_bar->remove_menu ( 'feedback' );
	$wp_admin_bar->remove_menu ( 'view-site' );
	
}
add_action ( 'wp_before_admin_bar_render', 'wps_admin_bar' );

function remove_my_menu(){
	remove_menu_page( 'plugins.php' );                //插件页面
	remove_menu_page( 'tools.php' );                  //工具页面
	remove_menu_page( 'update-core.php');			 //update
}

add_action('admin_menu','remove_my_menu');

//remove comments style
remove_action ( 'wp_head', 'feed_links', 2 );
remove_action ( 'wp_head', 'feed_links_extra', 3 );
remove_action ( 'wp_head', 'rsd_link' );
remove_action ( 'wp_head', 'wlwmanifest_link' );
remove_action ( 'wp_head', 'index_rel_link' );
remove_action ( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action ( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action ( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action ( 'publish_future_post', 'check_and_publish_future_post', 10, 1 );
remove_action ( 'wp_head', 'wp_generator' );
remove_action ( 'wp_footer', 'wp_print_footer_scripts' );
remove_action ( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action ( 'template_redirect', 'wp_shortlink_header', 11, 0 );

function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action ( 'wp_head', array (
			$wp_widget_factory->widgets ['WP_Widget_Recent_Comments'],
			'recent_comments_style' 
	) );
}
add_action ( 'widgets_init', 'my_remove_recent_comments_style' );
//remove dashboard widgets
function example_remove_dashboard_widgets() {
	// Globalize the metaboxes array, this holds all the widgets for wp-admin
	global $wp_meta_boxes;

	// 以下这一行代码将删除 "快速发布" 模块
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);

	// 以下这一行代码将删除 "引入链接" 模块
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);

	// 以下这一行代码将删除 "插件" 模块
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);

	// 以下这一行代码将删除 "近期评论" 模块
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);

	// 以下这一行代码将删除 "近期草稿" 模块
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);

	// 以下这一行代码将删除 "WordPress 开发日志" 模块
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);

	// 以下这一行代码将删除 "其它 WordPress 新闻" 模块
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

	// 以下这一行代码将删除 "概况" 模块
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );


//remove google fonts
/*function coolwp_remove_open_sans_from_wp_core() {
	wp_deregister_style ( 'open-sans' );
	wp_register_style ( 'open-sans', false );
	wp_enqueue_style ( 'open-sans', '' );
}
add_action ( 'init', 'coolwp_remove_open_sans_from_wp_core' );
*/

//remove update
remove_action('admin_init', '_maybe_update_themes');
add_filter('pre_site_transient_update_themes',  create_function('$a', "return null;"));//禁用主题更新
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );//禁用插件更新
remove_action('admin_init', '_maybe_update_core');
add_filter('pre_site_transient_update_core',    create_function('$a', "return null;")); //禁用版本更新



// Sane Defaults
function weblizar_default_settings() {
	$ImageUrl = "/WordPress/wp-content/uploads/2014/11/11.png"; 
	$ImageUrl2 = "/WordPress/wp-content/uploads/2014/11/13.png";
	$ImageUrl3 = "/WordPress/wp-content/uploads/2014/11/16.jpg";
	$ImageUrl4 = "/WordPress/wp-content/uploads/2014/11/FIL2.JPG";
	$ImageUrl5 = "/WordPress/wp-content/uploads/2014/11/FIL3.JPG";
	$ImageUrl6 = "/WordPress/wp-content/uploads/2014/11/FIL4.JPG";
	$ImageUrl7 = "/WordPress/wp-content/uploads/2014/11/FIL5.JPG";
	$ImageUrl8 = "/WordPress/wp-content/uploads/2014/11/FIL1.JPG";
	$ImageUrl9 = "/WordPress/wp-content/uploads/2014/11/FIL1.JPG";
	
	$Mtime 		= "/WordPress/wp-content/uploads/2014/11/mtime.png";
	$shining 	= "/WordPress/wp-content/uploads/2014/11/1.png";
	$movie 		= "/WordPress/wp-content/uploads/2014/11/2.png";
	$tv5	 	= "/WordPress/wp-content/uploads/2014/11/3.png";
	$blueFocus 	="/WordPress/wp-content/uploads/2014/11/4.png";
	$tuobang	="/WordPress/wp-content/uploads/2014/11/5.png";
	$coolpad	="/WordPress/wp-content/uploads/2014/11/6.png";
	$gewara		="/WordPress/wp-content/uploads/2014/11/7.png";
	$zunhuisuo	="/WordPress/wp-content/uploads/2014/11/8.png";
	$hongtou	="/WordPress/wp-content/uploads/2014/11/9.png";
	
	//$place		="/WordPress/wp-content/uploads/2014/11/place.png";
	
	$wl_theme_options = array (
			
			// Logo and Favicon header
			'upload_image_logo' => '/WordPress/wp-content/uploads/2014/11/wide-LOGO.png',
			'height' => '100',
			'width' => '350',
			'text_title' => 'off',
			'upload_image_favicon' => '',
			'custom_css' => '',
			'slide_image_1' => $ImageUrl,
			'slide_title_1' => '金融、互联网、影视、公关、媒体行业资源交流平台，为影视行业的发展提供资本、项目、人脉服务',
			'slide_desc_1' => '',
			'slide_btn_text_1' => '欢迎骚扰',
			'slide_btn_link_1' => '#about_movie',
			'slide_image_2' => $ImageUrl2,
			'slide_title_2' => '不忘初心，大胆想象',
			'slide_desc_2' => '',
			'slide_btn_text_2' => '',
			'slide_btn_link_2' => '',
			'slide_image_3' => $ImageUrl3,
			'slide_title_3' => '历练灵魂，合作共享 ',
			'slide_desc_3' => '',
			'slide_btn_text_3' => '',
			'slide_btn_link_3' => '',
			'blog_title' => '往届回顾',
			'fc_title' => '欢迎积极打扰、主动骚扰、畅想未来， M君在樽会所等你（微信群：movie 2.0） ',
			'fc_btn_txt' => '我要报名',
			'fc_btn_link' => '#',
			
			// Social media links, doesn't need them, turn them off
			'header_social_media_in_enabled' => 'off',
			'footer_section_social_media_enbled' => 'off',
			'twitter_link' => "#",
			'fb_link' => "#",
			'linkedin_link' => "#",
			'youtube_link' => "#",
			
			//,doesn't need them
			// 'email_id' => 'enigma@mymail.com',
			// 'phone_no' => '0159753586',
			'footer_customizations' => ' &#169; 2014 Movie 2.0 Powered By Shining',
			'developed_by_text' => '',
			
			 'developed_by_weblizar_text' => '',//'Weblizar Themes',
			// 'developed_by_link' => 'http://weblizar.com/',
			
			'home_service_heading' => '关于Movie2.0',
			'service_1_title' => "线上",
			'service_1_icons' => "fa fa-cloud-upload",
			'service_1_text' => "每天发布投资、项目、人才供需信息 为影视行业的创作者提供作品展示、项目合作、人脉拓展、创投对接的平台 促进影视行业的迭代升级",
			'service_1_link' => "#",
			
			'service_2_title' => "线下",
			'service_2_icons' => "fa fa-cloud-download",
			'service_2_text' => "全年24期主题聚会活动，汇集金融、互联网、公关、媒体、影视等行业人才",
			'service_2_link' => "#",
			
			'service_3_title' => "联系我们",
			'service_3_icons' => "fa fa-phone",
			'service_3_text' => "企业邮箱：movie20@pfeng.com.cn<br/>企业QQ号： 3160129549<br/>微信公众号： Movie20<br/>公司电话： 010—58612562",
			'service_3_link' => "#",
			
			// Portfolio Settings:
			'portfolio_home' => 'on',
			'port_heading' => '大会安排',
			'port_1_img' => $ImageUrl4,
			'port_1_title' => 'Geek',
			'port_1_link' => '#',
			'port_2_img' => $ImageUrl5,
			'port_2_title' => 'Lisa',
			'port_2_link' => '#',
			'port_3_img' => $ImageUrl6,
			'port_3_title' => 'Pink',
			'port_3_link' => '#',
			'port_4_img' => $ImageUrl7,
			'port_4_title' => 'Wiser',
			'port_4_link' => '#',

			//菜单锚点设置
			'home_service_tag'=>'about_movie',
			'portfolio_tag'=>'introduction',
			'blog_tag' => 'history',
			'register_tag'=>'register',
			'partner_tag'=>'partner',
			
			//合作厂商
			'Mtime' => $Mtime,
			'shining' =>$shining,
			'movie'	=>$movie,
			'tv5' => $tv5,
			'blueFocus' => $blueFocus,
			'tuobang'=>$tuobang,
			'coolpad' =>$coolpad,
			'gewara'=>$gewara,
			'zunhuisuo'=>$zunhuisuo,
			'hongtou'=>$hongtou,
			
			//'place' =>$place
	)
	;
	return apply_filters ( 'enigma_options', $wl_theme_options );
}
function weblizar_get_options() {
	// Options API
	return wp_parse_args ( get_option ( 'enigma_options', array () ), weblizar_default_settings () );
}
require (WL_TEMPLATE_DIR_CORE . '/theme-options/option-panel.php'); // for Options Panel
                                                                     // wp title tag starts here
function weblizar_head($title, $sep) {
	global $paged, $page;
	if (is_feed ())
		return $title;
		// Add the site name.
	$title .= get_bloginfo ( 'name' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo ( 'description' );
	if ($site_description && (is_home () || is_front_page ()))
		$title = "$title $sep $site_description";
		// Add a page number if necessary.
	if ($paged >= 2 || $page >= 2)
		$title = "$title $sep " . sprintf ( _e ( 'Page', 'weblizar' ), max ( $paged, $page ) );
	return $title;
}
add_filter ( 'wp_title', 'weblizar_head', 10, 2 );
/* After Theme Setup */
add_action ( 'after_setup_theme', 'weblizar_head_setup' );
function weblizar_head_setup() {
	global $content_width;
	// content width
	if (! isset ( $content_width ))
		$content_width = 550; // px
			                                                       
	// Blog Thumb Image Sizes
	add_image_size ( 'home_post_thumb', 340, 210, true );
	// Blogs thumbs
	add_image_size ( 'wl_page_thumb', 730, 350, true );
	add_image_size ( 'blog_2c_thumb', 570, 350, true );
	
	// Load text domain for translation-ready
	load_theme_textdomain ( 'weblizar', WL_TEMPLATE_DIR_CORE . '/lang' );
	
	add_theme_support ( 'post-thumbnails' ); // supports featured image
	                                        // This theme uses wp_nav_menu() in one location.
	register_nav_menu ( 'primary', __ ( 'Primary Menu', 'weblizar' ) );
	// theme support
	$args = array (
			'default-color' => '000000' 
	);
	add_theme_support ( 'custom-background', $args );
	add_theme_support ( 'automatic-feed-links' );
	//This behavior is too dangerous !!!!  remove it 
	//require (WL_TEMPLATE_DIR . '/options-reset.php'); // Reset Theme Options Here
}

// Read more tag to formatting in blog page
function weblizar_content_more($more) {
	return '<div class="blog-post-details-item"><a class="enigma_blog_read_btn" href="' . get_permalink () . '"><i class="fa fa-plus-circle"></i>Read More</a></div>';
}
add_filter ( 'the_content_more_link', 'weblizar_content_more' );

// Replaces the excerpt "more" text by a link
function weblizar_excerpt_more($more) {
	return '';
}
add_filter ( 'excerpt_more', 'weblizar_excerpt_more' );
/*
 * Weblizar widget area
 */
add_action ( 'widgets_init', 'weblizar_widgets_init' );
function weblizar_widgets_init() {
	/* sidebar */
	register_sidebar ( array (
			'name' => __ ( 'Sidebar', 'weblizar' ),
			'id' => 'sidebar-primary',
			'description' => __ ( 'The primary widget area', 'weblizar' ),
			'before_widget' => '<div class="enigma_sidebar_widget">',
			'after_widget' => '</div>',
			'before_title' => '<div class="enigma_sidebar_widget_title"><h2>',
			'after_title' => '</h2></div>' 
	) );
	
	register_sidebar ( array (
			'name' => __ ( 'Footer Widget Area', 'weblizar' ),
			'id' => 'footer-widget-area',
			'description' => __ ( 'footer widget area', 'weblizar' ),
			'before_widget' => '<div class="col-md-3 col-sm-6 enigma_footer_widget_column">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="enigma_footer_widget_title">',
			'after_title' => '<div id="" class="enigma-footer-separator"></div></h3>' 
	) );
}

/* Breadcrumbs */
function weblizar_breadcrumbs() {
	$delimiter = '';
	$home = __ ( 'Home', 'weblizar' ); // text for the 'Home' link
	$before = '<li>'; // tag before the current crumb
	$after = '</li>'; // tag after the current crumb
	echo '<ul class="breadcrumb">';
	global $post;
	$homeLink = home_url ();
	echo '<li><a href="' . $homeLink . '">' . $home . '</a></li>' . $delimiter . ' ';
	if (is_category ()) {
		global $wp_query;
		$cat_obj = $wp_query->get_queried_object ();
		$thisCat = $cat_obj->term_id;
		$thisCat = get_category ( $thisCat );
		$parentCat = get_category ( $thisCat->parent );
		if ($thisCat->parent != 0)
			echo (get_category_parents ( $parentCat, TRUE, ' ' . $delimiter . ' ' ));
		echo $before . ' _e("Archive by category","weblizar") "' . single_cat_title ( '', false ) . '"' . $after;
	} elseif (is_day ()) {
		echo '<li><a href="' . get_year_link ( get_the_time ( 'Y' ) ) . '">' . get_the_time ( 'Y' ) . '</a></li> ' . $delimiter . ' ';
		echo '<li><a href="' . get_month_link ( get_the_time ( 'Y' ), get_the_time ( 'm' ) ) . '">' . get_the_time ( 'F' ) . '</a></li> ' . $delimiter . ' ';
		echo $before . get_the_time ( 'd' ) . $after;
	} elseif (is_month ()) {
		echo '<li><a href="' . get_year_link ( get_the_time ( 'Y' ) ) . '">' . get_the_time ( 'Y' ) . '</a></li> ' . $delimiter . ' ';
		echo $before . get_the_time ( 'F' ) . $after;
	} elseif (is_year ()) {
		echo $before . get_the_time ( 'Y' ) . $after;
	} elseif (is_single () && ! is_attachment ()) {
		if (get_post_type () != 'post') {
			$post_type = get_post_type_object ( get_post_type () );
			$slug = $post_type->rewrite;
			echo '<li><a href="' . $homeLink . '/' . $slug ['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_title () . $after;
		} else {
			$cat = get_the_category ();
			$cat = $cat [0];
			// echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			echo $before . get_the_title () . $after;
		}
	} elseif (! is_single () && ! is_page () && get_post_type () != 'post') {
		$post_type = get_post_type_object ( get_post_type () );
		echo $before . $post_type->labels->singular_name . $after;
	} elseif (is_attachment ()) {
		$parent = get_post ( $post->post_parent );
		$cat = get_the_category ( $parent->ID );
		$cat = $cat [0];
		echo get_category_parents ( $cat, TRUE, ' ' . $delimiter . ' ' );
		echo '<li><a href="' . get_permalink ( $parent ) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
		echo $before . get_the_title () . $after;
	} elseif (is_page () && ! $post->post_parent) {
		echo $before . get_the_title () . $after;
	} elseif (is_page () && $post->post_parent) {
		$parent_id = $post->post_parent;
		$breadcrumbs = array ();
		while ( $parent_id ) {
			$page = get_page ( $parent_id );
			$breadcrumbs [] = '<li><a href="' . get_permalink ( $page->ID ) . '">' . get_the_title ( $page->ID ) . '</a></li>';
			$parent_id = $page->post_parent;
		}
		$breadcrumbs = array_reverse ( $breadcrumbs );
		foreach ( $breadcrumbs as $crumb )
			echo $crumb . ' ' . $delimiter . ' ';
		echo $before . get_the_title () . $after;
	} elseif (is_search ()) {
		echo $before . '_e("Search results for","weblizar") "' . get_search_query () . '"' . $after;
	} elseif (is_tag ()) {
		echo $before . '_e("Posts tagged","weblizar") "' . single_tag_title ( '', false ) . '"' . $after;
	} elseif (is_author ()) {
		global $author;
		$userdata = get_userdata ( $author );
		echo $before . '_e("Articles posted by","weblizar") ' . $userdata->display_name . $after;
	} elseif (is_404 ()) {
		echo $before . '_e("Error 404","weblizar")' . $after;
	}
	
	echo '</ul>';
}

// PAGINATION
function weblizar_pagination($pages = '', $range = 2) {
	$showitems = ($range * 2) + 1;
	
	global $paged;
	if (empty ( $paged ))
		$paged = 1;
	
	if ($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if (! $pages) {
			$pages = 1;
		}
	}
	
	if (1 != $pages) {
		echo "<div class='enigma_blog_pagination'><div class='enigma_blog_pagi'>";
		if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
			echo "<a href='" . get_pagenum_link ( 1 ) . "'>&laquo;</a>";
		if ($paged > 1 && $showitems < $pages)
			echo "<a href='" . get_pagenum_link ( $paged - 1 ) . "'>&lsaquo;</a>";
		
		for($i = 1; $i <= $pages; $i ++) {
			if (1 != $pages && (! ($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
				echo ($paged == $i) ? "<a class='active'>" . $i . "</a>" : "<a href='" . get_pagenum_link ( $i ) . "'>" . $i . "</a>";
			}
		}
		
		if ($paged < $pages && $showitems < $pages)
			echo "<a href='" . get_pagenum_link ( $paged + 1 ) . "'>&rsaquo;</a>";
		if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
			echo "<a href='" . get_pagenum_link ( $pages ) . "'>&raquo;</a>";
		echo "</div></div>";
	}
}
/*
 * ===================================================================================
 * Add Author Links
 * =================================================================================
 */
function weblizar_author_profile($contactmethods) {
	$contactmethods ['youtube_profile'] = __ ( 'Youtube Profile URL', 'weblizar' );
	$contactmethods ['twitter_profile'] = __ ( 'Twitter Profile URL', 'weblizar' );
	$contactmethods ['facebook_profile'] = __ ( 'Facebook Profile URL', 'weblizar' );
	$contactmethods ['linkedin_profile'] = __ ( 'Linkedin Profile URL', 'weblizar' );
	
	return $contactmethods;
}
add_filter ( 'user_contactmethods', 'weblizar_author_profile', 10, 1 );
/*
 * ===================================================================================
 * Add Class Gravtar
 * =================================================================================
 */
add_filter ( 'get_avatar', 'weblizar_gravatar_class' );
function weblizar_gravatar_class($class) {
	$class = str_replace ( "class='avatar", "class='author_detail_img", $class );
	return $class;
}
/**
 * **--- Navigation for Author, Category , Tag , Archive ---**
 */
function weblizar_navigation() {
	?>
<div class="enigma_blog_pagination">
	<div class="enigma_blog_pagi">
	<?php posts_nav_link(); ?>
	</div>
</div>
<?php

}

/**
 * **--- Navigation for Single ---**
 */
function weblizar_navigation_posts() {
	?>
<div class="navigation_en">
	<nav id="wblizar_nav">
		<span class="nav-previous">
	<?php previous_post_link('&laquo; %link'); ?>
	</span> <span class="nav-next">
	<?php next_post_link('%link &raquo;'); ?>
	</span>
	</nav>
</div>
<?php
}
?>