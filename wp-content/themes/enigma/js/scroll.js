
	//define preload functions
	var $j = jQuery.noConflict();	//redefine the symbol of JQuery
	jQuery(document).ready(function(){
		
		//delete active class and add to first
		jQuery('li.menu-item').removeClass('active');
		jQuery('#menu-item-30').addClass('active');

		//find the span element, then trace back to its parent:remove the active status of homepage
		jQuery('span.menu_scroll').parent().click(function (){	
			jQuery('#menu-item-30').removeClass('active');
		});	
		
		var p=navigator.platform;
		//when this is pc's access,show wechat button 
		if(p.indexOf('Win')==0 || p.indexOf('Mac')==0||p.indexOf('Linux x')==0){
			jQuery('#wechat').show();
		}
	});

	/*============================================
		Scrolling Animations
	==============================================*/
	jQuery('.scrollimation').waypoint(function(){
		jQuery(this).addClass('in');
	},{offset:'100%'});

	
	
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
	
	function shareMoment(){
		if (typeof WeixinJSBridge == "undefined") {
			alert(" 请先通过微信搜索 Movie20 添加Movie2.0为好友，再通过微信分享 :) ");
		} else {
			WeixinJSBridge.invoke('shareTimeline', {
				"title": "Movie2.0",
				"link": "http://192.168.1.15/wordpress",
				"desc": " 影视互联行业新革命 ",
				"img_url": "http://192.168.1.15/wordpress"
			});
		}
	}
	
	function shareFriend() {
        WeixinJSBridge.invoke('sendAppMessage',{
            "appid": '',
            "img_url": '',
            "img_width": "200",
            "img_height": "200",
            "link": "http://192.168.1.15/wordpress",
            "desc": " 影视互联行业新革命 ",
            "title": "Movie2.0"
        }, function(res) {
            //_report('send_msg', res.err_msg);
        })
    }
	
	function shareWeibo() {
        WeixinJSBridge.invoke('shareWeibo',{
            "content": descContent,
            "url": lineLink,
        }, function(res) {
            //_report('weibo', res.err_msg);
        });
    }
	
	// 当微信内置浏览器完成内部初始化后会触发WeixinJSBridgeReady事件。
    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
    	 // 通过下面这个API显示右上角按钮
        WeixinJSBridge.call('showOptionMenu');
    	
    	// 发送给好友
        WeixinJSBridge.on('menu:share:appmessage', function(argv){
            shareFriend();
        });
        // 分享到朋友圈
        WeixinJSBridge.on('menu:share:timeline', function(argv){
        	shareMoment();
        });
        // 分享到微博
        WeixinJSBridge.on('menu:share:weibo', function(argv){
            shareWeibo();
        });
    }, false);
    
    
    function showCode(){
    	$j('#qrCode').toggle();
    }
	