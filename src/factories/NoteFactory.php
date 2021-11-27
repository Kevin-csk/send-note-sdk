<?php

namespace Chenshikang\SendNoteSdk\factories;

use Chenshikang\SendNoteSdk\Services\SmsPoService;
use Chenshikang\SendNoteSdk\Services\TencentNoteService;

class NoteFactory
{
    /**
     * 根据发送方式实例化不同的类
     * @param $sendCate
     * @return SmsPoService|TencentNoteService
     */
    public function sendNote($sendCate, $secretId, $secretKey, $smsSdkAppId, $signName, $templateId)
    {
        switch ($sendCate) {
            case 'smspo' :
                return new SmsPoService($secretId, $secretKey);
                break;
            case 'tencent' :
                return new TencentNoteService($secretId, $secretKey, $smsSdkAppId, $signName, $templateId);
                break;
        }
    }
}
