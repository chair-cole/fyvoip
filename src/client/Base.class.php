<?php

namespace Mumutou\FYVoip;

class Base{
	/** 网关url地址 */
	var $gateUrl;
	
	/** 密钥 */
	var $key;
	
	/** 请求的参数 */
	var $parameters;
	
	/** debug信息 */
	var $debugInfo;
	
	function __construct() {
		$this->RequestHandler();
	}
	
	function RequestHandler() {
		$this->gateUrl = "";
		$this->key = "";
		$this->parameters = array();
		$this->debugInfo = "";
	}
	
	/**
	 *初始化函数。
	 */
	function init() {
		//nothing to do
	}
	
	/**
	 *获取入口地址,不包含参数值
	 */
	function getGateURL() {
		return $this->gateUrl;
	}
	
	/**
	 *设置入口地址,不包含参数值
	 */
	function setGateURL($gateUrl) {
		$this->gateUrl = $gateUrl;
	}
	
	/**
	 *获取密钥
	 */
	function getKey() {
		return $this->key;
	}
	
	/**
	 *设置密钥
	 */
	function setKey($key) {
		$this->key = $key;
	}
	
	/**
	 *获取参数值
	 */
	function getParameter($parameter) {
		return $this->parameters[$parameter];
	}
	
	/**
	 *设置参数值
	 */
	function setParameter($parameter, $parameterValue) {
		$this->parameters[$parameter] = $parameterValue;
	}
	
	/**
	 *获取所有请求的参数
	 *@return array
	 */
	function getAllParameters() {
		return $this->parameters;
	}
	
	/**
	 *获取带参数的请求URL
	 */
	function getRequestURL() {
	
		$this->createSign();
	
		$reqPar = "";
		ksort($this->parameters);
		foreach($this->parameters as $k => $v) {
			$reqPar .= $k . "=" . urlencode($v) . "&";
		}
	
		//去掉最后一个&
		$reqPar = substr($reqPar, 0, strlen($reqPar)-1);
	
		$requestURL = $this->getGateURL() . "?" . $reqPar;
	
		return $requestURL;
	
	}
	
	/**
	 *获取debug信息
	 */
	function getDebugInfo() {
		return $this->debugInfo;
	}
	
	
	
	/**
	 *设置debug信息
	 */
	function _setDebugInfo($debugInfo) {
		$this->debugInfo = $debugInfo;
	}
	
	public function call($url, $datas = '' , $timeout = 5,$outheader = false) {
		$ch = curl_init();
	
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
		$list = array();
		if($datas) {
			foreach ($datas as $key => $value) {
				$list[] = $key . '=' . $value;
			}
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS,  implode('&', $list));
		}
	
		if($outheader) {
			curl_setopt($ch, CURLOPT_HEADER, true);
		}
	
		$ret = @curl_exec($ch);
	
		$execCode = curl_errno($ch);
		if($execCode != 0) {
			//throw new Asf_Exception("call remote $url, POST: ".var_export($datas, true). " failed: ".curl_error($ch), $execCode);
			return false;
		}
	
		return $ret;
	}
	
	public static function log($data,$content="",$url="",$fun=""){
//		$log = "[FUNCTION:".$fun."];[URL:".$url."];[PARAMS:".json_encode($data)."];[content:".$content."]";
//		self::writeFile($log);
	}
	/**
	 * 写文件
	 * @param    string  $file   文件路径
	 * @param    string  $str    写入内容
	 * @param    char    $mode   写入模式
	 */
	public static function writeFile($str)
	{
		$file = LOG_APTH.'/log/'.date('Y-m-d').'.log';
		$str = date("Y-m-d H:i:s",time()).":".$str."\r\n";
		$write_log = file_put_contents($file, $str,FILE_APPEND);
		if($write_log>0){
			return true;
		}else{
			return false;
		}
	}
}
