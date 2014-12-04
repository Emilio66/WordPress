
	//define preload functions
	var $j = jQuery.noConflict();	//redefine the symbol of JQuery
	jQuery(document).ready(function(){
		
		//delete active class and add to first
		jQuery('li.menu-item').removeClass('active');
		jQuery('#menu-item-30').addClass('active');
		
		/********media-upload******/
		// media upload js
		var uploadID = ''; /*setup the var*/
		var showImg= '';
		jQuery('.upload_image_button').click(function() {
			uploadID = jQuery(this).prev('input'); /*grab the specific input*/
			showImg = jQuery(this).next('img');
			//formfield = jQuery('.upload').attr('name');
			tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
			
			window.send_to_editor = function(html)
			{	imgurl = jQuery('img',html).attr('src');
				showImg.attr('src',imgurl);
				uploadID.val(imgurl); /*assign the value to the input*/
				tb_remove();
			};		
			return false;
		});
		
		//register guest delete event
		jQuery('a.del_guest').click(function(){
			if(confirm('确认删除')){
				$j('#loading').show();
				var guestId=this.id;
				var guestPhoto=jQuery(this).attr('name');
				jQuery.post('admin-ajax.php',{action:"delGuest",id:guestId,photo:guestPhoto},function(data){
					$j('#loading').hide();
					if(data!=null && data !=0){
						alert("删除成功");
						jQuery("tr."+guestId).hide();
					}
						
					else
						alert(data);
				});
			}
		});
		
		
	});
	
	function updateGuest(){
		//trim space and clear harmful slashes
		var name= $j.trim($j('#nameInput').val());
		name = $j('<p>'+name+'</p>').text();	//strip html tags
		
		if(name == null || name.length ==0){
			alert('姓名不能为空');
			return;
		}
			
		var guestTitle= $j.trim($j('#guestTitle').val());
		guestTitle = $j('<p>'+guestTitle+'</p>').text();	//strip html tags
		
		var guestPhoto= $j.trim($j('#guestPhoto').val());
		guestPhoto = $j('<p>'+guestPhoto+'</p>').text();	//strip html tags
		
		var guestDescription= $j.trim($j('#guestDescription').val());
		guestDescription = $j('<p>'+guestDescription+'</p>').text();
		
		var phone = $j.trim($j('#phoneInput').val());	//they are strictly checked, no need to dispose again
		var email=$j.trim($j('#emailInput').val());
		
		//write secure content back to form, then submit it 
		$j('#nameInput').val(name);
		$j('#emailInput').val(email);
		$j('#phoneInput').val(phone);
		$j('#guestPhoto').val(guestPhoto);
		$j('#guestTitle').val(guestTitle);
		$j('#guestDescription').val(guestDescription);
		
		var id=$j('#guestID').val();
		var param;
		if(id!=null && id.length>0)
			param = 'action=editGuest&'+$j('#guestForm').serialize();//if id exist, it's update action
		else	
			param = 'action=addGuest&'+$j('#guestForm').serialize();
		$j('#loading').show();
		$j.post("admin-ajax.php",param,function(data){
			$j('#loading').hide();
			if(data != null && data !=0){
				alert("更新成功");
			}else{
				alert("更新失败");
			}
		});
	}
	
	function clearActivity(){
		$j('input.Cont').val('');	//clear all input box		
	}
	

	function checkTheme(obj){
		var va=obj.value;
		if(va==null || va.length ==0){
			alert('主题不能为空');
			return;
		}
	}
	
	function checkDur(obj){
		var va = obj.value;
		var patt=new RegExp("^[0-9]*(\.[0-9]{1,2}$)");
		if(va!=null && patt.test(va)==false){
			alert('预估时长只能是数字,可以是两位小数');
			return;
		}		
	}
	
	function newRow(){
		var rID=Math.ceil(Math.random()*1000);	//get a identical number
		var content=" <tr id='activity"+rID+"'><td style='width:35%'><input onblur=\"checkTheme(this)\" class='Cont theme' name='theme|"+rID+"'/></td>"
	 	+"<td style='width:25%'><input class=\"Cont timepicker\" name='startTime|"+rID+"'/></td>"
  		+"<td style='width:40%'><input class=\"Cont\" name='speaker|"+rID+"'/></td>"
  		+"<td><button class='btn' onclick='delRow(this)' value='activity"+rID+"'>删除</button</td></tr>";
		$j('#detailBox').append(content);
		jQuery('input.timepicker').pickatime({
			format: 'HH:i',
			formatSubmit:  'HH:i',
			min: [8,30],
		    max: [21,0]
		});		
	}
	
	function delRow(obj){
		var trID="#"+obj.value;
		
		if(confirm('真的要删除这行吗?')){
			jQuery(trID).remove();
		}else
			alert('good');
	}
	
	function updateActivity(){
		//js validate
		if(confirm('提醒：主题为空的行将被删除')){
			$j('#loading').show();
			var the=document.getElementById('meetingTheme');
			var dur=document.getElementById('duration');
			checkTheme(the);
			if($j('#place').val()==''){
				alert('大会地址不能为空');
				return;
			}
			
			var goon=false;
			if($j('#activityMap').val()==''){
				if(confirm('未上传地图，确认是否继续'))
					goon=true;
				else{
					goon=false;
					return;
				}
			}else
				goon=true;
			
			if(goon){
				$j('input.theme').each(function(){
					var value=$j.trim($j(this).val());
					//if the row has a blank theme field,then remove the row
					if(value==null || value.length==0){
						var name=$j(this).attr('name');
						var id='#activity'+name.split('|')[1];
						//alert('remove'+id);
						$j(id).remove();
					}
					
				});
				
				
				var param="action=updateActivity&"+$j('#activityForm').serialize();
				$j.post('admin-ajax.php',param,function(data){
					$j('#loading').hide();
					
					if(data != null && data !=0){
						alert("更新成功");
					}else{
						alert("更新失败");
					}		
				});	
				
			}
				
		}
	}
	