<?php /* Smarty version 2.6.18, created on 2017-05-29 10:20:54
         compiled from editCompany.html */ ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
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
<script src="../js/common.js"></script>
<script src="../js/city.js"></script>
<script charset='gb2312' src="../js/p.js"></script>
<script>
var proArr = [];
  function addProduct(i)
  {
      //<input type="hidden" name="pro_types"  id="pro_types"/>
      proArr = getProductList(i);
	 if(proArr.length>0)
	 {
	    var s ="";
		var n;
		var s1 ="";
		for(var i=0;i<proArr.length;i++)
		{
		   n=i+1;
		   s = s+'<input id="pr'+i+'" type="checkbox"  value="'+n+'"/>'+proArr[i]+'&nbsp;&nbsp;';
		}
		$("product").innerHTML = s;
	 }
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

function checkInfo()
  {//��׼���������ַ�
     //// var b = checkAllTextValid($("regForm"))	 
	 return true;
  }
</script>

</head>
<body >
<form id="regForm" action="updataInfo.php" method="post" onSubmit="return checkInfo()" 
encType=multipart/form-data>
			<table width="98%" align="center" border="0" cellpadding="0" cellspacing="0" >
				<tr>
					<td height="10"></td>
				</tr>
			</table>		
			
			<table width="92%" border="0" align="center" cellpadding="0" cellspacing="1" class="tb">
			<tr >
					<td class="tbhead"></td>
					<td width="85%" colspan="8" align="left"  class="tbhead">��˾��Ϣ�༭</td>
		  </tr>				 
		  
          
          <tr>
            <td width="15%" align="right"  class="tbbody" >Email��ַ��&nbsp;</td>
<td colspan="8"  class="tbbody" style="position:relative">
            	<input type="text"  name="mail" id="mail" value="<?php echo $this->_tpl_vars['arr_conIfo_list'][1]; ?>
"><span id="email_notice"></span><span class="red"></span>(<font color="red"></font>)</td>            
		   </tr>
          
          <tr>
            <td width="15%" align="right"  class="tbbody">��˾���ƣ�&nbsp;</td>
<td colspan="8"  class="tbbody" style="position:relative">
            	<input name="company_name" type="text" id="company_name" value="<?php echo $this->_tpl_vars['arr_conIfo_list'][2]; ?>
" size="40"><span class="red">*(�밴Ӫҵִ���Ϲ�˾������д)</span></td>            
		   </tr>
          
          
		   <tr>
            <td width="15%" align="right"  class="tbbody">��˾��ƣ�&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative"><span class="tbbody" style="position:relative">
              <input type="text" name="sortname" id="sortname" value="<?php echo $this->_tpl_vars['arr_conIfo_list'][3]; ?>
">
              <span class="red">*</span>
            (��"ablecloud") </td>
		   </tr>
		   <tr>
            <td width="15%" align="right"  class="tbbody">��˾��վ��&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative"><input type="text" name="site_url" id="site_url" value="<?php echo $this->_tpl_vars['arr_conIfo_list'][4]; ?>
" size="50"><span class="red">*</span><br>
            <font color="#FF0000"></font></td>            
		   </tr>
		   
		   

           
           <tr>
            <td width="15%" align="right"  class="tbbody">��˾���ڵ�:&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative"> 
            <select name="province" id="provinces" charset=gb2312 onChange="selectedCity();"> 
                <option value="">��ѡ��</option><option value="1">����</option><option value="2">�Ϻ�</option><option value="3">���</option><option value="4">����</option><option value="5">�ӱ�</option><option value="6">ɽ��</option><option value="7">���ɹ�</option><option value="8">����</option><option value="9">����</option><option value="10">������</option><option value="11">����</option><option value="12">�㽭</option><option value="13">����</option><option value="14">����</option><option value="15">����</option><option value="16">ɽ��</option><option value="17">����</option><option value="18">����</option><option value="19">����</option><option value="20">�㶫</option><option value="21">����</option><option value="22">����</option><option value="23">�Ĵ�</option><option value="24">����</option><option value="25">����</option><option value="26">����</option><option value="27">����</option><option value="28">����</option><option value="29">����</option><option value="30">�ຣ</option><option value="31">�½�</option><option value="32">���</option><option value="33">����</option><option value="34">̨��</option><option value="35">����</option></select> 
                <select name="city" id="cities"> 
                <option value="<?php echo $this->_tpl_vars['arr_conIfo_list'][7]; ?>
"><?php echo $this->_tpl_vars['arr_conIfo_list'][7]; ?>
</option></select>
		<script> 
		  ProvinceCity('','');
		  
		  document.getElementById("provinces").value=<?php echo $this->_tpl_vars['arr_conIfo_list'][6]; ?>
;
		  selectedCity();
		   document.getElementById("cities").value="<?php echo $this->_tpl_vars['arr_conIfo_list'][7]; ?>
";
		 /// document.getElementById("provinces").value=<?php echo $this->_tpl_vars['arr_conIfo_list'][6]; ?>
;
		  
		  
		  
		  
		     
        </script>
                <span class="red">*</span> </td>
		   </tr>
           
         <tr><td width="15%" align="right"  class="tbbody">��ϸ��ַ��&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative"><span class="tbbody" style="position:relative">
              <input name="address" type="text" id="address" value="<?php echo $this->_tpl_vars['arr_conIfo_list'][8]; ?>
" maxlength="50" size="50">
           </span><span class="red">*</span><td></tr>  
 <!--tr><td width="15%" align="right"  class="tbbody">�������룺&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative"><input type="text" name="zipcode" id="zipcode" value="" size="8">
              <span>����ѡ��</span><td></tr-->           
           
    <tr><td width="15%" align="right"  class="tbbody">��    ����&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative"><input type="text" name="telephone" id="telephone" value="<?php echo $this->_tpl_vars['arr_conIfo_list'][9]; ?>
" maxlength="25" size="15"><span class="red">*(��:01088008812)</span><td></tr>
            <tr><td width="15%" align="right"  class="tbbody">��ϵ�ˣ�&nbsp;</td>
            <td colspan="8"  class="tbbody" style="position:relative"><input type="text" name="linkman" id="linkman" value="<?php echo $this->_tpl_vars['arr_conIfo_list'][15]; ?>
" maxlength="25" size="15"><span class="red"></span><td></tr>       
            <input type="hidden" name="cid" id="cid" value="<?php echo $this->_tpl_vars['arr_conIfo_list'][0]; ?>
">
             <!--tr><td width="15%" align="right"  class="tbbody">��    �棺&nbsp;</td>
               <td colspan="8"  class="tbbody" style="position:relative"><input type="text" name="fax" id="fax" value="" size="15" maxlength="25">
            <span>(��ѡ)</span>
               <td></tr-->
            
             
            <!--tr><td width="15%" align="right"  class="tbbody">��������&nbsp;</td>
               <td colspan="8"  class="tbbody" style="position:relative"> <input id="a_1" type="radio" name="business_scope" value="1">
              ����
              &nbsp;
            	<input type="radio" id="a_2" name="business_scope" value="2">
            	����
            	&nbsp;
                <input type="radio" id="a_3" name="business_scope" value="3">
                ����
                &nbsp;
                <input type="radio" id="a_4" name="business_scope" value="4">
                ����
                &nbsp;
                <input type="radio" id="a_5" name="business_scope" value="5">
                ����
                &nbsp;
                <input type="radio" name="business_scope" id="a_6" value="6">
                ����
                &nbsp;
                <input type="radio" id="a_7" name="business_scope"  value="7">
                ����
               <td></tr-->
           
            <!--tr><td width="15%" align="right"  class="tbbody">ҵ�����ͣ�&nbsp;</td>
               <td colspan="8"  class="tbbody" style="position:relative">
               <input id="s_1" type="radio" name="erp_type" value="1">
                �Ʒ���
              &nbsp;
            	<input type="radio" id="s_2" name="erp_type" value="2">
            	�������
            	&nbsp;
                <input type="radio" id="s_3" name="erp_type" value="3">
                ������
                &nbsp;
                <input type="radio" id="s_4" name="erp_type" value="4">
                ����
                
                <span class="red">*</span>
               <td></tr-->
               
             <tr><td width="15%" align="right"  class="tbbody">��Ʒ:
          </td>
              <td colspan="3" class="tbbody" id="product">
              <input name="pro_types"  id="pro_types" style="width:800px" value="<?php echo $this->_tpl_vars['arr_conIfo_list'][12]; ?>
"/></td>
              </tr>
             <!--tr><td width="15%" align="right"  class="tbbody">�ͷ�QQ:</td>
         <td class="tbbody"> <input type="text" name="qq" id="qq" value="" size="30"><span class="red">*</span>(����붺��,�ֿ�)</td>
             </tr--> 
            
             <tr><td width="15%" align="right"  class="tbbody">��˾����ʱ��:
          </td>
              <td colspan="3" class="tbbody" id="product">
              
              <select name="establish" id="establish">
              <option value="">��ѡ��</option>
              
              <option value="1992">1992��</option>
              <option value="1993">1993��</option>
              <option value="1994">1994��</option>
              <option value="1995">1995��</option>
              <option value="1996">1996��</option>
              <option value="1997">1997��</option>
              <option value="1998">1998��</option>
              <option value="1999">1999��</option>
              <option value="2000">2000��</option>
              <option value="2001">2001��</option>
              <option value="2002">2002��</option>
              <option value="2003">2003��</option>
              <option value="2004">2004��</option>
              <option value="2005">2005��</option>
              <option value="2006">2006��</option>
              <option value="2007">2007��</option>
              <option value="2008">2008��</option>
              <option value="2009">2009��</option>
              <option value="2010">2010��</option>
              <option value="2011">2011��</option>
              <option value="2012">2012��</option>
              <option value="2013">2013��</option>
              
              <option value="2014">2014��</option>
              <option value="2015">2015��</option>
              <option value="2016">2016��</option>
              <option value="2017">2017��</option>
              <option value="2018">2018��</option>
              <option value="2019">2019��</option>
              
            </select>
              <script language="javascript">
			  
			     document.getElementById("establish").value = "<?php echo $this->_tpl_vars['arr_conIfo_list'][10]; ?>
";
			  
			  </script>
              </td>
              </tr>
              
              
            <tr><td width="15%" align="right"  class="tbbody">���Ϳͻ�:
             <td colspan="3" id="product"  class="tbbody"> <input type="text" name="customer" id="customer" style="width:600px;" value="<?php echo $this->_tpl_vars['arr_conIfo_list'][14]; ?>
"  maxlength="80">
(��ѡ,������ŷֿ� ��:��Ϊ,����)</td></td>
              </tr>
            
           
            <tr>
            
            
            <tr><td width="15%" align="right"  class="tbbody">���:
             <td colspan="3" id="product"  class="tbbody">  <textarea name="summary" id="summary" style=" width:600px; height:200px; margin-bottom:20px"><?php echo $this->_tpl_vars['arr_conIfo_list'][11]; ?>
</textarea>   
(��ѡ,������ŷֿ� ��:��Ϊ,����)</td></td>
              </tr>
           
            <tr>
            
            
            
            <td width="15%" align="right"  class="tbbody">��˾��飺&nbsp;</td>
      <td colspan="8"  height="800" class="tbbody" style="position:relative">
      		<textarea name="content" id="content" style="width:800px;height:400px;visibility:hidden; display:none"><?php echo $this->_tpl_vars['arr_conIfo_list'][13]; ?>
</textarea>
            <textarea name="contents" id="contents" style="width:800px;height:400px;visibility;"><?php echo $this->_tpl_vars['arr_conIfo_list'][13]; ?>
</textarea>
      		<!--iframe src="./Edit/editor.htm?id=gently_editor&ReadCookie=0" id="contents" name="contents" frameborder="0" marginheight="0" marginwidth="0" scrolling="No" width="800" height="600"></iframe-->
           
		    <script charset="utf-8" src="../editor/kindeditor-min.js"></script>
		    <script charset="utf-8" src="../editor/lang/zh_CN.js"></script>
		    <script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="contents"]', {
					allowFileManager : true
				});
				/*K('input[name=getHtml]').click(function(e) {
					alert(editor.html());
				});
				K('input[name=isEmpty]').click(function(e) {
					alert(editor.isEmpty());
				});
				K('input[name=getText]').click(function(e) {
					alert(editor.text());
				});
				K('input[name=selectedHtml]').click(function(e) {
					alert(editor.selectedHtml());
				});
				K('input[name=setHtml]').click(function(e) {
					editor.html('<h3>Hello KindEditor</h3>');
				});
				K('input[name=setText]').click(function(e) {
					editor.text('<h3>Hello KindEditor</h3>');
				});
				K('input[name=insertHtml]').click(function(e) {
					editor.insertHtml('<strong>����HTML</strong>');
				});
				K('input[name=appendHtml]').click(function(e) {
					editor.appendHtml('<strong>����HTML</strong>');
				});
				K('input[name=clear]').click(function(e) {
					editor.html('');
				});
				editor.html('');*/
				
				editor.html('<?php echo $this->_tpl_vars['arr_conIfo_list'][13]; ?>
');
			});
		</script>
                  
            </td>   
             
		   </tr>
		   </table>
