/** thinker-admin-v1.0.0 MIT License By http://www.thinkphp-admin.com/ */
 ;"use strict";var _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};!function(e,t,n){"object"===("undefined"==typeof exports?"undefined":_typeof(exports))?module.exports=n():"function"==typeof define&&define.amd?define(n):t.layui&&e.define?e.define(["jquery"],function(e){e("formSelects",n())}):t.formSelects=n()}("undefined"==typeof layui?null:layui,window,function(){var e="4.1.0.0726.beta",t="xm-select",n="xm-select-parent",a="xm-select-input",i="xm-select--suffix",r="xm-select-this",o="xm-select-label",l="xm-select-search",s="xm-select-search-type",d="xm-select-show-count",c="xm-select-create",f="xm-select-create-long",u="xm-select-max",p="xm-select-skin",h="xm-select-direction",v="xm-select-height",m="xm-dis-disabled",y="xm-select-dis",g="xm-select-temp",x="xm-select-radio",k="xm-select-linkage",b="xm-select-dl",C="xm-select-hide",w="xm-hide-input",S="xm-select-sj",T="xm-select-title",j="xm-form-select",A="xm-form-selected",L="xm-select-none",N="xm-select-empty",H="xm-input",E="xm-dl-input",F="xm-select-tips",D="iconfont",O="xm-cz",V="xm-cz-group",P="请选择",I={},_={on:{},endOn:{},filter:{},maxTips:{}},U={type:"get",header:{},first:!0,data:{},searchUrl:"",searchName:"keyword",searchVal:null,keyName:"text",keyVal:"value",keySel:"selected",keyDis:"disabled",keyChildren:"list",dataType:"",delay:500,beforeSuccess:null,success:null,error:null,beforeSearch:null,response:{statusCode:1,statusName:"code",msgName:"msg",dataName:"data"}},M={},W={},B={},q=[{icon:"iconfont icon-quanxuan",name:"全选",click:function(e,t){t.selectAll(e,!0,!0)}},{icon:"iconfont icon-qingkong",name:"清空",click:function(e,t){t.removeAll(e,!0,!0)}},{icon:"iconfont icon-fanxuan",name:"反选",click:function(e,t){t.reverse(e,!0,!0)}},{icon:"iconfont icon-pifu",name:"换肤",click:function(e,t){t.skin(e)}}],J=window.$||window.layui&&window.layui.jquery,z=window.Vue||null,Q=J(window),X=function(e){var n=this;this.config={name:null,max:null,maxTips:function(e,a,i,r){var o=J('[xid="'+n.config.name+'"]').prev().find("."+t);o.parents(".layui-form-item[pane]").length&&(o=o.parents(".layui-form-item[pane]")),o.attr("style","border-color: red !important"),setTimeout(function(){o.removeAttr("style")},300)},init:null,on:null,endOn:null,filter:function(e,t,n,a){return n.name.indexOf(t)==-1},clearid:-1,direction:"auto",height:null,isEmpty:!1,btns:null,searchType:0,create:function(e,t){return Date.now()},template:function(e,t,n,a){return e},showCount:0,isCreate:!1,placeholder:P,clearInput:!1},this.select=null,this.values=[],J.extend(this.config,B[e.name]||W),J.extend(this.config,e),(isNaN(this.config.showCount)||this.config.showCount<=0)&&(this.config.showCount=19921012)},Y=function(){this.appender(),this.on(),this.onreset()};Y.prototype.appender=function(){Array.prototype.map||(Array.prototype.map=function(e,t){var n,a,i,r=Object(this),o=r.length>>>0;for(t&&(n=t),a=new Array(o),i=0;i<o;){var l,s;i in r&&(l=r[i],s=e.call(n,l,i,r),a[i]=s),i++}return a}),Array.prototype.forEach||(Array.prototype.forEach=function(e,t){var n,a;if(null==this)throw new TypeError("this is null or not defined");var i=Object(this),r=i.length>>>0;if("function"!=typeof e)throw new TypeError(e+" is not a function");for(arguments.length>1&&(n=t),a=0;a<r;){var o;a in i&&(o=i[a],e.call(n,o,a,i)),a++}}),Array.prototype.filter||(Array.prototype.filter=function(e){if(void 0===this||null===this)throw new TypeError;var t=Object(this),n=t.length>>>0;if("function"!=typeof e)throw new TypeError;for(var a=[],i=arguments[1],r=0;r<n;r++)if(r in t){var o=t[r];e.call(i,o,r,t)&&a.push(o)}return a})},Y.prototype.init=function(e){var r=this;J(e?e:"select["+t+"]").each(function(e,f){var m=J(f),g=m.attr(t),k=m.next(".layui-form-select"),C=m.next("."+n),A={name:g,disabled:f.disabled,max:m.attr(u)-0,isSearch:void 0!=m.attr(l),searchUrl:r.isSearch?m.attr(l):null,isCreate:void 0!=m.attr(c),radio:void 0!=m.attr(x),skin:m.attr(p),direction:m.attr(h),optionsFirst:f.options[0],height:m.attr(v),formname:m.attr("name")||m.attr("_name"),layverify:m.attr("lay-verify"),layverType:m.attr("lay-verType"),searchType:"dl"==m.attr(s)?1:0,showCount:m.attr(d)-0,placeholder:r.optionsFirst?r.optionsFirst.value?P:r.optionsFirst.innerHTML||P:P,btns:r.radio?[q[1]]:[q[0],q[1],q[2]]},L=m.find("option[selected]").toArray().map(function(e){return{name:e.innerHTML,val:e.value}}),N=new X(A);N.values=L,N.config.init?(N.values=N.config.init.map(function(e){return"object"==("undefined"==typeof e?"undefined":_typeof(e))?e:{name:m.find('option[value="'+e+'"]').text(),val:e}}).filter(function(e){return e.name}),N.config.init=N.values.concat([])):N.config.init=L.concat([]),!N.values&&(N.values=[]),I[g]=N,k[0]&&k.remove(),C[0]&&C.remove();var F=r.renderSelect(g,N.config.placeholder,f),D=N.config.height&&"auto"!=N.config.height?'xm-hg style="height: 34px;"':"",O=['<div class="'+o+'">','<input type="text" fsw class="'+H+" "+a+'" '+(N.config.isSearch?"":'style="display: none;"')+' autocomplete="off" debounce="0" />',"</div>"],V=J('<div class="'+j+'" '+p+'="'+N.config.skin+'">\n\t\t\t\t\t<input class="'+w+'" value="" name="'+N.config.formname+'" lay-verify="'+N.config.layverify+'" lay-verType="'+N.config.layverType+'" type="text" style="position: absolute;bottom: 0; z-index: -1;width: 100%; height: 100%; border: none; opacity: 0;"/>\n\t\t\t\t\t<div class="'+T+" "+(N.config.disabled?y:"")+'">\n\t\t\t\t\t\t<div class="'+H+" "+t+'" '+D+">\n\t\t\t\t\t\t\t"+O.join("")+'\n\t\t\t\t\t\t\t<i class="'+S+'"></i>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class="'+i+'">\n\t\t\t\t\t\t\t<input type="text" autocomplete="off" placeholder="'+N.config.placeholder+'" readonly="readonly" unselectable="on" class="'+H+'">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div></div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<dl xid="'+g+'" class="'+b+" "+(N.config.radio?x:"")+'">'+F+"</dl>\n\t\t\t\t</div>"),_=J('<div class="'+n+'" FS_ID="'+g+'"></div>');_.append(V),m.after(_),m.attr("lay-ignore",""),m.removeAttr("name")&&m.attr("_name",N.config.formname),N.config.isSearch?(M[g]=J.extend(!0,{},U,{searchUrl:N.config.searchUrl}),J(document).on("input","div."+n+'[FS_ID="'+g+'"] .'+a,function(e){r.search(g,e,N.config.searchUrl)}),N.config.searchUrl&&r.triggerSearch(V,!0)):V.find("dl dd."+E).css("display","none")})},Y.prototype.search=function(e,t,n,a){var i=this,r=void 0;if(a)r=a;else{r=t.target;var o=t.keyCode;if(9===o||13===o||37===o||38===o||39===o||40===o)return!1}var l=J.trim(r.value);this.changePlaceHolder(J(r));var s=M[e]?M[e]:U;n=s.searchUrl||n;var d=I[e],c=d.config.isCreate,f=J('dl[xid="'+e+'"]').parents("."+j);if(n){if(s.searchVal&&(l=s.searchVal,s.searchVal=""),!s.beforeSearch||s.beforeSearch&&s.beforeSearch instanceof Function&&s.beforeSearch(e,n,l)){var u=s.delay;s.first&&(s.first=!1,u=10),clearTimeout(d.clearid),d.clearid=setTimeout(function(){f.find("dl > *:not(."+F+")").remove(),f.find("dd."+L).addClass(N).text("请求中"),i.ajax(e,n,l,!1,null,!0)},u)}}else{f.find("dl ."+C).removeClass(C),f.find("dl dd:not(."+F+")").each(function(t,n){var a=J(n),i=_.filter[e]||I[e].config.filter;i&&1==i(e,l,{name:a.find("span").attr("name"),val:a.attr("lay-value")},a.hasClass(m))&&a.addClass(C)}),f.find("dl dt").each(function(e,t){J(t).nextUntil("dt",":not(."+C+")").length||J(t).addClass(C)}),this.create(e,c,l);var p=f.find("dl dd:not(."+F+"):not(."+C+")");p.length?f.find("dd."+L).removeClass(N):f.find("dd."+L).addClass(N).text("无匹配项")}},Y.prototype.isArray=function(e){return"[object Array]"==Object.prototype.toString.call(e)},Y.prototype.triggerSearch=function(e,t){var n=this;(e?[e]:J("."+j).toArray()).forEach(function(e,i){e=J(e);var r=e.find("dl").attr("xid");(r&&I[r]&&I[r].config.isEmpty||t)&&n.search(r,null,null,0==I[r].config.searchType?e.find("."+o+" ."+a):e.find("dl ."+E+" ."+a))})},Y.prototype.clearInput=function(e){var t=J("."+n+'[fs_id="'+e+'"]'),i=0==I[e].config.searchType?t.find("."+o+" ."+a):t.find("dl ."+E+" ."+a);i.val("")},Y.prototype.ajax=function(e,t,a,i,r,o){var l=this,s=J("."+n+' dl[xid="'+e+'"]').parents("."+j);if(s[0]&&t){var d=M[e]?M[e]:U,c=J.extend(!0,{},d.data);c[d.searchName]=a,J.ajax({type:d.type,headers:d.header,url:t,data:"json"==d.dataType?JSON.stringify(c):c,success:function(n){if("string"==typeof n&&(n=JSON.parse(n)),d.beforeSuccess&&d.beforeSuccess instanceof Function&&(n=d.beforeSuccess(e,t,a,n)),l.isArray(n)){var c={};c[d.response.statusName]=d.response.statusCode,c[d.response.msgName]="",c[d.response.dataName]=n,n=c}n[d.response.statusName]!=d.response.statusCode?s.find("dd."+L).addClass(N).text(n[d.response.msgName]):(s.find("dd."+L).removeClass(N),l.renderData(e,n[d.response.dataName],i,r,o),I[e].config.isEmpty=0==n[d.response.dataName].length),d.success&&d.success instanceof Function&&d.success(e,t,a,n)},error:function(n){s.find("dd[lay-value]:not(."+F+")").remove(),s.find("dd."+L).addClass(N).text("服务异常"),d.error&&d.error instanceof Function&&d.error(e,t,a,n)}})}},Y.prototype.renderData=function(e,t,l,s,d){var c=this;if(l){var f=function(){var i=[],r=0,o={0:t},l=M[e]?M[e]:U,d=function(){var e=i[r++]=[],t=o;o={},J.each(t,function(t,n){J.each(n,function(n,a){var i={pid:t,name:a[l.keyName],val:a[l.keyVal]};e.push(i);var r=a[l.keyChildren];r&&r.length&&(o[i.val]=r)})})};do d();while(Object.getOwnPropertyNames(o).length);var c=J("."+n+' dl[xid="'+e+'"]').parents("."+j),f=['<div class="xm-select-linkage">'];return J.each(i,function(e,t){var n=['<div style="left: '+(s-0)*e+'px;" class="xm-select-linkage-group xm-select-linkage-group'+(e+1)+" "+(0!=e?"xm-select-linkage-hide":"")+'">'];J.each(t,function(e,t){var a='<li title="'+t.name+'" pid="'+t.pid+'" value="'+t.val+'"><span>'+t.name+"</span></li>";n.push(a)}),n.push("</div>"),f=f.concat(n)}),f.push('<div style="clear: both; height: 288px;"></div>'),f.push("</div>"),c.find("dl").html(f.join("")),c.find("."+a).css("display","none"),{v:void 0}}();if("object"===("undefined"==typeof f?"undefined":_typeof(f)))return f.v}var u=J("."+n+' dl[xid="'+e+'"]').parents("."+j),p=M[e]?M[e]:U,h=u.find("."+i+" input"),v=[];u.find("dl").html(this.renderSelect(e,h.attr("placeholder")||h.attr("back"),t.map(function(e){return e[p.keySel]&&v.push({name:e[p.keyName],val:e[p.keyVal]}),{innerHTML:e[p.keyName],value:e[p.keyVal],sel:e[p.keySel],disabled:e[p.keyDis],type:e.type,name:e.name}})));var m=u.find("."+o),y=u.find("dl[xid]");if(d){var g=I[e].values;g.forEach(function(e,t){y.find('dd[lay-value="'+e.val+'"]').addClass(r)}),v.forEach(function(t,n){c.indexOf(g,t)==-1&&(c.addLabel(e,m,t),y.find('dd[lay-value="'+t.val+'"]').addClass(r),g.push(t))})}else v.forEach(function(t,n){c.addLabel(e,m,t),y.find('dd[lay-value="'+t.val+'"]').addClass(r)}),I[e].values=v;this.commonHanler(e,m)},Y.prototype.create=function(e,t,n){if(t&&n){var a=I[e],i=J('[xid="'+e+'"]'),r=i.find("dd."+F+"."+E),o=null,l=i.find("dd."+g);if(i.find("dd:not(."+F+"):not(."+g+")").each(function(e,t){n==J(t).find("span").attr("name")&&(o=t)}),!o){var s=a.config.create(e,n);l[0]?(l.attr("lay-value",s),l.find("span").text(n),l.find("span").attr("name",n),l.removeClass(C)):r.after(J(this.createDD(e,{innerHTML:n,value:s},g+" "+f)))}}else J("[xid="+e+"] dd."+g).remove()},Y.prototype.createDD=function(e,t,n){var a=J.trim(t.innerHTML),i=I[e].config.template(a,t.value,t.selected,t.disabled);return'<dd lay-value="'+t.value+'" class="'+(t.disabled?m:"")+" "+(n?n:"")+'">\n\t\t\t\t\t<div class="xm-unselect xm-form-checkbox '+(t.disabled?m:"")+'">\n\t\t\t\t\t\t<i class="'+D+'"></i>\n\t\t\t\t\t\t<span name="'+a+'">'+i+"</span>\n\t\t\t\t\t</div>\n\t\t\t\t</dd>"},Y.prototype.createQuickBtn=function(e,t){return'<div class="'+O+'" method="'+e.name+'" title="'+e.name+'" '+(t?'style="margin-right: '+t+'"':"")+'><i class="'+e.icon+'"></i><span>'+e.name+"</span></div>"},Y.prototype.renderBtns=function(e,t,n){var a=this,i=[],r=J('dl[xid="'+e+'"]');return i.push('<div class="'+V+'" show="'+t+'" style="max-width: '+(r.prev().width()-54)+'px;">'),J.each(I[e].config.btns,function(e,t){i.push(a.createQuickBtn(t,n))}),i.push("</div>"),i.push(this.createQuickBtn({icon:"iconfont icon-caidan",name:""})),i.join("")},Y.prototype.renderSelect=function(e,t,n){var i=this,r=[];return I[e].config.btns.length?(setTimeout(function(){var t=J('dl[xid="'+e+'"]');t.parents("."+j).attr(s,I[e].config.searchType),t.find("."+V).css("max-width",t.prev().width()-54+"px")},10),r.push(['<dd lay-value="" class="'+F+'" style="background-color: #FFF!important;">',this.renderBtns(e,null,"30px"),"</dd>",'<dd lay-value="" class="'+F+" "+E+'" style="background-color: #FFF!important;">','<i class="iconfont icon-sousuo"></i>','<input type="text" class="'+H+" "+a+'" placeholder="请搜索"/>',"</dd>"].join(""))):r.push('<dd lay-value="" class="'+F+'">'+t+"</dd>"),this.isArray(n)?J(n).each(function(t,n){n&&(n.type&&"optgroup"===n.type?r.push("<dt>"+n.name+"</dt>"):r.push(i.createDD(e,n)))}):J(n).find("*").each(function(t,n){("option"!=n.tagName.toLowerCase()||0!=t||n.value)&&("optgroup"===n.tagName.toLowerCase()?r.push("<dt>"+n.label+"</dt>"):r.push(i.createDD(e,n)))}),r.push('<dt style="display:none;"> </dt>'),r.push('<dd class="'+F+" "+L+" "+(2===r.length?N:"")+'">没有选项</dd>'),r.join("")},Y.prototype.on=function(){var e=this;this.one(),J(document).on("click",function(t){J(t.target).parents("."+T)[0]||(J("."+n+" dl ."+C).removeClass(C),J("."+n+" dl dd."+N).removeClass(N),J("."+n+" dl dd."+g).remove(),J.each(I,function(t,n){e.clearInput(t),n.values.length||e.changePlaceHolder(J('div[FS_ID="'+t+'"] .'+o))})),J("."+n+" ."+A).removeClass(A)})},Y.prototype.calcLabelLeft=function(e,t,n){var a=this.getPosition(e[0]);a.y=a.x+e[0].clientWidth;var i=e[0].offsetLeft;if(e.find("span").length)if(n){var r=e.find("span:last");r="none"==r.css("display")?r.prev()[0]:r[0];var o=this.getPosition(r);o.y=o.x+r.clientWidth,i=o.y>a.y?i-(o.y-a.y)-5:0}else if(t<0){var l=e.find(":last");l="none"==l.css("display")?l.prev()[0]:l[0];var s=this.getPosition(l);s.y=s.x+l.clientWidth,s.y>a.y&&(i-=10)}else i<0&&(i+=10),i>0&&(i=0);else i=0;e.css("left",i+"px")},Y.prototype.one=function(e){var n=this;J(e?e:document).off("click","."+T).on("click","."+T,function(e){var i=J(e.target),r=i.is(T)?i:i.parents("."+T),o=r.next(),l=o.attr("xid");if(J("dl[xid]").not(o).each(function(e,t){n.clearInput(J(t).attr("xid"))}),J("dl[xid]").not(o).find("dd."+C).removeClass(C),r.hasClass(y))return!1;if(i.is("."+S)||i.is("."+a+"[readonly]"))return n.changeShow(r,!r.parents("."+j).hasClass(A)),!1;if(r.find("."+a+":not(readonly)")[0]){var s=r.find("."+a),d={x:e.pageX,y:e.pageY},c=n.getPosition(r[0]);for(r.width();d.x>c.x;){if(J(document.elementFromPoint(d.x,d.y)).is(s))return s.focus(),n.changeShow(r,!0),!1;d.x-=50}}if(i.is("."+a))return n.changeShow(r,!0),!1;if(i.is('i[fsw="'+t+'"]')){var f={name:i.prev().text(),val:i.parent().attr("value")},u=o.find("dd[lay-value='"+f.val+"']");return!u.hasClass(m)&&(n.handlerLabel(l,u,!1,f),!1)}return n.changeShow(r,!r.parents("."+j).hasClass(A)),!1}),J(e?e:document).off("click","dl."+b).on("click","dl."+b,function(e){var t=J(e.target);if(t.is("."+k)||t.parents("."+k)[0]){t=t.is("li")?t:t.parents("li");var a=t.parents(".xm-select-linkage-group"),i=t.parents("dl").attr("xid");if(!i)return!1;a.find(".xm-select-active").removeClass("xm-select-active"),t.addClass("xm-select-active"),a.nextAll(".xm-select-linkage-group").addClass("xm-select-linkage-hide");var o=a.next(".xm-select-linkage-group");if(o.find("li").addClass("xm-select-linkage-hide"),o.find('li[pid="'+t.attr("value")+'"]').removeClass("xm-select-linkage-hide"),o[0]&&0!=o.find("li:not(.xm-select-linkage-hide)").length)o.removeClass("xm-select-linkage-hide");else{var l=[],s=0,d=!t.hasClass("xm-select-this");I[i].config.radio&&t.parents(".xm-select-linkage").find(".xm-select-this").removeClass("xm-select-this");do l[s++]={name:t.find("span").text(),val:t.attr("value")},t=t.parents(".xm-select-linkage-group").prev().find('li[value="'+t.attr("pid")+'"]');while(t.length);l.reverse();var c={name:l.map(function(e){return e.name}).join("/"),val:l.map(function(e){return e.val}).join("/")};n.handlerLabel(i,null,d,c)}return!1}if(t.is("dl"))return!1;if(t.is("dt"))return t.nextUntil("dt").each(function(e,t){t=J(t),t.hasClass(m)||t.hasClass(r)||t.click()}),!1;var f=t.is("dd")?t:t.parents("dd"),u=f.parent("dl").attr("xid");if(f.hasClass(m))return!1;if(f.hasClass(F)){var p=t.is("."+O)?t:t.parents("."+O);if(!p[0])return!1;var h=p.attr("method"),v=I[u].config.btns.filter(function(e){return e.name==h})[0];return v&&v.click&&v.click instanceof Function&&v.click(u,n),!1}var y=!f.hasClass(r);return n.handlerLabel(u,f,y),!1})},Y.prototype.linkageAdd=function(e,t){var n=J('dl[xid="'+e+'"]');n.find(".xm-select-active").removeClass("xm-select-active");var a=t.val.split("/"),i=void 0,r=void 0,o=0,l=[];do i=a[o],r=n.find(".xm-select-linkage-group"+(o+1)+' li[value="'+i+'"]'),r[0]&&l.push(r),o++;while(r.length&&void 0!=i);l.length==a.length&&J.each(l,function(e,t){t.addClass("xm-select-this")})},Y.prototype.linkageDel=function(e,t){var n=J('dl[xid="'+e+'"]'),a=t.val.split("/"),i=void 0,r=void 0,o=a.length-1;do i=a[o],r=n.find(".xm-select-linkage-group"+(o+1)+' li[value="'+i+'"]'),r.parent().next().find("li[pid="+i+"].xm-select-this").length||r.removeClass("xm-select-this"),o--;while(r.length&&void 0!=i)},Y.prototype.valToName=function(e,t){var n=J('dl[xid="'+e+'"]'),a=(t+"").split("/");if(!a.length)return null;var i=[];return J.each(a,function(e,t){var a=n.find(".xm-select-linkage-group"+(e+1)+' li[value="'+t+'"] span').text();i.push(a)}),i.length==a.length?i.join("/"):null},Y.prototype.commonHanler=function(e,n){n&&n[0]&&(this.checkHideSpan(e,n),this.changePlaceHolder(n),this.retop(n.parents("."+j)),this.calcLabelLeft(n,0,!0),this.setHidnVal(e,n),n.parents("."+T+" ."+t).attr("title",I[e].values.map(function(e){return e.name}).join(",")))},Y.prototype.setHidnVal=function(e,t){t&&t[0]&&t.parents("."+n).find("."+w).val(I[e].values.map(function(e){return e.val}).join(","))},Y.prototype.initVal=function(e){var t=this,n={};e?n[e]=I[e]:n=I,J.each(n,function(e,n){var a=n.values,i=J('dl[xid="'+e+'"]').parent(),l=i.find("."+o),s=i.find("dl");s.find("dd."+r).removeClass(r);var d=a.concat([]);d.concat([]).forEach(function(n,a){t.addLabel(e,l,n),s.find('dd[lay-value="'+n.val+'"]').addClass(r)}),n.config.radio&&d.length&&a.push(d[d.length-1]),t.commonHanler(e,l)})},Y.prototype.handlerLabel=function(e,t,n,a,i){var l=J('[xid="'+e+'"]').prev().find("."+o),s=t&&{name:t.find("span").attr("name"),val:t.attr("lay-value")},d=I[e].values,c=I[e].config.on||_.on[e],f=I[e].config.endOn||_.endOn[e];a&&(s=a);var u=I[e];if(n&&u.config.max&&u.values.length>=u.config.max){var p=_.maxTips[e]||I[e].config.maxTips;return void(p&&p(e,d.concat([]),s,u.config.max))}if(!(!i&&c&&c instanceof Function&&0==c(e,d.concat([]),s,n,t&&t.hasClass(m)))){var h=J('dl[xid="'+e+'"]');n?(t&&t[0]?(t.addClass(r),t.removeClass(g)):h.find(".xm-select-linkage")[0]&&this.linkageAdd(e,s),this.addLabel(e,l,s),d.push(s)):(t&&t[0]?t.removeClass(r):h.find(".xm-select-linkage")[0]&&this.linkageDel(e,s),this.delLabel(e,l,s),this.remove(d,s)),l[0]&&(u.config.radio&&this.changeShow(l,!1),l.parents("."+T).prev().removeClass("layui-form-danger"),u.config.clearInput&&this.clearInput(e),this.commonHanler(e,l),!i&&f&&f instanceof Function&&f(e,d.concat([]),s,n,t&&t.hasClass(m)))}},Y.prototype.addLabel=function(e,n,a){if(a){var i='fsw="'+t+'"',o=[J("<span "+i+' value="'+a.val+'"><font '+i+">"+a.name+"</font></span>"),J("<i "+i+' class="iconfont icon-close"></i>')],l=o[0],s=o[1];l.append(s);var d=I[e];d.config.radio&&(d.values.length=0,J('dl[xid="'+e+'"]').find("dd."+r+':not([lay-value="'+a.val+'"])').removeClass(r),n.find("span").remove()),n.find("input").css("width","50px"),n.find("input").before(l)}},Y.prototype.delLabel=function(e,t,n){n&&t.find('span[value="'+n.val+'"]:first').remove()},Y.prototype.checkHideSpan=function(e,n){n.parents("."+t)[0].offsetHeight+5;n.find("span.xm-span-hide").removeClass("xm-span-hide"),n.find("span[style]").remove();var a=I[e].config.showCount;n.find("span").each(function(e,t){e>=a&&J(t).addClass("xm-span-hide")});var i=n.find("span:eq("+a+")");i[0]&&i.before(J('<span style="padding-right: 6px;" fsw="'+t+'"> + '+(n.find("span").length-a)+"</span>"))},Y.prototype.retop=function(e){var n=e.find("dl"),a=e.offset().top+e.outerHeight()+5-Q.scrollTop(),i=n.outerHeight(),r=e.hasClass("layui-form-selectup")||n.css("top").indexOf("-")!=-1||a+i>Q.height()&&a>=i;e=e.find("."+t);var o=I[n.attr("xid")],l=n.parents(".layui-form-pane")[0]&&n.prev()[0].clientHeight>38?14:10;if(o){if("up"==o.config.direction)return void n.css({top:"auto",bottom:"42px"});if("down"==o.config.direction)return void n.css({top:e[0].offsetTop+e.height()+l+"px",bottom:"auto"})}r?n.css({top:"auto",bottom:"42px"}):n.css({top:e[0].offsetTop+e.height()+l+"px",bottom:"auto"})},Y.prototype.changeShow=function(e,t){J(".layui-form-selected").removeClass("layui-form-selected"),J(".layui-laydate").remove();var i=e.parents("."+j);if(J("."+n+" ."+j).not(i).removeClass(A),t)this.retop(i),i.addClass(A),i.find("."+a).focus(),i.find("dl dd[lay-value]:not(."+F+")").length||i.find("dl ."+L).addClass(N);else{var r=i.find("dl").attr("xid");i.removeClass(A),this.clearInput(r),i.find("dl ."+N).removeClass(N),i.find("dl dd."+C).removeClass(C),i.find("dl dd."+g).remove(),r&&I[r]&&I[r].config.isEmpty&&this.triggerSearch(i),this.changePlaceHolder(i.find("."+o))}},Y.prototype.changePlaceHolder=function(e){var r=e.parents("."+T);if(r[0]||(r=e.parents("dl").prev()),r[0]){var o=e.parents("."+n).find("dl[xid]").attr("xid");if(I[o]&&I[o].config.height);else{var l=r.find("."+t)[0].clientHeight;r.css("height",(l>34?l+4:l)+"px");var s=r.parents("."+n).parent().prev();s.is(".layui-form-label")&&r.parents(".layui-form-pane")[0]&&(l=l>36?l+4:l,!l&&(l=36),r.css("height",l+"px"),s.css({height:l+2+"px",lineHeight:l-18+"px"}))}var d=r.find("."+i+" input"),c=!e.find("span:last")[0]&&!r.find("."+a).val();if(c){var f=d.attr("back");d.removeAttr("back"),d.attr("placeholder",f)}else{var u=d.attr("placeholder");d.removeAttr("placeholder"),d.attr("back",u)}}},Y.prototype.indexOf=function(e,t){for(var n=0;n<e.length;n++)if(e[n].val==t||e[n].val==(t?t.val:t)||e[n]==t||JSON.stringify(e[n])==JSON.stringify(t))return n;return-1},Y.prototype.remove=function(e,t){var n=this.indexOf(e,t?t.val:t);return n>-1&&(e.splice(n,1),!0)},Y.prototype.selectAll=function(e,t,n){var a=this,i=J('[xid="'+e+'"]');i[0]&&(i.find(".xm-select-linkage")[0]||i.find("dd[lay-value]:not(."+F+"):not(."+r+")"+(n?":not(."+m+")":"")).each(function(n,r){r=J(r);var o={name:r.find("span").attr("name"),val:r.attr("lay-value")};a.handlerLabel(e,i.find('dd[lay-value="'+o.val+'"]'),!0,o,!t)}))},Y.prototype.removeAll=function(e,t,n){var a=this,i=J('[xid="'+e+'"]');if(i[0])return i.find(".xm-select-linkage")[0]?void I[e].values.concat([]).forEach(function(e,t){var n=e.val.split("/"),a=void 0,r=void 0,o=0;do a=n[o++],r=i.find(".xm-select-linkage-group"+o+':not(.xm-select-linkage-hide) li[value="'+a+'"]'),r.click();while(r.length&&void 0!=a)}):void I[e].values.concat([]).forEach(function(r,o){n&&i.find('dd[lay-value="'+r.val+'"]').hasClass(m)||a.handlerLabel(e,i.find('dd[lay-value="'+r.val+'"]'),!1,r,!t)})},Y.prototype.reverse=function(e,t,n){var a=this,i=J('[xid="'+e+'"]');i[0]&&(i.find(".xm-select-linkage")[0]||i.find("dd[lay-value]:not(."+F+")"+(n?":not(."+m+")":"")).each(function(n,o){o=J(o);var l={name:o.find("span").attr("name"),val:o.attr("lay-value")};a.handlerLabel(e,i.find('dd[lay-value="'+l.val+'"]'),!o.hasClass(r),l,!t)}))},Y.prototype.skin=function(e){var t=["default","primary","normal","warm","danger"],a=t[Math.floor(Math.random()*t.length)];J('dl[xid="'+e+'"]').parents("."+n).find("."+j).attr("xm-select-skin",a),this.check(e)&&this.commonHanler(e,J('dl[xid="'+e+'"]').parents("."+n).find("."+o))},Y.prototype.getPosition=function(e){for(var t=0,n=0;null!=e;)t+=e.offsetLeft,n+=e.offsetTop,e=e.offsetParent;return{x:t,y:n}},Y.prototype.onreset=function(){J(document).on("click","[type=reset]",function(e){J(e.target).parents("form").find("."+n+" dl[xid]").each(function(e,t){var n=t.getAttribute("xid"),a=J(t),i=void 0,r={};G.removeAll(n),I[n].config.init.forEach(function(e,t){e&&(!r[e]||I[n].config.repeat)&&(i=a.find('dd[lay-value="'+e.val+'"]'))[0]&&(G.handlerLabel(n,i,!0),r[e]=1)})})})},Y.prototype.bindEvent=function(e,t,n){t&&t instanceof Function&&(n=t,t=null),n&&n instanceof Function&&(t?I[t]?(I[t].config[e]=n,delete _[e][t]):_[e][t]=n:J.each(I,function(t,a){I[t]?I[t].config[e]=n:_[e][t]=n}))},Y.prototype.check=function(e){return!(!J('dl[xid="'+e+'"]').length&&!J('select[xm-select="'+e+'"]').length)||(delete I[e],!1)},Y.prototype.render=function(e,t){G.init(t),G.one(J('dl[xid="'+e+'"]').parents("."+n)),G.initVal(e)};var $=function(){var t=this;if(this.v=e,this.render(),z){var n={};n.install=function(e,n){e.directive("xm-select",function(e,n,a,i){var r=n.value,o=r.id,l=r.vals;e.setAttribute("xm-select",o),setTimeout(function(){if(t.render(o,{init:l?l.concat([]):null}),a.children._isVList&&G.check(o)){var e=M[o]?M[o]:U;t.data(o,"local",{arr:a.children.map(function(t){var n={};return t.data&&t.data.domProps&&(n[e.keyName]=t.data.domProps.textContent,n[e.keyVal]=t.data.domProps.value),t.data&&t.data.attrs&&(n[e.keyDis]=t.data.attrs.disabled),n})}).value(o,l)}},10)})},z.use(n)}},G=new Y;return $.prototype.value=function(e,t,n){if("string"!=typeof e)return[];var a=I[e];if(!G.check(e))return[];if("string"==typeof t||void 0==t){var i=a.values.concat([])||[];return"val"==t?i.map(function(e){return e.val}):"valStr"==t?i.map(function(e){return e.val}).join(","):"name"==t?i.map(function(e){return e.name}):"nameStr"==t?i.map(function(e){return e.name}).join(","):i}if(G.isArray(t)){var r=J('[xid="'+e+'"]'),o={},l=void 0,s=!0;0==n?s=!1:1==n?s=!0:G.removeAll(e),s&&a.values.forEach(function(e,t){o[e.val]=1}),t.forEach(function(t,n){if(t&&(!o[t]||a.config.repeat))if((l=r.find('dd[lay-value="'+t+'"]'))[0])G.handlerLabel(e,l,s,null,!0),o[t]=1;else{var i=G.valToName(e,t);i&&(G.handlerLabel(e,l,s,{name:i,val:t},!0),o[t]=1)}})}},$.prototype.on=function(e,t,n){return G.bindEvent(n?"endOn":"on",e,t),this},$.prototype.filter=function(e,t){return G.bindEvent("filter",e,t),this},$.prototype.maxTips=function(e,t){return G.bindEvent("maxTips",e,t),this},$.prototype.config=function(e,t,a){return e&&"object"==("undefined"==typeof e?"undefined":_typeof(e))&&(a=1==t,t=e,e=null),t&&"object"==("undefined"==typeof t?"undefined":_typeof(t))&&(a&&(t.header||(t.header={}),t.header["Content-Type"]="application/json; charset=UTF-8",t.dataType="json"),e?(M[e]=J.extend(!0,{},M[e]||U,t),!G.check(e)&&this.render(e),I[e]&&t.direction&&(I[e].config.direction=t.direction),I[e]&&t.clearInput&&(I[e].config.clearInput=!0),t.searchUrl&&I[e]&&G.triggerSearch(J("."+n+' dl[xid="'+e+'"]').parents("."+j),!0)):(J.extend(!0,U,t),J.each(M,function(e,n){J.extend(!0,n,t)}))),this},$.prototype.render=function(e,a){e&&"object"==("undefined"==typeof e?"undefined":_typeof(e))&&(a=e,e=null);var i=a?{init:a.init,disabled:a.disabled,max:a.max,isSearch:a.isSearch,searchUrl:a.searchUrl,isCreate:a.isCreate,radio:a.radio,skin:a.skin,direction:a.direction,height:a.height,formname:a.formname,layverify:a.layverify,layverType:a.layverType,searchType:"dl"==a.searchType?1:0,showCount:a.showCount,placeholder:a.placeholder,create:a.create,filter:a.filter,maxTips:a.maxTips,on:a.on,template:a.template,clearInput:a.clearInput}:{};return e&&!G.check(e)?this:(e?(B[e]={},J.extend(B[e],i)):J.extend(W,i),J(J("select["+t+'="'+e+'"]')[0]?"select["+t+'="'+e+'"]':"select["+t+"]").each(function(e,a){var i=a.getAttribute(t);G.render(i,a),setTimeout(function(){return G.setHidnVal(i,J('select[xm-select="'+i+'"] + div.'+n+" ."+o))},10)}),this)},$.prototype.disabled=function(e){var t={};return e?G.check(e)&&(t[e]=I[e]):t={},J.each(t,function(e,t){J('dl[xid="'+e+'"]').prev().addClass(y)}),this},$.prototype.undisabled=function(e){var t={};return e?G.check(e)&&(t[e]=I[e]):t={},J.each(t,function(e,t){J('dl[xid="'+e+'"]').prev().removeClass(y)}),this},$.prototype.data=function(e,t,n){return e&&t&&n?(!G.check(e)&&this.render(e),this.value(e,[]),this.config(e,n),"local"==t?G.renderData(e,n.arr,1==n.linkage,n.linkageWidth?n.linkageWidth:"100"):"server"==t&&G.ajax(e,n.url,n.keyword,1==n.linkage,n.linkageWidth?n.linkageWidth:"100"),this):this},$.prototype.btns=function(e,t,n){if(e&&G.isArray(e)&&(t=e,e=null),!t||!G.isArray(t))return this;var a={};return e?G.check(e)&&(a[e]=I[e]):a=I,t=t.map(function(e){if("string"==typeof e){if("select"==e)return q[0];if("remove"==e)return q[1];if("reverse"==e)return q[2];if("skin"==e)return q[3]}return e}),J.each(a,function(e,a){a.config.btns=t;var r=J('dl[xid="'+e+'"]').find("."+F+":first");if(t.length){var o=n&&n.show&&("name"==n.show||"icon"==n.show)?n.show:"",l=G.renderBtns(e,o,n&&n.space?n.space:"30px");r.html(l)}else{var s=r.parents("."+j).find("."+i+" input"),d=s.attr("placeholder")||s.attr("back");r.html(d),r.removeAttr("style")}}),this},$.prototype.search=function(e,t){return e&&G.check(e)&&(M[e]=J.extend(!0,{},M[e]||U,{first:!0,searchVal:t}),G.triggerSearch(J('dl[xid="'+e+'"]').parents("."+j),!0)),this},new $});