<?php

namespace Mumutou\FYVoip;
/**
 * 获取飞语服务器回调第三方服务器的传入参数
 * @author pengyang
 */
class FeiyuResponseHandler{
	/** 密钥 */
	var $key;
	
	/** 应答的参数 */
	var $parameters;
	
	/** debug信息 */
	var $debugInfo;
	
	function __construct() {
		$this->ResponseHandler();
	}
	
	function ResponseHandler() {
		$this->key = "";
		$this->parameters = array();
		$this->debugInfo = "";
	
		/* GET */
		foreach($_GET as $k => $v) {
			$this->setParameter($k, $v);
		}
		/* POST */
		foreach($_POST as $k => $v) {
			$this->setParameter($k, $v);
		}
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
}
