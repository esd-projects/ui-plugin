<?php
/**
 * File: index.php
 * User: 4213509@qq.com
 * Date: 2019-06-29
 * Time: ${Time}
 **/

namespace ESD\Examples\Controller;

use DI\Annotation\Inject;
use ESD\Examples\Service\ConfigService;
use ESD\Plugins\EasyRoute\Annotation\GetMapping;
use ESD\Plugins\EasyRoute\Annotation\RestController;
use ESD\Plugins\EsdUI\Components\Form\Form;
use ESD\Plugins\EsdUI\Components\Form\Tab;
use ESD\Plugins\EsdUI\Components\Layout\PageView;
use ESD\Plugins\EsdUI\EsdUI;

/**
 * @RestController("/devTools")
 * Class Index
 * @package ESD\Plugins\EasyRoute
 */
class AdminIndex extends AdminBase
{


    /**
     * @Inject()
     * @var ConfigService
     */
    public $ConfigService;

    /**
     * @GetMapping("/")
     * @return string
     * @throws \Exception
     */
    protected function tools()
    {
        return $this->render('index');
    }


    /**
     * @GetMapping("/systemInfo")
     * @return string
     * @throws \Exception
     */
    public function systemInfo()
    {
        return $this->render('systemInfo');
    }

    /**
     * @GetMapping("/systemConfig")
     * @return string
     * @throws \Exception
     */
    public function systemConfig()
    {
        $configs = $this->ConfigService->get();
        return EsdUI::form('config', function (Form $form) use ($configs) {
            foreach ($configs as $config) {
                foreach ($config as $key => $item) {
                    if (!is_array($item)) continue;
                    $form->setValue($item);
                    $form->tab(ConfigService::lang($key), function (Tab $tab) use ($item) {
                        foreach ($item as $name => $value) {
                            if (is_array($value)) continue;
                            if (strlen($value) > 100) {
                                $tab->textarea($name, ConfigService::lang($name));
                            } else {
                                $tab->text($name, ConfigService::lang($name));
                            }
                        }
                    });
                }
            }
            $form->footer()->setTitle('立即提交')->submit("/devTools/configSave");
        })->show(function (PageView $pageView) {
            $pageView->setTitle('系统配置');

        });
    }


    /**
     * @GetMapping("/menu")
     * @return string
     */
    public function menu()
    {
        $menu = [];
        $menu['id'] = 1;
        $menu['name'] = 'menu';
        $menu['title'] = '系统工具';
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
        $menu = [];
        $menu['id'] = 3;
        $menu['name'] = 'systemInfo';
        $menu['title'] = '配置管理';
        $menu['jump'] = 'systemInfo';
        $menu['icon'] = 'layui-icon-info';
        $menu['jump'] = '/devTools/systemConfig';
        $menu['pid'] = 1;
        $menus[] = $menu;
        $list = EsdUI::tools()->tree($menus);
        return ajax($list);
    }

}
