<?php
namespace Mumutou\FYVoip;

define("ROO_TPATH", "" );
define("LOG_APTH", dirname(__FILE__));
ini_set('date.timezone','Asia/Shanghai');
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
/**
 * 
 * @author pengyang
 * Time:2015-10-24 22:45
 */
//require("FYAPI.config.php");
require 'client/Base.class.php';

class FYAPI extends Base{
	
	
	private $_FEIYU_CONFIG;
	
	
	public function __construct($config){
		$this->_FEIYU_CONFIG = $config;//FYAPIConfig::getFeiyuConfig();
	}
	
	/**
	 * result：返回的具体数据，当resultCode为0表示成功，result存储的是由以下几个参数构成的json值。
	 * 返回参数说明：
	 * fyAccountId：String必有，飞语云账户ID，终端授权需要
	 * fyAccountPwd：String必有，飞语云账户密码，终端授权需要
	 * createDate：String必有，创建时间。格式：yyyy-MM-dd HH:mm:ss
	 * status：int必有，状态。1）有效；2）被屏蔽
	 * resultCode：返回的错误代码。0）代表成功；其他具体的错误代码见错误描述
	 * resultMsg：错误信息描述
	 * 返回数据样例：{"result":{"addDate":"2015-03-17 14:06:19","fyAccountId":"123123","fyAccountPwd":"1223456","status":1}, "resultCode":"0","resultMsg":"创建账户成功"}
	 */
	public function addAccount($params=[]){
		$this->parameters = $params;
		$this->_setAppId();
		$this->_setVersion();
		$this->createSign();
		$result = self::call($this->_FEIYU_CONFIG['ADD_ACCOUNT_URL'],$this->getAllParameters(),10);
		$logRet = self::log($this->getAllParameters(),$result,$this->_FEIYU_CONFIG['ADD_ACCOUNT_URL'],__FUNCTION__);
		$result = json_decode($result,true);
		return $result;
	}
	
	/**
	 * result：
	 * 返回的具体数据，当resultCode为0表示成功，result存储的是由以下几个参数构成的json值。
	 返回参数说明：
	 fyAccountId：String必有，飞语云账户ID，终端授权需要
	 fyAccountPwd：String必有，飞语云账户密码，终端授权需要
	 createDate：String必有，创建时间。格式：yyyy-MM-dd HH:mm:ss
	 status：int必有，状态。1）有效；2）被屏蔽
	 resultCode：返回的错误代码。0）代表成功；其他具体的错误代码见错误描述
	 resultMsg：错误信息描述
	 返回数据样例：{
				    "result": {
				        "addDate": "2015-03-17 14:06:19",
				        "fyAccountId": "123123",
				        "fyAccountPwd": "1223456",
				        "status": 1
				    },
				    "resultCode": "0",
				    "resultMsg": ""
				}
	 */
	public function getAccount($params=[]){
		$this->parameters = $params;
		$this->_setAppId();
		$this->_setVersion();
		$this->createSign();
		$result = self::call($this->_FEIYU_CONFIG['GET_ACCOUNT_URL'],$this->getAllParameters(),10);
		$logRet = self::log($this->getAllParameters(),$result,$this->_FEIYU_CONFIG['GET_ACCOUNT_URL'],__FUNCTION__);
		$result = json_decode($result,true);
		return $result;
	}
	
	/**
	 * $result:当resultCode为0表示成功
	 * 返回的具体说明：
	 * resultCode：返回的错误代码。0）代表成功；其他具体的错误代码见错误描述
	 * resultMsg：错误信息描述
	 * 返回样例：
	 * {
	 *	    "resultCode": "0",
	 *	    "resultMsg": "禁用账户成功"
	 * }
	 */
	public function disableAccount($params=[]){
		$this->parameters = $params;
		$this->_setAppId();
		$this->_setVersion();
		$this->createSign();
		$result = self::call($this->_FEIYU_CONFIG['DISABLE_ACCOUNT_URL'],$this->getAllParameters(),10);
		$logRet = self::log($this->getAllParameters(),$result,$this->_FEIYU_CONFIG['DISABLE_ACCOUNT_URL'],__FUNCTION__);
		$result = json_decode($result,true);
		return $result;
	}
	
