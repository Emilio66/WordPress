<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/WordPress/wp-load.php');
function display_activity_page(){

	//加载上传图片的js(wp自带)
	wp_enqueue_script('thickbox');
	//加载css(wp自带)
	wp_enqueue_style('thickbox');
		
	$sql = 'select * from wp_activity order by isPrimary desc,startTime';
	
	if(isset($wpdb))
		$activity = $wpdb->get_results($sql);	
	else{
			$wpdb= new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
			$results = $wpdb->get_results($sql);	
	}
	
	$activity = current($results);

?>


<link rel="stylesheet" id="bootstrap-css" href="/wordpress/wp-content/themes/enigma/css/bootstrap.css?ver=4.0"
	 type="text/css" media="all">

<link rel="stylesheet" href="/wordpress/wp-content/themes/enigma/css/themes/default.css" id="theme_base">
<link rel="stylesheet" href="/wordpress/wp-content/themes/enigma/css/themes/default.date.css" id="theme_date">
<link rel="stylesheet" href="/wordpress/wp-content/themes/enigma/css/themes/default.time.css" id="theme_time">

<script src="/wordpress/wp-content/themes/enigma/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/wordpress/wp-content/themes/enigma/js/scroll.js"></script>
<script type="text/javascript" src="/wordpress/wp-content/themes/enigma/js/bootstrap.min.js?ver=4.0"></script>

<DIV class="container" style="margin-top: 10px;margin-left:50px">
<h3>大会安排更新</h3>
<hr>
<form id='activityForm' method="post">
	
	<DIV class="col-lg-6  col-md-6 col-md-offset-3 col-sm-6 "  style="margin-top: 10px;margin-left:50px">
	  
	 <table >
	  <tr>
		<th style='width:45%;'><font size='+1'><span>大会主题</span></font></th>
		<th style='width:5%;' text-align: 'center' colspan='2'><font size='+1'><span>开始时间</span></font></th>
		<th style='width:45%;'><font size='+1'><span>地点</span></font></th>
	<!--  	<th style='width:5%;'><font size='+1'><span>预估时长(小时)</span></font></th>-->
	  </tr>
	  <tr >
	 	<td style='width:45%'><input class="Cont" name="theme" id='meetingTheme'
	 	 	value='<?php echo $activity->theme;?>' onblur="checkTheme(this)"/></td>
	 	 	
  		<td style='width:5%'><input class="Cont datepicker" id='startYear' name='year'
  			 value='<?php echo substr($activity->startTime,0,10);?>'/></td>
  		<td style='width:5%'><input class="Cont timepicker" id="startClock" name='clock'
  			 value='<?php echo substr($activity->startTime,11,5);?>'/></td>
  		
  		<td style='width:40%'><input class="Cont" name="place" id='place' value='<?php echo $activity->place;?>'/></td>
  	<!-- <td style='width:5%'><input id='duration' class="Cont" name="duration" onblur='checkDur(this)'
  			 value='<?php //echo $activity->duration;?>'/></td> 	  	 -->	
 	  </tr>	  
	 </table>

	  <!-- 位置图片上传部分 -->
	  <div style="margin-bottom: 20px;margin-top:20px;">
	    <label for="activityMap"  style="width: 17%;float:left">上传地图：</label>
	    <input type="text" id="activityMap" name="activityMap" size="36" value='<?php echo get_option('activityMap');?>'
	    	class="upload has-file" /> 
			<input type="button" id="upload_button"
				value="上传" class="upload_image_button button" />
			 
				<img alt='地图预览' style="width:100px;height: 70px;margin-top:30px;margin-left:90px"
					src="<?php echo get_option('activityMap');?>" />
						<span class="explain">尺寸630*570</span>			
	  </div>
	<table id="detailBox">
	  <tr style='padding-bottom: 10px;'>
	  	<td  ><font size='+1'>主题</font></td>
		<td  ><font size='+1'>开始时间</font></td>		
		<td  ><font size='+1'>主讲人</font></td>
		<td ><input class='btn btn-primary' type="button" value="新增一行" onclick='newRow()'></td>

	  </tr>
	  <?php 
	 	 $activity = next($results);
	 	 while($activity){
	  ?>
	  <tr id="<?php echo 'activity'.$activity->id;?>">
  		<td style='width:35%'><input onblur="checkTheme(this)" class="Cont theme" name="<?php echo 'theme|'.$activity->id;?>"
  		 value='<?php echo $activity->theme;?>'/></td>
	 	<td style='width:25%'><input class="Cont timepicker" name="<?php echo 'startTime|'.$activity->id;?>"
	 	 value='<?php echo substr($activity->startTime,11,5);?>'/></td>
  		<td style='width:40%'><input class="Cont" name="<?php echo 'speaker|'.$activity->id;?>"
  		 value='<?php echo $activity->speaker;?>'/></td>  
  		 <td><button  class='btn' value='<?php echo 'activity'.$activity->id;?>' onclick='delRow(this)'>删除</button></td>		 
 	  </tr>
 	  <?php 
 	  		$activity = next($results);
	 	}?>
	</table>
		<input type="hidden" name='theme|tail'/>
	 <div id='loading' style="display:none">
	     		<img alt="loading..." style="height: 50px;width:50px" src="/wordpress/wp-admin/images/pageloader.gif">
	  </div>
	<input type="button" class="btn btn-default" style="margin-left:100px;margin-top:30px;" value="清空"
	     	onclick="clearActivity()"></input>
	<input type="button" class="btn btn-primary" style="margin-left:40px;margin-top:30px;" value="确认"
	     	onclick="updateActivity()"></input>
 </div>
</form>
</DIV>

    <script src="/wordpress/wp-content/themes/enigma/js/picker.js"></script>
    <script src="/wordpress/wp-content/themes/enigma/js/picker.date.js"></script>
    <script src="/wordpress/wp-content/themes/enigma/js/picker.time.js"></script>

<?php 
}

