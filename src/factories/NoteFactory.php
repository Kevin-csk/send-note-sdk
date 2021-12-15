<?php

namespace Chenshikang\SendNoteSdk\factories;

use Chenshikang\SendNoteSdk\Services\SmsPoService;
use Chenshikang\SendNoteSdk\Services\TencentNoteService;

class NoteFactory
{
    /**
     * 根据发送方式实例化不同的类
     * @param $config
     * @return SmsPoService|TencentNoteService
     */
    public function sendNote($config)
    {
        switch ($config['send_cate']) {
            case 'smspo' :
                return new SmsPoService($config);
                break;
            case 'tencent' :
                return new TencentNoteService($config);
                break;
        }
    }
}
