<?php /* Smarty version 2.6.18, created on 2017-05-13 16:31:21
         compiled from addquestion.html */ ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html,charset=gb2312" />
<title>无标题文档</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 5px;
	margin-right: 0px;
	margin-bottom: 0px;
	padding:0px;
	width:100%;
}
.tb{
	background-color:#B9CDD9;
}
.tbhead {
	height:28px;
	background-color:#E1EFFD;
	color:#3F7CAB;
	font-weight:bold;
}
.tbbody {
	height:28px;
	background-color:#FFFFFF;
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
.style1 {color: #FF0000}
-->
</style>
<link href="/css/H.css" rel="stylesheet" type="text/css" />
<script src="/js/common.js"></script>
<script language="javascript">
   /*var jsonObj={
    game_list: [ 
      <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['gameList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
      	{ id:"<?php echo $this->_tpl_vars['gameList'][$this->_sections['i']['index']][0]; ?>
",name:"<?php echo $this->_tpl_vars['gameList'][$this->_sections['i']['index']][1]; ?>
" },
      <?php endfor; endif; ?>
      {}]
   };*/
</script>
</head>
<body >
<form name="form1" enctype="multipart/form-data">
			<table width="98%" align="center" border="0" cellpadding="0" cellspacing="0" >
				<tr>
					<td height="10"></td>
				</tr>
			</table>		
			
			<table width="92%" border="0" align="center" cellpadding="0" cellspacing="1" class="tb">
			<tr >
					<td class="tbhead"></td>
					<td width="86%" colspan="8" align="left"  class="tbhead">发布问题</td>
		  </tr>				 
		  
		   <tr>
            <td width="14%" align="right"  class="tbbody">文章类别：&nbsp;</td>
<td colspan="8"  class="tbbody" style="position:relative">
            	<select name="submit_style" id="submit_style" size="1">
                <option value="1">物联网</option>
                <option value="2">云服务</option>
                <option value="3">大数据</option>
                <option value="4">解决方案</option>
                <option value="5">工业物联网</option>
                <option value="6">农业物联网</option>
                <option value="7">医疗健康物联网</option>
                <option value="8">智能家居物联网</option>
            </select>  
                </td>            
		   </tr>
  		   <tr>
            <td width="14%" align="right"  class="tbbody">是否原创：&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative"> <input id="isSelf" type="radio" value="是"  name="isSelf" onClick=" " />是
         <input id="SCH" type="radio" name="isSelf" checked="true"   value="否" onClick=" " />否</td>            
		   </tr>
		   <tr>
            <td width="14%" align="right"  class="tbbody">内容来源：&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative">   <input  id="author" name="author" type="text" value="" class="smallInput" size="30" maxlength="255">
            <input type="hidden" name="cid" id="cid" value="<?php echo $this->_tpl_vars['arr_Info_list'][2]; ?>
">
            （如：新浪网 也可以填写作者如：奥博信达）                        </td>            
		   </tr>
		   <tr>
            <td width="14%" align="right"  class="tbbody">文章标题：&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative">   <input  id="articleName" name="articleName" type="text" value="" class="smallInput" size="30" style=" width:400px;"  width="400" maxlength="255">            </td>            
		   </tr>
           
           <tr>
            <td width="14%" height="79" align="right"  class="tbbody">关键词：&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative">   <input  id="kw" name="kw" type="text" value="" class="smallInput" size="30"  width="400" maxlength="255">（多个可用逗号隔开如：erp顾问,奥博信达,erp性能对比,erp未来发展趋势报告）            </td>            
		   </tr>
           
           <tr>
            <td width="14%" align="right"  class="tbbody">摘要：&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative">
             <textarea name="summary" id="summary" style="width:800px; height:100px;"></textarea>
                   </td>            
		   </tr>
           
<tr>
            <td width="14%" align="right"  class="tbbody">文章内容：&nbsp;</td>
      <td colspan="8"  height="800" class="tbbody" style="position:relative">
      		<!--textarea name="gently_editor" id="gently_editor" style="display:none;"></textarea>
      		<iframe src="./Edit/editor.htm?id=gently_editor&ReadCookie=0" id="contents" name="contents" frameborder="0" marginheight="0" marginwidth="0" scrolling="No" width="800" height="600"></iframe-->
            <textarea name="content" id="content" style="width:800px;height:400px;visibility:hidden; display:none"></textarea>
            <textarea name="contents" id="contents" style="width:800px;height:400px;visibility;"></textarea>
      		<!--iframe src="./Edit/editor.htm?id=gently_editor&ReadCookie=0" id="contents" name="contents" frameborder="0" marginheight="0" marginwidth="0" scrolling="No" width="800" height="600"></iframe-->
           
		    <script charset="utf-8" src="../editor/kindeditor-min.js"></script>
		    <script charset="utf-8" src="../editor/lang/zh_CN.js"></script>
		    <script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="contents"]', {
					allowFileManager : true
				});
			});
		</script>
            
            
            </td>  
		   </table>
