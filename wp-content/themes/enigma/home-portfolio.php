<!-- portfolio section -->
<?php $wl_theme_options = weblizar_get_options(); ?>
<div class="enigma_project_section" style="background-color:#ECF0F1">
<?php if($wl_theme_options['port_heading'] !='') { ?>
	<div class="container" id="<?php echo esc_attr($wl_theme_options['portfolio_tag']); ?>">
		<div class="row">
			<div class="col-sm-12">
				<div class="enigma_heading_title">
					<h3><?php echo esc_attr($wl_theme_options['port_heading']); ?></h3>
				</div>
			</div>
		</div>
	</div>
<?php } ?>	

<div  class="container" style="text-align: center; margin:auto ">
	<div  class="row" style="text-align:center; margin:auto ">
		<DIV class="col-lg-4  col-md-4 col-md-offset-2 col-sm-6 "  >
		<font>
		<textarea rows="8" cols="10" class="enigma_con_textarea_control" 
			style="height:300px;"  disabled="disabled">
			流程:
	1  主题演讲：互联网时代的影视行业变革
	2  创作者作品展示，分享创作经验
	3  互相沟通交流，寻找合作机会
	4  项目推广：《一步之遥》《1分钟影像大赛》《闪铃》《陪你看电影》
	5  分享介绍闪铃内容制作平台
	6  现场进行闪铃制作，为参与者制定个人闪铃
	7  抽奖活动（一步之遥电影票，红酒）	
		
		</textarea></font>
		<DIV  style="padding: 0px 0px 15px;"></DIV>
	</div>
	<DIV class="col-lg-4 col-md-4 col-sm-6 " ><a href="#zunhuisuo" data-toggle="tooltip" data-placement="auto" title="樽会所" >
				<IMG class="enigma_img_responsive"  name="zunhuisuo" style=" width:100%; height:300px;" alt="樽会所"
		 src="<?php echo esc_attr($wl_theme_options['place']); ?>"/></a>
		</div>
	</div>
	</div>
</div>

<!-- 日历部分
<div id="arrangement" style="height: 400;width:600; ">
<?php //if (  is_single() || is_home() ) : ?>
	<li>
		<div class="widget calendar">
		<?php //get_calendar(); ?>
		</div>
	</li>
<?php //endif; ?>
</div>
 -->
	

<DIV class="enigma_project_section"  style="background-color:#FFFFFF">
	<div class="container">
		<DIV class="row">
	<DIV class="col-sm-12">
		<DIV class="enigma_heading_title">
		<H3>与会嘉宾</H3></DIV></DIV></DIV></DIV>
		<DIV class="container">
	<DIV class="row">
			<div id="enigma_portfolio_section" class="enima_photo_gallery">
			<?php
			
			$strsql="select * from wp_guests ";
			$result=$wpdb->get_results($strsql);
			
			$row = current($result);	//get first row
			
			while($row)
 			 {

	 			 echo "<DIV  class='col-lg-3 col-md-3 col-sm-6 pull-left scrollimation fade-right d1'>";
	 			 echo "<DIV  class='img-wrapper'>";
	 			 echo "<DIV   class='enigma_home_portfolio_showcase'><IMG class='enigma_img_responsive' alt='MOVIE 2.0' src='".$row->photo."' style='height:218px;' >";
	  			 echo "<DIV class='enigma_home_portfolio_showcase_overlay'>";
	 			 echo "<DIV class='enigma_home_portfolio_showcase_overlay_inner '>";
	 			 echo "<div class='detail'>";
	 			 echo "<div class='info'><p style='font-size:120%;font-family:'新宋体''><font color='#FFFFFF' >".$row->description."</font></p></div></div>";
	  
	 			 echo "</DIV></DIV></DIV>";
				 echo "<DIV style='height:80px' class='enigma_home_portfolio_caption'>";
				 echo "<H3><A href='#'>".$row->name."</A></H3><h5>".$row->title."</h5>";
				 echo "</DIV></DIV>";
				 echo "</DIV>";
			 	$row = next($result);
			};
			?>
				</DIV>
			</DIV>
		</DIV>
	</DIV>
			
<!-- /portfolio section -->