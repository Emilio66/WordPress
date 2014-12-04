<!-- service section -->
<?php $wl_theme_options = weblizar_get_options(); ?>
<div class="enigma_service" id="<?php echo esc_attr($wl_theme_options['home_service_tag']); ?>">
<br>
<?php if($wl_theme_options['home_service_heading'] !='') { ?>
<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="enigma_heading_title">
					<h3><?php echo esc_attr($wl_theme_options['home_service_heading']); ?></h3>
				</div>
			</div>
		</div>
	</div>	
<?php } ?>
<div class="container">
		<div class="row isotope" id="isotope-service-container">		
			<?php for($i=1; $i<4; $i++ ) { ?>
			<div class=" col-md-4 service">
				<div
					class="enigma_service_area appear-animation bounceIn appear-animation-visible">
					<?php if($wl_theme_options['service_'.$i.'_icons'] !='') { ?><div
						class="enigma_service_iocn pull-left">
						<i
							class="<?php echo $wl_theme_options['service_'.$i.'_icons']; ?>"></i>
					</div><?php } ?> 
					<div class="enigma_service_detail media-body">
						<?php if($wl_theme_options['service_'.$i.'_title'] !='') { ?><h3>
							<a
								href="<?php echo $wl_theme_options['service_'.$i.'_link']; ?>"><?php echo $wl_theme_options['service_'.$i.'_title']; ?></a>
						</h3><?php } ?>
						<?php if($wl_theme_options['service_'.$i.'_text'] !='') { ?><p style=" text-align:left"><?php echo $wl_theme_options['service_'.$i.'_text']; ?></p><?php } ?>
					</div>
				</div>
			</div>
			<?php } ?>	
		</div>
	</div>
</div>
<!-- /Service section -->