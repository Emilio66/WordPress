<?php get_header(); ?>
<div class="enigma_header_breadcrum_title">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php _e('404 Error','weblizar'); ?></h1>
				<ul class="breadcrumb">
					<li><a href="<?php echo home_url( '/' ); ?>"><?php _e('Home','weblizar'); ?></a></li>
					<li><?php _e('404 Error','weblizar'); ?></li>

				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row enigma_blog_wrapper">
		<div class="col-md-12 hc_404_error_section">
			<div class="error_404">
				<h2><?php _e('404','weblizar'); ?></h2>
				<h4><?php _e('抱歉，页面未找到','weblizar'); ?></h4>
				<p><?php _e('可能已经被管理员移除','weblizar'); ?></p>
				<p>
					<a href="<?php echo home_url( '/' ); ?>"><button
							class="enigma_send_button" type="submit"><?php _e('返回主页','weblizar'); ?></button></a>
				</p>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>