<?php
/**
 * Created by PhpStorm.
 * User: yangyuance
 * Date: 2019/2/24
 * Time: 下午7:10
 */

namespace ESD\Plugins\EsdUI\Components\Form\Assembly;


use ESD\Plugins\EsdUI\EsdUI;

/**
 * Class Date
 * @method Date setShowBottom(bool $isShow);
 * @method Date setBtns(array $btns);
 * @method Date setLang($lang);
 * @method Date setTheme($theme);
 * @method Date setMark(array $mark);
 * @package ESD\Plugins\EsdUI\Components\Form\assembly
 */
class Date extends Text
{
    /**
     * title year
     * description
     * 2019/2/24 下午7:21
     * @throws \Exception
     */
    public function year()
    {
        $this->setAttributes("data-type", 'year');

        return $this;
    }

    /**
     * title month
     * description
     * 2019/2/24 下午7:21
     * @throws \Exception
     */
    public function month()
    {
        $this->setAttributes("data-type", 'month');

        return $this;
    }

    /**
     * title time
     * description
     * 2019/2/24 下午7:21
     * @throws \Exception
     */
    public function time()
    {
        $this->setAttributes("data-type", 'time');

        return $this;
    }

    /**
     * title datetime
     * description
     * 2019/2/24 下午7:21
     * @throws \Exception
     */
    public function datetime()
    {
        $this->setAttributes("data-type", 'datetime');

        return $this;
    }

    /**
     * title range
     * description
     * 2019/2/25 下午11:16
     * @param string $range
     * @return $this
     * @throws \Exception
     */
    public function range($range = '/')
    {
        $this->setAttributes("data-range", $range);

        return $this;
    }

    /**
     * title format
     * description
     * 2019/2/25 下午11:16
     * @param $format
     * @return $this
     * @throws \Exception
     */
    public function format($format)
    {
        $this->setAttributes("data-format", $format);

        return $this;
    }

    /**
     * title min
     * description
     * 2019/2/24 下午7:27
     * @param $datetime
     * @return $this
     * @throws \Exception
     */
    public function min($datetime)
    {
        $this->setAttributes("data-min", $datetime);

        return $this;
    }

    /**
     * title max
     * description
     * 2019/2/24 下午7:27
     * @param $datetime
     * @return $this
     * @throws \Exception
     */
    public function max($datetime)
    {
        $this->setAttributes("data-max", $datetime);

        return $this;
    }

    /**
     * title calendar
     * description
     * 2019/2/24 下午7:29
     * @return $this
     * @throws \Exception
     */
    public function calendar()
    {
        $this->setAttributes("data-calendar", true);

        return $this;
    }

    /**
     * title onChange
     * description
     * 2019/2/24 下午7:31
     * @param $callback
     * @return $this
     * @throws \Exception
     */
    public function onChange($callback)
    {
        $this->setAttributes("data-change", htmlspecialchars($callback));

        return $this;
    }

    /**
     * title onReady
     * description
     * 2019/2/24 下午7:45
     * @param $callback
     * @return $this
     * @throws \Exception
     */
    public function onReady($callback)
    {
        $this->setAttributes("data-ready", htmlspecialchars($callback));

        return $this;
    }

    /**
     * title onDone
     * description
     * 2019/2/24 下午7:45
     * @param $callback
     * @return $this
     * @throws \Exception
     */
    public function onDone($callback)
    {
        $this->setAttributes("data-done", htmlspecialchars($callback));

        return $this;
    }

    /**
     * title afterSetForm
     * description
     * 2019/2/24 下午7:17
     * @throws \Exception
     */
    protected function afterSetForm()
    {
        EsdUI::script('laydate', 2);
        $this
            ->setAttributes("lay-date", 'true')
            ->setAttributes("readonly", 'readonly');
    }
}