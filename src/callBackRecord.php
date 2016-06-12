<?php
use Mumutou\\FYVoip;
/**
 * 录音完成以后，会通过这个接口通知给第三方服务器
 */
ini_set('date.timezone','Asia/Shanghai');
ini_set("display_errors", "On");
require 'FYAPI.class.php';
require 'client/FeiyuResponseHandler.php';

$request = new FeiyuResponseHandler();

$params = $request->parameters;


/**
 * ....中间是对传入参数的自行处理的方法
 */
if(empty($params)){
	//返回数据
	$result = array(
			//接收结果：0）成功；其他代表错误码
			"resultCode"=>900001,
			//认证结果描述,会透传给客户端认证授权成功的话，result是下面的json数组
			"resultMsg"=>"没有收到数据",
	);
}else{
	//返回数据
	$result = array(
			//接收结果：0）成功；其他代表错误码
			"resultCode"=>0,
			//认证结果描述,会透传给客户端认证授权成功的话，result是下面的json数组
			"resultMsg"=>"接收成功",
	);
}
FYAPI::log($params,json_encode($result),"","callBackRecord");
echo json_encode($result);
exit();
