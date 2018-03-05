<?php /* Smarty version 2.6.18, created on 2017-05-29 20:32:51
         compiled from basic.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>cntv点播直播服务管理系统</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
label {
	color:#3F7CAB;
	text-decoration:underline;
	cursor:pointer;
}
.bb {
	color:#3F7CAB;
	font-weight:bold;
}
#MovieClip {position:absolute;left:0px;top:0px;display:none;border:2px solid #407dab; padding:5px; font-size:12px; text-align:center; background-color:white; width:530px; height:418px;}
#MovieClip #title{width:100%;}
#MovieClip #title #_movie{color:#3f7cab; width:200px;float:left; text-align:left; font-weight:bold;}
#MovieClip #title #_close{width:38px;float:right; text-align:right;color:#3f7cab;cursor:pointer;}
#MovieClip #title #_close span{font-family:"Webdings";font-size:14px;line-height:12px;color:red;}
#MovieClip #BigImage {width:520px; height:295px; background-color:#e1effd; margin-top:16px;}
#MovieClip #InfoBar {text-align:right; padding-top:12px; padding-right:13px;}
#MovieClip hr {height:2px; margin:0px; color:#407dab;}
#MovieClip #SmallImage{text-align:left; height:60px;}
#MovieClip #SmallImage #leftArraw {width:8px; float:left; text-align:center; padding-top:22px; font-family:"Wingdings 3"; background-color:#e1effd; height:30px; font-size:8px; cursor:pointer;}
#MovieClip #SmallImage #SmallImageBody {width:503px; float:left;padding-left:5px; white-space:nowrap; overflow-x:hidden;margin-right:2px;}
#MovieClip #SmallImage #SmallImageBody #image{width:100%;}
#MovieClip #SmallImage #SmallImageBody img {margin-right:4px; cursor:pointer;}
#MovieClip #SmallImage #SmallImageBody img:hover {border:1px solid #FF6600;}
#MovieClip #SmallImage #rightArraw {width:8px; float:left; text-align:center; padding-top:22px; font-family:"Wingdings 3";background-color:#e1effd; height:30px; font-size:8px; cursor:pointer;}
</style>
<link href="/css/H.css" rel="stylesheet" type="text/css">
<link href="/css/pager.css" rel="stylesheet" type="text/css">
<script src="/js/common.js"></script>
<script src="/js/global.js"></script>

</head>


<script language="javascript">
	
function myfunc(formTmp,i)
{
	var ichannelid =formTmp.channelid.value;
    var MyURL;
    with (formTmp)
   { 
	    if(i==0)
	    {
		    if(tag1.value==""){
			    alert("第一个标签都没有，加一个吧");
			    tag1.focus();
			    return false;
		    }
		    if (type_of_res.value < 100){
			    alert("请选择一个二级类别");
			    type_of_res.focus();
			    return false;
		    }
	        if( ! confirm('确定资源无问题吗?') )
			    return false;
	    }else
	    {
	        if( ! confirm('确定吗？') )
			    return false;
	    }
	    MyURL=webRoot+"/cgi-bin/cgi_tv_edit?Fchannel_id="+ichannelid+"&opt=del&"+getCacheTime();
	    //alert(MyURL);
	}
	new Ajax.Request(MyURL,
	{
	    response: "Text",
	    onSuccess: function(evt)
	    {
	        var result = evt.response;
	        //alert(result);   
	        delRow(formTmp,result ); 
	    },
	    on500: function(){alert("wrong wrong");},
	    onException: function(){alert("error!");}
	});
}

function delRow( formTmp, result )
{
		var idx = 0;
		//alert(result);
	   if ( ( idx = result.indexOf("msg_alert")) != -1)
	   {
	   		alert(result.substring(idx + ("msg_alert").length));
			return;
	   }
	   else if( result != "abcd" ) 
	   {alert("wrong");
	        return;
	   }       
	   var index;
	   for( var ele=formTmp.parentElement; ; ele=ele.parentElement)
       {
            with(ele){
            //alert(tagName);
            if(tagName=="TR")
	             index = rowIndex;
	             if(tagName=="TABLE")
	             {
	                   deleteRow(index);
	                   break; 
	             }
	        }   
       }
}

function setMmsInfo(formTmp)
{
	var ichannelid = formTmp.channelid.value;
	var url= "/cgi-bin/cgi_tv_mms_edit?Fchannel_id="+ichannelid+"&"+getCacheTime();

	location.href  = url;
}

function getTv(formTmp)
{
	var ipage = document.sortForm.page.value;
	var ichannelid = formTmp.channelid.value;
	var url= "/cgi-bin/cgi_tv_edit?page=" + ipage +"&Fchannel_id="+ichannelid+"&"+getCacheTime();

	location.href  = url;
}

function getServerInfo(formTmp)
{
	var ichannelid = formTmp.channelid.value;
	var url= "/cgi-bin/cgi_tv_svrinfo_edit?Fchannel_id="+ichannelid+"&"+getCacheTime();

	location.href  = url;
}

function getPrevueInfo(ichannelid)
{
	var url= "/cgi-bin/cgi_tv_prevue_edit?Fchannel_id="+ichannelid+"&"+getCacheTime();

	location.href  = url;
}

function viewMovie(formTmp)
{
	var movieid = formTmp.channelid.value;
	var url= "http://play.kankan.xunlei.com/?hallid="+movieid;

	var oWindow = window.open(url,'fxWindow');
	oWindow.focus();
	//window.open(url);
	//location.href  = url;
}

</script>

<body >
<div id="MovieClip">
  <div id="title"><div id="_movie"></div><div id="_close" onclick="hiddenImage()" title="关闭"><span>r</span>关闭</div></div>
  <div id="BigImage"></div>
  <div id="InfoBar"></div>
  <hr />
  <div id="SmallImage">
    <div id="leftArraw">t</div>
    <div id="SmallImageBody"><div id="image"></div></div>
    <div id="rightArraw">u</div>
  </div>
</div>
<table width="100%" height="160" border="0" cellpadding="0" cellspacing="0" style="margin:0 0 0 0">
	<tr>
		<td valign="top" bgcolor="#FFFFFF">
			
			<table width="100%" height="13" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td width="45%" height="45" align="left" style="font-size:12px; font-weight:bolder; color:#666666;">&nbsp;&nbsp;
                    <span class="bb">欢迎使用智通后台发布系统，您发布的内容审核通过后将发布到智通网，优秀的信息将被推广。</span></td>
					<td width="55%" align="right" style="font-size:12px; font-weight:bolder; color:#666666;">&nbsp;&nbsp;</td>
				</tr>
		  </table>

<table width="99%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#B9CDD9" class="tb">
  <form name="sortForm">
  <input type="hidden" name="page" value="1">
  </form>
  <tr>
  	<td width="5%" align="center" bgcolor="#E1EFFD" class="new12" style="padding:0px;"><span class="bb"></span></td>
	<td width="12%" align="center" bgcolor="#E1EFFD" class="new12" style="padding:0px;"><span class="bb">解决方案</span></td>
	<td width="8%" align="center" bgcolor="#E1EFFD" class="new12" style="padding:0px;"><span class="bb">产品应用</span></td>
	<td width="9%" height="28"  bgcolor="#E1EFFD" class="new12" align="center" style="padding:0px;"><span class="bb">成功案例</span></td>
    <td width="10%" align="center" bgcolor="#E1EFFD" class="new12" style="padding:0px;">&nbsp;<span class="bb">文章</span></td>
  </tr>
  
  <tr>
       <td width="5%" align="center" bgcolor="#ffffff" class="new12" style="padding:0px;">发布数量</td>
       <td width="10%" align="center" bgcolor="#ffffff" class="new12" style="padding:0px;"><?php echo $this->_tpl_vars['fangan']; ?>
</td>
	   <td width="12%" align="center" bgcolor="#ffffff" class="new12" style="padding:0px;"><?php echo $this->_tpl_vars['chanpin']; ?>
</td>
	  <td width="8%" align="center"   bgcolor="#ffffff" class="new12" style="padding:0px;"><?php echo $this->_tpl_vars['anli']; ?>
</td>
	  <td width="9%" height="28"      bgcolor="#ffffff" class="new12" align="center" style="padding:0px;"><?php echo $this->_tpl_vars['wenzhang']; ?>
</td>
</tr>
  <!--tr>
       <td width="5%" align="center" bgcolor="#ffffff" class="new12" style="padding:0px;">采纳数量</td>
       <td width="10%" align="center" bgcolor="#ffffff" class="new12" style="padding:0px;"><?php echo $this->_tpl_vars['fangan']; ?>
</td>
	   <td width="12%" align="center" bgcolor="#ffffff" class="new12" style="padding:0px;"><?php echo $this->_tpl_vars['chanpin']; ?>
</td>
	  <td width="8%" align="center"   bgcolor="#ffffff" class="new12" style="padding:0px;"><?php echo $this->_tpl_vars['anli']; ?>
</td>
	  <td width="9%" height="28"      bgcolor="#ffffff" class="new12" align="center" style="padding:0px;"><?php echo $this->_tpl_vars['wenzhang']; ?>
</td>
</tr-->

<tr>
       <td width="5%" align="center" bgcolor="#ffffff" class="new12" style="padding:0px;">累计阅读数</td>
       <td width="10%" align="center" bgcolor="#ffffff" class="new12" style="padding:0px;"><?php echo $this->_tpl_vars['fanganCount']; ?>
</td>
	   <td width="12%" align="center" bgcolor="#ffffff" class="new12" style="padding:0px;"><?php echo $this->_tpl_vars['chanpinCount']; ?>
</td>
	  <td width="8%" align="center"   bgcolor="#ffffff" class="new12" style="padding:0px;"><?php echo $this->_tpl_vars['anliCount']; ?>
</td>
	  <td width="9%" height="28"      bgcolor="#ffffff" class="new12" align="center" style="padding:0px;"><?php echo $this->_tpl_vars['wenzhangCount']; ?>
</td>
</tr>
</table>

		</td>
	</tr>
</table>

<table width="100%" height="13" border="0" cellpadding="0" cellspacing="0">
				
                <tr>
					<td width="45%" height="25" align="left" style="font-size:12px; font-weight:bolder; color:#666666;">&nbsp;&nbsp;
                    <span class="bb">解决方案：物联网解决方案介绍，包括家居、农业、工业、医疗、交通、能源、旅游等等</span></td>
					<td width="55%" align="right" style="font-size:12px; font-weight:bolder; color:#666666;">&nbsp;&nbsp;</td>
				</tr>
                <tr>
					<td width="45%" height="25" align="left" style="font-size:12px; font-weight:bolder; color:#666666;">&nbsp;&nbsp;
                    <span class="bb">成功案例：成功实施的案例介绍，发布案例信息助于提高用户对公司的认可和信任</span></td>
					<td width="55%" align="right" style="font-size:12px; font-weight:bolder; color:#666666;">&nbsp;&nbsp;</td>
				</tr>
                <tr>
					<td width="45%" height="25" align="left" style="font-size:12px; font-weight:bolder; color:#666666;">&nbsp;&nbsp;
                    <span class="bb">产品信息：介绍公司的软件或硬件产品，包括软件系统、服务平台或者是某个硬件产品（如智能锁）等</span></td>
					<td width="55%" align="right" style="font-size:12px; font-weight:bolder; color:#666666;">&nbsp;&nbsp;</td>
				</tr>
                <tr>
					<td width="45%" height="25" align="left" style="font-size:12px; font-weight:bolder; color:#666666;">&nbsp;&nbsp;
                    <span class="bb">文章内容：行业观点、行业新闻、产品预告、公司动态、优惠活动等等</span></td>
					<td width="55%" align="right" style="font-size:12px; font-weight:bolder; color:#666666;">&nbsp;&nbsp;</td>
				</tr>
		  </table>

</body>
</html>