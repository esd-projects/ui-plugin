<?php
/**
 * Created by PhpStorm.
 * User: yangyuance
 * Date: 2019/1/30
 * Time: 下午4:01
 */

namespace ESD\Plugins\Admin\Beans;


use ESD\Plugins\Admin\Components\Form\Form;
use ESD\Plugins\Admin\Components\Layout\PageView;
use ESD\Plugins\Admin\Components\Table\Table;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * use VERSION
     */
    const VERSION = "1.0.0";

    /**
     *
     * @var array
     */
    protected static $script = [
        'file' => [],
        'use' => [],
        'script' => []
    ];

    /**
     * @var array
     */
    protected static $style = [
        'file' => [],
        'style' => []
    ];

    /**
     * @var array
     */
    protected static $widgets = [];

    /**
     * @return string
     */
    public static function version()
    {
        return "ThinkerAdmin Version: " . self::VERSION;
    }

    /**
     * @param $formName
     * @param \Closure|null $callable
     * @return Form
     * @throws \Exception
     */
    public static function form($formName, \Closure $callable = null)
    {
        return (new Form($formName, $callable));
    }

    /**
     * @param $tableName
     * @param \Closure|null $callable
     * @return Table
     */
    public static function table($tableName, \Closure $callable = null)
    {
        return (new Table($tableName, $callable));
    }

    /**
     * @param \Closure|null $callable
     * @return PageView
     */
    public static function pageView(\Closure $callable = null)
    {
        return (new PageView($callable));
    }

    /**
     * @param array|null $config
     * @return Auth
     */
    public static function auth(array $config = null)
    {
        return (new Auth($config));
    }

    /**
     * @return Tools
     */
    public static function tools()
    {
        return (new Tools());
    }

    /**
     * @param $widgetName
     * @param \Closure|null $closure
     * @return mixed
     * @throws \Exception
     */
    public static function widgets($widgetName, \Closure $closure = null)
    {
        $widgetClass = config('thinkeradmin.widgets.' . $widgetName);
        if ($widgetClass) {
            return (new $widgetClass($closure));
        } else {
            if (!empty(self::$widgets[$widgetName])) {
                return (new self::$widgets[$widgetName]($closure));
            }
            throw new \Exception("widgets " . $widgetName . " not found for class");
        }
    }

    /**
     * @param $widgetName
     * @param $class
     */
    public static function addWidgets($widgetName, $class)
    {
        self::$widgets[$widgetName] = $class;
    }

    /**
     * @param $script
     * @param int $isFile
     */
    public static function script($script, $isFile = 0)
    {
        if ($isFile === 0) {
            self::$script['script'][] = $script;
        } else {
            if ($isFile === 2) {
                self::$script['use'][] = $script;
            } else {
                self::$script['file'][] = $script;
            }
        }
    }

    /**
     * @return array
     */
    public static function getScript()
    {
        return self::$script;
    }

    /**
     * @param $style
     * @param int $isFile
     */
    public static function style($style, $isFile = 0)
    {
        if ($isFile === 0) {
            self::$style['style'][] = $style;
        } else {
            self::$style['file'][] = $style;
        }
    }

    /**
     * @return array
     */
    public static function getStyle()
    {
        return self::$style;
    }
}