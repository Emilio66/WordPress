<?php
/**
 * Weblizar Admin Menu
 */
add_action ( 'admin_menu', 'weblizar_admin_menu_pannel' );
function weblizar_admin_menu_pannel() {
	$page = add_theme_page ( 'Weblizar', '主题配置', 'edit_theme_options', 'weblizar', 'weblizar_option_panal_function' );
	add_action ( 'admin_print_styles-' . $page, 'weblizar_admin_enqueue_script' );
}
/**
 * Weblizar Admin Menu CSS
 */
function weblizar_admin_enqueue_script() {
	wp_enqueue_script ( 'bootjs', WL_TEMPLATE_DIR_URI . '/js/bootstrap.min.js' );
	wp_enqueue_script ( 'weblizar-tab-js', WL_TEMPLATE_DIR_URI . '/core/theme-options/js/option-js.js', array (
			'media-upload',
			'jquery-ui-sortable' 
	) );
	
	wp_enqueue_style ( 'thickbox' );
	wp_enqueue_style ( 'dashicons' );
	wp_enqueue_style ( 'weblizar-option-style', WL_TEMPLATE_DIR_URI . '/core/theme-options/css/weblizar-option-style.css' );
	wp_enqueue_style ( 'op-bootstrap', WL_TEMPLATE_DIR_URI . '/core/theme-options/css/bootstrap.css' );
	wp_enqueue_style ( 'weblizar-bootstrap-responsive', WL_TEMPLATE_DIR_URI . '/core/theme-options/css/bootstrap-responsive.css' );
	wp_enqueue_style ( 'font-awesome-op', WL_TEMPLATE_DIR_URI . '/css/font-awesome-4.2.0/css/font-awesome.min.css' );
	wp_enqueue_style ( 'Respo-pricing-table', WL_TEMPLATE_DIR_URI . '/core/theme-options/css/pricing-table-responsive.css' );
	wp_enqueue_style ( 'pricing-table', WL_TEMPLATE_DIR_URI . '/core/theme-options/css/pricing-table.css' );
}
/**
 * Weblizar Theme Option Form
 */
function weblizar_option_panal_function() {
	$theme_name = "Enigma-Pro";
	$get_theme = "Get Our Premium Theme";
	$purchase = home_url ();
	?>
<div class="wrap" id="weblizar_wrap">
	
	<h2>
		<span></span>
	</h2>
	<div id="content_wrap">
		<div class="weblizar-header">
			<h2>
				<span><?php _e('主题设定','weblizar'); ?></span>
			</h2>
		</div>
		<div id="content">
			<div id="options_tabs" class="ui-tabs ">
				<ul class="options_tabs ui-tabs-nav" role="tablist" id="nav">
					<li class="active">
						<a href="#" id="general">
						<div class="dashicons dashicons-admin-home"></div><?php _e('Home Option','weblizar');?></a>
						<ul>
							<li class="currunt"><a href="#" class="ui-tabs-anchor"
								id="general"><?php _e('常规设置','weblizar');?> </a></li>
							<li><a href="#" id="home-image"><?php _e('大屏滚图','weblizar');?></a></li>
							<li><a href="#" id="home-service"><?php _e('关于Movie2.0','weblizar');?></a></li>
						<!--	<li><a href="#" id="portfolio-settings"><?php // _e('大会嘉宾','weblizar');?></a></li>  -->
							<li><a href="#" id="footercall"><?php _e('页脚标语','weblizar');?></a></li>
						</ul></li>			
				</ul>
				<!--------Option Data saving ------->
					<?php require_once('option-data.php'); ?>	
					<!--------Option Settings form ------->
					<?php require_once('option-settings.php'); ?>	
				</div>
		</div>
		<div class="weblizar-header"
			style="margin-top: 0px; border-radius: 0px 0px 6px 6px;">
			<div class="weblizar-submenu-links" style="margin-top: 15px;"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php } ?>