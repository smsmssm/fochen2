<?php /* Smarty version 2.6.18, created on 2017-05-30 17:28:57
         compiled from showNewAnliList.html */ ?>
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
	window.open("http://www.jeedon.com/anli.php?id="+id);
}

function GoToCheck(id,t)
{
  alert(id+" ** "+t);
  document.getElementById("myFrame").src = 'checkAnli.php?id='+id+"&t="+t+"&ct="+new Date();
  document.getElementById("myFrame2").src = '/info/create_anli_html.php?id='+id+"&ct="+new Date();
  document.getElementById("myFrame3").src = 'http://m.jeedon.com/info/create_anli_html.php?id='+id+"&ct="+new Date();
  
  alert("审核完毕");
  
 }


function GoToSend(id)
{



if($("s0_"+id).innerHTML=="已提交")
{
   alert("已经提交过了");
   return;
}
document.getElementById("myFrame").src = 'sendArticle.php?id='+id+"&ct="+new Date();
return;
  ////window.open("sendArticle.php?id="+id+"&ct="+new Date());
  //alert(obj.innerHTML+" ***"+id+" ** "+obj.innerText+" ** "+obj.id)
   /// alert($("s_"+id).innerHTML+" ** "+$("s_"+id).href);
　　var xmlhttp_request = "";
　　try{ 
　   　if( window.ActiveXObject ){ 
　          　for( var i = 5; i; i-- ){ 
　            　try{ 
　               　if( i == 2 ){ 
　                    　xmlhttp_request = new ActiveXObject( "Microsoft.XMLHTTP" );
                    }
　                  　else{ 
　                         　xmlhttp_request = new ActiveXObject( "Msxml2.XMLHTTP." + i + ".0" ); 
　                         　xmlhttp_request.setRequestHeader("Content-Type","text/xml"); 
　　                         xmlhttp_request.setRequestHeader("Charset","gb2312"); 
                           }
　                         　break;
                         } 
　                     　catch(e){ 
　                        　xmlhttp_request = false; 
                          }
			 } 
		 }
　   else if( window.XMLHttpRequest )
　  　{ 
          xmlhttp_request = new XMLHttpRequest(); 
　　      if (xmlhttp_request.overrideMimeType) 
　       　{ xmlhttp_request.overrideMimeType('text/xml'); } } }
　     　catch(e){ xmlhttp_request = false; } 
　　xmlhttp_request.open('GET', 'sendArticle.php?id='+id+"&ct="+new Date(), true); 
　　xmlhttp_request.send(null); 
　　xmlhttp_request.onreadystatechange = function(){
　   　if (xmlhttp_request.readyState == 4) {
　    　// 收到完整的服务器响应 
          var aa = String(xmlhttp_request.responseText);
		// alert(aa);
		  if(aa=="1")
		  {
		   // $("s_"+id).style.display = "none";
		   $("s0_"+id).innerHTML="已提交"
			$("a_"+id).innerText = "已发布，等待结果";
			alert("提交成功");
			 
		  }else
		  {
		    alert("提交失败");
		  }
	      
　      　} else{
　  
　　     }
　　  }
　}
  function updateInfo()
  {
  
      if( $("pageCurrent")==null)
	  {
	     $("listInfo").style.display="none";
		 return;
	  }
	  
     
         currentPage = Number($("pageCurrent").innerText);//
	     totalPage = Number($("pageTotal").innerText);
		
		 
	       totalPage = Math.ceil(totalPage/20);
		    $("Current").innerText = $("pageCurrent").innerText;
		   $("Total").innerText = totalPage;//$("pageTotal").innerText+"页";
	   var str ="";
	   for(var i=currentPage;(i<=totalPage)&&((i-currentPage)<10);i++)
	   {
	     str  +=  '<a href="javascript:GotoPage('+i+')">'+i+'</a>';
                   
	    }
	   
	   $("pages").innerHTML = str;
	   
	   
      //alert(" ** "+<?php echo $this->_tpl_vars['arr_article_list'][0][5]; ?>
+" ** "+<?php echo $this->_tpl_vars['arr_article_list'][1][5]; ?>
);
  }
  function GotoPage(i)
  {
  
     if(currentPage==i)
	 {
	    alert("现在已经是第"+i+"页");
		return;
	 }
     document.location.href="showArticleList.php?page="+i+"&ct="+new Date();
  }
  
  function EditContent(id)
  {
   
	document.location.href="updataAnli.php?content_id="+id+"&ct="+new Date();
  }
  
  function GotoPage2()
  {
     var n = $("pageInput").value;
	 if(isNaN(n))
	 {
	    alert("请正确输入数字");
	    return;
	 }
	 if(n==currentPage)
	 {
	    alert("现在已经是第"+n+"页");
		return;
	 }
	 if(n<1||n>totalPage)
	 {
	    alert("您输入的数字不对");
	    return;
	 }
	 
	  document.location.href="showArticleList.php?page="+n+"&ct="+new Date();
  }
  
  function NextPage()
  {
    
	 //alert(currentPage);
	 if((currentPage+1)>totalPage)
	   {
	     alert("已经是最后一页了");
		 return;
	   } 
	   currentPage=currentPage+1;
	 document.location.href="showArticleList.php?page="+currentPage+"&ct="+new Date();
	// alert()
	// window.open("showArticleList.php?page="+currentPage+"&ct="+new Date());
  }
  
  function LastPage()
  {
   
	 if((currentPage-1)<1)
	   {
	     alert("已经是第一页了");
		 return;
	   } currentPage-=1;
	 document.location.href="showArticleList.php?page="+currentPage+"&ct="+new Date();
  }
   function addAnli()
   {
       ///alert("add anli ..");
	   window.location.href = "addanli.php";
	   
   }