	/**
	 * $result:当resultCode为0表示成功
	 * 返回的具体说明：
	 * resultCode：返回的错误代码。0）代表成功；其他具体的错误代码见错误描述
	 * resultMsg：错误信息描述
	 * 返回样例：
	 * {
	 *	    "resultCode": "0",
	 *	    "resultMsg": "启用账户成功"
	 * }
	 */
	public function enableAccount($params=[]){
		$this->parameters = $params;
		$this->_setAppId();
		$this->_setVersion();
		$this->createSign();
		$result = self::call($this->_FEIYU_CONFIG['ENABLE_ACCOUNT_URL'],$this->getAllParameters(),10);
		$logRet = self::log($this->getAllParameters(),$result,$this->_FEIYU_CONFIG['ENABLE_ACCOUNT_URL'],__FUNCTION__);
		$result = json_decode($result,true);
		return $result;
	}
	
	/**
	 * $result:当resultCode为0表示成功
	 * 返回的具体说明：
	 * fyAccountId：String必有，飞语云账户ID
	 * clientIp：String必有，客户端注册的IP地址
	 * onlineTime：String必有，上线时间（UTC 1970-01-01至今的毫秒数）
	 * resultCode：返回的错误代码。0）代表成功；其他具体的错误代码见错误描述
	 * resultMsg：错误信息描述
	 * 返回样例：
	 * {
		    "result": [
		        {
		            "clientIp": "10.2.3.4",
		            "fyAccountId": "11111",
		            "onlineTime": 1431669626844
		        },
		        {
		            "clientIp": "13.2.3.2",
		            "fyAccountId": "22222",
		            "onlineTime": 1431669626844
		        }
		    ],
		    "resultCode": "0",
		    "resultMsg": "请求成功"
		}
	 */
	public function onlineStatus($params=[]){
		$this->parameters = $params;
		$this->_setAppId();
		$this->_setVersion();
		$this->createSign();
		$result = self::call($this->_FEIYU_CONFIG['GET_ACCOUNT_ONLINE_STATUS_URL'],$this->getAllParameters(),10);
		$logRet = self::log($this->getAllParameters(),$result,$this->_FEIYU_CONFIG['GET_ACCOUNT_ONLINE_STATUS_URL'],__FUNCTION__);
		$result = json_decode($result,true);
		return $result;
	}
	
	/**
	 * $result:当resultCode为0表示成功
	 * 返回的具体说明：
	 * resultCode：返回的错误代码。0）代表成功；其他具体的错误代码见错误描述
	 * resultMsg：错误信息描述
	 * 返回样例：
	 * {
	 *	    "resultCode": "0",
	 *	    "resultMsg": "修改账户成功"
	 * }
	 */
	public function modifyAccountDisplayNumber($params=[]){
		$this->parameters = $params;
		$this->_setAppId();
		$this->_setVersion();
		$this->createSign();
		$result = self::call($this->_FEIYU_CONFIG['MODIFY_ACCOUNT_DISPLAY_NUMBER_URL'],$this->getAllParameters(),10);
		$logRet = self::log($this->getAllParameters(),$result,$this->_FEIYU_CONFIG['MODIFY_ACCOUNT_DISPLAY_NUMBER_URL'],__FUNCTION__);
		$result = json_decode($result,true);
		return $result;
	}
	
	
	/**
	 * $result:当resultCode为0表示成功
	 * 返回的具体说明：
	 * fyCallId：String必有，此次通话呼叫的飞语唯一标识
	 * resultCode：返回的错误代码。0）代表成功；其他具体的错误代码见错误描述
	 * resultMsg：错误信息描述
	 * 返回样例：
		 {
			    "result": {
			        "fyCallId": "3343"
			    },
			    "resultCode": "0",
			    "resultMsg": "外呼成功"
			}
	 */
	public function callBackUrl($params=[]){
		$this->parameters = $params;
		$this->_setAppId();
		$this->_setVersion();
		$this->createSign();
		$result = self::call($this->_FEIYU_CONFIG['CALL_BACK_URL'],$this->getAllParameters(),10);
		$logRet = self::log($this->getAllParameters(),$result,$this->_FEIYU_CONFIG['CALL_BACK_URL'],__FUNCTION__);
		$result = json_decode($result,true);
		return $result;
	}
	
