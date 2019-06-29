<?php
/**
 * Created by PhpStorm.
 * User: yangyuance
 * Date: 2019/2/24
 * Time: 下午8:43
 */

namespace ESD\Plugins\Admin\Components\Form\Assembly;


class Checkbox extends Radio
{
    protected $inputType = "checkbox";

    /**
     * title primary
     * description
     * createtime 2019/2/24 下午8:59
     * @return $this
     * @throws \Exception
     */
    public function primary()
    {
        $this->setAttributes('lay-skin', 'primary');

        return $this;
    }
}