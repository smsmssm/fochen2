<?php /* Smarty version 2.6.18, created on 2017-05-29 18:19:10
         compiled from updataChanpin.html */ ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html,charset=gb2312" />
<title>�ޱ����ĵ�</title>
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
<body onLoad=" fetch_classify()">

<form name="form1" enctype="multipart/form-data">
			<table width="98%" align="center" border="0" cellpadding="0" cellspacing="0" >
				<tr>
					<td height="10"><h3 style="width:98%; margin-left:2%; margin-top:20px; color:#3F7CAB">�༭��Ʒ</h3></td>
				</tr>
			</table>		
			
			<table width="92%" border="0" align="center" cellpadding="0" cellspacing="1" class="tb">
			<tr >
					<td class="tbhead"></td>
					<td width="86%" colspan="8" align="left"  class="tbhead"></td>
		  </tr>				 
		  
		   <tr>
            <td width="14%" align="right"  class="tbbody">��Ʒ���&nbsp;</td>
<td colspan="8"  class="tbbody" style="position:relative">
            	<select name="submit_style" id="submit_style" size="1">
                <option value="1">���ܼҾ�</option>
                <option value="2">��ҵ������</option>
                <option value="3">�ǻ۳���</option>
                <option value="4">�ǻ�ũҵ</option>
                <option value="5">�ǻ۽�ͨ</option>
                <option value="6">�ǻ�����</option>
                <option value="7">�ǻ�ҽ��</option>
                <option value="8">�ǻ۽���</option>
                <option value="9">�ǻ۽���</option>
                <option value="10">�ǻ���Դ</option>
                <option value="11">�ǻ�����</option>
                <option value="12">�ǻ۽���</option>
                <option value="13">������</option>
                <option value="14">�ǻۻ���</option>
                <option value="15">�Ʒ���ƽ̨</option>
                
                <option value="16">Ƕ��ʽ</option>
                <option value="17">������</option>
                <option value="18">��������ȫ</option>
                <option value="19">���ܴ���</option>
                <option value="21">�ǻ�����</option>
                <option value="20">����</option>
            	</select>  
                </td>            
		   </tr>
  		   <!--tr>
            <td width="14%" align="right"  class="tbbody">�Ƿ�ԭ����&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative"> <input id="isSelf" type="radio" value="��"  name="isSelf" onClick=" " />��
         <input id="SCH" type="radio" name="isSelf" checked="true"   value="��" onClick=" " />��</td>            
		   </tr>
		   <tr>
            <td width="14%" align="right"  class="tbbody">������Դ��&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative">   <input  id="author" name="author" type="text" value="" class="smallInput" size="30" maxlength="255">
            <input type="hidden" name="cid" id="cid" value="<?php echo $this->_tpl_vars['arr_Info_list'][2]; ?>
">
            ���磺������ Ҳ������д�����磺�²��Ŵ                        </td>            
		   </tr>
		   <tr-->
            <td width="14%" align="right"  class="tbbody">���⣺&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative">   <input  id="articleName" name="articleName" type="text" value="" class="smallInput" size="30" style=" width:400px;"  width="400" maxlength="255">            </td>            
		   </tr>
           
           <tr>
            <td width="14%" height="79" align="right"  class="tbbody">�ؼ��ʣ�&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative">  <input  type="hidden" name="aid" c  value="<?php echo $this->_tpl_vars['arr_Info_list'][0]; ?>
" />  <input  id="kw" name="kw" type="text" value="" class="smallInput" size="30"  width="400" maxlength="255">��������ö��Ÿ����磺���ܼ�أ�Զ�̼�أ�Զ�̿��ƣ�            </td>            
		   </tr>
           
           <tr>
            <td width="14%" align="right"  class="tbbody">ժҪ��&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative">
             <textarea name="summary" id="summary" style="width:800px; height:100px; padding:8px 8px;"placeholder="100����������ѣ���Ҫ����400�ֽڣ�200���֣�"></textarea>
                   </td>            
		   </tr>
           
<tr>
            <td width="14%" align="right"  class="tbbody">��Ʒ���ݣ�&nbsp;</td>
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
						<input class="btn1"  type="button" onClick="return myfunc();" value="ȷ��">
						<input class="btn1"  type="reset" value="����">
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
    //��¼�������ŵ��ı�������    
 var resultTag = 0;    
    //��¼����text�ı�������    
    var flag = 0;    
 for(var i = 0; i < form.elements.length; i ++)    
 {    
  if(form.elements[i].type=="text")    
  {    
    flag = flag + 1;    
   //�˴���д��Ҫ���˵��������    
   //ע�⣺�޸�####�����ַ����������ֲ����޸�.    
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
     alert("�ı����в��ܺ���\n\n 1 ������: ' \n 2 ˫����: \" \n 3 ��  ��: | \n 4 ��Ǻ�: < > \n\n�������룡");    
     return false;    
 }    
}    
 
 
 function submit()
 {///alert("aaaa");
   form1.method = "post";
   form1.target = "";
   form1.action = "edit_article.php?tm="+new Date();
   form1.submit(); 
 }
 
  function myfunc()
 {
     //alert("aaaaa");
   
    /* if(!checkAllTextValid($("form1")))
	  {
	      return false;
	  }*/
   
	//-----------------------���������
  
   
   if($("articleName").value =="")
   { 
      alert("���±��ⲻ��Ϊ��");
	  return;
   
   }
   
   var contents = editor.html();
	
	$("content").innerText = contents;
	///return;
	///alert(contents);
	
	if(contents.length<60)
	{
	   alert("������������������60");
	   return;
	}
	
	
	
	if($("kw").value=="")
	{
	   alert("������дһ��ؼ���");
	   return;
	}
  if($("summary").value=="")
	{
	   alert("ժҪ��׼Ϊ��");
	   return;
	}
	
   form1.method = "post";
   form1.action = "edit_chanpin.php?tm="+new Date();
   ///form1.target = "form_target";
   form1.submit()
 }

function fetch_classify(){

   //select id,Fstyle,Ftitle,Fauthor,Fcontent,Fis_self,Fkw from erpdq.t_content where id
		  var author = "<?php echo $this->_tpl_vars['arr_Info_list'][3]; ?>
";
		  var style = "<?php echo $this->_tpl_vars['arr_Info_list'][1]; ?>
";
		  var title = "<?php echo $this->_tpl_vars['arr_Info_list'][2]; ?>
";
		  var _content =String('<?php echo $this->_tpl_vars['arr_Info_list'][4]; ?>
').replace(/{\*}/g,"'");
          //�ǲ����ύ��ʱ��ѵ������滻�������������
		  var is_self = "<?php echo $this->_tpl_vars['arr_Info_list'][5]; ?>
";
		  content_id =  "<?php echo $this->_tpl_vars['arr_Info_list'][0]; ?>
";
		  var kws = '<?php echo $this->_tpl_vars['arr_Info_list'][6]; ?>
';
          var smry ='<?php echo $this->_tpl_vars['arr_Info_list'][8]; ?>
';
		  //Fstyle,Ftitle,Fauthor,Fcontent,Fis_self
		 
		/// setTimeout(function(){editFrame = frames["contents"];editFrame.setHTML(_content)},1500);
		  editor.html(_content);
		 /// $("author").value = author;
		  $("articleName").value = title;
		  $("kw").value = kws;
		  if(is_self==1)
		  {
		    /// $("isSelf").checked = true;
		  }
		  $("summary").innerText = smry;
		  var Select = $("submit_style");
		  Select.options[style-1].selected = true; 
		  

				
��}

</script>
</body>
</html>