<?php
/**
 * File: index.php
 * User: 4213509@qq.com
 * Date: 2019-06-29
 * Time: ${Time}
 **/

namespace ESD\Examples\Controller;

use DI\Annotation\Inject;
use ESD\Core\Memory\CrossProcess\Table as MemoryTable;
use ESD\Examples\Model\Menu;
use ESD\Examples\Service\ConfigService;
use ESD\Plugins\EasyRoute\Annotation\GetMapping;
use ESD\Plugins\EasyRoute\Annotation\RequestParam;
use ESD\Plugins\EasyRoute\Annotation\RestController;
use ESD\Plugins\EsdUI\Components\Form\Form;
use ESD\Plugins\EsdUI\Components\Form\Tab;
use ESD\Plugins\EsdUI\Components\Layout\PageView;
use ESD\Plugins\EsdUI\Components\Table\Table;
use ESD\Plugins\EsdUI\EsdUI;
use ESD\Plugins\Validate\ValidationException;
use ESD\Server\Co\Server;

/**
 * @RestController("/devTools")
 * Class Index
 * @package ESD\Plugins\EasyRoute
 */
class DevTools extends DevBase
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
    protected function index()
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
     * @GetMapping("/systemCount")
     * @return string
     * @throws \Exception
     */
    public function systemCount()
    {

        $page =$this->request->getQueryParams()['page']??0;
        if ($page > 0) {
            /**
             * @var $table MemoryTable
             */
            $table = DIGet('RouteCountTable');
            $output = [];
            foreach ($table as $path => $num) {
                $num['url'] = $path;
                $output[]= $num;
            }
          return ajax($output);
        }
        $output =[];
        $serverStats = Server::$instance->stats();
        $output['server'] = 'esd-server';
        $output['Start'] = date('Y-m-d H:i:s', $serverStats->getStartTime());
        $output['Accept'] = $serverStats->getAcceptCount();
        $output['Close'] = $serverStats->getCloseCount();
        $output['Request'] = $serverStats->getRequestCount();
        $output['Coroutine'] = $serverStats->getCoroutineNum();
        $output['Connection'] = $serverStats->getConnectionNum();
        $output['Tasking'] = $serverStats->getTaskingNum();
        $output['TaskQueue'] = $serverStats->getTaskQueueBytes();
        $output['WorkerDispatchCount'] = $serverStats->getWorkerDispatchCount();
        $output['WorkerRequestCount'] = $serverStats->getWorkerRequestCount();
        return $this->render('systemCount',$output);
//
//                return EsdUI::table("systemCount", function (Table $table) {
//                    $table->setRestfulUrl("/devTools/systemCount");
//                    $table->columns('url', "URL");
//                    $table->columns('num_60', "30分钟请求");
//                    $table->columns('num_3600', "一小时请求");
//                    $table->columns('num_86400', "一天请求");
//                    $table->setLimit(100000)->setLimits([100000]);
//                })->show(function(PageView $pageView){
//                    $pageView->setTitle('请求统计');
//                });
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
     * @throws ValidationException
     */
    public function menu()
    {
        // 生成测试数据
        $menus[] = (new Menu())->setId(1)->setName('menu')->setTitle('系统工具')->setIcon('layui-icon-set')->setJump("")->setPid(0)->toArray();
        $menus[] = (new Menu())->setId(2)->setName('systemInfo')->setTitle('系统信息')->setJump("/devTools/systemInfo")->setPid(1)->toArray();
        $menus[] = (new Menu())->setId(3)->setName('systemConfig')->setTitle('配置管理')->setJump('/devTools/systemConfig')->setPid(1)->toArray();
        $menus[] = (new Menu())->setId(4)->setName('systemCount')->setTitle('请求统计')->setJump('/devTools/systemCount')->setPid(1)->toArray();
        $list = EsdUI::tools()->tree($menus);
        return ajax($list);
    }

}
