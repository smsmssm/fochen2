/****
 * For CNZZ.com
 *
 * Last Modified: Mon, 12 Mar 2007 12:01:10 +0800
 **/

function Location(Province, City,SN)
{
	
	this.Province	= Province;
	this.City		= City;
	this.SName      = SN;   
}

// Construct the location data
var arrLocation = new Array(35);
arrLocation[0]  = new Location('��ѡ��', ''); 
arrLocation[1]	= new Location('����', '|������|������|������|������|������|������|��̨��|ʯ��ɽ|��ƽ��|��ͷ��|��ɽ��|ͨ����|˳����|������|������|ƽ����',"BJ");
arrLocation[2]	= new Location('�Ϻ�', '|��ɽ|��ɽ|����|����|����|����|����|¬��|�ɽ�|����|�ֶ�|����|���|����|բ��|����|����|���|�ζ�|�ϻ�',"SH");
arrLocation[3]	= new Location('���', '|��ƽ|�ӱ�|����|�Ӷ�|�Ͽ�|����|����|����|���|����|����|����|����|����|����',"TJ");
arrLocation[4]	= new Location('����', '|����|����|ɳƺ��|�ϰ�|������|��ɿ�|����|��ʢ|˫��|�山|����|����|����|ǭ��|����',"CQ");
arrLocation[5]	= new Location('�ӱ�', '|ʯ��ׯ|����|����|�żҿ�|�е�|��ɽ|�ȷ�|����|��ˮ|��̨|�ػʵ�',"HB");
arrLocation[6]	= new Location('ɽ��', '|̫ԭ|����|��ͬ|����|����|�ٷ�|����|˷��|����|��Ȫ|�˳�',"SX");
arrLocation[7]	= new Location('���ɹ�', '|���ͺ���|������|�����׶���|��ͷ|���|������˹|���ױ���|����������|ͨ��|�ں�|���ֹ�����|�˰���|�����첼',"NM");
arrLocation[8]	= new Location('����', '|����|��ɽ|��Ϫ|����|����|����|��˳|����|��«��|����|����|�̽�|����|Ӫ��',"LN");
arrLocation[9]	= new Location('����', '|����|����|�׳�|��ɽ|��Դ|��ƽ|��ԭ|ͨ��|�ӱ���',"GL");
arrLocation[10]	= new Location('������', '|������|����|���˰���|�׸�|�ں�|����|��ľ˹|ĵ����|��̨��|�������|˫Ѽɽ|�绯|����',"HLJ");
arrLocation[11]	= new Location('����', '|�Ͼ�|����|����|����|���Ƹ�|��ͨ|��Ǩ|̩��|����|����|�γ�|����|��',"JS");
arrLocation[12]	= new Location('�㽭', '|����|����|����|����|��|��ˮ|����|����|����|̨��|����|��ɽ',"ZJ");
arrLocation[13]	= new Location('����', '|�Ϸ�|����|�ߺ�|����|����|��ɽ|����|����|����|����|����|����|����|��ɽ|����|ͭ��|����',"AH");
arrLocation[14]	= new Location('����', '|����|����|����|����|Ȫ��|����|����|����|��ƽ',"FJ");
arrLocation[15]	= new Location('����', '|�ϲ�|����|����|����|������|�Ž�|Ƽ��|����|����|�˴�|ӥ̶',"JX");
arrLocation[16]	= new Location('ɽ��', '|����|����|�ൺ|�Ͳ�|����|��̨|Ϋ��|����|̩��|����|����|��Ӫ|����|��ׯ|����|����|�ĳ�',"SD");
arrLocation[17]	= new Location('����', '|֣��|����|�ױ�|����|����|����|���|����|ƽ��ɽ|���|����Ͽ|����|����|����|���|�ܿ�|פ���|��Դ',"HN");
arrLocation[18]	= new Location('����', '|�人|����|�Ƹ�|��ʯ|ʮ��|����|����|�差|Т��|�˲�|����|����|��ʩ|����',"HB");
arrLocation[19]	= new Location('����', '|��ɳ|����|����|����|����|¦��|����|��̶|����|����|����|�żҽ�|����|������',"HN");
arrLocation[20]	= new Location('�㶫', '|����|��β|����|����|ï��|����|�ع�|����|÷��|��ͷ|����|�麣|��ɽ|����|տ��|��ɽ|��Զ|�Ƹ�|����|��ݸ|��Դ',"GD");
arrLocation[21]	= new Location('����', '|����|����|����|����|����|���|��ɫ|����|���Ǹ�|�ӳ�|����|����|����|����',"GX");
arrLocation[22]	= new Location('����', '|����|����|��ָɽ|��|����|�Ĳ�|����|����|ͨʲ');
arrLocation[23]	= new Location('�Ĵ�', '|�ɶ�|������|����|����|����|�㰲|��Ԫ|��ɽ|��ɽ|����|üɽ|����|�ڽ�|�ϳ�|��֦��|����|�Ű�|�˱�|����|�Թ�|������',"SC");
arrLocation[24]	= new Location('����', '|����|����|��˳|ǭ��|ǭ����|ͭ��|�Ͻ�|����ˮ|ǭ����',"GZ");
arrLocation[25]	= new Location('����', '|����|��ɽ|����|����|�º�|����|���|����|�ٲ�|ŭ��|����|��ɽ|��˫����|��Ϫ|��ͨ|�ն�',"YN");
arrLocation[26]	= new Location('����', '|����|�տ���|��֥|����|����|����|ɽ��',"XZ");
arrLocation[27]	= new Location('����', '|����|����|����|����|����|ͭ��|μ��|����|�Ӱ�|����',"SX");
arrLocation[28]	= new Location('����', '|����|ƽ��|��Ҵ|��Ȫ|������|��ˮ|����|����|���ϲ���������|���|����|¤��|����|����',"GS");
arrLocation[29]	= new Location('����', '|����|��ԭ|ʯ��ɽ|����|����',"NX");
arrLocation[30]	= new Location('�ຣ', '|����|����|��������|������|������|������|������|������',"QH");
arrLocation[31]	= new Location('�½�', '|��³ľ��|����|����|����̩|��������|ʯ����|����|��³��|������|��ʲ|����|�������տ¶�����|��������|��������',"XJ");
arrLocation[32]	= new Location('���', '|������',"XG");
arrLocation[33]	= new Location('����', '|������',"AM");
arrLocation[34]	= new Location('̨��', '|̨��|����|̨��|̨��|��¡|�û�|����|����|̨��|����|����',"TW");
arrLocation[35]	= new Location('����', '|����',"GW");
/*
 * ִ�к���
 */
