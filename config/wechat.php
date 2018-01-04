<?php
/**
 * Created by PhpStorm.
 * User: Wseek
 * Date: 2017/12/22
 * Time: 9:32
 */

return [
    /**
     * Debug 模式，bool 值：true/false
     *
     * 当值为 false 时，所有的日志都不会记录
     */
    'debug'  => true,

    /**
     * 账号基本信息，请从微信公众平台/开放平台获取
     */
//    'app_id'  => 'wxbfb496cee7a99f3a',         // AppID
//    'secret'  => 'd68ed4d6873f4ff413531d0c3c4d9796',     // AppSecret
    'app_id'  => 'wxcf74a9f1052677c3',         // AppID
    'secret'  => '9b87d471516e8a5f9861070aa816c806',     // AppSecret
    'token'   => 'wechat',          // Token
    'aes_key' => '',                    // EncodingAESKey，兼容与安全模式下请一定要填写！！！

    /**0
     * 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
     * 使用自定义类名时，构造函数将会接收一个 `EasyWeChat\Kernel\Http\Response` 实例
     */
    'response_type' => 'array',

    /**
     * 日志配置
     *
     * level: 日志级别, 可选为：
     *         debug/info/notice/warning/error/critical/alert/emergency
     * permission：日志文件权限(可选)，默认为null（若为null值,monolog会取0644）
     * file：日志文件位置(绝对路径!!!)，要求可写权限
     */
    'log' => [
        'level'      => 'debug',
        'permission' => 0777,
        'file'       => storage_path('logs/easywechat_'.date('Ymd').'.log'),
    ],

    /**
     * 接口请求相关配置，超时时间等，具体可用参数请参考：
     * http://docs.guzzlephp.org/en/stable/request-options.html
     *
     * - retries: 重试次数，默认 1，指定当 http 请求失败时重试的次数。
     * - retry_delay: 重试延迟间隔（单位：ms），默认 500
     * - log_template: 指定 HTTP 日志模板，请参考：https://github.com/guzzle/guzzle/blob/master/src/MessageFormatter.php
     */
    'http' => [
        'retries' => 1,
        'retry_delay' => 500,
        'timeout' => 5.0,
        'base_uri' => 'https://api.weixin.qq.com/',
    ],

    /**
     * OAuth 配置
     *
     * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
     * callback：OAuth授权完成后的回调页地址
     */
    'oauth' => [
        'scopes'   => ['snsapi_userinfo'],
        'callback' => '/oauth',
    ],
];