<?php

namespace App\Http\Controllers\Api\System;

use App\Http\Controllers\Api\CommonController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends CommonController
{
    public function getConfig()
    {
        $config = [
            [
                'name' => '主机名称',
                'config' => php_uname(),
                'icon' => 'fa fa-home'
            ],

            [
                'name' => '服务器域名',
                'config' => $_SERVER['SERVER_NAME'],
                'icon' => 'fa fa-server'
            ],

            [
                'name' => '服务器信息',
                'config' => $_SERVER ['SERVER_SOFTWARE'],
                'icon' => 'fa fa-info-circle'
            ],

            [
                'name' => 'PHP版本信息',
                'config' => PHP_VERSION,
                'icon' => 'fa fa-book'
            ],

            [
                'name' => 'MYSQL数据库版本信息',
                'config' => '5.7.19',
                'icon' => 'fa fa-database'
            ],

            [
                'name' => 'Laravel版本',
                'config' => '5.6',
                'icon' => 'fa fa-list-alt'
            ],

            [
                'name' => 'Zend版本',
                'config' => Zend_Version(),
                'icon' => 'fa fa-list-alt'
            ],


            [
                'name' => '操作系统',
                'config' => PHP_OS,
                'icon' => 'fa fa-linux'
            ],

            [
                'name' => '服务器IP地址',
                'config' => $_SERVER['SERVER_ADDR'],
                'icon' => 'fa fa-internet-explorer'
            ],

            [
                'name' => '当前访问客户端IP',
                'config' => $_SERVER['REMOTE_ADDR'],
                'icon' => 'fa fa-internet-explorer'
            ],

            [
                'name' => '端口号',
                'config' => $_SERVER['SERVER_PORT'],
                'icon' => 'fa fa-support'
            ],

            [
                'name' => '根目录路径',
                'config' => $_SERVER['DOCUMENT_ROOT'],
                'icon' => 'fa fa-file'
            ],

            [
                'name' => '最大上传限制',
                'config' => get_cfg_var("upload_max_filesize") ? get_cfg_var("upload_max_filesize") : "不允许上传附件",
                'icon' => 'fa fa-upload'
            ],

            [
                'name' => '当前服务器时间',
                'config' => date("Y-m-d G:i:s"),
                'icon' => 'fa fa-clock-o'
            ],

            [
                'name' => '当前服务器时间',
                'config' => get_cfg_var("max_execution_time") . '秒',
                'icon' => 'fa fa-clock-o'
            ],

            [
                'name' => 'PHP运行方式',
                'config' => php_sapi_name(),
                'icon' => 'fa fa-play'
            ]
        ];

        $project_info = [
            [
                'name' => '前端项目地址',
                'config' => 'https://github.com/linyiyuan/vue-admin-template.git',
                'icon' => 'fa fa-play'
            ],

            [
                'name' => '后端项目地址',
                'config' => 'https://github.com/linyiyuan/laravel-admin-template.git',
                'icon' => 'fa fa-play'
            ],

            [
                'name' => '作者信息',
                'config' => 'https://github.com/linyiyuan',
                'icon' => 'fa fa-play'
            ],

            [
                'name' => '作者个人博客',
                'config' => 'https://linyiyuan.github.top',
                'icon' => 'fa fa-play'
            ]
        ];


        return handleResult(200, 'success', [
            'config' => $config,
            'project_info' => $project_info
        ]);
    }
}
