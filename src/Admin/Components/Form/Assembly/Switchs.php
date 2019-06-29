<?php
/**
 * Created by PhpStorm.
 * User: yangyuance
 * Date: 2019/2/24
 * Time: 下午8:43
 */

namespace ESD\Plugins\Admin\Components\Form\Assembly;


use ESD\Plugins\Admin\Beans\Admin;
use ESD\Plugins\Admin\Components\Form\Assembly;

class Switchs extends Assembly
{
    protected $text = '开|关';

    /**
     * title text
     * description
     * createtime 2019/2/24 下午9:03
     * @param $on
     * @param $off
     * @return $this
     */
    public function text($on, $off)
    {
        $this->text = $on . "|" . $off;

        return $this;
    }

    /**
     * title render
     * description render html
     * createtime 2019/2/24 下午4:25
     * @return mixed
     */
    public function render()
    {
        $checked = empty($this->value) ? '' : "checked='checked'";

        $value = empty($this->value) ? 0 : 1;

        return <<<HTML
<label class="layui-form-label">{$this->getLabel()}</label>
<div class="{$this->getClass()}">
    <input type="checkbox" lay-filter="{$this->getId()}" lay-skin="switch" lay-text="{$this->text}" value="1" {$checked} {$this->getAttributes()}>
    <input type="hidden" name="{$this->getName()}" value="{$value}" id="{$this->getId()}" />
</div>
HTML;
    }

    /**
     * title afterSetForm
     * description
     * createtime 2019/3/10 下午4:31
     */
    protected function afterSetForm()
    {
        $this->on("");
    }

    /**
     * title on
     * description
     * createtime 2019/3/3 下午9:44
     * @param $callback
     * @return $this
     */
    public function on($callback)
    {
        Admin::script(<<<HTML
layui.form.on("switch({$this->getId()})", function(obj){
$("#{$this->getId()}").val(obj.elem.checked ? 1 : 0);
{$callback}
});
HTML
        );
        return $this;
    }
}