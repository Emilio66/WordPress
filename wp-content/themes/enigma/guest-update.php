<?php 

require_once ($_SERVER['DOCUMENT_ROOT'].'/WordPress/wp-load.php');
function guest_add_page(){
	
	//加载上传图片的js(wp自带)
	wp_enqueue_script('thickbox');
	//加载css(wp自带)
	wp_enqueue_style('thickbox');
	if(isset($_GET['id'])){
		$sql = 'select * from wp_guests where id='.$_GET['id'];
		if(isset($wpdb))
			$guest=$wpdb->get_row($sql);
		else{
			$tmpdb= new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
			$guest=$tmpdb->get_row($sql);
		}
	}
?>

<link rel="stylesheet" id="bootstrap-css" href="/wordpress/wp-content/themes/enigma/css/bootstrap.css?ver=4.0"
	 type="text/css" media="all">
<script type="text/javascript" src="/wordpress/wp-content/themes/enigma/js/scroll.js"></script>
<script type="text/javascript" src="/wordpress/wp-content/themes/enigma/js/bootstrap.min.js?ver=4.0"></script>
<DIV class="container" style="margin-top: 10px">
<h3>嘉宾信息更新</h3>
<hr>
<form id='guestForm' method="post">
	<input type="hidden" id='guestID' name='id' value='<?php echo $guest->id;?>'/>
	<DIV class="col-lg-6  col-md-6 col-md-offset-3 col-sm-6 "  style="margin-top: 10px">
	  <div  style="margin-bottom: 30px">
	    <label for="nameInput" style="float: left;width:17%">姓名：</label>
	    <input type="text"  style="width: 67%;float:left"
	    	onblur='checkName()' id="nameInput" name="name" value='<?php echo $guest->name;?>'/>
	    <font id="nameHint" color="#e61f18" style="width: 12%;float:left">*</font>
	    <div style="padding: 0px 0px 10px;"></div> 
	  </div>
	  <div style="margin-bottom: 30px">
	    <label for="guestTitle"  style="width: 17%;float:left">职位：</label>
	    <input type="text"  style="width: 67%;float:left" 
	    	 id="guestTitle" name="title" value='<?php echo $guest->title;?>'/>
	    <div style="padding: 0px 0px 10px;"></div> 
	  </div>
	  
	  <!-- 头像上传部分 -->
	  <div style="margin-bottom: 30px">
	    <label for="guestPhoto"  style="width: 17%;float:left">上传头像：</label>
	    <input type="text" id="guestPhoto" name="photo" size="36" value='<?php echo $guest->photo;?>'
	    	class="upload has-file" /> 
			<input type="button" id="upload_button"
				value="上传" class="upload_image_button button" />
			 
				<img alt='头像预览' style="width:100px;height: 70px;margin-top:30px;margin-left:90px"
					src="<?php echo $guest->photo;?>" />
						<span class="explain">尺寸570*350</span>			
	  </div>
	  <div  style="margin-bottom: 30px">
	    <label for="emailInput" style="float: left;width:17%">邮箱：</label>
	    <input type="email"  style="width: 67%;float:left"
	    	onblur='checkEmail()' id="emailInput" name="email" value='<?php echo $guest->email;?>'/>
	    <font id="emailHint" color="#e61f18" style="width: 12%;float:left"></font>
	    <div style="padding: 0px 0px 10px;"></div> 
	  </div>
	  <div style="margin-bottom: 30px">
	    <label for="phoneInput" style="width: 17%;float:left">手机号：</label>
	    <input type="text" style="width: 67%;float:left"
	    	onblur='checkPhone()' id="phoneInput" name="phone" value='<?php echo $guest->phone;?>'/>
	    <font id="phoneHint" color="#e61f18" style="width: 12%;float:left"></font>
	    <div style="padding: 0px 0px 10px;"></div> 
	  </div>

	  <div >
	    <label for="guestDescription" style="width: 17%;float:left;">简介：</label>
	    <textarea id="guestDescription" name="description" 
	    style="float:left;width: 67%; margin-right:3%;height:140px;margin-bottom:20px" 
	     >
	     <?php echo $guest->description;?>
	     </textarea><br/>
	     
	  </div>
	  <div id='loading' style="display:none">
	     		<img alt="loading..." style="height: 50px;width:50px" src="/wordpress/wp-admin/images/pageloader.gif">
	   </div>
	  <input type="button" class="btn btn-primary" style="margin-left:100px" value="确认"
	     	onclick="updateGuest()"></input>
	     	
 </div>
</form>
</DIV>

<?php 
}
function guest_add_submenu(){
	add_submenu_page('guests','更新嘉宾','新建嘉宾','manage_options','guest-update','guest_add_page');
}

add_action('admin_menu','guest_add_submenu');

//register this ajax function
add_action( 'wp_ajax_nopriv_addGuest', 'addGuest');	//no authentication check
add_action( 'wp_ajax_addGuest', 'addGuest');
function addGuest(){
	//first check if this is the wanted form submition
	if(isset($_POST['name'])){
		//remove the variable of action
		unset($_POST['action']);		
		unset($_POST['id']);
		if(isset($wpdb))
			echo $wpdb->insert('wp_guests',$_POST);
		else{
			$tmpdb= new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
			echo $tmpdb->insert('wp_guests',$_POST);
		}
	}
	exit;
}

//register this ajax function
add_action( 'wp_ajax_nopriv_editGuest', 'editGuest');
add_action( 'wp_ajax_editGuest', 'editGuest' );
function editGuest(){
	
	if(!empty($_POST['id'])){

		$where = array('id'=>$_POST['id']);
		//remove unnecessary data
		unset($_POST['action']);
		unset($_POST['id']);
		
		if(isset($wpdb))
			echo $wpdb->update('wp_guests',$_POST,$where);	//update data
		else{
			$tmpdb= new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
			echo $tmpdb->update('wp_guests',$_POST,$where);
		}
		return;
	}
	wp_die('出现错误，请查看网络连接是否正常','更新失败');
}
?>
