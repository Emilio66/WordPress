<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/WordPress/wp-load.php');

///////////////////////////
// guset setting page--------------------------------------------------------------------------
function dispaly_guests(){
	//show all the guests to present in the meeting, plus new, edit, delete function
	?>
	<html>
	<head>
		<link rel="stylesheet" id="bootstrap-css" href="/wordpress/wp-content/themes/enigma/css/bootstrap.css?ver=4.0"
	 type="text/css" media="all">
		<script type="text/javascript" src="/wordpress/wp-content/themes/enigma/js/scroll.js"></script>
		<script type="text/javascript" src="/wordpress/wp-content/themes/enigma/js/bootstrap.min.js?ver=4.0"></script>
	</head>
	<body>
		
		<div class="container">
			<div >
				<h3>大会嘉宾</h3>	
				<div id='loading' style="display:none">
	     		 <img alt="loading..." style="height: 50px;width:50px" src="/wordpress/wp-admin/images/pageloader.gif">
	   			</div>			
				<table class="table table-bordered table-hover">
				<tbody>
					<tr >
					<th style="text-align:center;border:0;">头像</th>
					<th style="text-align:center;border:0">姓名</th>
					<th style="text-align:center;border:0">职位</th>
					<th style="text-align:center;border:0">电话</th>
					<th style="text-align:center;border:0">邮箱</th>
					<th style="text-align:center;border:0" colspan='3'>介绍</th>
					<th style="text-align:center;border:0" ></th>
					<th style="text-align:center;border:0" ></th>
					</tr>
				</tbody>
		<?php 
		$sql="select * from wp_guests;";
		if(isset($wpdb))
			$result = $wpdb->get_results($sql);
		else{
			$wpdb = new wpdb ( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
			$result = $wpdb->get_results($sql);
		}
		
		$row = current($result);	//first row
		while($row){
			echo "<tr class='$row->id'><td><img style='width:48px;height:50px'  src='".$row->photo."'/></td>";
			echo "<td>".$row->name."</td>";
			echo "<td>".$row->title."</td>";
			echo "<td>".$row->phone."</td>";
			echo "<td>".$row->email."</td>";
			echo "<td colspan='3'>".$row->description."</td>";
			echo "<td><a href='/wordpress/wp-admin/admin.php?page=guest-update&id=".$row->id."'>编辑</a></td>";
			echo "<td><a class='del_guest' id=\"$row->id\">删除</a></td></tr>";
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

function add_guests_page(){
	add_menu_page('Guests','嘉宾列表','manage_options','guests','dispaly_guests','',4);
}
add_action('admin_menu','add_guests_page');

//register this ajax function
add_action( 'wp_ajax_nopriv_delGuest', 'delGuest');
add_action( 'wp_ajax_delGuest', 'delGuest' );
function delGuest(){

	if(!empty($_POST['id'])){

		$where = array('id'=>$_POST['id']);
		//remove unnecessary data
		unset($_POST['action']);
		unset($_POST['id']);

		if(isset($wpdb))
			echo $wpdb->delete('wp_guests',$where);	//update data
		else{
			$tmpdb= new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
			echo $tmpdb->delete('wp_guests',$where);
		}
		return;
	}
	wp_die('出现错误，请查看网络连接是否正常','删除失败');
}
