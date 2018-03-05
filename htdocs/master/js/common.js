/*var webRoot="http://fx.xunlei.com";
document.domain = "xunlei.com";*/

function getCookie(sName){
	var sSearch = sName + "=";
	var iOffset = document.cookie.indexOf(sSearch);
	if (iOffset != -1) {
		iOffset += sSearch.length;
		var iEnd = document.cookie.indexOf(";", iOffset);
		if (iEnd == -1)
			iEnd = document.cookie.length;
		return unescape(document.cookie.substring(iOffset, iEnd));
	}else 
		return "";
}

function setCookie(sName,sValue,sHours){
	if(arguments.length>2){
		var expireDate=new Date(new Date().getTime()+sHours*3600000);
		document.cookie = sName + "=" + escape(sValue) + "; path=/; domain=jeedon.com; expires=" + expireDate.toGMTString();
	}else
		document.cookie = sName + "=" + escape(sValue) + "; path=/; domain=jeedon.com"; 
    top.window.location.href = "/";		
		
}
function checkLoginStatus(){
	return getCookie("sessionid");	
}
function getDataByIframe(sUrl,callback){
	var ifr = document.createElement("<iframe id='ifr' width=0>");
	ifr.src = sUrl;
	ifr.attachEvent("onload",function(){callback();})
	document.body.appendChild(ifr);
}
function callback() {	
	if(checkLoginStatus()){
		var s = document.getElementById("ifr").contentWindow.document.body.innerHTML;
		//checkAccess(s);//添加右侧上部选项
		var sHTML = "欢迎您，<b>"+getCookie("nickname")+"</b> <img src=\"images/vip.gif\" />";
		document.getElementById("divLoginStatus").innerHTML=sHTML;
	}else{
		window.location="/";
	}
}
function loadLeftMenu(){
	if(checkLoginStatus()){
		var sHTML = "欢迎您，<b>"+getCookie("nickname")+"</b>";
		document.getElementById("divLoginStatus").innerHTML=sHTML;
		parent.document.getElementById("frMenu").src="php/leftMenu.php";
	}	
}
function createUploadFileTr(){
	var oTable = document.getElementById("file_tab");
	var oRow1=oTable.insertRow(oTable.rows.length);
	var aRows=oTable.rows;
	var oIpt=document.getElementById("extraFileNum_ipt");
	oIpt.value++;
	var idx="upFile_tr_"+(aRows.length-1);
	oRow1.id=idx;
	var aCells=oRow1.cells;
	var oCell1_1=aRows(oRow1.rowIndex).insertCell(aCells.length);
	var oCell1_2=aRows(oRow1.rowIndex).insertCell(aCells.length);
	oCell1_1.width="9%";
	oCell1_1.align="right";
	oCell1_1.className="tbbody";
	oCell1_1.innerHTML='<a href="javascript:deleteUploadFileTr('+idx+');"><img  src="../images/-.gif" width="11" height="11"  border="0"/></a>&nbsp;&nbsp;附件：'+(aRows.length-1)+'&nbsp;';
	oCell1_2.innerHTML='<input name="extraFile_'+(aRows.length-1)+'" type="file" />';
	oCell1_2.colspan="8";
	oCell1_2.className="tbbody";
}
function deleteUploadFileTr(o){
	var oIpt=document.getElementById("extraFileNum_ipt");
	oIpt.value--;
	o.removeNode(true);
}
function isUndef(a){ 
	return typeof a == "undefined";
}
function isNull(a){ 
	return typeof a == "object" && !a; 
}

function $(){   
	var elements=new Array();     
	for(var i=0;i<arguments.length;i++){        
		var element=arguments[i];           
		if(typeof element=='string')
			element=document.getElementById(element);           
		if(arguments.length==1)    
			return element;
		elements.push(element);       
	}  
	return elements;  
}
function showSubIndexPage(url){
	parent.document.getElementById("frContent").src=url;
}
function switchMenuStyle(){
	var sDisplay = $("ulSub").style.display;
	$("ulSub").style.display = sDisplay=="block"?"none":"block";
	$("oImg").src = sDisplay=="block"?"../images/+.gif":"../images/-.gif";
}

function switchMenuStyle(subid,imgid){
	var sDisplay = $(subid).style.display;
	$(subid).style.display = sDisplay=="block"?"none":"block";
	$(imgid).src = sDisplay=="block"?"../images/+.gif":"../images/-.gif";
}

