<?php /* Smarty version 2.6.18, created on 2017-05-13 16:25:53
         compiled from postmail.html */ ?>
﻿
<head>
</head>

<body>
    
    <section class="right-body">
      
        <div style="width:100%; height:50px; float:left; text-align:center; color:#506474; line-height:50px; font-size:16px;">填写发送内容</div>
        <div style="width:100%; height:auto;padding-top:0px; float:left;">
        <form name="form1" id="form1" enctype="multipart/form-data">
        <table cellspacing="0" cellpadding="0" border="0" class="right-body-place">
            <thead>
            <tr>
                <th style="width:200px;">选项</th>
                <th>内容</th>
            </tr>
            </thead>
            <tbody>
           
             <tr class="yellowTr">
                <td>标题</td>
                <td  class="access-key">
                  <div style="width:500px; height:30px; margin-left:70px; border:#999999 solid 1px;">
                  <input name="title" id="title"  style="width:500px; height:25px;"/>
                  </div>
                </td>
             </tr>
             <tr class="yellowTr">
                <td>html代码</td>
                <td  class="access-key">
                   <div style="width:800px; height:480px;">
                         <textarea name="content" id="content" style="width:700px; margin-left:50px; margin-top:20px;height:400px; background-color:#FFFFFF; border:#999999 solid 1px;">
                         
                         sssssssssss
                         sssss
                         您的密码saassa
                         </textarea>
                  </div>
                </td>
             </tr>
             
             <tr class="yellowTr">
                <td>测试邮箱地址</td>
                <td  class="access-key">
                  <div style="width:500px; height:30px; margin-left:70px; border:#999999 solid 1px;">
                   <input name="mailAddress" id="mailAddress"  style="width:500px; height:25px;"/>
                  </div>
                </td>
             </tr>
             
              </tbody>
        </table>
        </form>
     <script language="javascript">
	   
	   function senToTest()
	   {
	        form1.method = "post";
            form1.action = "huodong.php?ac=postTestMail&tm="+new Date();
            form1.submit();
	   }
	   
	   var list = [];
	   <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['arr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	      var obj = {mail:"<?php echo $this->_tpl_vars['arr'][$this->_sections['i']['index']][0]; ?>
",name:"<?php echo $this->_tpl_vars['arr'][$this->_sections['i']['index']][1]; ?>
",password:"<?php echo $this->_tpl_vars['arr'][$this->_sections['i']['index']][2]; ?>
"};
		  list.push(obj);
	   <?php endfor; endif; ?>
	   
	  // alert(list);
	   
	   
	 //arr  
	 
	 var currentIndec = 0;
	   
	  function sendToAll()
	   {
	        //if(confirm("确认邮件无误并发送个所有开发者吗？"))
			//{
			    form1.method = "post";
                form1.action = "huodong.php?ac=postTestMail&tm="+new Date();
				form1.target = "myFrame";
                form1.submit();
			//}
	   }
	 /*   
	  function sendToBind()
	  {
	     if(confirm("该功能只能是第一次发送邮件的时候使用，慎用？"))
			{
			    
			    form1.method = "post";
                form1.action = "action/huodong.php?ac=setSubject&tm="+new Date();
                form1.submit();
				
			}
	  }*/
	   
	   
	 </script>   
        
        
   <div style="width:100%; height:50px; float:right; text-align:right">
    <div id="controlList" style="width:400px; height:50px; float:left; ">
      <ul>
        <li style="float:left; width:140px; height:20px; color:#00bcbf; cursor:pointer" onClick="senToTest()" >
          <div id="add-key" style=" width:130px; height:33px; padding:0px;-moz-border-radius:18px;-webkit-border-radius:18px; border-radius:18px; background-color:#edf1f2; border:#00bcbf 1px solid;  cursor:pointer">
            <div style="width:100px; float:left; height:25px; font-size:14px;margin-top:10px; margin-left:13px; color:#00bcbf;">发到测试账号</div>
          </div>
        </li>
        <li style="float:left; width:80px; height:20px;color:#00bcbf; cursor:pointer" onClick="sendToAll()">
          <div id="add-key" style=" width:80px; height:33px; padding:0px;-moz-border-radius:18px;-webkit-border-radius:18px; border-radius:18px; background-color:#edf1f2; border:#00bcbf 1px solid;  cursor:pointer">
            <div style="width:60px; float:left; height:25px; font-size:14px;margin-top:10px; margin-left:10px;color:#00bcbf;">批量发布</div>
          </div>
        </li>

        <!--li style="float:left; width:80px; height:20px;color:#00bcbf; margin-left:20px; cursor:pointer" onClick="sendToBind()">
          <div id="add-key" style=" width:80px; height:33px; padding:0px;-moz-border-radius:18px;-webkit-border-radius:18px; border-radius:18px; background-color:#edf1f2; border:#00bcbf 1px solid;  cursor:pointer">
            <div style="width:60px; float:left; height:25px; font-size:14px;margin-top:10px; margin-left:10px;color:#ff0000;">绑定订阅</div>
          </div>
        </li-->
      </ul>
    </div>
    <div id="pageBtnBox"  class="pageBtnBox"> </div>
  </div>   
</div>

</section>
    






<!-- 删除end -->
</div>
<!-- backstage wrap -->
<iframe id="myFrame" name="myFrame" style="margin-top:30px"> </iframe> 
    
</body></html>