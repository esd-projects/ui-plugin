<?php
/**
 * Created by PhpStorm.
 * User: yangyuance
 * Date: 2019/3/1
 * Time: 下午5:54
 */

namespace ESD\Plugins\EsdUI\Components\Table\Events;


use ESD\Plugins\EsdUI\Beans\Layout;
use ESD\Plugins\EsdUI\Components\Table\Table;
use ESD\Plugins\EsdUI\EsdUI;

class On extends Layout
{
    /**
     * @var Table
     */
    protected $table;

    /**
     * ToolEvent constructor.
     * @param $table
     * @param \Closure|null $callback
     */
    public function __construct($table, \Closure $callback = null)
    {
        $this->table = $table;

        if ($callback instanceof \Closure) {
            return call_user_func_array($callback, [$this]);
        }
    }

    /**
     * title checkbox
     * description
     * 2019/3/1 下午5:59
     * @param null $callback
     * @return On
     */
    public function checkbox($callback)
    {
        return $this->event("checkbox", $callback);
    }

    /**
     * title event
     * description
     * 2019/3/1 下午5:59
     * @param $eventName
     * @param $callback
     * @return $this
     */
    public function event($eventName, $callback)
    {
        EsdUI::script(<<<HTML
layui.table.on('{$eventName}({$this->table->getName()})', function(obj){
{$callback}
});
HTML
        );

        return $this;
    }

    /**
     * title row
     * description
     * 2019/3/1 下午6:06
     * @param $callback
     * @return On
     */
    public function row($callback)
    {
        return $this->event("row", $callback);
    }

    /**
     * title rowDouble
     * description
     * 2019/3/1 下午6:06
     * @param $callback
     * @return On
     */
    public function rowDouble($callback)
    {
        return $this->event("rowDouble", $callback);
    }

    /**
     * title sort
     * description
     * 2019/3/1 下午6:12
     * @param $callback
     * @return On
     */
    public function sort($callback)
    {
        return $this->event("sort", $callback);
    }

    /**
     * title edit
     * description
     * 2019/3/1 下午6:04
     * @param null $url
     * @param null $callback
     * @return On
     */
    public function edit($url = null, $callback = null)
    {
        if (is_null($url)) {
            if (strpos($this->table->getRestfulUrl(), "?") != false) {
                $restfulUrl = explode("?", $this->table->getRestfulUrl());
                $url = $restfulUrl[0] . "/{{d.id}}?__type=field&" . $restfulUrl[1];
            } else {
                $url = $this->table->getRestfulUrl() . "/{{d.id}}?__type=field";
            }
        }

        if (is_null($callback)) $callback = <<<HTML
layui.http.put(layui.laytpl("{$url}").render(obj.data), {value: obj.value, field: obj.field});
HTML;
        return $this->event("edit", $callback);
    }

    /**
     * title render
     * description render html
     * 2019/2/24 下午4:25
     * @return mixed
     */
    public function render()
    {
        // TODO: Implement render() method.
    }
}