<?php

use Mumutou\\FYVoip;
/**
 * 当客户端发起呼叫请求的时候，飞语云服务器会向第三方应用服务器授权，以确认是否可以拨打
 * 这个是在呼叫结束之后，飞语服务器会回调这个地址，对应文档的：话单推送
 */
ini_set('date.timezone','Asia/Shanghai');
ini_set("display_errors", "On");
require 'FYAPI.class.php';
require 'client/FeiyuResponseHandler.php';

//这个是获取回调参数传过来的方法
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
			"resultMsg"=>"审核成功",
			"result"=>array(
					"appCallId"=>date("YmdHis"),
					"appServerExtraData"=>"test",
					"fyCallId"=>$params['fyCallId'],
					"showNumberType"=>$params['showNumberType'],
					"maxCallMinute"=>1,
					"ifRecord"=>$params['ifRecord'],
			)
	);
}
FYAPI::log($params,json_encode($result),"","callBackCallAuthorize");
echo json_encode($result);
exit();
