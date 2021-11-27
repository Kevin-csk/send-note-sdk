<?php

namespace Chenshikang\SendNoteSdk\Services;

use Chenshikang\SendNoteSdk\Interfaces\NoteInterface;

class SmsPoService implements NoteInterface
{
    private $statusStr = array(
        "0" => "短信发送成功",
        "-1" => "参数不全",
        "-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
        "30" => "密码错误",
        "40" => "账号不存在",
        "41" => "余额不足",
        "42" => "帐户已过期",
        "43" => "IP地址限制",
        "50" => "内容含有敏感词"
    );
    private $config = [];

    public function __construct($secretId, $secretKey)
    {
        $this->config['secret_id'] = $secretId;
        $this->config['secret_key'] = $secretKey;
    }

    /**
     * 短信宝发送短信
     * @param $phone
     * @param $content
     * @return false|string
     */
    public function sendNote($phone, $code)
    {
        $smsapi = 'http://api.smsbao.com/';
        $user = $this->config['secret_id']; //短信平台帐号
        $pass = md5($this->config['secret_key']); //短信平台密码
        $content = "【短信宝】您的验证码为" . $code . "，请不要泄露给他人";
        $sendurl = $smsapi . "sms?u=" . $user . "&p=" . $pass . "&m=" . $phone . "&c=" . urlencode($content);
        $result = file_get_contents($sendurl);

        return $this->statusStr[$result];
    }
}