<br>	
			
			<table width="92%" border="0" align="center" cellpadding="3" cellspacing="0" style="font-size:12px;" >
				 <tr>
					<td colspan="2" valign="middle" align="center"><p>
						<input class="btn1"  type="button" onClick="return myfunc();" value="ȷ��">
						<!--input class="btn1"  type="reset" value="����"-->
					</p>
						<p>&nbsp; </p></td>
				</tr>
		  </table>



</form>
</body>
<script language="javascript">

 var isNameExit = false;
  var content="";
  var editFrame;//contents
 
 ///var oragainName = <?php echo $this->_tpl_vars['arr_conIfo_list'][0]; ?>
;
 function $(s){   
	     return document.getElementById(s);
  }
function trim(str){   //ɾ���������˵Ŀո�
   return str.replace(/(^\s*)|(\s*$)/g, "");
  }
  
   
  
function myfunc()
{/////Fcon_name,Fcon_info,Fcon_website,Fmaster_name,Fmaster_tel,Fmaster_mail,Fmaster_qq
	
	
	  if(!checkAllTextValid($("regForm")))
	  {
	      return false;
	  }
	  var contents;
	  /*var s = "";
	 for(var i=0;i<proArr.length;i++)
	 {
	    var o = $('pr'+i);
		if(o.checked==true||o.checked=="true")
		{
		   if(s=="")
		   {
		     s = o.value;
		   }else
		   {
		     s = s+"{*}"+o.value;
		   }
		}
	 }
	 $('pro_types').value = s;
	*/
	
	
	contents = editor.html();
	
	$("content").innerText = contents;
	///return;
	
	if(contents.length<50)
	{
	   alert("������������������50");
	   return;
	}
	
	//editFrame = frames["contents"];
	//content = editFrame.getHTML();//
	//if(content.length<50)
	//{
	 //  alert("�����������50");
	 //  return;
	//}
	///alert(editFrame.getHTML());
	var s = $("summary").value;
	if(s.length>300||s.length<20)
	{
	 // s = s.slice(0,200);
	  alert("��˾��鲻��С��20�Ҳ��ܴ���300");
	  return;
	}
	 //$("summary").value = s;
	/// $("summary").innerText = s;
	
	
	// if($("pro_types").value=="")
	// {
	    // alert("��ѡ���Ʒ����");
		// return false;
	// }
	 
	 
     if($("company_name").value==""||$("company_name").value.length<3||$("company_name").value.length>24)
	 {
	   /// $("username_msg").className = "red";
		 alert("��˾������Ϊ3-24λ");
	     return false;
	 }
	 
	  if($("sortname").value==""||$("sortname").value.length<2||$("sortname").value.length>16)
	 {
	   /// $("username_msg").className = "red";
		 alert("��Ƴ���Ϊ2-16λ");
	     return false;
	 }
	 
	 
	 
	/* if($("intro").value==""||$("intro").value.length<20||$("site_url").value.length>200)
	 {
	   /// $("username_msg").className = "red";
		 alert("��鳤�Ȳ���");
	     return false;
	 }*/
	 
	 if($("provinces").value==""||$("cities").value=="")
	 {
	    alert("��ѡ��ʡ�ݺͳ���");
		return false;
	 }
	 if($("address").value==""||$("address").value.length<8||$("address").value.length>50)
	 {
		 alert("��ַ����Ϊ8-50��");
	     return false;
	 }
	 /*if($("zipcode").value!=""&&$("zipcode").value.length!=6)
	 {
		 alert("�ʱ��ַΪ6λ");
	     return false;
	 }*/
	 
	 if($("telephone").value==""||$("telephone").value.length<10||$("telephone").value.length>38)
	 {
	   /// $("username_msg").className = "red";
		 alert("��ϵ�绰���Ȳ���");
	     return false;
	 }
	 
	
///if(!$("a_1").checked&&!$("a_2").checked&&!$("a_3").checked&&!$("a_4").checked&&!$("a_5").checked&&!$("a_6").checked&&!$("a_7").checked)
	// {
	   /// alert("��ѡ����������");
		///return false;
	// }
	 
    //if(!$("s_1").checked&&!$("s_2").checked&&!$("s_3").checked&&!$("s_4").checked&&!$("s_5").checked&&!$("s_6").checked&&!$("s_7").checked)
	// {
	   /// alert("��ѡ��ҵ������");
		//return false;
	// }
	 /*if($("qq").value==""||$("qq").value.length<5)
	 {
	   /// $("username_msg").className = "red";
		 alert("qqΪ����Ϊ����5λ");
	     return false;
	 }*/
	 
	 if($("establish").value=="")
	 {
	   /// $("username_msg").className = "red";
		 alert("��ѡ�����ʱ��");
	     return false;
	 }
	 
	// if($("guimo").value=="")
	// {
	   /// $("username_msg").className = "red";
		// alert("��ѡ���ģ");
	    // return false;
	// }
	
	regForm.method = "post";
	regForm.action = "doEditCompany.php?"+"&ct="+new Date();
    regForm.submit();
	
	/*//}
	*/
}
	
</script>
</html>