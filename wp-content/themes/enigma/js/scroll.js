
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
				jQuery.post('admin-ajax.php',{action:"delGuest",id:guestId},function(data){
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
		
		//register time picker evet
		jQuery.extend(jQuery.fn.pickadate.defaults,{
			monthsFull:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
			monthsShort:["一","二","三","四","五","六","七","八","九","十","十一","十二"],
			weekdaysFull:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
			weekdaysShort:["日","一","二","三","四","五","六"],today:"今日",clear:"清空",firstDay:1,
			format:"yyyy-mm-dd",formatSubmit:"yyyy-mm-dd"});

		jQuery('.datepicker').pickadate({
			labelMonthNext: '下一月',
		    labelMonthPrev: '上一月',
		    labelMonthSelect: '选月份',
		    labelYearSelect: '选年份',
		    selectMonths: true,
		    selectYears: true,
			format:'yyyy-mm-dd',
			formatSubmit: 'yyyy-mm-dd',
		});
		jQuery('.timepicker').pickatime({
			format: 'HH:i',
			formatSubmit:  'HH:i',
			min: [8,30],
		    max: [21,0]
		});
	});

/*============================================
	Scrolling Animations
	==============================================
	jQuery('.scrollimation').waypoint(function(){
		jQuery(this).addClass('in');
	},{offset:'100%'});
*/
	/*============================================
		define page menu click event
	==============================================*/	
	//find the span element, then trace back to its parent: <a href="#..">, get its href then scroll to the position
	jQuery('span.menu_scroll').parent().click(function (){
		//alert(jQuery(this).attr('href').split('#')[1]);
		var id='/wordpress/'.jQuery(this).attr('href').split('#')[1]; 			//get last word as a id clue
		localtion.href =id;
		//alert(id);
		//document.getElementById(id).scrollIntoView(true);	//scroll to this position
	});
	
	
	/*============================================
		define validate funciton for register form
	==============================================*/
	var nameValid	=false;
	var emailValid	=false;
	var companyValid=false;
	var phoneValid	=false;
	
	function checkName(){
		var name=$j.trim($j('#nameInput').val());
		if(name==null || name.length ==0){
			$j('#nameHint').text('名字必填');
			if(nameValid == true){
				nameValid=false;
				$j('#nameHint').attr('color','#e61f18');
			}
				
			//$j('#nameInput').focus();
			return;
		}
		
		nameValid =true;
		$j('#nameHint').attr('color','green');
		$j('#nameHint').text('ok'); 
	}
	function checkEmail(){
		var email=$j.trim($j('#emailInput').val());
		if(email==null || email.length ==0){
			$j('#emailHint').text('邮箱必填');
			if(emailValid == true){
				emailValid=false;
				$j('#emailHint').attr('color','#e61f18');
			}
			//$j('#emailInput').focus();
			return;
		}else if(!email.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)){
			$j('#emailHint').text('邮箱有误');
			if(emailValid == true){
				emailValid=false;
				$j('#emailHint').attr('color','#e61f18');
			}
			//$j('#emailInput').focus();
			return;
		}
		
		emailValid =true;
		$j('#emailHint').attr('color','green');
		$j('#emailHint').text('ok'); 
		return true;
	}
	function checkCompany(){
		var company=$j.trim($j('#companyInput').val());
		if(company == null || company.length ==0){
			$j('#companyHint').text('公司必填');
			if(companyValid == true){
				companyValid=false;
				$j('#companyHint').attr('color','#e61f18');
			}
			//$j('#companyInput').focus();
			return;
		}
		
		companyValid =true;
		$j('#companyHint').attr('color','green');
		$j('#companyHint').text('ok'); 
		return true;
	}
	function checkPhone(){
		var phone = $j.trim($j('#phoneInput').val());
		if(phone==null || phone.length ==0){
			$j('#phoneHint').text('手机必填');
			if(phoneValid == true){
				phoneValid=false;
				$j('#phoneHint').attr('color','#e61f18');
			}
			//$j('#phoneInput').focus();			
			return;
		}else if(!phone.match(/^1[3|4|5|8][0-9]\d{4,8}$/)){
			$j('#phoneHint').text('手机号有误');
			if(phoneValid == true){
				phoneValid=false;
				$j('#phoneHint').attr('color','#e61f18');
			}
			//$j('#phoneInput').focus();
			return;
		}

		phoneValid =true;
		$j('#phoneHint').attr('color','green');
		$j('#phoneHint').text('ok'); 
		return true;
		
	}
	
	function submitForm(){
		if(!(nameValid && phoneValid && companyValid && emailValid)){
			alert('为了聚会的成功举行，请补全报名信息，谢谢~');
			if(!nameValid)
				$j('#nameInput').focus();
			else if(!phoneValid)
				$j('#phoneInput').focus();
			else if(!companyValid)
				$j('#companyInput').focus();
			else
				$j('#emailInput').focus();
			return;
		}
			
		//trim space and clear harmful slashes
		var name= $j.trim($j('#nameInput').val());
		name = $j('<p>'+name+'</p>').text();	//strip html tags
		
		var company= $j.trim($j('#companyInput').val());
		company = $j('<p>'+company+'</p>').text();
		
		var phone = $j.trim($j('#phoneInput').val());	//they are strictly checked, no need to dispose again
		var email=$j.trim($j('#emailInput').val());
		
		//write secure content back to form, then submit it 
		$j('#nameInput').val(name);
		$j('#emailInput').val(email);
		$j('#phoneInput').val(phone);
		$j('#companyInut').val(company);
		$j('#loading').show();
		//serialize all parameters to a variable
		var param = 'action=register&'+$j('#registerForm').serialize();
		
		//ajax submit the form
		$j.post("admin-ajax.php",param,function(data){
			$j('#loading').hide();
			if(data != null){
				alert("报名成功");
			}else{
				alert('报名失败');
			}
		});
	}
	
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
	