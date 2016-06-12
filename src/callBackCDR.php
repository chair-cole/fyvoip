<?php

use Mumutou\\FYVoip;
/**
 * 当客户端完成呼叫的时候，飞语云服务器会向第三方应用服务器推送此次通话的具体信息
 * 这个是在呼叫结束之后，飞语服务器会回调这个地址，对应文档的：话单推送
 */
ini_set('date.timezone','Asia/Shanghai');
ini_set("display_errors", "On");
require 'FYAPI.class.php';
require 'client/FeiyuResponseHandler.php';

$request = new FeiyuResponseHandler();
//$feiyu = new Feiyu();

$params = $request->parameters;


/**
 * ....中间是对传入参数的自行处理的方法
 */
//其中stopReason的返回参数是表示中断原因：
//1:主叫挂断
//2:被叫挂断
//3:呼叫不可及
//5:超时未接
//6:拒接或超时
//7:网络问题
//9:API请求挂断
//10:余额不足
//11:呼叫失败，系统错误
//12:被叫拒接
//13:被叫无人接听
//14:被叫正忙
//15:被叫不在线
//16:呼叫超过最大呼叫时间
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
//$result = $feiyu->verifySendBill($params);
FYAPI::log($params,json_encode($result),"","callBackCDR");
echo json_encode($result);
exit();