function add_activity_page(){
	//link this page to menu buttton
	add_menu_page('Activity','大会安排','manage_options','activity','display_activity_page','',3);
}

add_action('admin_menu','add_activity_page');

//ajax methods
add_action( 'wp_ajax_nopriv_delActivity', 'delActivity');	//no authentication check
add_action( 'wp_ajax_delActivity', 'delActivity');

function delActivity(){
	$sql = "delete from wp_activity";
	if(isset($wpdb))
		echo $wpdb->query($sql);
	else{
		$wpdb= new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
		echo $wpdb->query($sql);
	}
}

add_action( 'wp_ajax_nopriv_updateActivity', 'updateActivity');	//no authentication check
add_action( 'wp_ajax_updateActivity', 'updateActivity');

function updateActivity(){
	
	//js rebuilt
	$year = $_POST['year_submit'];
	$clock =$_POST['clock_submit'];
	//delete all data in table, then insert the primary record
	$row = array('theme'=>$_POST['theme'],'startTime'=>$year.' '.$clock,
			'duration'=>$_POST['duration'],'place'=>$_POST['place'],'isPrimary'=>1);
	$db;
	if(isset($wpdb)){
		$db=$wpdb;
		$wpdb->query('delete from wp_activity');
		echo $wpdb->insert("wp_activity",$row);
	}else{		
		$wpdb= new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
		$db=$wpdb;
		$wpdb->query('delete from wp_activity');
		echo $wpdb->insert("wp_activity",$row);
	}
	
	//upload activity map
	update_option('activityMap',$_POST['activityMap']);
	//unset those inserted variables
	unset($_POST['action']);
	unset($_POST['activityMap']);
	unset($_POST['theme']);
	unset($_POST['year']);
	unset($_POST['clock']);
	unset($_POST['year_submit']);
	unset($_POST['clock_submit']);
	unset($_POST['duration']);
	unset($_POST['place']);
	
	var_dump($_POST);
	//traverse the $_POST & find the seperator among records & update every records 
	$isFirst=true;
	$record;
	foreach ($_POST as $col => $value){
		$field = explode('|',$col)[0];	//get the field we want
		
		if($field == 'theme'){
			if($isFirst == false){	//put the last record into database
				echo $db->insert('wp_activity',$record);
			}else{
				$isFirst = false;
			}
			$record =array('theme'=>$value);	//new a record;
			
		}else if($field =='startTime'){
			$record[$field]=$year.' '.$value;	//assemble time
			echo $record[$field];
		}else {
			$record[$field]=$value;
		}	
	}

}

?>