
var yy = ["nc","u8","u9","crm","t1","t3","t6","bq","plm","hr","a3","a6","a8","ma","g3","g6","g9","其他"];
var jd = ["kis","k3","eas","其他"];
//这些数据 包括前面的那个城市列表的 最好是写到swf里面去，以免曝光
function getProductList(t)
{
	var arr = [];
	  switch(t)
	  {
		  case 1:arr = yy;break;
		  case 2:arr = jd;break;
	  }
	  return arr;
}
