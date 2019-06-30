<?php
/**
 * Created by PhpStorm.
 * User: yangyuance
 * Date: 2019/2/27
 * Time: 上午12:35
 */

namespace ESD\Plugins\EsdUI\Components\Table;


use ESD\Plugins\EsdUI\Beans\Layout;
use ESD\Plugins\EsdUI\Components\Table\Events\Toolbar as ToolbarEvent;
use ESD\Plugins\EsdUI\EsdUI;

class Toolbar extends Layout
{
    /**
     * @var Table
     */
    protected $table;

    /**
     * @var ToolbarEvent
     */
    protected $event = null;

    /**
     * @var string
     */
    protected $toolbar = '';

    /**
     * ToolEvent constructor.
     * @param $table
     * @param \Closure|null $callback
     */
    public function __construct($table, \Closure $callback = null)
    {
        $this->table = $table;

        if ($callback instanceof \Closure) {
            call_user_func_array($callback, [$this]);
        }
    }

    /**
     * title add
     * description
     * 2019/3/4 下午4:05
     * @return Toolbar
     */
    public function add()
    {
        return $this->button('添加', 'add', 'add-1', '');
    }

    /**
     * title button
     * description
     * 2019/3/10 下午4:49
     * @param $text
     * @param $event
     * @param $icon
     * @param $class
     * @param bool $isHref
     * @param string $attrs
     * @return Toolbar
     */
    public function button($text, $event, $icon, $class, $isHref = false, $attrs = '')
    {
        $attr = $isHref ? "thinker-href" : "lay-event";

        return $this->toolbar('<a class="layui-btn layui-btn-sm ' . $class . '" ' . $attrs . ' ' . $attr . '="' . $event . '"><i class="layui-icon layui-icon-' . $icon . '"></i>' . $text . '</a>');
    }

    /**
     * title tool
     * description
     * 2019/2/26 下午5:36
     * @param $html
     * @return $this
     */
    public function toolbar($html)
    {
        $this->toolbar .= $html;

        return $this;
    }

    /**
     * title delete
     * description
     * 2019/2/27 上午1:11
     * @return Toolbar
     */
    public function delete()
    {
        return $this->button('删除', 'delete', 'delete', 'layui-btn-danger');
    }

    /**
     * title xlsx
     * description
     * 2019/3/4 下午4:58
     * @return Toolbar
     */
    public function xlsx()
    {
        $this
            ->button('导入EXCEL', 'importexcel', 'list', 'layui-btn-warm')
            ->button('提交EXCEL', 'submitexcel', 'set', '');

        return $this->toolbar("<input type='file' style='display: none' id='{$this->table->getName()}_xlsximport'/>");
    }

    /**
     * title event
     * description
     * 2019/2/27 下午12:05
     * @param \Closure|null $callback
     * @return ToolbarEvent
     */
    public function event(\Closure $callback = null)
    {
        $this->event = (new ToolbarEvent($this->table, $callback));

        return $this->event;
    }

    /**
     * title render
     * description render html
     * 2019/2/24 下午4:25
     * @return mixed
     */
    public function render()
    {
        if (!is_null($this->event)) {
            EsdUI::script($this->event->render());
        }

        return <<<HTML
<script type="text/html" id="{$this->table->getName()}_toolbar">
    <div class="layui-btn-container">
        {$this->toolbar}
    </div>
</script>
HTML;
    }
}