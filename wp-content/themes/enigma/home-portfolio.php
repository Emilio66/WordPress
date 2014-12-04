<!-- portfolio section -->
<?php $wl_theme_options = weblizar_get_options(); ?>
<div class="enigma_project_section" style="background-color:#ECF0F1"
 id="<?php echo esc_attr($wl_theme_options['portfolio_tag']); ?>">

	<div class="container" >
		<div class="row">
			<div class="col-sm-12">
				<div class="enigma_heading_title">
					<h3><?php echo esc_attr($wl_theme_options['port_heading']); ?></h3>
				</div>
			</div>
		</div>
	</div>

<div  class="container" style="text-align: center; margin:auto ">
	<div  class="row" style="text-align:center; margin:auto ">
		<DIV class='col-lg-6  col-md-6  col-sm-6 ' style='overflow-x: auto; overflow-y: auto; height:350px;' >
		<font>
		<div style='background-color:#ECF0F1;width:100%;text-align:left;line-height:30px' >
<?php 
	$sql = 'select * from wp_activity order by isPrimary desc,startTime';
	$activity = $wpdb->get_results($sql);
	
	$row = current($activity);
	$place =$row->place;
	$substro = substr($row->startTime,0,16);
	
	echo "<font size='3'>&nbsp;&nbsp;&nbsp;主题:&nbsp;&nbsp;".$row->theme."</font>";
	echo "<br>";
	echo "<font size='3'>&nbsp;&nbsp;&nbsp;日期:&nbsp;&nbsp;".$substro."</font>";
	echo "<br>";
	echo "<font size='3'>&nbsp;&nbsp;&nbsp;地点:&nbsp;&nbsp;".$place."</font>";
	echo "<br>";	
	echo "</div>";

	echo "<table style='background-color:#ECF0F1'>";
	
	while(($row =next($activity))){
			echo "<tr>";
			$substro = substr($row->startTime,11,5);
			
			echo "<td  style='width:15%'><font size='2'><span>".$substro."</font></td>";
			echo "<td style='width:65%'><font size='2'><span><b>".$row->theme."</b></font></td>";	
			echo "<td style='width:20%'><font size='2'><span>".$row->speaker."</font></td>";
			
			echo "</tr>";
		}
		
	echo "</table>";
	
?>	
		
		</font>
		<DIV  style="padding: 0px 0px 15px;"></DIV>
	</div>
	<DIV class="col-lg-5 col-md-5 col-md-offset-1 col-sm-6 " ><a href="#zunhuisuo" data-toggle="tooltip" data-placement="auto" title="<?php echo $place ?>" >
		<IMG class="enigma_img_responsive"  name="zunhuisuo" style=" width:100%; height:300px;" alt="<?php echo $place ?>"
		 src="<?php echo get_option('activityMap'); ?>"/></a>
		</div>
	</div>
	</div>
</div>

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

	 			 echo "<DIV  class='col-lg-3 col-md-3 col-sm-6 pull-left scrollimation fade-right d1 in'>";
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