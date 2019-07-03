<?php
/**
 * Created by PhpStorm.
 * User: yangyuance
 * Date: 2019/2/24
 * Time: 下午8:43
 */

namespace ESD\Plugins\EsdUI\Components\Form\Assembly;


use ESD\Plugins\EsdUI\Components\Form\Assembly;
use ESD\Plugins\EsdUI\EsdUI;

class Switchs extends Assembly
{
    protected $text = '开|关';
    /**
     * @var string
     */
    protected $html = '';
    /**
     * @var string
     */
    protected $tips = '';
    /**
     * title text
     * description
     * 2019/2/24 下午9:03
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
     * 2019/2/24 下午4:25
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
     {$this->getTips()}
    {$this->getHtml()}
</div>
HTML;
    }

    /**
     * title afterSetForm
     * description
     * 2019/3/10 下午4:31
     */
    protected function afterSetForm()
    {
        $this->on("");
    }

    /**
     * title on
     * description
     * 2019/3/3 下午9:44
     * @param $callback
     * @return $this
     */
    public function on($callback)
    {
        EsdUI::script(<<<HTML
layui.form.on("switch({$this->getId()})", function(obj){
$("#{$this->getId()}").val(obj.elem.checked ? 1 : 0);
{$callback}
});
HTML
        );
        return $this;
    }

    /**
     * @return string
     */
    public function getTips(): string
    {
        if (!empty($this->tips)) {
            return "<p class=\"help-block\">{$this->tips}";
        }
        return '';
    }

    /**
     * @param string $title
     * @param string $tips
     */
    public function setTips( string $tips)
    {
        $this->tips = $tips;
        return $this;
    }

    /**
     * @return string
     */
    public function getHtml(): string
    {
        return $this->html;
    }

    /**
     * @param string $customize
     */
    public function setHtml(string $html): void
    {
        $this->html = $html;
    }
}