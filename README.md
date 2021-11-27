# send-note-sdk
send note

```php
/* 必要步骤：
 * 实例化一个认证对象，入参需要传入腾讯云账户密钥对secretId，secretKey。
 * 这里采用的是从环境变量读取的方式，需要在环境变量中先设置这两个值。
 * 你也可以直接在代码中写死密钥对，但是小心不要将代码复制、上传或者分享给他人，
 * 以免泄露密钥对危及你的财产安全。
 * CAM密匙查询: https://console.cloud.tencent.com/cam/capi 
 */
use Chenshikang\SendNoteSdk\factories\NoteFactory;
 /* 参数
  * 短信控制台: https://console.cloud.tencent.com/smsv2
  */
$config = [
    'send_cate' => '', //短信宝就写smspo，腾讯云就写tencent
    'secret_id' => '', //短信宝写平台用户名，腾讯云写自己的secret_id
    'secret_key' => '', //短信宝写平台密码，腾讯云写自己的secret_key
    'sms_sdk_app_id' => '', //短信宝直接写空字符串，腾讯云写自己的短信应用ID: 短信SdkAppId在 [短信控制台] 添加应用后生成的实际SdkAppId，示例如1400006666
    'sign_name' => '', //短信宝直接传空字符串，腾讯云写自己的短信签名内容，必须填写已审核通过的签名，签名信息可登录 [短信控制台] 查看
    'template_id' => '' //短信宝直接传空字符串，腾讯云写自己的模板 ID: 必须填写已审核通过的模板 ID。模板ID可登录 [短信控制台] 查看];
];
//工厂模式  
$obj=(new NoteFactory())->sendNote($config);
   

 
 $result=$obj->sendNote($phone,$code);//1.手机号 2.验证码
 
 //后续跟上自己的逻辑判断 
 ```