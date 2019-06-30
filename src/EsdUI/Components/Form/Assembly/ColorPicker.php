<?php
/**
 * Created by PhpStorm.
 * User: yangyuance
 * Date: 2019/3/9
 * Time: 下午11:22
 */

namespace ESD\Plugins\EsdUI\Components\Form\Assembly;


use ESD\Plugins\EsdUI\Components\Form\Assembly;
use ESD\Plugins\EsdUI\EsdUI;

class ColorPicker extends Assembly
{
    /**
     * title format
     * description
     * 2019/3/9 下午11:50
     * @param string $type
     * @return $this
     * @throws \Exception
     */
    public function format($type = "rgb")
    {
        $this->setAttributes("data-format", $type);

        return $this;
    }

    /**
     * title alpha
     * description
     * 2019/3/9 下午11:50
     * @return $this
     * @throws \Exception
     */
    public function alpha()
    {
        $this->setAttributes("data-alpha", 'true');

        return $this;
    }

    /**
     * title colors
     * description
     * 2019/3/9 下午11:51
     * @param array $colors
     * @return $this
     * @throws \Exception
     */
    public function colors(array $colors)
    {
        $this->setAttributes("data-predefine", 'true');

        $this->setAttributes("data-colors", htmlspecialchars(json_encode($colors)));

        return $this;
    }

    /**
     * title size
     * description
     * 2019/3/9 下午11:52
     * @param string $size
     * @return $this
     * @throws \Exception
     */
    public function size($size = "lg")
    {
        $this->setAttributes("data-size", $size);

        return $this;
    }

    /**
     * title onChange
     * description
     * 2019/3/10 上午12:04
     * @param $callback
     * @return $this
     * @throws \Exception
     */
    public function onChange($callback)
    {
        $this->setAttributes("data-change", $callback);

        return $this;
    }

    /**
     * title onChange
     * description
     * 2019/3/10 上午12:04
     * @param $callback
     * @return $this
     * @throws \Exception
     */
    public function onDone($callback)
    {
        $this->setAttributes("data-done", $callback);

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
    <div name="{$this->getName()}" id="{$this->getId()}" lay-filter="{$this->getId()}" data-color="{$this->getValue()}" {$this->getAttributes()} lay-colorpicker=""></div>
    <input type="hidden" id="{$this->getId()}_hidden" name="{$this->getName()}" value="{$this->getValue()}"/>
</div>
HTML;
    }

    /**
     * title afterSetForm
     * description
     * 2019/3/9 下午11:25
     */
    protected function afterSetForm()
    {
        EsdUI::script("colorpicker", 2);
    }
}