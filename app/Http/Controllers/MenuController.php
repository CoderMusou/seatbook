<?php

namespace App\Http\Controllers;

use EasyWeChat\Factory;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //读取（查询）已设置菜单
    public function index()
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        $list = $app->menu->list();
        dd($list);
    }

    //获取当前菜单
    public function current()
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        $list = $app->menu->current();
        dd($list);
    }

    //添加普通菜单
    public function create()
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        $buttons = [
            [
                "type" => "scancode_waitmsg",
                "name" => "签到",
                "key"  => "sign"
            ],
            [
                "type" => "click",
                "name" => "点击",
                "key"  => "click"
            ],
        ];
        $app->menu->create($buttons);
        dd("创建成功");
    }

    //添加个性化菜单
    public function createConditional()
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        $buttons = [
            [
                "type" => "click",
                "name" => "个性化",
                "key"  => "Myself"
            ],
        ];
        $matchRule = [
            "sex" => "1",
            "country" => "中国",
            "province" => "江苏",
            "city" => "南京",
            "language" => "zh_CN"
        ];
        $app->menu->create($buttons, $matchRule);
        dd("创建成功");
    }

    //删除菜单
    public function delete($menuId = null)
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        if ($menuId == null) {                       //未设置参数删除全部
            $app->menu->delete();
        }else {                                     //删除参数$menuId对应的菜单
            $app->menu->delete($menuId);
        }
        dd("删除成功");
    }
}
