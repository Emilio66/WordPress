<?php
	$wl_theme_options = weblizar_get_options ();
?>
<div class="enigma_blog_area " style="background-color:#ECF0F1"
 id="<?php echo esc_attr($wl_theme_options['blog_tag']); ?>">
	<div class="container" >
		<div class="row">
			<div class="col-sm-12">
				<div class="enigma_heading_title">
					<h3><?php echo esc_attr($wl_theme_options['blog_title']); ?></h3>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row" id="enigma_blog_section">
	<?php
	
if (have_posts ()) :
		$args = array (
				'post_type' => 'post',
				'posts_per_page' => 6 
		);
		$post_type_data = new WP_Query ( $args );
		while ( $post_type_data->have_posts () ) :
			$post_type_data->the_post ();
			?>
			<div class="col-md-4 col-sm-12 scrollimation scale-in d2 pull-left">
				<div class="enigma_blog_thumb_wrapper">
					<div class="enigma_blog_thumb_wrapper_showcase">					
					<?php
			
		$img = array (
					'class' => 'enigma_img_responsive' 
			);
			if (has_post_thumbnail ()) :
				the_post_thumbnail ( 'home_post_thumb', $img );
			
					endif;
			?>
					<div class="enigma_blog_thumb_wrapper_showcase_overlay">
							<div class="enigma_blog_thumb_wrapper_showcase_overlay_inner ">
								<div class="enigma_blog_thumb_wrapper_showcase_icons">
									<a title="<?php the_title_attribute(); ?>"
										href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</div>
					</div>
					<h2>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
				<?php if(get_the_tag_list() != '') { ?>
				<p class="enigma_tags"><?php the_tags('Tags :&nbsp;', '', '<br />'); ?></p>
				<?php } ?>
				<?php the_excerpt( __( 'Read More' , 'weblizar' ) ); ?>
				<a href="<?php the_permalink(); ?>" class="enigma_blog_read_btn"><i
						class="fa fa-plus-circle"></i><?php _e('Read More','weblizar'); ?></a>
					<div class="enigma_blog_thumb_footer">
						<ul class="enigma_blog_thumb_date">
							<li><i class="fa fa-user"></i><a
								href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
								<?php echo get_the_author(); ?></a></li>
							<li><i class="fa fa-clock-o"></i>
						<?php if ( ('d M  y') == get_option( 'date_format' ) ) : ?>
						<?php echo get_the_date('F d ,Y'); ?>
						<?php else : ?>
						<?php echo get_the_date(); ?>
						<?php endif; ?>
						</li>
							<li><i class="fa fa-comments-o"></i><?php comments_popup_link( '0', '1', '%', '', '-'); ?></li>
						</ul>
					</div>
				</div>
			</div>
			<?php
		
endwhile
		;
	 else :
		?>
			<div class="col-md-4 col-sm-12 scrollimation scale-in d2 pull-left">
				<div class="enigma_blog_thumb_wrapper">
					<div class="enigma_blog_thumb_wrapper_showcase">
						<img alt="Enigma"
							src="<?php echo WL_TEMPLATE_DIR_URI ?>/images/wall/img(11).jpg">
						<div class="enigma_blog_thumb_wrapper_showcase_overlay">
							<div class="enigma_blog_thumb_wrapper_showcase_overlay_inner ">
								<div class="enigma_blog_thumb_wrapper_showcase_icons">
									<a title="Enigma" href="#"><i class="fa fa-link"></i></a>
								</div>
							</div>
						</div>
					</div>
					<h2>
						<a href="#"><?php _e('NO Post','weblizar'); ?></a>
					</h2>

					<p class="enigma_tags">
					<?php _e('Tags :&nbsp;','weblizar'); ?>
					<a href="#"><?php _e('Bootstrap','weblizar'); ?></a> <a href="#"><?php _e('HTML5','weblizar'); ?></a>

					</p>
					<p><?php _e('Add You Post To show post here..','weblizar'); ?></p>
					<a href="#" class="enigma_blog_read_btn"><i
						class="fa fa-plus-circle"></i><?php _e('Read More','weblizar'); ?></a>
					<div class="enigma_blog_thumb_footer">
						<ul class="enigma_blog_thumb_date">
							<li><i class="fa fa-user"></i><a href="#"><?php _e('By Admin','weblizar'); ?></a></li>
							<li><i class="fa fa-clock-o"></i><?php _e(' November 9 2013','weblizar'); ?></li>
							<li><i class="fa fa-comments-o"></i><a href="#"><?php _e('10','weblizar'); ?></a></li>
						</ul>
					</div>
				</div>
			</div>
		<?php endif; ?>
		
	</div>
		<div class="enigma_carousel-navi">
			<div id="port-prev" class="enigma_carousel-prev">
				<i class="fa fa-arrow-left"></i>
			</div>
			<div id="port-next" class="enigma_carousel-next">
				<i class="fa fa-arrow-right"></i>
			</div>
		</div>
	</div>