</script>
<body  onload="updateInfo()">
<div style="width:200px; margin-left:0.5%; margin-top:20px; margin-bottom:10px;">
    <button onclick="addAnli()">添加案例</button>
</div>

<table width="100%" height="400" border="0" cellpadding="0" cellspacing="0" style="margin:0 0 0 0" >
	<tr>
		<td valign="top" bgcolor="#FFFFFF">
			<table width="100%" height="13" border="0" cellpadding="0" cellspacing="0" id="listInfo" >
				<tr>
					<td width="45%" height="45" align="left" style="font-size:12px; font-weight:bolder; color:#666666;">&nbsp;&nbsp;<span class="bb">总共有</span><span style="color:#ff0000" id="Total"></span><span class="bb">页,你现在在第</span><span id="Current" style="color:#ff0000"></span><span class="bb">页</span></td>
					<td width="55%" align="right" style="font-size:12px; font-weight:bolder; color:#666666;" nowrap=true>
                    <div id="pageLink">
                    <a href="javascript:LastPage()">上一页
                    </a>
                    <span id="pages">
                    
                    </span>
                    <a href="javascript:NextPage()">下一页
                    </a>
                 <input name="link" type="hidden" value="">&nbsp;到
           <input name="page" id="pageInput"  class="smallInput" type="text" value="" size="4">页<input  onclick="GotoPage2()"  class="btn1" type="button" value="Go">
                    </div>&nbsp;&nbsp;</td>
				</tr>
			</table>
<!--start content-->
<table width="99%" border="0"  align="center" cellpadding="0" cellspacing="1" bgcolor="#B9CDD9" class="tb">
  <form name="sortForm">
  <input type="hidden" name="page" value="1">
  <input type="hidden" name="pages" value="page:1|hallid:|hallname:|halltype:|actor:|director:|yx_id:|other:|status:|pay:|area:|year:|type:|order:0|from:|to:|dapian:|yx_fc:">
  </form>
  <tr>

	<td width="18%" align="center" bgcolor="#E1EFFD" class="new12" style="padding:0px;"><span class="bb">文章名称</span></td>
	<td width="8%" align="center" bgcolor="#E1EFFD" class="new12" style="padding:0px;"><span class="bb">是否被采纳</span></td>
	<td width="8%" height="28px"  bgcolor="#E1EFFD" class="new12" align="center" style="padding:0px;"><span class="bb">创建日期</span></td>  
    <td width="8%" height="28px"  bgcolor="#E1EFFD" class="new12" align="center" style="padding:0px;"><span class="bb">阅读次数</span></td>
	<td width="8%" align="center" bgcolor="#E1EFFD" class="new12" style="padding:0px;"><span class="bb">查看</span></td>
    <td width="8%" align="center" bgcolor="#E1EFFD" class="new12" style="padding:0px;"><span class="bb">编辑</span></td>
     <?php if ($this->_tpl_vars['point'] == -100): ?><td width="8%" align="center" bgcolor="#E1EFFD" class="new12" style="padding:0px;"><span class="bb">提交</span></td><?php endif; ?>
  </tr>
  
  <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['arr_article_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
  <tr>
<td height="28px" align="center"  bgcolor="#FFFFFF" style="padding:0px"><?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][0]; ?>
<span id="pageCurrent" style="display:none"><?php echo $this->_tpl_vars['arr_article_list'][0][5]; ?>
</span><span id="pageTotal" style="display:none"><?php echo $this->_tpl_vars['arr_article_list'][0][6]; ?>
</span></td>
		<td height="28px" align="center" bgcolor="#FFFFFF" ><span   id="a_<?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][3]; ?>
"><?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][1]; ?>
</span></td>
		<td height="28px" align="center" bgcolor="#FFFFFF" style="padding:0px;"><?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][2]; ?>
</td>
         <td height="28px" align="center" bgcolor="#FFFFFF" style="padding:0px;"><?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][4]; ?>
</td>
		<td height="28px" align="center" bgcolor="#FFFFFF"><a href="javascript:GoToContent('<?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][3]; ?>
')">点击查看&nbsp;</a></td>
        <td height="28px" align="center" bgcolor="#FFFFFF"><a href="javascript:EditContent(<?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][3]; ?>
)">点击编辑&nbsp;</a></td>
          <?php if ($this->_tpl_vars['point'] == -100): ?>
        <td height="28px" align="center" bgcolor="#FFFFFF"><a id="s0_<?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][3]; ?>
"  href="javascript:GoToCheck(<?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][3]; ?>
,2)">推荐</a>&nbsp;&nbsp;<a id="s0_<?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][3]; ?>
"  href="javascript:GoToCheck(<?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][3]; ?>
,1)">采纳</a>&nbsp;&nbsp;<a id="s1_<?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][3]; ?>
"  href="javascript:GoToCheck(<?php echo $this->_tpl_vars['arr_article_list'][$this->_sections['i']['index']][3]; ?>
,-1)">不采纳</a></td>
        <?php endif; ?>
  </tr>
	<?php endfor; endif; ?>
</table>
		</td>
	</tr>
</table>
<iframe style="display:none" id="myFrame"></iframe><iframe  style="display:none" id="myFrame2"></iframe><iframe style="display:none"  id="myFrame3"></iframe>
</body>
</html>