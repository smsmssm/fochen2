function tracking(e){
  e = e ? e : window.event;
  var s = e.srcElement ? e.srcElement : e.target;
  var a = s.tagName;
  var u = s.href;
  var t = s.innerText ? s.innerText : s.textContent;
  if(a == "A" || a == "IMG"){
    if(a == "IMG"){
      t = s.href || s.src;
      u = s.parentElement || s.parentNode;
    }
    try{
      new Image().src = "http://vip.idc123.com/click.asp?Link_Type="+a+"&Ad_Page="+document.location+"&Link_Url="+escape(u)+"&Link_Show="+t;
    }catch(ex){}
  }
  return true;
} 
document.onmousedown = tracking;