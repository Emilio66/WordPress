<!-- enigma Callout Section -->
<?php $wl_theme_options = weblizar_get_options(); ?>
<!-- Footer Widget Secton -->
<div class="enigma_footer_widget_area" style="text-align:center"  align="center"
 id="<?php echo esc_attr($wl_theme_options['partner_tag']); ?>">
	<div class="container" style="margin-left:auto; margin-right:auto" align="center" >	
		<div class="col-lg-3 col-md-3 col-sm-6 pull-left scrollimation fade-right d1 in" style="width:120px" >
		<table  style="border:0;">
			<tbody><tr>
				<td style="border:0"><img class='enigma_img_responsive' style="width:100%" alt="闪铃" src="<?php echo esc_attr($wl_theme_options['shining']);?>"></td>
				</TR></TBODY>
		</TABLE>
		</DIV>
	<DIV class="col-lg-3 col-md-3 col-sm-6 pull-left scrollimation fade-right d1 in" style="width:120px">
		<TABLE style="border: 0px currentColor;"><TBODY>
  			<TR> 
				<td style="border:0"><img class='enigma_img_responsive' alt="红头帮" style="width:100%" src="<?php echo esc_attr($wl_theme_options['hongtou']);?>"></td>
				</TR></TBODY>
		</TABLE>
	</DIV>
	<DIV class="col-lg-3 col-md-3 col-sm-6 pull-left scrollimation fade-right d1 in" style="width:120px">
		<TABLE style="border: 0px currentColor;"><TBODY>
  			<TR> 
				<td style="border:0"><img class='enigma_img_responsive' alt="5TV" style="width:100%" src="<?php echo esc_attr($wl_theme_options['tv5']);?>"></td>
				</tr>
			</tbody>
		</table>
	 </div>
	 
	 <div class="col-lg-3 col-md-3 col-sm-6 pull-left scrollimation fade-right d1 in"  style="width:120px">
		<table  style="border:0;">
			<tbody><tr>
				<td style="border:0"><img class='enigma_img_responsive' alt="蓝色光标" style="width:100%" src="<?php echo esc_attr($wl_theme_options['blueFocus']);?>"></td>
				</TR></TBODY>
		</TABLE>
	</DIV>
	<DIV class="col-lg-3 col-md-3 col-sm-6 pull-left scrollimation fade-right d1 in" style="width:120px">
		<TABLE style="border: 0px currentColor;"><TBODY>
  			<TR> 
				<td style="border:0"><img class='enigma_img_responsive' alt="驼帮" style="width:100%" src="<?php echo esc_attr($wl_theme_options['tuobang']);?>"></td>
				</TR></TBODY>
		</TABLE>
	</DIV>
	<DIV class="col-lg-3 col-md-3 col-sm-6 pull-left scrollimation fade-right d1 in" style="width:120px">
		<TABLE style="border: 0px currentColor;"><TBODY>
  			<TR> 
				<td style="border:0"><img class='enigma_img_responsive' alt="酷派" style="width:100%" src="<?php echo esc_attr($wl_theme_options['coolpad']);?>"></td>
				</tr>
			</tbody>
		</table>
	 </div>
	 	
	 	<div class="col-lg-3 col-md-3 col-sm-6 pull-left scrollimation fade-right d1 in" style="width:120px" >
		<table  style="border:0;">
			<tbody><tr>
				<td style="border:0"><img class='enigma_img_responsive' alt="格瓦拉" style="width:100%" src="<?php echo esc_attr($wl_theme_options['gewara']);?>"></td>			
				</TR></TBODY>
		</TABLE>
	</DIV>
	<DIV class="col-lg-3 col-md-3 col-sm-6 pull-left scrollimation fade-right d1 in" style="width:120px">
		<TABLE style="border: 0px currentColor;"><TBODY>
  			<TR> 
				<td style="border:0"><img class='enigma_img_responsive' alt="樽会所" style="width:100%" src="<?php echo esc_attr($wl_theme_options['zunhuisuo']);?>"></td>
				</TR></TBODY>
		</TABLE>
	</DIV>
	<DIV class="col-lg-3 col-md-3 col-sm-6 pull-left scrollimation fade-right d1 in" style="width:120px">
		<TABLE style="border: 0px currentColor;"><TBODY>
  			<TR> 
				<td style="border:0"><img class='enigma_img_responsive' alt="陪你看电影" style="width:100%" src="<?php echo esc_attr($wl_theme_options['movie']);?>"></td>
				<!-- <td><img class='enigma_img_responsive' alt="时光网" src="<?php echo esc_attr($wl_theme_options['Mtime']);?>"></td> -->
				</tr>
			</tbody>
		</table>
	 </div>
	</div>
	<div class="container">
		<div class="row">
			<?php
			if (is_active_sidebar ( 'footer-widget-area' )) {
				dynamic_sidebar ( 'footer-widget-area' );
			} else {
				$args = array (
						'before_widget' => '<div class="col-md-3 col-sm-6 enigma_footer_widget_column">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="enigma_footer_widget_title">',
						'after_title' => '<div id="" class="enigma-footer-separator"></div></h3>' 
				);
				the_widget ( 'WP_Widget_Pages', null, $args );
			}
			?>
		</div>
	</div>


</div>

<div class="enigma_footer_area">
	<div class="container">
		<div class="col-md-12">
			<p class="enigma_footer_copyright_info">
			<?php
			
if ($wl_theme_options ['footer_customizations']) {
				echo esc_attr ( $wl_theme_options ['footer_customizations'] );
			}
			if ($wl_theme_options ['developed_by_text']) {
				echo "|" . esc_attr ( $wl_theme_options ['developed_by_text'] );
			}
			?>
			<a target="_blank" rel="nofollow"
					href="<?php if($wl_theme_options['developed_by_link']) {
						echo esc_url($wl_theme_options['developed_by_link']); } ?>">
						<?php if($wl_theme_options['developed_by_weblizar_text']) { 
							echo esc_attr($wl_theme_options['developed_by_weblizar_text']); } ?>
			</a>
			</p>
			
			
			</div>
	</div>		
		<?php if($wl_theme_options['custom_css']) ?>
		<style type="text/css">
<?php 	{
			echo esc_attr ( $wl_theme_options ['custom_css'] );
		}
		?>
</style>
</div>
<!-- /Footer Widget Secton -->
</div>
<a href="#" title="Go Top" class="enigma_scrollup"
	style="display: inline;"><i class="fa fa-chevron-up"></i></a>
<?php
wp_footer(); ?>
</body>
</html>