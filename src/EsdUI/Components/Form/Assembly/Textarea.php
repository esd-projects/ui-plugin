<?php
/**
 * Created by PhpStorm.
 * User: yangyuance
 * Date: 2019/2/24
 * Time: 下午5:58
 */

namespace ESD\Plugins\EsdUI\Components\Form\Assembly;


class Textarea extends Text
{
    /**
     * @var array
     */
    protected $inputClass = ['layui-textarea'];

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
    <textarea class="{$this->getInputClass()}" name="{$this->getName()}" id="{$this->getId()}" lay-filter="{$this->getId()}" {$this->getAttributes()} placeholder="{$this->placeholder}">{$this->getValue()}</textarea>
</div>
HTML;
    }
}