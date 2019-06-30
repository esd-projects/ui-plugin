<?php

namespace ESD\Examples\Service;

use ESD\Core\Server\Server;

/**
 * File: ConfigService.php
 * User: 4213509@qq.com
 * Date: 2019-06-30
 * Time: ${Time}
 **/
class ConfigService
{


    /**
     * @param $value
     * @return string
     */
    public static function lang($value)
    {
        $lang = [];
        $lang['logger'] = '日志配置';
        $lang['server'] = '服务器配置';
        $lang['port'] = '端口配置';
        $lang['process'] = '自定义进程配置';
        $lang['profiles'] = '配置文件';
        $lang['cmd_class_list'] = '命令行管理';
        $lang['route_roles'] = '路由配置';
        $lang['namespace'] = '模板命名空间';
        $lang['logger'] = '日志管理';
        $lang['logger'] = '日志管理';
        $lang['logger'] = '日志管理';
        $lang['name'] = '名字';
        $lang['level'] = '等级';
        $lang['output'] = '输出';
        $lang['date_format'] = '时间格式';
        return $lang[$value] ?? $value;
    }

    public function get()
    {
        $configs = Server::$instance->getConfigContext()->getCacheContain();
        return $configs;
    }

    /**
     * @param $data
     * @throws \ESD\Core\Exception
     */
    public function update($data)
    {
        if (defined("RES_DIR")) {
            $path = RES_DIR;
        } else {
            $path = Server::$instance->getServerConfig()->getRootDir() . "/resources";
        }
        $active = Server::$instance->getConfigContext()->get("esd.profiles.active");
        $applicationActiveFile = $path . "/application-{$active}.yml";
        $tml = yaml_parse_file($applicationActiveFile);
        //修改内容
        $tml['reload']['enable'] = 0;
        yaml_emit_file($applicationActiveFile, $tml);
    }


}