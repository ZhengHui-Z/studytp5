<?php
namespace app\index\controller;

use think\Controller;
use think\Request;

class Index extends Controller
{
    public function index(Request $request)
    {
        // 定义表单验证规则
        return view();
    }
    public function rejs(Request $request)
    {
        if ($request->isPost()) {
            return 'Post';
        } else {
            return 'Post';
        }
    }
    public function test(Request $request)
    {
        if ($request->isAjax()) {
            $data = $request->param();
            if ($data['title'] != "") {
                return json(["err" => 1, "msg" => "接收到数据" . ":" . $data['title']]);
            } else {
                return json(["err" => 0, "msg" => "未接收到数据"]);
            }

        } else {
            return json(["msg" => "Not Ajax"]);
        }

    }
    public function upload()
    {
        return view();
    }
    public function uploadfile(Request $request)
    {
        if ($request->isPost()) {
            $file = $request->file('file');
            if (empty($file)) {
                return json(["err" => 1, "msg" => "文件空", "data" => 'isnull']);
            }
            $info = $file->rule('md5')->move(ROOT_PATH . 'public' . DS . 'uploads/file');
            if ($info) {
                $path = $info->getRealPath();
                return json(["err" => 0, "msg" => "上传附件完成", "data" => $path]);
            }
        }
    }

}
