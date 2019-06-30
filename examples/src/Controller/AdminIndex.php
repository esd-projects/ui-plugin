<?php
/**
 * File: index.php
 * User: 4213509@qq.com
 * Date: 2019-06-29
 * Time: ${Time}
 **/

namespace ESD\Examples\Controller;

use ESD\Plugins\EasyRoute\Annotation\GetMapping;
use ESD\Plugins\EasyRoute\Annotation\PostMapping;
use ESD\Plugins\EasyRoute\Annotation\RestController;
use ESD\Plugins\EsdUI\Components\Form\Form;
use ESD\Plugins\EsdUI\Components\Form\Tab;
use ESD\Plugins\EsdUI\EsdUI;

/**
 * @RestController("/devTools")
 * Class Index
 * @package ESD\Plugins\EasyRoute
 */
class AdminIndex extends AdminBase
{
    /**
     * @GetMapping("/")
     * @return string
     * @throws \Exception
     */
    protected function tools()
    {
        return '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ESD开发工具</title>
    <meta content="webkit" name="renderer">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"
          name="viewport">
    <link href="./layui/css/layui.css" media="all" rel="stylesheet">
    <link href="./thinker-admin/style/admin.css" media="all" rel="stylesheet">
    <link href="./thinker-admin/lib/css/fancybox.css" media="all" rel="stylesheet">
    <link href="./thinker-admin/style/antdesign.css" media="all" rel="stylesheet">
</head>
<body>
<div id="thinkerAdmin_app"></div>
<script src="./layui/layui.js"></script>
<script src="./thinker-admin/lib/extend/fancybox.js"></script>
<script>
    layui.config({
        version: \'1.0.0\'
    }).extend({
        thinkeradmin: "./thinker-admin/thinkeradmin",
        ices: "../ices.min"
    }).use(["thinkeradmin", "ices", "index"]);
</script>
</body>
</html>';
    }




    /**
     * @GetMapping("/systemInfo")
     * @return string
     * @throws \Exception
     */
    public function systemInfo()
    {

        return EsdUI::form("systemInfo", function (Form $form) {
            $configValues = [];
            $form->setValue($configValues);
            $form->tab("网站设置", function (Tab $tab) {

                $tab->switchs("isclosed", "关闭网站");
                $tab->text("title", "网站名称");
                $tab->upload("logo", "网站LOGO");
                $tab->upload("ico", "地址栏ICO");
                $tab->text("seo_title", "SEO标题");
                $tab->text("seo_keywords", "SEO关键词");
                $tab->textarea("seo_description", "SEO描述");
                $tab->text("copyright", "版权信息");
                $tab->text("beian", "备案号");
            });

            $form->tab("基础设置", function (Tab $tab) {
                $tab->switchs("isdebug", "是否DEBUG");
                $tab->switchs("openwidgets", "开启插件");
                $tab->switchs("istrace", "显示TRACE");
                $tab->text("errortpl", "错误模板");
                $tab->switchs("isssl", "启用HTTPS");
            });
            $form->footer()->submit("/esd_admin_api/adminconfigs");

        })->show();
    }

    /**
     * @PostMapping("/config")
     * @return string
     */
    public function config()
    {
        $menu = [];
        $menu['id'] = 1;
        $menu['name'] = 'menu';
        $menu['title'] = '管理';
        $menu['jump'] = 'thinkersystem';
        $menu['icon'] = 'layui-icon-set';
        $menu['jump'] = 'thinkersystem';
        $menu['pid'] = 0;
        $menus[] = $menu;
        $menu = [];
        $menu['id'] = 2;
        $menu['name'] = 'systemInfo';
        $menu['title'] = '系统信息';
        $menu['jump'] = 'systemInfo';
        $menu['icon'] = 'layui-icon-info';
        $menu['jump'] = '/devTools/systemInfo';
        $menu['pid'] = 1;
        $menus[] = $menu;
        $list = EsdUI::tools()->tree($menus);
        return ajax([
            'menu' => $list
        ]);
    }

}
