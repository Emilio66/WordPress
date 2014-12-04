<?php

function show_registers(){
	?>
	<html>
	<head></head>
	<body>
	<link rel="stylesheet" id="bootstrap-css" href="/wordpress/wp-content/themes/enigma/css/bootstrap.css?ver=4.0" type="text/css" media="all">
	<script type="text/javascript" src="/wordpress/wp-content/themes/enigma/js/bootstrap.min.js?ver=4.0"></script>
	<div class="container">
		<div >
			<h3>报名参会人员</h3>				
			<table class="table table-bordered table-hover">
			<tbody>
				<tr>
				<th>姓名</th>
				<th>电话</th>
				<th>邮箱</th>
				<th>公司名称</th>
				<th>报名时间</th>
				<th colspan='3'>简介</th>
				</tr>
			</tbody>
	<?php 
	$sql="select name,phone,email,company,register_time,introduction from wp_register";
	if(isset($wpdb))
		$result = $wpdb->get_results($sql);
	else{
		$wpdb = new wpdb ( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
		$result = $wpdb->get_results($sql);
	}
	
	$row = current($result);	//first row
	while($row){
		echo "<tr><td>".$row->name."</td>";
		echo "<td>".$row->phone."</td>";
		echo "<td>".$row->email."</td>";
		echo "<td>".$row->company."</td>";
		echo "<td>".$row->register_time."</td>";
		echo "<td colspan='3'>".$row->introduction."</td></tr>";

		$row = next($result);
	}
	?>
			</table>	
		</div>
	</div>
		</body>
	</html>
	<?php 
}

function add_register_page(){
	add_menu_page('Members','报名参会人员','manage_options','members','show_registers','');
}
add_action('admin_menu','add_register_page'); //add this funciton to admin menu 


//my ajax submit
add_action( 'wp_ajax_nopriv_register', 'register' );	//no authentication check
add_action( 'wp_ajax_register', 'register' );

function register(){
	/* add register for meeting information to DB */
	if(!empty($_POST['name'])){

		unset($_POST['action']);

		if(function_exists(date_default_timezone_set))
			date_default_timezone_set("Etc/GMT-8");	//这是格林威治标准时间快8小时，东八区，设置'PRC'也是一样

		$time = date('Y-m-d H:i:s',time($_SERVER['REQUEST_TIME']));
		$_POST['register_time']=$time;

		if(isset($wpdb))
			echo $wpdb->insert('wp_register',$_POST);
		else{
			$tmpDB = new wpdb ( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
			echo $tmpDB->insert('wp_register',$_POST);
		}
		//echo 'success';
		exit;
	}

}
?>