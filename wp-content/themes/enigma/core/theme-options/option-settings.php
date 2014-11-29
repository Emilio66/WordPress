<?php

$wl_theme_options = weblizar_get_options ();
$get_pro = "GET PREMIUM";
$get_pro_url = home_url ();
$site = home_url ();
?>
<div class="block ui-tabs-panel active" id="option-general">
	<form method="post" id="weblizar_theme_options_general">
		<div id="heading">
			<table style="width: 100%;">
				<tr>
					<td colspan=2><h2><?php _e('常规设置','weblizar');?></h2></td>
					<td style="width: 30%;">
						<div class="weblizar_settings_loding"
							id="weblizar_loding_general_image"></div>
						<div class="weblizar_settings_massage"
							id="weblizar_settings_save_general_success"><?php _e('Options Data updated','weblizar');?></div>
					</td>
					<td style="text-align: right;">
						
					<input
						class="button button-primary" type="button" value="Save"
						onclick="weblizar_option_data_save('general')">  
					</td>
				</tr>
			</table>
		</div>
		
		
		<div class="section">
			<h3><?php _e('Custom Logo','weblizar'); ?></h3>
			<input class="weblizar_inpute" type="text"
				value="<?php if($wl_theme_options['upload_image_logo']!='') { echo esc_attr($wl_theme_options['upload_image_logo']); } ?>"
				id="upload_image_logo" name="upload_image_logo" size="36"
				class="upload has-file" /> <input type="button" id="upload_button"
				value="Custom Logo" class="upload_image_button" /> <span
				class="explain"><?php _e('Add custom logo from here suggested size is 150X50','weblizar');?></span>	
			<?php if($wl_theme_options['upload_image_logo']!='') { ?>
			<img style="height: 60px; width: 100px;"
				src="<?php if($wl_theme_options['upload_image_logo']!='') { echo esc_attr($wl_theme_options['upload_image_logo']); } ?>" />
			<?php } ?>
		</div>
		<div class="section">
			<h3><?php _e('Logo Height','weblizar'); ?></h3>
			<input class="weblizar_inpute" type="text" name="height" id="height"
				value="<?php echo $wl_theme_options['height']; ?>"> <span
				class="explain"><?php  _e('Default Logo Height : 55px, if you want to increase than specify your value','weblizar'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Logo Width','weblizar'); ?></h3>
			<input class="weblizar_inpute" type="text" name="width" id="width"
				value="<?php echo $wl_theme_options['width']; ?>"> <span
				class="explain"><?php  _e('Default Logo Width : 150px, if you want to increase than specify your value','weblizar');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Text Title','weblizar'); ?></h3>
			<input type="checkbox"
				<?php if($wl_theme_options['text_title']=='on') echo "checked='checked'"; ?>
				id="text_title" name="text_title"> <span class="explain"><?php _e('Enable text-based Site Title.   Setup title','weblizar');?> <a
				href="<?php echo home_url( '/' ); ?>wp-admin/options-general.php"><?php _e('Click Here','weblizar');?></a>.</span>
		</div>
		
		<div class="section">
			<h3><?php _e('Home-Blog Heading','weblizar'); ?></h3>
			<input class="weblizar_inpute" type="text" name="blog_title"
				id="blog_title"
				value="<?php if($wl_theme_options['blog_title']!='') { echo esc_attr($wl_theme_options['blog_title']); } ?>">
			<span class="explain"><?php  _e('Home Blog Heading ','weblizar');?></span>
		</div>
		<div id="button_section">
			<input type="hidden" value="1" id="weblizar_settings_save_general"
				name="weblizar_settings_save_general" /> 
				<input
				class="button button-primary" type="button" value="Save"
				onclick="weblizar_option_data_save('general')">
		</div>
	</form>
</div>
<!-------- Home slider setting -------->
<div class="block ui-tabs-panel deactive" id="option-home-image">
	<form method="post" id="weblizar_theme_options_home-image">
		<div id="heading">
			<table style="width: 100%;">
				<tr>
					<td cols=2><h2><?php _e('Slidshow Settings','weblizar');?></h2></td>
					<td style="width: 30%;">
						<div class="weblizar_settings_loding"
							id="weblizar_loding_home-image_image"></div>
						<div class="weblizar_settings_massage"
							id="weblizar_settings_save_home-image_success"><?php _e('Options Data updated','weblizar');?></div>
						<div class="weblizar_settings_massage"
							id="weblizar_settings_save_home-image_reset"><?php _e('Options data Reset','weblizar');?></div>
					</td>
					<td style="text-align: right;"><input class="button" type="button"
						name="reset" value="Restore Defaults"
						onclick="weblizar_option_data_reset('home-image');"> <input
						class="button button-primary" type="button" value="Save"
						onclick="weblizar_option_data_save('home-image')"></td>
				</tr>
			</table>
		</div>

		<div class="section">
			<div class="panel-group" id="accordion31">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"> <?php _e('Home Slide 1','weblizar'); ?>
					<a data-toggle="collapse" data-parent="#accordion"
								href="#collapse31"> <i
								class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>
							</a>
						</h4>
					</div>
					<div id="collapse31" class="panel-collapse collapse in">
						<div class="panel-body">
							<h3><?php _e('Home Slide Image One','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text"
								value="<?php if($wl_theme_options['slide_image_1']!='') { echo esc_attr($wl_theme_options['slide_image_1']); } ?>"
								id="slide_image_1" name="slide_image_1" size="36"
								class="upload has-file" /> <input type="button"
								id="upload_button" value="Image 1" class="upload_image_button" />
							<span class="explain"><?php _e('Add Home Slide image here, size suggestion is 1400X570.','weblizar');?></span>	
			<?php if($wl_theme_options['slide_image_1']!='') { ?>
			<img style="height: 240px; width: 480px;"
								src="<?php if($wl_theme_options['slide_image_1']!='') { echo esc_attr($wl_theme_options['slide_image_1']); } ?>" />
			<?php } ?>
			<h3><?php _e('Home Slide Image Title One','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="slide_title_1"
								id="slide_title_1"
								value="<?php if($wl_theme_options['slide_title_1']!='') { echo esc_attr($wl_theme_options['slide_title_1']); } ?>">
							<span class="explain"><?php  _e('Type Home Slide Image Title Here','weblizar');?></span>
							<h3><?php _e('Home Slide Image Description One','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="slide_desc_1"
								id="slide_desc_1"
								value="<?php if($wl_theme_options['slide_desc_1']!='') { echo esc_attr($wl_theme_options['slide_desc_1']); } ?>">
							<span class="explain"><?php  _e('Type Home Slide Image Description Here','weblizar');?></span>
							<h3><?php _e('Home Slide Image Button Text One','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text"
								name="slide_btn_text_1" id="slide_btn_text_1"
								value="<?php if($wl_theme_options['slide_btn_text_1']!='') { echo esc_attr($wl_theme_options['slide_btn_text_1']); } ?>">
							<span class="explain"><?php  _e('Type Home Slide Image Button Text Here','weblizar');?></span>
							<h3><?php _e('Home Slide Image Button Link One','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text"
								name="slide_btn_link_1" id="slide_btn_link_1"
								value="<?php if($wl_theme_options['slide_btn_link_1']!='') { echo esc_attr($wl_theme_options['slide_btn_link_1']); } ?>">
							<span class="explain"><?php  _e('Type Home Slide Image Button Link Here','weblizar');?></span>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Home Slide 2 -->
		<div class="section">
			<div class="panel-group" id="accordion32">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"> <?php _e('Home Slide 2','weblizar'); ?>
					<a data-toggle="collapse" data-parent="#accordion"
								href="#collapse32"> <i
								class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>
							</a>
						</h4>
					</div>
					<div id="collapse32" class="panel-collapse collapse in">
						<div class="panel-body">
							<h3><?php _e('Home Slide Image Two','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text"
								value="<?php if($wl_theme_options['slide_image_2']!='') { echo esc_attr($wl_theme_options['slide_image_2']); } ?>"
								id="slide_image_2" name="slide_image_2" size="36"
								class="upload has-file" /> <input type="button"
								id="upload_button" value="Image 2" class="upload_image_button" />
							<span class="explain"><?php _e('Add Home Slide image here, size suggestion is 1400X570.','weblizar');?></span>	
			<?php if($wl_theme_options['slide_image_2']!='') { ?>
			<img style="height: 240px; width: 480px;"
								src="<?php if($wl_theme_options['slide_image_2']!='') { echo esc_attr($wl_theme_options['slide_image_2']); } ?>" />
			<?php } ?>
		
			<h3><?php _e('Home Slide Image Title Two','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="slide_title_2"
								id="slide_title_2"
								value="<?php if($wl_theme_options['slide_title_2']!='') { echo esc_attr($wl_theme_options['slide_title_2']); } ?>">
							<span class="explain"><?php  _e('Type Home Slide Image Title Here','weblizar');?></span>

							<h3><?php _e('Home Slide Image Description Two','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="slide_desc_2"
								id="slide_desc_2"
								value="<?php if($wl_theme_options['slide_desc_2']!='') { echo esc_attr($wl_theme_options['slide_desc_2']); } ?>">
							<span class="explain"><?php  _e('Type Home Slide Image Description Here','weblizar');?></span>

							<h3><?php _e('Home Slide Image Button Text Two','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text"
								name="slide_btn_text_2" id="slide_btn_text_2"
								value="<?php if($wl_theme_options['slide_btn_text_2']!='') { echo esc_attr($wl_theme_options['slide_btn_text_2']); } ?>">
							<span class="explain"><?php  _e('Type Home Slide Image Button Text Here','weblizar');?></span>

							<h3><?php _e('Home Slide Image Button Link Two','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text"
								name="slide_btn_link_2" id="slide_btn_link_2"
								value="<?php if($wl_theme_options['slide_btn_link_2']!='') { echo esc_attr($wl_theme_options['slide_btn_link_2']); } ?>">
							<span class="explain"><?php  _e('Type Home Slide Image Button Link Here','weblizar');?></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Slide 3 -->
		<div class="section">
			<div class="panel-group" id="accordion33">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"> <?php _e('Home Slide 3','weblizar'); ?>
					<a data-toggle="collapse" data-parent="#accordion"
								href="#collapse33"> <i
								class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>
							</a>
						</h4>
					</div>
					<div id="collapse33" class="panel-collapse collapse in">
						<div class="panel-body">
							<h3><?php _e('Home Slide Image Three','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text"
								value="<?php if($wl_theme_options['slide_image_3']!='') { echo esc_attr($wl_theme_options['slide_image_3']); } ?>"
								id="slide_image_3" name="slide_image_3" size="36"
								class="upload has-file" /> <input type="button"
								id="upload_button" value="Image 3" class="upload_image_button" />
							<span class="explain"><?php _e('Add Home Slide image here, size suggestion is 1400X570.','weblizar');?></span>	
			<?php if($wl_theme_options['slide_image_3']!='') { ?>
			<img style="height: 240px; width: 480px;"
								src="<?php if($wl_theme_options['slide_image_3']!='') { echo esc_attr($wl_theme_options['slide_image_3']); } ?>" />
			<?php } ?>
		
			<h3><?php _e('Home Slide Image Title Three','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="slide_title_3"
								id="slide_title_3"
								value="<?php if($wl_theme_options['slide_title_3']!='') { echo esc_attr($wl_theme_options['slide_title_3']); } ?>">
							<span class="explain"><?php  _e('Type Home Slide Image Title Here','weblizar');?></span>

							<h3><?php _e('Home Slide Image Description Three','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="slide_desc_3"
								id="slide_desc_3"
								value="<?php if($wl_theme_options['slide_desc_3']!='') { echo esc_attr($wl_theme_options['slide_desc_3']); } ?>">
							<span class="explain"><?php  _e('Type Home Slide Image Description Here','weblizar');?></span>

							<h3><?php _e('Home Slide Image Button Text Three','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text"
								name="slide_btn_text_3" id="slide_btn_text_3"
								value="<?php if($wl_theme_options['slide_btn_text_3']!='') { echo esc_attr($wl_theme_options['slide_btn_text_3']); } ?>">
							<span class="explain"><?php  _e('Type Home Slide Image Button Text Here','weblizar');?></span>

							<h3><?php _e('Home Slide Image Button Link Three','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text"
								name="slide_btn_link_3" id="slide_btn_link_3"
								value="<?php if($wl_theme_options['slide_btn_link_3']!='') { echo esc_attr($wl_theme_options['slide_btn_link_3']); } ?>">
							<span class="explain"><?php  _e('Type Home Slide Image Button Link Here','weblizar');?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<!---Save DATA -->

		<div id="button_section">
			<input type="hidden" value="1" id="weblizar_settings_save_home-image"
				name="weblizar_settings_save_home-image" />
				<!-- <input class="button"
				type="button" name="reset" value="Restore Defaults"
				onclick="weblizar_option_data_reset('home-image');"> --> 
				<input
				class="button button-primary" type="button" value="Save"
				onclick="weblizar_option_data_save('home-image')">
		</div>
	</form>
</div>

<!-------- Home site info and blog setting ------------>
<div class="block ui-tabs-panel deactive" id="option-portfolio-settings">
	<form method="post" id="weblizar_theme_options_portfolio-settings">
		<div id="heading">
			<table style="width: 100%;">
				<tr>
					<td cols=2><h2><?php _e('Portfolio Option','weblizar');?></h2></td>
					<td style="width: 30%;">
						<div class="weblizar_settings_loding"
							id="weblizar_loding_portfolio-settings_image"></div>
						<div class="weblizar_settings_massage"
							id="weblizar_settings_save_portfolio-settings_success"><?php _e('Options Data updated','weblizar');?></div>
						<div class="weblizar_settings_massage"
							id="weblizar_settings_save_portfolio-settings_reset"><?php _e('Options data Reset','weblizar');?></div>
					</td>
					<td style="text-align: right;">
					
					<input
						class="button button-primary" type="button" value="Save"
						onclick="weblizar_option_data_save('portfolio-settings')">
						
						</td>
				</tr>
			</table>
		</div>
		<div class="section">
			<h3><?php _e('Enable Portfolio on Home','weblizar'); ?></h3>
			<input type="checkbox"
				<?php if($wl_theme_options['portfolio_home']=='on') echo "checked='checked'"; ?>
				id="portfolio_home" name="portfolio_home"> <span class="explain"><?php _e('Enable Portfolio On Home.','weblizar');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Portfolio Section Heading','weblizar'); ?></h3>
			<input class="weblizar_inpute" type="text" name="port_heading"
				id="port_heading"
				value="<?php if($wl_theme_options['port_heading']!='') { echo esc_attr($wl_theme_options['port_heading']); } ?>">
			<span class="explain"><?php  _e('Type here your Portfolio heading','weblizar');?></span>
		</div>
		<div class="section">
			<div class="panel-group" id="accordion11">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"> <?php _e('Portfolio One','weblizar'); ?>
					<a data-toggle="collapse" data-parent="#accordion"
								href="#collapse11"> <i
								class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>
							</a>
					
					</div>
					<div id="collapse11" class="panel-collapse collapse in">
						<div class="panel-body">
							<h3><?php _e('Portfolio One Image','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text"
								value="<?php if($wl_theme_options['port_1_img']!='') { echo esc_attr($wl_theme_options['port_1_img']); } ?>"
								id="port_1_img" name="port_1_img" size="36"
								class="upload has-file" /> <input type="button"
								id="upload_button" value="Image1" class="upload_image_button" />
							<span class="explain"><?php _e('Add Portfolio image here, size suggestion is 570 X 350 px.','weblizar');?></span>	
			<?php if($wl_theme_options['port_1_img']!='') { ?>
			<img style="height: 240px; width: 480px;"
								src="<?php if($wl_theme_options['port_1_img']!='') { echo esc_attr($wl_theme_options['port_1_img']); } ?>" />
			<?php } ?>
			<h3><?php _e('Portfolio One Title','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="port_1_title"
								id="port_1_title"
								value="<?php if($wl_theme_options['port_1_title']!='') { echo esc_attr($wl_theme_options['port_1_title']); } ?>">
							<span class="explain"><?php  _e('Type title fro home portfolio one','weblizar');?></span>
							<h3><?php _e('Portfolio One Link','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="port_1_link"
								id="port_1_link"
								value="<?php if($wl_theme_options['port_1_link']!='') { echo esc_attr($wl_theme_options['port_1_link']); } ?>">
							<span class="explain"><?php  _e('Put link URL here','weblizar');?></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section">
			<div class="panel-group" id="accordion12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><?php _e('Portfolio Two','weblizar'); ?>
					<a data-toggle="collapse" data-parent="#accordion"
								href="#collapse12"> <i
								class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>
							</a>
					
					</div>
					<div id="collapse12" class="panel-collapse collapse in">
						<div class="panel-body">
							<h3><?php _e('Portfolio Two Image','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text"
								value="<?php if($wl_theme_options['port_2_img']!='') { echo esc_attr($wl_theme_options['port_2_img']); } ?>"
								id="port_2_img" name="port_2_img" size="36"
								class="upload has-file" /> <input type="button"
								id="upload_button" value="Image2" class="upload_image_button" />
							<span class="explain"><?php _e('Add Portfolio image here, size suggestion is 570 X 350 px.','weblizar');?></span>	
			<?php if($wl_theme_options['port_2_img']!='') { ?>
			<img style="height: 350px; width: 570px;"
								src="<?php if($wl_theme_options['port_2_img']!='') { echo esc_attr($wl_theme_options['port_2_img']); } ?>" />
			<?php } ?>
			<h3><?php _e('Portfolio Two Title','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="port_2_title"
								id="port_2_title"
								value="<?php if($wl_theme_options['port_2_title']!='') { echo esc_attr($wl_theme_options['port_2_title']); } ?>">
							<span class="explain"><?php  _e('Type title from home portfolio','weblizar');?></span>
							<h3><?php _e('Portfolio Two Link','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="port_2_link"
								id="port_2_link"
								value="<?php if($wl_theme_options['port_2_link']!='') { echo esc_attr($wl_theme_options['port_2_link']); } ?>">
							<span class="explain"><?php  _e('Put link URL here','weblizar');?></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section">
			<div class="panel-group" id="accordion13">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><?php _e('Portfolio Three','weblizar'); ?>
					<a data-toggle="collapse" data-parent="#accordion"
								href="#collapse13"> <i
								class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>
							</a>
					
					</div>
					<div id="collapse13" class="panel-collapse collapse in">
						<div class="panel-body">
							<h3><?php _e('Portfolio Three Image','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text"
								value="<?php if($wl_theme_options['port_3_img']!='') { echo esc_attr($wl_theme_options['port_3_img']); } ?>"
								id="port_3_img" name="port_3_img" size="36"
								class="upload has-file" /> <input type="button"
								id="upload_button" value="Image3" class="upload_image_button" />
							<span class="explain"><?php _e('Add Portfolio image here, size suggestion is 570 X 350 px.','weblizar');?></span>	
			<?php if($wl_theme_options['port_3_img']!='') { ?>
			<img style="height: 350px; width: 570px;"
								src="<?php if($wl_theme_options['port_3_img']!='') { echo esc_attr($wl_theme_options['port_3_img']); } ?>" />
			<?php } ?>
			<h3><?php _e('Portfolio Three Title','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="port_3_title"
								id="port_3_title"
								value="<?php if($wl_theme_options['port_3_title']!='') { echo esc_attr($wl_theme_options['port_3_title']); } ?>">
							<span class="explain"><?php  _e('Type title from home portfolio','weblizar');?></span>
							<h3><?php _e('Portfolio Three Link','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="port_3_link"
								id="port_3_link"
								value="<?php if($wl_theme_options['port_3_link']!='') { echo esc_attr($wl_theme_options['port_3_link']); } ?>">
							<span class="explain"><?php  _e('Put link URL here','weblizar');?></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section">
			<div class="panel-group" id="accordion14">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><?php _e('Portfolio Four','weblizar'); ?>
					<a data-toggle="collapse" data-parent="#accordion"
								href="#collapse14"> <i
								class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>
							</a>
					
					</div>
					<div id="collapse14" class="panel-collapse collapse in">
						<div class="panel-body">
							<h3><?php _e('Portfolio Four Image','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text"
								value="<?php if($wl_theme_options['port_4_img']!='') { echo esc_attr($wl_theme_options['port_4_img']); } ?>"
								id="port_4_img" name="port_4_img" size="36"
								class="upload has-file" /> <input type="button"
								id="upload_button" value="Image4" class="upload_image_button" />
							<span class="explain"><?php _e('Add Portfolio image here, size suggestion is 570 X 350 px.','weblizar');?></span>	
			<?php if($wl_theme_options['port_4_img']!='') { ?>
			<img style="height: 350px; width: 570px;"
								src="<?php if($wl_theme_options['port_4_img']!='') { echo esc_attr($wl_theme_options['port_4_img']); } ?>" />
			<?php } ?>
			<h3><?php _e('Portfolio Four Title','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="port_4_title"
								id="port_4_title"
								value="<?php if($wl_theme_options['port_4_title']!='') { echo esc_attr($wl_theme_options['port_4_title']); } ?>">
							<span class="explain"><?php  _e('Type title from home portfolio','weblizar');?></span>
							<h3><?php _e('Portfolio Four Link','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="port_4_link"
								id="port_4_link"
								value="<?php if($wl_theme_options['port_4_link']!='') { echo esc_attr($wl_theme_options['port_4_link']); } ?>">
							<span class="explain"><?php  _e('Put link URL here','weblizar');?></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section">
			<div class="panel-group" id="accordion2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion"
								href="#collapsethree">
					 <?php _e('Create Unlimited Portfolio','weblizar'); ?>
					</a> <a href="<?php echo $get_pro_url; ?>" target="_blank"
								class="btn btn-info  btn_upsell"><?php echo $get_pro; ?></a>
						</h4>
					</div>
					<div id="collapsethree" class="panel-collapse collapse in">
						<div class="panel-body">
							<span class="explain"><?php  _e('Add More Sections and More Features on your website.','weblizar'); ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="button_section">
			<input type="hidden" value="1"
				id="weblizar_settings_save_portfolio-settings"
				name="weblizar_settings_save_portfolio-settings" />
				<!-- <input
				class="button" type="button" name="reset" value="Restore Defaults"
				onclick="weblizar_option_data_reset('portfolio-settings');">
				  --> <input
				class="button button-primary" type="button" value="Save"
				onclick="weblizar_option_data_save('portfolio-settings')">
		</div>
	</form>
</div>

<!--------------- service settings ------------>
<div class="block ui-tabs-panel deactive" id="option-home-service">
	<form method="post" id="weblizar_theme_options_home-service">
		<div id="heading">
			<table style="width: 100%;">
				<tr>
					<td cols=2><h2><?php _e('Service Settings','weblizar');?></h2></td>
					<td style="width: 30%;">
						<div class="weblizar_settings_loding"
							id="weblizar_loding_home-service_image"></div>
						<div class="weblizar_settings_massage"
							id="weblizar_settings_save_home-service_success"><?php _e('Options Data updated','weblizar');?></div>
						<div class="weblizar_settings_massage"
							id="weblizar_settings_save_home-service_reset"><?php _e('Options data Reset','weblizar');?></div>
					</td>
					<td style="text-align: right;">
					<input
						class="button button-primary" type="button" value="Save"
						onclick="weblizar_option_data_save('home-service')"></td>
				</tr>
			</table>
		</div>
		<div class="section">
			<h3><?php _e('Service Section Heading','weblizar'); ?></h3>
			<input class="weblizar_inpute" type="text"
				name="home_service_heading" id="home_service_heading"
				value="<?php if($wl_theme_options['home_service_heading']!='') { echo esc_attr($wl_theme_options['home_service_heading']); } ?>">
			<span class="explain"><?php  _e('Type here your service heading','weblizar');?></span>
		</div>
		<div class="section">
			<div class="panel-group" id="accordion21">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
			<?php _e('Service one','weblizar'); ?><a data-toggle="collapse"
								data-parent="#accordion" href="#collapse21"><i
								class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>
							</a>
						</h4>
					</div>
					<div id="collapse21" class="panel-collapse collapse in">
						<div class="panel-body">
							<hr>
							<h3><?php _e('Service Title','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="service_1_title"
								id="service_1_title"
								value="<?php if($wl_theme_options['service_1_title']!='') { echo esc_attr($wl_theme_options['service_1_title']); } ?>">
							<span class="explain"><?php  _e('Type here your service title','weblizar');?></span>
							<h3><?php _e('Service  Icons','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="service_1_icons"
								id="service_1_icons"
								value="<?php if($wl_theme_options['service_1_icons']!='') { echo esc_attr($wl_theme_options['service_1_icons']); } ?>">
							<br> <span class="explain"><?php  _e('Service Icon (Using Bootstrap icons name) like: icon-tablet','weblizar');?> <a
								href="http://fortawesome.github.io/Font-Awesome/3.2.1/icons/"
								target="_blank"> <?php _e('Get your Font Awesome icons','weblizar'); ?>.</a>
							</span>
							<h3><?php _e('Service Description','weblizar'); ?></h3>
							<textarea rows="8" cols="8" id="service_1_text"
								name="service_1_text"><?php if($wl_theme_options['service_1_text']!='') { echo esc_attr($wl_theme_options['service_1_text']); } ?></textarea>
							<div class="explain"><?php _e('Type here your service description.','weblizar'); ?><br>
							</div>
							<h3><?php _e('Service  Link','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="service_1_link"
								id="service_1_link"
								value="<?php if($wl_theme_options['service_1_link']!='') { echo esc_attr($wl_theme_options['service_1_link']); } ?>">
							<span class="explain"><?php  _e('Type here your service link','weblizar');?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section">
			<div class="panel-group" id="accordion22">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><?php _e('Service Two','weblizar'); ?><a
								data-toggle="collapse" data-parent="#accordion"
								href="#collapse22"> <i
								class="indicator glyphicon glyphicon-chevron-down  pull-right"></i></a>
						</h4>
					</div>
					<div id="collapse22" class="panel-collapse collapse in">
						<div class="panel-body">
							<hr>
							<h3><?php _e('Service Title','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="service_2_title"
								id="service_2_title"
								value="<?php if($wl_theme_options['service_2_title']!='') { echo esc_attr($wl_theme_options['service_2_title']); } ?>">
							<span class="explain"><?php  _e('Type here your service title','weblizar');?></span>
							<h3><?php _e('Service  Icons','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="service_2_icons"
								id="service_2_icons"
								value="<?php if($wl_theme_options['service_2_icons']!='') { echo esc_attr($wl_theme_options['service_2_icons']); } ?>">
							<br> <span class="explain"><?php  _e('Service Icon (Using Bootstrap icons name) like: icon-tablet','weblizar');?> <a
								href="http://fortawesome.github.io/Font-Awesome/3.2.1/icons/"
								target="_blank"> <?php _e('Get your Font Awesome icons','weblizar'); ?>.</a>
							</span>
							<h3><?php _e('Service Description','weblizar'); ?></h3>
							<textarea rows="8" cols="8" id="service_2_text"
								name="service_2_text"><?php if($wl_theme_options['service_2_text']!='') { echo esc_attr($wl_theme_options['service_2_text']); } ?></textarea>
							<div class="explain"><?php _e('Type here your service description.','weblizar'); ?><br>
							</div>
							<h3><?php _e('Service  Link','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="service_2_link"
								id="service_2_link"
								value="<?php if($wl_theme_options['service_2_link']!='') { echo esc_attr($wl_theme_options['service_2_link']); } ?>">
							<span class="explain"><?php  _e('Type here your service link','weblizar');?></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section">
			<div class="panel-group" id="accordion22">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><?php _e('Service Three','weblizar'); ?>
				<a data-toggle="collapse" data-parent="#accordion"
								href="#collapse23"><i
								class="indicator glyphicon glyphicon-chevron-down  pull-right"></i></a>
						</h4>
					</div>
					<div id="collapse23" class="panel-collapse collapse in">
						<div class="panel-body">
							<hr>
							<h3><?php _e('Service Title','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="service_3_title"
								id="service_3_title"
								value="<?php if($wl_theme_options['service_3_title']!='') { echo esc_attr($wl_theme_options['service_3_title']); } ?>">
							<span class="explain"><?php  _e('Type here your service title','weblizar');?></span>
							<h3><?php _e('Service  Icons','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="service_3_icons"
								id="service_3_icons"
								value="<?php if($wl_theme_options['service_3_icons']!='') { echo esc_attr($wl_theme_options['service_3_icons']); } ?>">
							<br> <span class="explain"><?php  _e('Service Icon (Using Bootstrap icons name) like: icon-tablet','weblizar');?> <a
								href="http://fortawesome.github.io/Font-Awesome/3.2.1/icons/"
								target="_blank"> <?php _e('Get your Font Awesome icons','weblizar'); ?>.</a>
							</span>
							<h3><?php _e('Service Description','weblizar'); ?></h3>
							<textarea rows="8" cols="8" id="service_3_text"
								name="service_3_text"><?php if($wl_theme_options['service_3_text']!='') { echo esc_attr($wl_theme_options['service_3_text']); } ?></textarea>
							<div class="explain"><?php _e('Type here your service description.','weblizar'); ?><br>
							</div>
							<h3><?php _e('Service  Link','weblizar'); ?></h3>
							<input class="weblizar_inpute" type="text" name="service_3_link"
								id="service_3_link"
								value="<?php if($wl_theme_options['service_3_link']!='') { echo esc_attr($wl_theme_options['service_3_link']); } ?>">
							<span class="explain"><?php  _e('Type here your service link','weblizar');?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="button_section">
			<input type="hidden" value="1"
				id="weblizar_settings_save_home-service"
				name="weblizar_settings_save_home-service" />
				<!-- <input class="button"
				type="button" name="reset" value="Restore Defaults"
				onclick="weblizar_option_data_reset('home-service');">
				 --> <input
				class="button button-primary" type="button" value="Save"
				onclick="weblizar_option_data_save('home-service')">
			<!--  alert massage when data saved and reset -->
		</div>
	</form>
</div>

<!-------- Social media link settings ----------->
<!-- 
<div class="block ui-tabs-panel deactive" id="option-social">
	<form method="post" id="weblizar_theme_options_social">
		<div id="heading">
			<table style="width: 100%;">
				<tr>
					<td><h2><?php _e('Social media','weblizar');?></h2></td>
					<td style="width: 30%;">
						<div class="weblizar_settings_loding"
							id="weblizar_loding_social_image"></div>
						<div class="weblizar_settings_massage"
							id="weblizar_settings_save_social_success"><?php _e('Options Data updated','weblizar');?></div>
						<div class="weblizar_settings_massage"
							id="weblizar_settings_save_social_reset"><?php _e('Options data Reset','weblizar');?></div>
					</td>
					<td style="text-align: right;">
					
						 <input
						class="button button-primary" type="button" value="Save"
						onclick="weblizar_option_data_save('social')"></td>
				</tr>
			</table>
		</div>
		<div class="section">
			<h3><?php _e('Enable Social media:','weblizar'); ?>  </h3>
			<input type="checkbox"
				<?php if($wl_theme_options['header_social_media_in_enabled']=='on') echo "checked='checked'"; ?>
				id="header_social_media_in_enabled"
				name="header_social_media_in_enabled"> <span class="explain"><?php _e('Enable social media Header Section.','weblizar'); ?></span>
			<input type="checkbox"
				<?php if($wl_theme_options['footer_section_social_media_enbled']=='on') echo "checked='checked'"; ?>
				id="footer_section_social_media_enbled"
				name="footer_section_social_media_enbled"> <span class="explain"><?php _e('Enable Social media in Footer section.','weblizar'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('E-mail:','weblizar');?></h3>
			<input class="weblizar_inpute" type="text" name="email_id"
				id="email_id"
				value="<?php if($wl_theme_options['email_id']!='') { echo esc_attr($wl_theme_options['email_id']); } ?>">
			<span class="explain"><?php  _e('Enter Email Id.','weblizar');?></span>
			<h3><?php _e('Contact Number:','weblizar');?></h3>
			<input class="weblizar_inpute" type="text" name="phone_no"
				id="phone_no"
				value="<?php if($wl_theme_options['phone_no']!='') { echo esc_attr($wl_theme_options['phone_no']); } ?>">
			<span class="explain"><?php  _e('Enter Contact Number.','weblizar');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Twitter Link:','weblizar');?></h3>
			<input class="weblizar_inpute" type="text" name="twitter_link"
				id="twitter_link"
				value="<?php if($wl_theme_options['twitter_link']!='') { echo esc_attr($wl_theme_options['twitter_link']); } ?>">
			<span class="explain"><?php  _e('Enter twitter link.','weblizar');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Linkedin Links:','weblizar');?></h3>
			<input class="weblizar_inpute" type="text" name="linkedin_link"
				id="linkedin_link"
				value="<?php if($wl_theme_options['linkedin_link']!='') { echo esc_attr($wl_theme_options['linkedin_link']); } ?>">
			<span class="explain"><?php  _e('Enter linkedin link.','weblizar');?></span>
		</div>

		<div class="section">
			<h3><?php _e('Facebook Links:','weblizar');?></h3>
			<input class="weblizar_inpute" type="text" name="fb_link"
				id="fb_link"
				value="<?php if($wl_theme_options['fb_link']!='') { echo esc_attr($wl_theme_options['fb_link']); } ?>">
			<span class="explain"><?php  _e('Enter facebook link.','weblizar');?></span>
		</div>

		<div class="section">
			<h3><?php _e('Youtube Links:','weblizar');?></h3>
			<input class="weblizar_inpute" type="text" name="youtube_link"
				id="youtube_link"
				value="<?php if($wl_theme_options['youtube_link']!='') { echo esc_attr($wl_theme_options['youtube_link']); } ?>">
			<span class="explain"><?php  _e('Enter google plus link.','weblizar');?></span>
		</div>
		<div id="button_section">
			<input type="hidden" value="1" id="weblizar_settings_save_social"
				name="weblizar_settings_save_social" />
				
				<input
				class="button button-primary" type="button" value="Save"
				onclick="weblizar_option_data_save('social')">
		</div>
	</form>
</div>
 -->
<!---------------- footer customization Settings form ------------------------>
<div class="block ui-tabs-panel deactive" id="option-footer">
	<form method="post" id="weblizar_theme_options_footer">
		<div id="heading">
			<table style="width: 100%;">
				<tr>
					<td cols=2><h2><?php _e('Footer Customization','weblizar');?></h2></td>
					<td style="width: 30%;">
						<div class="weblizar_settings_loding"
							id="weblizar_loding_footer_image"></div>
						<div class="weblizar_settings_massage"
							id="weblizar_settings_save_footer_success"><?php _e('Options Data updated','weblizar');?></div>
						<div class="weblizar_settings_massage"
							id="weblizar_settings_save_footer_reset"><?php _e('Options data Reset','weblizar');?></div>
					</td>
					<td style="text-align: right;">
					<!--<input class="button" type="button"
						name="reset" value="Restore Defaults"
						onclick="weblizar_option_data_reset('footer');">  -->
						 <input
						class="button button-primary" type="button" value="Save"
						onclick="weblizar_option_data_save('footer')"></td>
				</tr>
			</table>
		</div>
		<div class="section">
			<h3><?php _e('Footer customization','weblizar'); ?></h3>
			<input class="weblizar_inpute" type="text"
				name="footer_customizations" id="footer_customizations"
				value="<?php if($wl_theme_options['footer_customizations']!='') { echo esc_attr($wl_theme_options['footer_customizations']); } ?>">
			<span class="explain"><?php  _e('Enter your footer customization text ','weblizar');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Developed by text','weblizar'); ?></h3>
			<input class="weblizar_inpute" type="text" name="developed_by_text"
				id="developed_by_text"
				value="<?php if($wl_theme_options['developed_by_text']!='') { echo esc_attr($wl_theme_options['developed_by_text']); } ?>">
			<span class="explain"><?php  _e('Enter developed by text','weblizar');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Developed by link text','weblizar'); ?></h3>
			<input class="weblizar_inpute" type="text"
				name="developed_by_weblizar_text" id="developed_by_weblizar_text"
				value="<?php if($wl_theme_options['developed_by_weblizar_text']!='') { echo esc_attr($wl_theme_options['developed_by_weblizar_text']); } ?>">
			<span class="explain"><?php  _e('Enter developed by link text  ','weblizar');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Developed by link','weblizar'); ?></h3>
			<input class="weblizar_inpute" type="text" name="developed_by_link"
				id="developed_by_link"
				value="<?php if($wl_theme_options['developed_by_link']!='') { echo esc_attr($wl_theme_options['developed_by_link']); } ?>">
			<span class="explain"><?php  _e('Enter developed by link','weblizar');?></span>
		</div>
		<div id="button_section">
			<input type="hidden" value="1" id="weblizar_settings_save_footer"
				name="weblizar_settings_save_footer" />
				
				 <input
				class="button button-primary" type="button" value="Save"
				onclick="weblizar_option_data_save('footer')">
		</div>
	</form>
</div>

<!---------------- footer Call Out Settings form ------------------------>
<div class="block ui-tabs-panel deactive" id="option-footercall">
	<form method="post" id="weblizar_theme_options_footercall">
		<div id="heading">
			<table style="width: 100%;">
				<tr>
					<td cols=2><h2><?php _e('Footer Call Out','weblizar');?></h2></td>
					<td style="width: 30%;">
						<div class="weblizar_settings_loding"
							id="weblizar_loding_footercall_image"></div>
						<div class="weblizar_settings_massage"
							id="weblizar_settings_save_footercall_success"><?php _e('Options Data updated','weblizar');?></div>
						<div class="weblizar_settings_massage"
							id="weblizar_settings_save_footercall_reset"><?php _e('Options data Reset','weblizar');?></div>
					</td>
					<td style="text-align: right;"><!-- <input class="button" type="button"
						name="reset" value="Restore Defaults"
						onclick="weblizar_option_data_reset('footercall');">
						 --> <input
						class="button button-primary" type="button" value="Save"
						onclick="weblizar_option_data_save('footercall')"></td>
				</tr>
			</table>
		</div>
		<div class="section">
			<h3><?php _e('Footer Call Out Tagline','weblizar'); ?></h3>
			<input class="weblizar_inpute" type="text" name="fc_title"
				id="fc_title"
				value="<?php if($wl_theme_options['fc_title']!='') { echo esc_attr($wl_theme_options['fc_title']); } ?>">
			<span class="explain"><?php  _e('Footer Call Out Tagline','weblizar');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Button Text','weblizar'); ?></h3>
			<input class="weblizar_inpute" type="text" name="fc_btn_txt"
				id="fc_btn_txt"
				value="<?php if($wl_theme_options['fc_btn_txt']!='') { echo esc_attr($wl_theme_options['fc_btn_txt']); } ?>">
			<span class="explain"><?php  _e('Enter Button text  ','weblizar');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Button link','weblizar'); ?></h3>
			<input class="weblizar_inpute" type="text" name="fc_btn_link"
				id="fc_btn_link"
				value="<?php if($wl_theme_options['fc_btn_link']!='') { echo esc_attr($wl_theme_options['fc_btn_link']); } ?>">
			<span class="explain"><?php  _e('Button link','weblizar');?></span>
		</div>
		<div id="button_section">
			<input type="hidden" value="1" id="weblizar_settings_save_footercall"
				name="weblizar_settings_save_footercall" />
				
				<input
				class="button button-primary" type="button" value="Save"
				onclick="weblizar_option_data_save('footercall')">
		</div>
	</form>
</div>
<!---------------- footer customization Settings form ------------------------>
