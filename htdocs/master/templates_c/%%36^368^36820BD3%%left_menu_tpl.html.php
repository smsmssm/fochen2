<?php /* Smarty version 2.6.18, created on 2017-07-02 10:47:09
         compiled from left_menu_tpl.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--BASE HREF="http://127.0.0.1/master" /-->
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
<style type="text/css">
body {
    margin-left: 10px;
    margin-top: 15px;
    margin-right: 0px;
    margin-bottom: 0px;
    background:url(images/z_01.jpg) repeat-y;
    overflow:hidden;
}
</style>
<link href="../css/H.css" rel="stylesheet" type="text/css" />
</head>
<body>
<script src="../js/common.js"></script>
<script>
window.onload=function(){
    /*var sPageTitle="Play";
    var sUrl = "http://fx.xunlei.com/cgi-bin/cgi_play_count_stat?CacheTime=1185959644937";
    sUrl = appendCacheTime(sUrl);
    showSubIndexPage(sUrl);*/
}
</script>

<div class="menu">
    <div class="dh01"><a href="javascript:switchMenuStyle('ulSub','oImg')"><img id="oImg" src="../images/-.gif" width="11" height="11"  border="0"/>操作管理</a> </div>
    <ul id="ulSub" style="display:block">
        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['arr_action']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <li><a href="<?php echo $this->_tpl_vars['arr_action'][$this->_sections['i']['index']][0]; ?>
" onclick='javascript:this.href=appendCacheTime( this.href )' class="a1" target="frContent"  onmouseover="hmover(this)" onmouseout="hmout(this)"><?php echo $this->_tpl_vars['arr_action'][$this->_sections['i']['index']][1]; ?>
</a></li>
        <?php endfor; endif; ?>
    </ul>
</div>

<?php if ($this->_tpl_vars['point'] == -1100): ?>
<div class="menu">
    <div class="dh01"><a href="javascript:switchMenuStyle('ulSub','oImg')"><img id="oImg" src="../images/-.gif" width="11" height="11"  border="0"/>操作</a> </div>
    <ul id="ulSub" style="display:block">
        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['arr_operate']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <li><a href="<?php echo $this->_tpl_vars['arr_operate'][$this->_sections['i']['index']][0]; ?>
" onclick='javascript:this.href=appendCacheTime( this.href )' class="a1" target="frContent"  onmouseover="hmover(this)" onmouseout="hmout(this)"><?php echo $this->_tpl_vars['arr_operate'][$this->_sections['i']['index']][1]; ?>
</a></li>
        <?php endfor; endif; ?>
    </ul>
</div>
<?php endif; ?>
<!--div class="menu">
    <div class="dh01"><a href="javascript:switchMenuStyle('ulSub1','oImg1')"><img id="oImg1" src="../images/-.gif" width="11" height="11"  border="0"/>产品运营管理</a> </div>
    <ul id="ulSub1" style="display:block">
        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['arr_vod_quality']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <li><a href="<?php echo $this->_tpl_vars['arr_vod_quality'][$this->_sections['i']['index']][0]; ?>
" onclick='javascript:this.href=appendCacheTime( this.href )' class="a1" target="frContent"  onmouseover="hmover(this)" onmouseout="hmout(this)"><?php echo $this->_tpl_vars['arr_vod_quality'][$this->_sections['i']['index']][1]; ?>
</a></li>
        <?php endfor; endif; ?>
    </ul>
</div-->

</body>
</html>