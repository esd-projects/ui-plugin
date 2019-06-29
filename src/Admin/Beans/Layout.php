<?php
/**
 * File: AbstractLayout.php
 * User: 4213509@qq.com
 * Date: 2019-06-29
 * Time: ${Time}
 **/

namespace ESD\Plugins\Admin\Beans;


abstract class Layout
{
    /**
     * __toString
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * render
     * @return mixed
     */
    public abstract function render();
}