function selectedCity(cit,pval,cval)
{
	if (pval==null){
		var Provinces = document.getElementById('provinces');
		var Cities = document.getElementById('cities');
	}else{
		var Provinces = document.getElementById(pval);
		var Cities = document.getElementById(cval);
	}
		//Provinces.options[0].text = "��ѡ��";
		var selected = Provinces.options[Provinces.selectedIndex].value;
		if(isNaN(selected)){
			 selected = Provinces.selectedIndex;
		}
		
		if (Provinces.selectedIndex!="0"){
		//Provinces.options[Provinces.selectedIndex].value = Provinces.options[Provinces.selectedIndex].text;
		}else{
			Provinces.options[Provinces.selectedIndex].value="";
		}
		var arrCities = (arrLocation[selected].City).split("|");
		Cities.length = arrCities.length;
		for(var i = 1; i < arrCities.length; i++) {
			if ( cit==arrCities[i]){
				Cities.options[i].selected = 'selected';
			}
			Cities.options[i].text	= arrCities[i];
			Cities.options[i].value	= arrCities[i];
		}
		Cities.options[0].text	= "��ѡ��";
		Cities.options[0].value	= "";
		
}   

function ProvinceCity(val,cit,pval,cval){
	if (pval==null){
		var Provinces = document.getElementById('provinces');
		var Cities = document.getElementById('cities');
	}else{
		var Provinces = document.getElementById(pval);
		var Cities = document.getElementById(cval);
	}
	Provinces.length = arrLocation.length;
	for (var i = 0; i < arrLocation.length; i++) {
		Provinces.options[i].text = arrLocation[i].Province;
		if (arrLocation[i].Province==val){
			Provinces.options[i].selected = 'selected';
			Provinces.options[i].value = arrLocation[i].Province;
			var j=i;
		}else{
			Provinces.options[i].value = i;
		}
	}
	selectedCity(cit,pval,cval);
}

function Province(val){
	Provinces.length = arrLocation.length;
	for (var i = 0; i < arrLocation.length; i++) {
		Provinces.options[i].text = arrLocation[i].Province;
		Provinces.options[i].value = arrLocation[i].Province;
		if (arrLocation[i].Province==val){
			Provinces.options[i].selected = 'selected';
		}
	}
}

function getProvinceNameById(i)
{
	   return arrLocation[i].Province;
}