<br>				
			<table width="92%" border="0" align="center" cellpadding="3" cellspacing="0" style="font-size:12px;" >
				 <tr>
					<td colspan="2" valign="middle" align="center"><p>
						<input class="btn1"  type="button" onClick="return myfunc();" value="确定">
						<input class="btn1"  type="reset" value="重置">
					</p>
						<p>&nbsp; </p></td>
				</tr>
		  </table>
</form>
<iframe id="form_target" name="form_target" style="display:none">
</iframe>
<script language="javascript">
  ///var content="";
  var editFrame;//contents
 function $(s){   
	     return document.getElementById(s);
  }
 
 function checkAllTextValid(form)    
{    
    //记录不含引号的文本框数量    
 var resultTag = 0;    
    //记录所有text文本框数量    
    var flag = 0;    
 for(var i = 0; i < form.elements.length; i ++)    
 {    
  if(form.elements[i].type=="text")    
  {    
    flag = flag + 1;    
   //此处填写所要过滤的特殊符号    
   //注意：修改####处的字符，其它部分不许修改.    
   //if(/^[^####]*$/.test(form.elements[i].value))     
   if(/^[^\|"'<>]*$/.test(form.elements[i].value))   
                resultTag = resultTag+1;   
   else   
    form.elements[i].select();   
  }   
 }   
 if(resultTag == flag)   
  return true;   
 else   
 {   
     alert("文本框中不能含有\n\n 1 单引号: ' \n 2 双引号: \" \n 3 竖  杠: | \n 4 尖角号: < > \n\n请检查输入！");    
     return false;    
 }    
}    
 
 
 function submit()
 {alert("aaaa");
   form1.method = "post";
   form1.target = "";
   form1.action = "accept_article.php?tm="+new Date();
   form1.submit(); 
 }
 
  function myfunc()
 {
     //alert("aaaaa");
   
    /* if(!checkAllTextValid($("form1")))
	  {
	      return false;
	  }*/
   
	//-----------------------请求过滤脏
   if($("author").value =="") 
   { 
      alert("作者名称不能为空");
	  return;
   }
   
   if($("articleName").value =="")
   { 
      alert("文章标题不能为空");
	  return;
   
   }
   
   var contents = editor.html();
	
	$("content").innerText = contents;
	///return;
	alert(contents);
	
	if(contents.length<60)
	{
	   alert("您发的文章字数少于60");
	   return;
	}
	
	
	
	if($("kw").value=="")
	{
	   alert("至少填写一项关键词");
	   return;
	}
  if($("summary").value=="")
	{
	   alert("摘要不准为空");
	   return;
	}
	
   form1.method = "post";
   form1.action = "accept_question.php?tm="+new Date();
   ///form1.target = "form_target";
   form1.submit()
 }

</script>
</body>
</html>