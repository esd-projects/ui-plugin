<?php
/**
 * Created by PhpStorm.
 * User: yangyuance
 * Date: 2019/1/30
 * Time: 下午1:18
 */

namespace ESD\Plugins\Admin\Components\Layout;


use ESD\Plugins\Admin\Beans\Admin;
use ESD\Plugins\Admin\Beans\Layout;
use ESD\Plugins\Admin\Components\Widgets\Breadcrumb;
use ESD\Plugins\Admin\Components\Widgets\Card;

class PageView extends Layout
{
    /**
     * PageView Title
     * use for <title></title>
     *
     * @var string
     */
    protected $title = "界面";

    /**
     * Page's breadcrumb
     * @var Breadcrumb
     */
    protected $breadcrumb = null;

    /**
     * class which extend Layout
     * @var array<Layout>
     */
    protected $layouts = [];

    /**
     * PageView constructor.
     * @param \Closure|null $callback
     */
    public function __construct(\Closure $callback = null)
    {
        if ($callback instanceof \Closure) {
            call_user_func_array($callback, [$this]);
        }
    }

    /**
     * title breadcrumb
     * description
     * createtime 2019/3/3 下午10:08
     * @param $breadcrumbs
     * @return null|Breadcrumb
     * @throws \Exception
     */
    public function breadcrumb($breadcrumbs)
    {
        if (is_null($this->breadcrumb)) {
            $this->breadcrumb = new Breadcrumb($breadcrumbs);
        } else {
            if (is_array($breadcrumbs)) {
                $this->breadcrumb->setBreadcrumb($breadcrumbs);
            }
        }

        return $this->breadcrumb;
    }

    /**
     * title rows
     * description use Closure or string to create an row
     * createtime 2019/1/30 下午3:54
     * @param \Closure|string $rows
     * @return PageView
     */
    public function rows($rows)
    {
        if ($rows instanceof \Closure) {
            $rowsView = new Rows();
            call($rows, [$rowsView]);
            $this->setLayout($rowsView);
        } else {
            $this->setLayout(new Rows($rows));
        }

        return $this;
    }

    /**
     * title setRows
     * description
     * createtime 2019/1/30 下午3:44
     * @param Layout|string $layout
     * @return PageView
     */
    public function setLayout(Layout $layout)
    {
        $this->layouts[] = $layout;

        return $this;
    }

    /**
     * title card
     * description
     * createtime 2019/3/3 下午10:14
     * @param $cards
     * @param null $title
     * @return $this
     */
    public function card($cards, $title = null)
    {
        if ($cards instanceof \Closure) {
            $cardView = new Card();
            call_user_func_array($cards, [$cardView]);
            $this->setLayout($cardView);
        } else {
            $this->setLayout(new Card($title, $cards));
        }

        return $this;
    }

    /**
     *  render
     * use for render each type
     *  2019/1/30 下午3:10
     * @return mixed
     */
    public function render($iframe = true)
    {
        if ($iframe) {
            $html = '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>$title</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/thinker-admin/lib/css/fancybox.css" media="all">
    <link rel="stylesheet" href="/thinker-admin/style/admin.css" media="all">
    <link rel="stylesheet" href="/thinker-admin/style/antdesign.css" media="all">
    <style>.layui-layer-content{height: calc(100% - 80px);}html,body{overflow-y: scroll !important;}</style>
    $styles
</head>
<body>
$breadcrumb
<div class="layui-fluid">
    $layouts
</div>
<script src="/layui/layui.js"></script>
<script src="/thinker-admin/lib/extend/fancybox.js"></script>
$files
<script>
    layui.layer = window.layer = parent.layui.layer;
    layui.config({
        version: (new Date()).getTime()
    }).extend({
        thinkeradmin: "/thinker-admin/thinkeradmin",
        ices: "../ices.min"
    }).use(["thinkeradmin", "ices", "index"], function(){
       $css
       $use
    });
</script>
</body>
</html>';
            foreach (array_merge($this->formatScript(true), [
                'title' => $this->title,
                'styles' => $this->formatStyle(),
                'breadcrumb' => $this->getBreadcrumb(),
                'layouts' => $this->formatLayouts()
            ]) as $item => $value) {
                $html = str_replace('$' . $item, htmlspecialchars_decode($value), $html);
            }

        } else {
            $html = (<<<HTML
<title>{$this->title}</title>
{$this->formatStyle()}
{$this->getBreadcrumb()}
<div class="layui-fluid">
    {$this->formatLayouts()}
</div>
{$this->formatScript()}
HTML
            );
        }
        return $html;
    }


    /**
     * title formatJavascript
     * description get Javascript and format it
     * createtime 2019/2/24 下午5:42
     * @param bool $returnArr
     * @return string|array
     */
    protected function formatScript($returnArr = false)
    {
        $style = Admin::getStyle();
        $script = Admin::getScript();

        $javascript = [];
        if (!empty($script['file'])) {
            foreach ($script['file'] as $i => $v) {
                $javascript[] = '<script src="' . $v . '" />';
            }
        }
        $javascript = join("\r\n", $javascript);

        //prevent for load multi css files
        $css = [];
        if (!empty($style['file'])) {
            foreach ($style['file'] as $i => $v) {
                $css[] = "layui.link(layui.cache.base + '../lib/css/" . $v . ".css?v=' + layui.thinkeradmin.v);";
            }
        }
        $cssFiles = join("", $css);

        $scriptString = join("\r\n", $script['script']);

        $useFiles = json_encode($script['use']);
        if ($returnArr) {
            return [
                'files' => $javascript,
                'css' => $cssFiles,
                'use' => <<<HTML
layui.use({$useFiles}, function(){
        function load(){
            var $ = layui.jquery;
            {$scriptString}
        }
        if(!layui.common){
            layui.use('common', load);
        }else{
            layui.cache.callback.common();
            load();
        }
    });
HTML
            ];
        } else {
            return <<<HTML
{$javascript}
<script>
    {$cssFiles}
    layui.use({$useFiles}, function(){
        function load(){
            var $ = layui.jquery;
            {$scriptString}
        }
        if(!layui.common){
            layui.use('common', load);
        }else{
            layui.cache.callback.common();
            load();
        }
    });
</script>
HTML
                ;
        }
    }

    /**
     * title formatCss
     * description get css and format it
     * createtime 2019/2/24 下午5:34
     */
    protected function formatStyle()
    {
        $style = Admin::getStyle();
        if (!empty($style['css'])) {
            return "<style>" . join("\r\n", $style['css']) . "</style>";
        } else {
            return '';
        }
    }

    /**
     * @return Breadcrumb
     */
    public function getBreadcrumb()
    {
        return is_null($this->breadcrumb) ? '' : $this->breadcrumb->render();
    }

    /**
     * title formatLayouts
     * description
     * createtime 2019/3/3 下午10:17
     * @return string
     */
    public function formatLayouts()
    {
        $render = "";

        foreach ($this->layouts as $layout) {
            $render .= $layout->render();
        }

        return $render;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * title setTitle
     * description use for set pageview top title
     * createtime 2019/1/30 下午2:44
     * @param string $title
     * @return PageView
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
}