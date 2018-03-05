<?php
class helper_des {
	private $key   = ""; 
	private $iv    = "";//需要8位

	/**
	* 构造
	*
	* @param string $key
	* @param string $iv
	*/
	function __construct ($key, $iv){
		if (empty($key) || empty($iv)) {
			echo 'key and iv is not valid!';
			exit();
		}
		
		$this->key = $key;
		$this->iv  = $iv;
	}	


	/**
	*加密
	* @param <type> $value
	* @return <type>
	*/
	public function encrypt ($value){
		if ( empty($value) || strlen($value)==0 ){
			return false;
		}
		//$td = mcrypt_module_open(MCRYPT_3DES, '', MCRYPT_MODE_CBC, '');//创建加密环境 256位 128/8 = 16 字节 表示IV的长度
		$td = mcrypt_module_open(MCRYPT_3DES,'','cbc','');

		mcrypt_generic_init($td, $this->key, $this->iv);//初始化加密算法		
		$value7  = $this->paddingpkcs7($value);//对明文进行补位填充
		$cipher = mcrypt_generic($td, $value7);//对数据执行加密
		
		mcrypt_generic_deinit($td);//释放加密算法资源
		mcrypt_module_close($td);//关闭加密环境
		return $cipher;
	}

	/**
	*解密
	* @param <type> $value
	* @return <type>
	*/
	public function decrypt ($value){
		if ( empty($value) || strlen($value)==0 ){
			return false;
		}

		//$td = mcrypt_module_open(MCRYPT_3DES, '', MCRYPT_MODE_CBC, '');
		$td =mcrypt_module_open(MCRYPT_3DES,'','cbc','');

		mcrypt_generic_init($td, $this->key, $this->iv);	
		$pain = mdecrypt_generic($td, $value);
		$pain7 = $this->unpaddingpkcs7($pain);

		mcrypt_generic_deinit($td);
		mcrypt_module_close($td);
		return $pain7;
	}

	//补位填充函数
	private function paddingpkcs7 ($data) {
		if ( empty($data) || strlen($data)==0 ){
			return false;
		}
		 /* 获取加密算法的区块所需空间,MCRYPT_3DES表示加密算法,cbc表示加密模式,要和mcrypt_module_open(MCRYPT_3DES,'','cbc','')的一致*/
		$blocksize = mcrypt_get_block_size(MCRYPT_3DES, 'cbc');
		$pad = $blocksize - (strlen($data) % $blocksize); // 计算需要补位的空间
		$padchar = chr($pad);
		$data .= str_repeat($padchar, $pad);        // 补位操作
		return $data;
	}

	//解密后得到的明文去掉补位，还原初始数据
	private function unpaddingpkcs7($data) {
		$len = strlen($data);
		$pad = ord($data{$len - 1});

		if ( $pad > $len ) {
			return false;
		}

		if (strspn($data, chr($pad), $len - $pad) != $pad) {			
			return false;
		}

		return substr($data, 0, - 1 * $pad);

		$str = mcrypt_cbc(MCRYPT_DES, DES_KEY, $data, MCRYPT_DECRYPT, DES_VI);     // 解密的结果可能还含有补位数据，所以要把补位去掉     
		$slice = ord($data{strlen($data) - 1});	
/*     
		return substr($data, 0, -1*$slice); */
	}

}

function SetToHexString($str)
{
 if(!$str)return false;
   $tmp="";
 for($i=0;$i<strlen($str);$i++)
 {
   $ord=ord($str[$i]);
   $tmp.=SingleDecToHex(($ord-$ord%16)/16);
   $tmp.=SingleDecToHex($ord%16);
 }
  return $tmp;
}
function SingleDecToHex($dec)
{
  $tmp="";
  $dec=$dec%16;
  if($dec<10)
  return $tmp.$dec;
  $arr=array("a","b","c","d","e","f");
  return $tmp.$arr[$dec-10];
}


function UnsetFromHexString($str)
{
  if(!$str)return false;
   $tmp="";
  for($i=0;$i<strlen($str);$i+=2)
  {
    $tmp.=chr(SingleHexToDec(substr($str,$i,1))*16+SingleHexToDec(substr($str,$i+1,1)));
  }
  return $tmp;
}

function SingleHexToDec($hex)
{
   $v=ord($hex);
   if(47<$v&&$v<58)
    return $v-48;
   if(96<$v&&$v<103)
   return $v-87;
}


function msubstr($str, $start, $len) {
    $tmpstr = "";
    $strlen = $start + $len;
    for($i = 0; $i < $strlen; $i++) {
        if(ord(substr($str, $i, 1)) > 0xa0) {
            $tmpstr .= substr($str, $i, 2);
            $i++;
        } else
            $tmpstr .= substr($str, $i, 1);
    }
    return $tmpstr;
}




?>