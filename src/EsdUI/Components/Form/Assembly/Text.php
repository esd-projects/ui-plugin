<?php
/**
 * Created by PhpStorm.
 * User: yangyuance
 * Date: 2019/2/24
 * Time: 下午5:58
 */

namespace ESD\Plugins\EsdUI\Components\Form\Assembly;


use ESD\Plugins\EsdUI\Components\Form\Assembly;
use ESD\Plugins\EsdUI\EsdUI;

class Text extends Assembly
{
    /**
     * input's type
     * @var string
     */
    protected $inputType = "text";

    /**
     * @var string
     */
    protected $placeholder = '';

    /**
     * @var array
     */
    protected $inputClass = ['layui-input'];

    /**
     * title on
     * description
     * 2019/3/3 下午9:28
     * @param $event
     * @param $callback
     * @return $this
     */
    public function on($event, $callback)
    {
        EsdUI::script(<<<HTML
$(document).off('{$event}', '#{$this->getId()}').on('{$event}', '#{$this->getId()}', function() {
    {$callback}
});
HTML
        );
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
        return <<<HTML
<label class="layui-form-label">{$this->getLabel()}</label>
<div class="{$this->getClass()}">
    <input type="{$this->inputType}" class="{$this->getInputClass()}" name="{$this->getName()}" id="{$this->getId()}" lay-filter="{$this->getId()}" value="{$this->getValue()}" placeholder="{$this->placeholder}" {$this->getAttributes()} />
</div>
HTML;
    }

    /**
     * @return array
     */
    public function getInputClass()
    {
        return join(" ", $this->inputClass);
    }

    /**
     * title setInputClass
     * description
     * 2019/2/24 下午6:41
     * @param string $inputClass
     * @return $this
     */
    public function setInputClass($inputClass)
    {
        $this->inputClass[] = $inputClass;

        return $this;
    }

    /**
     * title setPlaceholder
     * description
     * 2019/2/24 下午6:39
     * @param $placeholder
     * @return $this
     */
    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;

        return $this;
    }
}