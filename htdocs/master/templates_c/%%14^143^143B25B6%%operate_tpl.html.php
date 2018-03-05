<?php /* Smarty version 2.6.18, created on 2017-05-01 12:05:17
         compiled from operate_tpl.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>电影列表</title>
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
</style>
<link href="/css/H.css" rel="stylesheet" type="text/css">
<link href="/css/pager.css" rel="stylesheet" type="text/css">
<script src="/js/common.js"></script>
<script src="/js/global.js"></script>
<script src="/js/ImageClip.js"></script>
</head>


<script language="javascript">
 function $(s){   
	     return document.getElementById(s);
  }
 var currentPage;
 var total;
function GoToContent(id){
	//document.location.href="showArticle.php?id="+id+"&ct="+new Date();
	window.open("../news/news.php/"+id+".html");
}
function GoToCheck(id,t)
{
   
  document.getElementById("myFrame").src = 'checkQuestion.php?id='+id+"&t="+t+"&ct="+new Date();
  document.getElementById("myFrame2").src = '/info/create_Question_html.php?id='+id+"&ct="+new Date();
  document.getElementById("myFrame3").src = 'http://m.jeedon.com/info/create_Question_html.php?id='+id+"&ct="+new Date();
  alert("审核完毕");
  
 }



</script>
<body  onload="updateInfo()">

<table width="100%" height="400" border="0" cellpadding="0" cellspacing="0" style="margin:0 0 0 0" >
	<tr>
		<td valign="top" bgcolor="#FFFFFF">
			<br><br><br>
			<table width="100%" height="13" border="0" cellpadding="0" cellspacing="0" id="listInfo" >
				<tr>
					<td width="45%" height="45" align="left" style="font-size:12px; font-weight:bolder; color:#666666;">&nbsp;&nbsp;<span class="bb">总共有</span><span style="color:#ff0000" id="Total"></span><span class="bb">页,你现在在第</span><span id="Current" style="color:#ff0000"></span><span class="bb">页</span></td>
					<td width="55%" align="right" style="font-size:12px; font-weight:bolder; color:#666666;" nowrap=true>
                    <div id="pageLink">
                    <a href="javascript:LastPage()">上一页                    </a>
                    <span id="pages">                    </span>
                    <a href="javascript:NextPage()">下一页                    </a>
                 <input name="link" type="hidden" value="">&nbsp;到
           <input name="page" id="pageInput"  class="smallInput" type="text" value="" size="4">页<input  onclick="GotoPage2()"  class="btn1" type="button" value="Go">
                    </div>??</td>
				</tr>
			</table>
<!--start content-->
<table width="99%" border="0"  align="center" cellpadding="0" cellspacing="1" bgcolor="#B9CDD9" class="tb">
  <form name="sortForm">
    <input type="hidden" name="page2" value="1" />
    <input type="hidden" name="pages" value="page:1|hallid:|hallname:|halltype:|actor:|director:|yx_id:|other:|status:|pay:|area:|year:|type:|order:0|from:|to:|dapian:|yx_fc:" />
  </form>
  <tr>
    <td width="18%" align="center" bgcolor="#E1EFFD" class="new12" style="padding:0px;"><span class="bb">项</span></td>
    <td width="8%" align="center" bgcolor="#E1EFFD" class="new12" style="padding:0px;"><span class="bb">操作</span></td>

  </tr>
  <tr>
       <td height="28px" align="center" bgcolor="#FFFFFF">公司页面&nbsp;</td>
       <td height="28px" align="center" bgcolor="#FFFFFF"><a href="javascript:GoToContent('<?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][7]; ?>
')">合成所有</a></td>
 
   </tr>
   <tr>
       <td height="28px" align="center" bgcolor="#FFFFFF">新闻页面&nbsp;</td>
       <td height="28px" align="center" bgcolor="#FFFFFF"><a href="javascript:GoToContent('<?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][7]; ?>
')">合成所有</a></td>
   </tr>
   
   <tr>
       <td height="28px" align="center" bgcolor="#FFFFFF">问答页面&nbsp;</td>
       <td height="28px" align="center" bgcolor="#FFFFFF"><a href="javascript:GoToContent('<?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][7]; ?>
')">合成所有</a></td>
   </tr>
   
   <tr>
       <td height="28px" align="center" bgcolor="#FFFFFF">问答页面&nbsp;</td>
       <td height="28px" align="center" bgcolor="#FFFFFF"><a href="javascript:GoToContent('<?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][7]; ?>
')">合成所有</a></td>
   </tr>

</table></td>
	</tr>
</table>
<iframe style="display:none" id="myFrame"></iframe>
<iframe  id="myFrame2"></iframe><iframe  id="myFrame2"></iframe>
</body>
</html>