</div>

<!-- register form -->
<DIV class="enigma_project_section" 
style="background-color:#FFFFFF" id="<?php echo esc_attr($wl_theme_options['register_tag']); ?>">
	<DIV class="container" >
		<DIV class="row">
		 <DIV class="col-sm-12">
			<DIV class="enigma_heading_title">
			<H3>报名参会</H3>
			</DIV>
		 </DIV>
		</DIV>
	</DIV>
<DIV class="container">
<form id='registerForm' role="form" method="post">
	<DIV class="col-lg-6  col-md-6 col-md-offset-3 col-sm-6 "  >
	  <div  style="margin-bottom: 50px">
	    <label for="nameInput" style="float: left;width:17%">姓名：</label>
	    <input type="text" class="enigma_con_input_control" style="width: 67%;float:left"
	    	onblur='checkName()' id="nameInput" name="name" placeholder="姓名"/>
	    <font id="nameHint" color="#e61f18" style="width: 12%;float:left">*</font>
	    <div style="padding: 0px 0px 10px;"></div> 
	  </div>
	  <div  style="margin-bottom: 50px">
	    <label for="emailInput" style="float: left;width:17%">邮箱：</label>
	    <input type="email" class="enigma_con_input_control" style="width: 67%;float:left"
	    	onblur='checkEmail()' id="emailInput" name="email" placeholder="邮箱"/>
	    <font id="emailHint" color="#e61f18" style="width: 12%;float:left">*</font>
	    <div style="padding: 0px 0px 10px;"></div> 
	  </div>
	  <div style="margin-bottom: 50px">
	    <label for="phoneInput" style="width: 17%;float:left">手机：</label>
	    <input type="text" class="enigma_con_input_control" style="width: 67%;float:left"
	    	onblur='checkPhone()' id="phoneInput" name="phone" placeholder="手机"/>
	    <font id="phoneHint" color="#e61f18" style="width: 12%;float:left">*</font>
	    <div style="padding: 0px 0px 10px;"></div> 
	  </div>
	  <div style="margin-bottom: 50px">
	    <label for="companyInput"  style="width: 17%;float:left">公司名：</label>
	    <input type="text" class="enigma_con_input_control" style="width: 67%;float:left" 
	    	onblur='checkCompany()' id="companyInput" name="company" placeholder="公司名"/>
	    <font id="companyHint" color="#e61f18"  style="width: 12%;float:left">*</font>
	    <div style="padding: 0px 0px 10px;"></div> 
	  </div>

	  <div >
	    <label for="introduction" style="width: 17%;float:left;">简介：</label></br>
	    <textarea id="introduction" name="introduction" class="enigma_con_textarea_control"
	    style="float:left;width: 67%; margin-right:3%;height:160px;margin-bottom:20px" 
	     >
	     </textarea><br/>
	     <div id='loading' style="display:none">
	     		<img alt="loading..." style="height: 50px;width:50px" src="/wordpress/wp-admin/images/pageloader.gif">
	   	 </div>
	     <input type="button" class="enigma_send_button" value="报名"
	     	onclick="submitForm()"></input>
	     <input style="display: none" type='button' id='wechat' class="enigma_send_button"  onmouseover='showCode()' onmouseout="showCode()"
		      value='分享到微信'
	    	/>	    
		
	  </div>
	  <div id='qrCode' style='display: none'>
	  	<h4>微信“扫一扫”，网页打开后即可分享</h4>
	  	<p><img src="/wordpress/wp-content/uploads/2014/12/qrcode.png" alt="Movie2.0"></p>
	  </div>	 
 </div>
</form>
</DIV>
 </div>

<div class="enigma_callout_area">
	<div class="container" >
		<div class="row">
		<?php if($wl_theme_options['fc_title'] !='') { ?>
			<div class="col-md-9">
				<p>
					<i class="fa fa-thumbs-up"></i><?php echo esc_attr($wl_theme_options['fc_title']);?></p>
			</div>
			<?php } ?>
			<?php //if($wl_theme_options['fc_btn_txt'] !='') { ?>
			<!-- <div class="col-md-3">
				<a href="<?php //echo esc_url($wl_theme_options['fc_btn_link']); ?>"
					class="enigma_callout_btn"><?php //echo esc_attr($wl_theme_options['fc_btn_txt']); ?></a>
			</div> -->
			<?php //} ?>
		</div>

	</div>
	<div class="enigma_callout_shadow" id="<?php echo esc_attr($wl_theme_options['partner_tag']); ?>">	
	</div>
</div>