/*!
 * pickadate.js v3.5.4, 2014/09/11
 * By Amsul, http://amsul.ca
 * Hosted on http://amsul.github.io/pickadate.js
 * Licensed under MIT
 */
!function(a){"function"==typeof define&&define.amd?define("picker",["jquery"],a):"object"==typeof exports?module.exports=a(require("jquery")):this.Picker=a(jQuery)}(function(a){function b(f,g,h,k){function l(){return b._.node("div",b._.node("div",b._.node("div",b._.node("div",x.component.nodes(s.open),u.box),u.wrap),u.frame),u.holder)}function m(){v.data(g,x).addClass(u.input).attr("tabindex",-1).val(v.data("value")?x.get("select",t.format):f.value),t.editable||v.on("focus."+s.id+" click."+s.id,function(a){a.preventDefault(),x.$root[0].focus()}).on("keydown."+s.id,p),e(f,{haspopup:!0,expanded:!1,readonly:!1,owns:f.id+"_root"+(x._hidden?" "+x._hidden.id:"")})}function n(){x.$root.on({keydown:p,focusin:function(a){x.$root.removeClass(u.focused),a.stopPropagation()},"mousedown click":function(b){var c=b.target;c!=x.$root.children()[0]&&(b.stopPropagation(),"mousedown"!=b.type||a(c).is(":input")||"OPTION"==c.nodeName||(b.preventDefault(),x.$root[0].focus()))}}).on({focus:function(){v.addClass(u.target)},blur:function(){v.removeClass(u.target)}}).on("focus.toOpen",q).on("click","[data-pick], [data-nav], [data-clear], [data-close]",function(){var b=a(this),c=b.data(),d=b.hasClass(u.navDisabled)||b.hasClass(u.disabled),e=document.activeElement;e=e&&(e.type||e.href)&&e,(d||e&&!a.contains(x.$root[0],e))&&x.$root[0].focus(),!d&&c.nav?x.set("highlight",x.component.item.highlight,{nav:c.nav}):!d&&"pick"in c?x.set("select",c.pick).close(!0):c.clear?x.clear().close(!0):c.close&&x.close(!0)}),e(x.$root[0],"hidden",!0)}function o(){var b;t.hiddenName===!0?(b=f.name,f.name=""):(b=["string"==typeof t.hiddenPrefix?t.hiddenPrefix:"","string"==typeof t.hiddenSuffix?t.hiddenSuffix:"_submit"],b=b[0]+f.name+b[1]),x._hidden=a('<input type=hidden name="'+b+'"'+(v.data("value")||f.value?' value="'+x.get("select",t.formatSubmit)+'"':"")+">")[0],v.on("change."+s.id,function(){x._hidden.value=f.value?x.get("select",t.formatSubmit):""}).after(x._hidden)}function p(a){var b=a.keyCode,c=/^(8|46)$/.test(b);return 27==b?(x.close(),!1):void((32==b||c||!s.open&&x.component.key[b])&&(a.preventDefault(),a.stopPropagation(),c?x.clear().close():x.open()))}function q(a){a.stopPropagation(),"focus"==a.type&&x.$root.addClass(u.focused),x.open()}if(!f)return b;var r=!1,s={id:f.id||"P"+Math.abs(~~(Math.random()*new Date))},t=h?a.extend(!0,{},h.defaults,k):k||{},u=a.extend({},b.klasses(),t.klass),v=a(f),w=function(){return this.start()},x=w.prototype={constructor:w,$node:v,start:function(){return s&&s.start?x:(s.methods={},s.start=!0,s.open=!1,s.type=f.type,f.autofocus=f==document.activeElement,f.readOnly=!t.editable,f.id=f.id||s.id,"text"!=f.type&&(f.type="text"),x.component=new h(x,t),x.$root=a(b._.node("div",l(),u.picker,'id="'+f.id+'_root" tabindex="0"')),n(),t.formatSubmit&&o(),m(),t.container?a(t.container).append(x.$root):v.after(x.$root),x.on({start:x.component.onStart,render:x.component.onRender,stop:x.component.onStop,open:x.component.onOpen,close:x.component.onClose,set:x.component.onSet}).on({start:t.onStart,render:t.onRender,stop:t.onStop,open:t.onOpen,close:t.onClose,set:t.onSet}),r=c(x.$root.children()[0]),f.autofocus&&x.open(),x.trigger("start").trigger("render"))},render:function(a){return a?x.$root.html(l()):x.$root.find("."+u.box).html(x.component.nodes(s.open)),x.trigger("render")},stop:function(){return s.start?(x.close(),x._hidden&&x._hidden.parentNode.removeChild(x._hidden),x.$root.remove(),v.removeClass(u.input).removeData(g),setTimeout(function(){v.off("."+s.id)},0),f.type=s.type,f.readOnly=!1,x.trigger("stop"),s.methods={},s.start=!1,x):x},open:function(c){return s.open?x:(v.addClass(u.active),e(f,"expanded",!0),setTimeout(function(){x.$root.addClass(u.opened),e(x.$root[0],"hidden",!1)},0),c!==!1&&(s.open=!0,r&&j.css("overflow","hidden").css("padding-right","+="+d()),x.$root[0].focus(),i.on("click."+s.id+" focusin."+s.id,function(a){var b=a.target;b!=f&&b!=document&&3!=a.which&&x.close(b===x.$root.children()[0])}).on("keydown."+s.id,function(c){var d=c.keyCode,e=x.component.key[d],f=c.target;27==d?x.close(!0):f!=x.$root[0]||!e&&13!=d?a.contains(x.$root[0],f)&&13==d&&(c.preventDefault(),f.click()):(c.preventDefault(),e?b._.trigger(x.component.key.go,x,[b._.trigger(e)]):x.$root.find("."+u.highlighted).hasClass(u.disabled)||x.set("select",x.component.item.highlight).close())})),x.trigger("open"))},close:function(a){return a&&(x.$root.off("focus.toOpen")[0].focus(),setTimeout(function(){x.$root.on("focus.toOpen",q)},0)),v.removeClass(u.active),e(f,"expanded",!1),setTimeout(function(){x.$root.removeClass(u.opened+" "+u.focused),e(x.$root[0],"hidden",!0)},0),s.open?(s.open=!1,r&&j.css("overflow","").css("padding-right","-="+d()),i.off("."+s.id),x.trigger("close")):x},clear:function(a){return x.set("clear",null,a)},set:function(b,c,d){var e,f,g=a.isPlainObject(b),h=g?b:{};if(d=g&&a.isPlainObject(c)?c:d||{},b){g||(h[b]=c);for(e in h)f=h[e],e in x.component.item&&(void 0===f&&(f=null),x.component.set(e,f,d)),("select"==e||"clear"==e)&&v.val("clear"==e?"":x.get(e,t.format)).trigger("change");x.render()}return d.muted?x:x.trigger("set",h)},get:function(a,c){if(a=a||"value",null!=s[a])return s[a];if("value"==a)return f.value;if(a in x.component.item){if("string"==typeof c){var d=x.component.get(a);return d?b._.trigger(x.component.formats.toString,x.component,[c,d]):""}return x.component.get(a)}},on:function(b,c,d){var e,f,g=a.isPlainObject(b),h=g?b:{};if(b){g||(h[b]=c);for(e in h)f=h[e],d&&(e="_"+e),s.methods[e]=s.methods[e]||[],s.methods[e].push(f)}return x},off:function(){var a,b,c=arguments;for(a=0,namesCount=c.length;namesCount>a;a+=1)b=c[a],b in s.methods&&delete s.methods[b];return x},trigger:function(a,c){var d=function(a){var d=s.methods[a];d&&d.map(function(a){b._.trigger(a,x,[c])})};return d("_"+a),d(a),x}};return new w}function c(a){var b,c="position";return a.currentStyle?b=a.currentStyle[c]:window.getComputedStyle&&(b=getComputedStyle(a)[c]),"fixed"==b}function d(){if(j.height()<=h.height())return 0;var b=a('<div style="visibility:hidden;width:100px" />').appendTo("body"),c=b[0].offsetWidth;b.css("overflow","scroll");var d=a('<div style="width:100%" />').appendTo(b),e=d[0].offsetWidth;return b.remove(),c-e}function e(b,c,d){if(a.isPlainObject(c))for(var e in c)f(b,e,c[e]);else f(b,c,d)}function f(a,b,c){a.setAttribute(("role"==b?"":"aria-")+b,c)}function g(b,c){a.isPlainObject(b)||(b={attribute:c}),c="";for(var d in b){var e=("role"==d?"":"aria-")+d,f=b[d];c+=null==f?"":e+'="'+b[d]+'"'}return c}var h=a(window),i=a(document),j=a(document.documentElement);return b.klasses=function(a){return a=a||"picker",{picker:a,opened:a+"--opened",focused:a+"--focused",input:a+"__input",active:a+"__input--active",target:a+"__input--target",holder:a+"__holder",frame:a+"__frame",wrap:a+"__wrap",box:a+"__box"}},b._={group:function(a){for(var c,d="",e=b._.trigger(a.min,a);e<=b._.trigger(a.max,a,[e]);e+=a.i)c=b._.trigger(a.item,a,[e]),d+=b._.node(a.node,c[0],c[1],c[2]);return d},node:function(b,c,d,e){return c?(c=a.isArray(c)?c.join(""):c,d=d?' class="'+d+'"':"",e=e?" "+e:"","<"+b+d+e+">"+c+"</"+b+">"):""},lead:function(a){return(10>a?"0":"")+a},trigger:function(a,b,c){return"function"==typeof a?a.apply(b,c||[]):a},digits:function(a){return/\d/.test(a[1])?2:1},isDate:function(a){return{}.toString.call(a).indexOf("Date")>-1&&this.isInteger(a.getUTCDate())},isInteger:function(a){return{}.toString.call(a).indexOf("Number")>-1&&a%1===0},ariaAttr:g},b.extend=function(c,d){a.fn[c]=function(e,f){var g=this.data(c);return"picker"==e?g:g&&"string"==typeof e?b._.trigger(g[e],g,[f]):this.each(function(){var f=a(this);f.data(c)||new b(this,c,d,e)})},a.fn[c].defaults=d.defaults},b});