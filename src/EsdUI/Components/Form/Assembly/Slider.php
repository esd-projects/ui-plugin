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

/**
 * Class Slider
 * @method Slider setType($type);
 * @method Slider setMin(int $min);
 * @method Slider setMax(int $max);
 * @method Slider setRange(bool $bool);
 * @method Slider setStep(int $step);
 * @method Slider setShowstep(bool $bool);
 * @method Slider setTips(bool $bool);
 * @method Slider setInput(bool $bool);
 * @method Slider setHeight(int $height);
 * @method Slider setDisabled(bool $bool);
 * @method Slider setTheme($theme);
 *
 * @method Slider getType();
 * @method Slider getMin();
 * @method Slider getMax();
 * @method Slider getRange();
 * @method Slider getStep();
 * @method Slider getShowstep();
 * @method Slider getTips();
 * @method Slider getInput();
 * @method Slider getHeight();
 * @method Slider getDisabled();
 * @method Slider getTheme();
 * @package ESD\Plugins\EsdUI\Components\Form\assembly
 */
class Slider extends Assembly
{
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
    public function onSetTips($callback)
    {
        $this->setAttributes("data-set-tips", $callback);

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
    <div name="{$this->getName()}" id="{$this->getId()}" lay-filter="{$this->getId()}" data-value="{$this->getValue()}" {$this->getAttributes()} lay-slider=""></div>
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
        EsdUI::script("slider", 2);
    }
}