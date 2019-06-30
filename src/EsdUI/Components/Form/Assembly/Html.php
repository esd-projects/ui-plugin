<?php
/**
 * Created by PhpStorm.
 * User: yangyuance
 * Date: 2019/3/9
 * Time: 下午11:17
 */

namespace ESD\Plugins\EsdUI\Components\Form\Assembly;


use ESD\Plugins\EsdUI\Components\Form\Assembly;

class Html extends Assembly
{
    protected $plain = false;

    /**
     * title plain
     * description
     * 2019/3/9 下午11:19
     * @return $this
     */
    public function plain()
    {
        $this->plain = true;

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
        if ($this->plain) {
            return $this->getValue();
        }

        return <<<HTML
<label class="layui-form-label">{$this->getLabel()}</label>
<div class="{$this->getClass()}">
    {$this->getValue()}
</div>
HTML;
    }
}