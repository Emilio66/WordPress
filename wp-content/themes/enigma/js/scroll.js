
	//define preload functions
	var $j = jQuery.noConflict();	//redefine the symbol of JQuery
	jQuery(document).ready(function(){
		
		//delete active class and add to first
		jQuery('li.menu-item').removeClass('active');
		jQuery('#menu-item-30').addClass('active');
		
	});

/*============================================
	Scrolling Animations
	==============================================*/
	jQuery('.scrollimation').waypoint(function(){
		jQuery(this).addClass('in');
	},{offset:'100%'});

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
				
			$j('#nameInput').focus();
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
			$j('#emailInput').focus();
			return;
		}else if(!email.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)){
			$j('#emailHint').text('邮箱格式不正确');
			if(emailValid == true){
				emailValid=false;
				$j('#emailHint').attr('color','#e61f18');
			}
			$j('#emailInput').focus();
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
			$j('#companyInput').focus();
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
			$j('#phoneHint').text('手机号必填');
			if(phoneValid == true){
				phoneValid=false;
				$j('#phoneHint').attr('color','#e61f18');
			}
			$j('#phoneInput').focus();			
			return;
		}else if(!phone.match(/^1[3|4|5|8][0-9]\d{4,8}$/)){
			$j('#phoneHint').text('手机号格式不正确');
			if(phoneValid == true){
				phoneValid=false;
				$j('#phoneHint').attr('color','#e61f18');
			}
			$j('#phoneInput').focus();
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
		
		//serialize all parameters to a variable
		var param = $j('#registerForm').serialize()+'&action=register';
		
		//ajax submit the form
		$j.post("/wordpress/wp-admin/admin-ajax.php",param,function(data){
			if(data != null){
				alert("报名成功");
			}else{
				alert('报名失败');
			}
		});

	}