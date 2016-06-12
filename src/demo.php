<?php
ini_set('date.timezone','Asia/Shanghai');
ini_set("display_errors", "On");
require_once ('FYAPI.class.php');
class testFeiyuApi{
	private $_feiyu;
	private $params;
	
	public function __construct(){
		$this->_feiyu = new FYAPI();
		$this->params=array();
	}
	
	/**
	 * 添加飞语云账号
	 * appAccountId(String)必填，在应用服务器端用户的唯一名称，同一个应用必须要保证唯一
	 * globalMobilePhone(String)选填，绑定手机号码。拨打出去可以显示用户的本机号码,要带国别码，如果是中国的是86133*******。如果账户要调用双向回拨接口，必须绑定手机号
	 * district(String)，号码的国际区号（中国就是86）
	 * ti(long)必填，时间戳。自1970年1月1日0时起的毫秒数, 时间戳有效时间为30分钟
	 */
	public function addAccountUrlAction(){
		$this->params['appAccountId'] = 'pengyangtest3';
		$this->params['globalMobilePhone'] = '13671854057';
		$this->params['district'] = '86';
		$this->params['ti'] = time()."000";
		$ret = $this->_feiyu->addAccount($this->params);
		return $ret;
	}
	
	/**
	 * 查看终端SDK账户
	 * infoType(String)必填，查询信息类型。1）飞语云账户号码；2）APP账户号码；3）手机号码
	 * info(String)必填，infoType对应的查询信息，例：infoType=3，info=15xxxxxx(手机号码)
	 * ti(long)必填，时间戳。自1970年1月1日0时起的毫秒数, 时间戳有效时间为30分钟
	 */
	public function getAccountUrlAction(){
		$this->params['info'] = 'FY44139IJNESM';
		$this->params['infoType'] = '1';
		$this->params['ti'] = time()."000";
		$ret = $this->_feiyu->getAccount($this->params);
		return $ret;
	}
	
	/**
	 * 往飞语云服务器禁用飞语云账户的接口
	 * fyAccountId(String),飞语云账户ID
	 * ti(long)必填，时间戳。自1970年1月1日0时起的毫秒数, 时间戳有效时间为30分钟
	 */
	public function disableAccountAction(){
		$this->params['fyAccountId'] = 'FY44139IJNESM';
		$this->params['ti'] = time()."000";
		$ret = $this->_feiyu->disableAccount($this->params);
		return $ret;
	}
	
	/**
	 * 往飞语云服务器启用飞语云账户的接口
	 * fyAccountId(String),飞语云账户ID
	 * ti(long)必填，时间戳。自1970年1月1日0时起的毫秒数, 时间戳有效时间为30分钟
	 */
	public function enableAccountAction(){
		$this->params['fyAccountId'] = 'FY44139IJNESM';
		$this->params['ti'] = time()."000";
		$ret = $this->_feiyu->enableAccount($this->params);
		return $ret;
	}
	
	/**
	 * 查询飞语云账户的在线状态
	 * fyAccountId(String),飞语云账户ID
	 * ti(long)必填，时间戳。自1970年1月1日0时起的毫秒数
	 */
	public function onlineStatusAction(){
		$this->params['fyAccountIds'] = 'FY44139IJNESM';
		$this->params['ti'] = time()."000";
		$ret = $this->_feiyu->onlineStatus($this->params);
		return $ret;
	}
	
