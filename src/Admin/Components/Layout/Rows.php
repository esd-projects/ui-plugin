<?php
/**
 * Created by PhpStorm.
 * User: yangyuance
 * Date: 2019/1/30
 * Time: 下午2:54
 */

namespace ESD\Plugins\Admin\layout;


use ESD\Plugins\Admin\Beans\Layout;

class Rows extends Layout
{
    /**
     * columns array for Rows
     * @var array
     */
    protected $columns = [];

    /**
     * Rows constructor.
     * @param null $html
     */
    public function __construct($html = null)
    {
        if (!empty($html)) {
            $this->columns($html, 12);
        }
    }

    /**
     * @title columns
     * @description add an columns
     * @createtime 2019/1/30 下午3:36
     * @param $html
     * @param int $width
     * @return Rows
     */
    public function columns($html, $width = 12)
    {
        $width = $width < 1 ? round(12 * $width) : $width;

        $column = new Columns($html, $width);

        $this->setColumns($column);

        return $this;
    }

    /**
     * @title setColumns
     * @description set columns, each columns is a instance of Yirius/Admin/layout/Columns
     * @createtime 2019/1/30 下午3:36
     * @param Columns $column
     * @return Rows
     */
    public function setColumns(Columns $column)
    {
        $this->columns[] = $column;

        return $this;
    }

    /**
     * @title render
     * @description use for render each type
     * @createtime 2019/1/30 下午3:10
     * @return string
     */
    public function render()
    {
        $render = "";
        foreach ($this->columns as $column) {
            $render .= $column->render();
        }

        return <<<HTML
<div class="layui-row">
{$render}
</div>
HTML;

    }

}