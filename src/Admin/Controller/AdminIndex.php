<?php
/**
 * File: index.php
 * User: 4213509@qq.com
 * Date: 2019-06-29
 * Time: ${Time}
 **/

namespace ESD\Plugins\Admin\Controller;

use ESD\Plugins\Admin\Beans\Admin;
use ESD\Plugins\Admin\Components\Form\Form;
use ESD\Plugins\Admin\Components\Form\Tab;
use ESD\Plugins\EasyRoute\Annotation\GetMapping;
use ESD\Plugins\EasyRoute\Annotation\PostMapping;
use ESD\Plugins\EasyRoute\Annotation\RestController;

/**
 * @RestController("/esd_admin")
 * Class Index
 * @package ESD\Plugins\EasyRoute
 */
class AdminIndex extends AdminBase
{
    /**
     * @GetMapping("/index")
     * @return string
     * @throws \Exception
     */
    public function index()
    {

        return Admin::form("thinker_admin_configs", function (Form $form) {
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
        $json = json_decode('[ { "id":1, "name":"thinkersystem", "title":"Admin管理", "jump":"thinkersystem", "icon":"layui-icon-set", "list":[ { "id":2, "name":"rules", "title":"系统设置", "jump":"/esd_admin/index", "icon":null, "list":[ ] }, { "id":3, "name":"thinkersystem-menu", "title":"Menus管理", "jump":"/esd_admin/menus", "icon":null, "list":[ ] } ] } ]', true);
        return $this->send([
            'menu' => $json
        ]);
    }

    /**
     * @GetMapping("/login")
     * @return string
     */
    public function login()
    {
        $json = json_decode('[ { "id":1, "name":"thinkersystem", "title":"Admin管理", "jump":"thinkersystem", "icon":"layui-icon-set", "list":[ { "id":2, "name":"rules", "title":"系统设置", "jump":"/esd_admin/index", "icon":null, "list":[ ] }, { "id":3, "name":"thinkersystem-menu", "title":"Menus管理", "jump":"/esd_admin/menus", "icon":null, "list":[ ] } ] } ]', true);

        return $this->send([
            'username' => 'admin',
            'userphone' => 'admin',
            'config' => $json,
            'id' => 1212,
            'access_token' => 222222222
        ]);
    }


}