function getCacheTime(){
	var clsDate = new Date();
	return "CacheTime=" + clsDate.getTime();
}
function appendCacheTime(str)
{
    var ctm = new Date().getTime();
    if ( str.indexOf('CacheTime') != -1) str = str.replace(/CacheTime=[^&]+/, 'CacheTime=' + ctm);
    else if ( str.indexOf('?') != -1) str += '&CacheTime=' + ctm;
    else str += '?CacheTime=' +ctm;
    return str;
}
function checkAccess(str){
	/*
	var divMenu = document.getElementById("divMenu");
	var aHref = divMenu.getElementsByTagName("a");
	var aSpan = divMenu.getElementsByTagName("span");
	
	for(var i=0; i<aHref.length;i++){
		aHref[i].style.display = aAccess[i]==0?"none":"";
		if(i < aHref.length-1 && aAccess[i]==0){
			aSpan[i].style.display="none";
		}
		if(flag == 0 && aAccess[i]==0){
			swithMenu(aHref[i+1].title);
			flag =1;
		}
	}
	if(flag == 0){
		swithMenu("Movie");
	}
	*/
	var aAccess = str.split("");
	var iLength = aAccess.length;
	var sHTML = "";
	var flag = 0;
	var spanflag = 0;
	var aMenu = [
				 	'<a href=javascript:swithMenu("Movie") class="a8">影片管理</a>',
					'<a href=javascript:swithMenu("CP") class="a8">CP管理</a>',                    
					'<a href=javascript:swithMenu("TV") class="a8">直播管理</a>',
					'<a href=javascript:swithMenu("Play") class="a8">数据统计</a>',
					'<a href=javascript:swithMenu("Union") class="a8">联盟管理</a>',
					'<a href=javascript:swithMenu("Kankan") class="a8">看看管理</a>',
					'<a href=javascript:swithMenu("Copyright") class="a8">版权管理</a>',
          '<a href=javascript:swithMenuCgi("http://auto.fx.xunlei.com/cgi-bin/auto/cgi_cearte_menu?") class="a8">自动化管理</a>',
          '<a href=javascript:swithMenu("Star") class="a8">明星管理</a>',
          '<a href=javascript:swithMenu("Xmp") class="a8">XMP管理</a>'
				]
	var sName = ['Movie','CP','TV','Play','Union','Kankan','Copyright','http://auto.fx.xunlei.com/cgi-bin/auto/cgi_cearte_menu?','Star','Xmp'];
	if(iLength>3&&aAccess[3]==1)
		flag=1;
	for(var i=0; i<iLength; i++){
		if(aAccess[i] == 1){
			if(spanflag>0)
			{
				if(i%6==0)
					sHTML += " <br> ";
				else
					sHTML += "<span> | </span>";
			}
			sHTML += aMenu[i];
			if(flag==0){
				if (i==7)
				{
					swithMenuCgi(sName[i]);
				}
				else
				{
					swithMenu(sName[i]);
				}
				
				flag=-1;
			}
			spanflag++;
		}
	}
	if(flag==1)
		swithMenu(sName[3]);
	document.getElementById("divMenu").innerHTML = sHTML;
}
function swithMenu(id){
	var ofrMenu = parent.document.getElementById("frMenu");
	var sTemp = "_menu.html";
	ofrMenu.src= id + "_menu.html";
}
function swithMenuCgi(id)
{
	var ofrMenu = parent.document.getElementById("frMenu");
	ofrMenu.src= id + getCacheTime();
}

function getStringParam(url, name)
{
	var pos1, pos2;
	if ( (pos1=url.indexOf(name+"=")) == -1 )
		return "";
		
	if ( (pos2=url.indexOf("&", pos1)) == -1 )
		return url.substr(pos1+name.length+1);
	else
		return url.substring(pos1+name.length+1, pos2);
}

function getIntParam(url, name)
{
		var value = getStringParam(url, name);
		if ( value == "" || isNaN(value))
			return -1;
			
		return parseInt(value);
}
function hmover(o){
o.parentNode.style.backgroundColor = "#ECF5FE";
}
function hmout(o){
o.parentNode.style.backgroundColor = "";
}

function requireLogin()
{
    if(getCookie('usrname') == '')
    {
        if (top.location!='http://127.0.0.1')
        {
            top.location='http://127.0.0.1';   
        }
    }   
}
requireLogin();