	/**
	 * $result:当resultCode为0表示成功
	 * 返回的具体说明：
	 * result：(String) 呼叫成功的话，里面存的就是此次呼叫的飞语产生的呼叫ID
	 * resultCode：返回的错误代码。0）代表成功；其他具体的错误代码见错误描述
	 * resultMsg：错误信息描述
	 * 返回样例：
		 {
		    "result": "2312erwe33232434@fy",
		    "resultCode": "0",
		    "resultMsg": "外呼成功"
		 }
	 */
	public function soundSmsAction($params=[]){
		$this->parameters = $params;
		$this->_setAppId();
		$this->_setVersion();
		$this->createSign();
		$result = self::call($this->_FEIYU_CONFIG['SOUND_SMS_ACTION'],$this->getAllParameters(),10);
		$logRet = self::log($this->getAllParameters(),$result,$this->_FEIYU_CONFIG['SOUND_SMS_ACTION'],__FUNCTION__);
		$result = json_decode($result,true);
		return $result;
	}
	
	/**
	 * $result:当resultCode为0表示成功
	 * 返回的具体说明：
	 * result：(String) 录音文件下载的地址
	 * resultCode：返回的错误代码。0）代表成功；其他具体的错误代码见错误描述
	 * resultMsg：错误信息描述
	 * 返回样例：
	 {
		 "result": "获取录音文件下载地址",
		 "resultCode": "0",
		 "resultMsg": "外呼成功"
	 }
	 */
	public function getRecordDownUrl($params=[]){
		$this->parameters = $params;
		$this->_setAppId();
		$this->_setVersion();
		$this->createSign();
		$result = self::call($this->_FEIYU_CONFIG['GET_RECORD_DOWN_URL'],$this->getAllParameters(),10);
		$logRet = self::log($this->getAllParameters(),$result,$this->_FEIYU_CONFIG['GET_RECORD_DOWN_URL'],__FUNCTION__);
		$result = json_decode($result,true);
		return $result;
	}
	
	/**
	 * $result:当resultCode为0表示成功
	 * 返回的具体说明：
	 * result：
	 * resultCode：返回的错误代码。0）代表成功；其他具体的错误代码见错误描述
	 * resultMsg：错误信息描述
	 * 返回样例：
	 * {
		    "result": {
		        "appId": "XXXXX",
		        "appCallId": "XXX",
		        "fyCallId": "XXXX",
		        "appServerExtraData": "XXXX",
			 "callbackFirstStartTime": 144454555,
		        "callbackFirstEndTime":144454555,
		        "callStartTime": 144454555,
		        "callEndTime": 144454555
			 "stopReason": 11,
		        "trueShowNumberType": 1,
		        "trueIfRecord": 1
		    },
		    "resultCode": "0",
		    "resultMsg": "获取成功"
		}
	 */
	public function fetchCallHistory($params=[]){
		$this->parameters = $params;
		$this->_setAppId();
		$this->_setVersion();
		$this->createSign();
		$result = self::call($this->_FEIYU_CONFIG['FETCH_CALL_HISTORY'],$this->getAllParameters(),10);
		$logRet = self::log($this->getAllParameters(),$result,$this->_FEIYU_CONFIG['FETCH_CALL_HISTORY'],__FUNCTION__);
		$result = json_decode($result,true);
		return $result;
	}
	
	/**
	 * String必填，飞语云通讯给每个APP的分配的唯一APPID
	 */
	private function _setAppId(){
		$this->setParameter("appId", $this->_FEIYU_CONFIG['APP_ID']);
	}
	
	/**
	 * String必填，当前接口的版本号：2.1.0
	 */
	private function _setVersion(){
		$this->setParameter('ver', $this->_FEIYU_CONFIG['VERSION']);
	}
	
	/**
	 *创建md5摘要,规则是:MD5（appId+ appToken+ti）
	 */
 	private function createSign() {
 		$signPars = "";
 		$signPars = $this->parameters['appId'].$this->_FEIYU_CONFIG['APP_TOKEN'].$this->parameters['ti'];
 		$sign = strtoupper(md5($signPars));
 		$this->setParameter("au", $sign);
 	}
	
	
}
