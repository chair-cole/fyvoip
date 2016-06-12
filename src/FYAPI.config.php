<?php
namespace Mumutou\FYVoip;

class FYAPIConfig{
	public static function getFeiyuConfig(){
		return array(
				//'配置项'=>'配置值'
				//账号信息
				"USER_INFO"=>"XXX",
				//绑定号码
				"USER_PHONE"=>"XXX",
				//账号密码
				"USER_PASSWORD"=>"XXX",
				//测试APPID
				"APP_ID"=>"XXX",
				//测试APPTOKEN
				"APP_TOKEN"=>"XXX",
				//当前接口的版本号
				"VERSION"=>"2.1.0",
				//添加终端SDK账户
				"ADD_ACCOUNT_URL"=>"http://api.feiyucloud.com/api/addAccount",
				//查看终端SDK账户
				"GET_ACCOUNT_URL"=>"http://api.feiyucloud.com/api/getAccount",
				//屏蔽终端SDK账户
				"DISABLE_ACCOUNT_URL"=>"http://api.feiyucloud.com/api/disableAccount",
				//激活终端SDK账户
				"ENABLE_ACCOUNT_URL"=>"http://api.feiyucloud.com/api/enableAccount",
				//修改终端SDK账户绑定手机号
				"MODIFY_ACCOUNT_DISPLAY_NUMBER_URL"=>"http://api.feiyucloud.com/api/modifyAccountDisplayNumber",
				//查询SDK账户的在线状态
				"GET_ACCOUNT_ONLINE_STATUS_URL"=>"http://api.feiyucloud.com/api/onlineStatus",
				//回拨（集成方服务器端主动发起回拨）
				"CALL_BACK_URL"=>"http://api.feiyucloud.com/api/callback",
				//获取录音文件下载地址
				"GET_RECORD_DOWN_URL"=>"http://api.feiyucloud.com/api/getRecordDownUrl",
				//语音通知
				"SOUND_SMS_ACTION"=>"http://soundsms.feiyucloud.com/soundSmsAction!autocall.action",
				//查询通话记录
				"FETCH_CALL_HISTORY"=>"http://api.feiyucloud.com/api/fetchCallHistory"
		);
	} 
}
?>
