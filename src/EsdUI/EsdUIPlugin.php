<?php
/**
 * File: index.php
 * User: 4213509@qq.com
 * Date: 2019-06-29
 * Time: ${Time}
 **/

namespace ESD\Plugins\EsdUI;

use ESD\Core\Context\Context;
use ESD\Core\PlugIn\AbstractPlugin;
use ESD\Core\PlugIn\PluginInterfaceManager;
use ESD\Core\Plugins\Config\ConfigException;

class EsdUIPlugin extends AbstractPlugin
{
    /**
     * @var EsdUIConfig
     */
    private $adminConfig;

    /**
     * AdminPlugin constructor.
     * @param EsdUIConfig|null $adminConfig
     * @throws \ReflectionException
     */
    public function __construct(?EsdUIConfig $adminConfig = null)
    {
        parent::__construct();
        if ($adminConfig == null) {
            $adminConfig = new EsdUIConfig();
        }
        $this->adminConfig = $adminConfig;
    }

    /**
     * 获取插件名字
     * @return string
     */
    public function getName(): string
    {
        return "EsdUI";
    }

    /**
     * @param PluginInterfaceManager $pluginInterfaceManager
     * @return mixed|void
     */
    public function onAdded(PluginInterfaceManager $pluginInterfaceManager)
    {
        parent::onAdded($pluginInterfaceManager);
    }

    /**
     * init
     * @param Context $context
     * @return mixed|void
     * @throws ConfigException
     * @throws \ReflectionException
     */
    public function init(Context $context)
    {
        parent::init($context);
        $this->adminConfig->merge();
    }

    /**
     * beforeServerStart
     * @param Context $context
     *
     * @return mixed|void
     *
     */
    public function beforeServerStart(Context $context)
    {
    }

    /**
     * 在进程启动前
     * @param Context $context
     *
     * @return mixed|void
     *
     */
    public function beforeProcessStart(Context $context)
    {
        $this->ready();
    }
}
