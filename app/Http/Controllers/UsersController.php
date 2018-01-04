<?php

namespace App\Http\Controllers;

use EasyWeChat\Factory;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //用户列表
    public function index()
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        $users = $app->user->list();
        dd($users);
    }

    /**
     * 获取单个用户信息
     * @param Request $request
     */
    public function userInfo(Request $request)
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        $user = $app->user->get($request->openID);
        dd($user);
    }

    /**
     * 获取多个用户信息
     * @param Request $request
     */
    public function usersInfo(Request $request)
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        $user = $app->user->select($request->openIDs);
        dd($user);
    }

    /**
     * 修改用户备注
     * @param Request $request
     */
    public function updateRemark(Request $request)
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        $app->user->remark($request->openID, $request->remark);
    }

    /**
     * 拉黑用户
     * @param Request $request
     */
    public function block(Request $request)
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        $app->user->block($request->openID);
    }

    /**
     * 取消拉黑用户
     * @param Request $request
     */
    public function unblock(Request $request)
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        $app->user->unblock($request->openID);
    }

    /**
     * 获取黑名单
     * @param Request $request
     */
    public function blacklist(Request $request)
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        $app->user->blacklist();
    }
}
