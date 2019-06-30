<?php
/**
 * Created by PhpStorm.
 * User: yangyuance
 * Date: 2019/3/4
 * Time: 下午8:01
 */

namespace ESD\Plugins\EsdUI\Components\Form\Assembly;


use ESD\Plugins\EsdUI\Components\Form\Assembly;
use ESD\Plugins\EsdUI\EsdUI;

class Hidden extends Assembly
{
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
     * description
     * 2019/3/10 下午4:18
     * @return mixed|string
     */
    public function render()
    {
        return <<<HTML
<input type="hidden" class="{$this->getInputClass()}" name="{$this->getName()}" id="{$this->getId()}" lay-filter="{$this->getId()}" value="{$this->getValue()}" {$this->getAttributes()} />
HTML;
    }
}