	/**
	 * 修改飞语云账户绑定手机号
	 * fyAccountId(String),飞语云账户ID
	 * globalMobilePhone(String)必填，待绑定的手机号码。用户显示号码和回拨用,要带国别码;例如：86+13888888888；当手机号为空时候，代表是解除手机号码的绑定
	 * district(String)，号码的国际区号（中国就是86）
	 * ti(long)必填，时间戳。自1970年1月1日0时起的毫秒数, 时间戳有效时间为30分钟
	 */
	public function modifyAccountDisplayNumberAction(){
		$this->params['fyAccountId'] = 'FY44139IJNESM';
		$this->params['globalMobilePhone'] = '15821881492';
		$this->params['district'] = '86';
		$this->params['ti'] = time()."000";
		$ret = $this->_feiyu->modifyAccountDisplayNumber($this->params);
		return $ret;
	}
	
	
	/**
	 * 集成方服务器端主动发起回
	 * caller(String)，主叫号码：（可以填写手机号码，或者飞语云ID，如果是飞语云ID，则此ID必须绑定手机号码）
	 * maxCallMinute，此次最大通话分钟数，最大120分钟
	 * showNumberType，外呼显号标示：1）显号； 2）不显号
	 * callee，被叫号码：号码格式如下，拨打中国手机86+13888888888，拨打中国上海固话86+21+12341234
	 * calleeDistrictCode，被叫默认的国别码，默认是86
	 * ifRecord(int)，是否需要录音：1）需要；2）不需要
	 * ti(long)必填，时间戳。自1970年1月1日0时起的毫秒数, 时间戳有效时间为30分钟
	 */
	public function callBackUrlAction(){
		$this->params['caller'] = 'FY44139IJNESM';
		$this->params['maxCallMinute'] = '0';
		$this->params['showNumberType'] = '1';
		$this->params['callee'] = '8613671854057';
		$this->params['calleeDistrictCode'] = '86';
		$this->params['ifRecord'] = '1';
		$this->params['ti'] = time()."000";
		$ret = $this->_feiyu->callBackUrl($this->params);
		return $ret;
	}
	
	/**
	 * 第三方应用服务器发送相关信息给飞语云服务器。
	 * 符合条件的情况下，飞语的通讯系统会将文本通过语音的形式在用户的手机上播报。
	 * phone(String)必填，被叫手机号码
	 * msg(String)必填，需要拨报的文字内容
	 * playtimes(int)必填，播放次数，默认是1
	 * replaytimes(int)必填，重听次数，默认是0
	 * appCallId(String)必填，第三方呼叫的唯一标识
	 * retrytimes(int)必填，呼叫次数，默认是1次就是代表呼叫一次，如果2的话，表示第一次呼叫失败了，会再呼叫一次
	 * retrystep(int)必填，重试的时间间隔（秒），默认0秒
	 * ti(long)必填，时间戳。自1970年1月1日0时起的毫秒数, 时间戳有效时间为30分钟
	 */
	public function soundSmsAction(){
		$this->params['phone'] = '8613671854057';
		$this->params['msg'] = '这个是语音通知测试';
		$this->params['playtimes'] = 2;
		$this->params['replaytimes'] = 1;
		$this->params['appCallId'] = '8615821881492';
		$this->params['retrytimes'] = 2;
		$this->params['retrystep'] = 5;
		$this->params['ti'] = time()."000";
		$ret = $this->_feiyu->soundSmsAction($this->params);
		return $ret;
	}
	
	/**
	 * 获取录音文件下载地址，请在通话完成15分钟后调用此接口获取地址。
	 * 获取的下载地址有效期30分钟，30分钟后需要重新请求接口获取新下载地址。
	 * fyCallId(String)必填，飞语产生的呼叫ID
	 * ti(long)必填，时间戳。自1970年1月1日0时起的毫秒数, 时间戳有效时间为30分钟
	 */
	public function getRecordDownUrlAction(){
		$this->params['fyCallId'] = 'E853943A382FAE6F4CE559B128956511@fy';
		$this->params['ti'] = time()."000";
		$ret = $this->_feiyu->getRecordDownUrl($this->params);
		return $ret;
	}
	
	/**
	 * 电话结束后，可以通过这个接口查询通话记录
	 * fyCallId(String)必填，飞语产生的呼叫ID
	 * ti(long)必填，时间戳。自1970年1月1日0时起的毫秒数, 时间戳有效时间为30分钟
	 */
	public function fetchCallHistoryAction(){
		$this->params['fyCallId'] = 'E853943A382FAE6F4CE559B128956511@fy';
		$this->params['ti'] = time()."000";
		$ret = $this->_feiyu->fetchCallHistory($this->params);
		return $ret;
	}
}

$feiyuApi = new testFeiyuApi();
//$ret = $feiyuApi->addAccountUrlAction();
$ret = $feiyuApi->getAccountUrlAction();
//$ret = $feiyuApi->disableAccountAction();
//$ret = $feiyuApi->enableAccountAction();
//$ret = $feiyuApi->onlineStatusAction();
//$ret = $feiyuApi->modifyAccountDisplayNumberAction();
//$ret = $feiyuApi->callBackUrlAction();
//$ret = $feiyuApi->soundSmsAction();
//$ret = $feiyuApi->getRecordDownUrlAction();
//$ret = $feiyuApi->fetchCallHistoryAction();
var_dump($ret);
die;


