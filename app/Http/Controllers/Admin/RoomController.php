<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
        $room = Room::get()->toArray();
        foreach ($room as &$v){
            if ($v['room_id'] == 1){
                $v['open'] = true;
            }
            if($v['room_level'] == 1){
                $v['iconSkin'] = 'pIcon01';
            }else if ($v['room_level'] == 2){
                $v['iconSkin'] = 'pIcon02';
            }else{
                $v['iconSkin'] = 'icon';
            }
            $v['name'] = $v['room_name'];
            unset($v['room_name']);
            unset($v['room_level']);
            unset($v['room_img']);
            unset($v['room_desc']);
            unset($v['room_status']);
        }
        $room = json_encode($room, false);
        return view('admin.room', compact('room'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function add()
    {
        $level = $this -> getTree();
        return view('admin.room-add', compact('level'));
    }

    public function getTree()
    {
        $room = Room::where('room_level', '<', 3)->get(['room_id', 'room_pid', 'room_name', 'room_level'])->toArray();
        return $this->Tree($room, 'room_name','room_id','room_pid');
    }

    public function Tree($data,$field_name,$field_id='id',$field_pid='pid',$pid='0')
    {
        $arr = array();
        foreach($data as $k => $v){
            if($v[$field_pid] == $pid){
                $data[$k]['_'.$field_name] = '┣━ '.$data[$k][$field_name];
                $arr[] = $data[$k];
                foreach($data as $m => $n){
                    if($n[$field_pid] == $v[$field_id]){
                        $data[$m]['_'.$field_name] = '┣━━━ '.$data[$m][$field_name];
                        $arr[] = $data[$m];
                    }
                }
            }
        }
        return $arr;
    }
}
