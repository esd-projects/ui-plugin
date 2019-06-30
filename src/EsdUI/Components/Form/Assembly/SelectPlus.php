<?php
/**
 * Created by PhpStorm.
 * User: yangyuance
 * Date: 2019/2/24
 * Time: 下午11:26
 */

namespace ESD\Plugins\EsdUI\Components\Form\Assembly;


use ESD\Plugins\EsdUI\EsdUI;

class SelectPlus extends Select
{
    /**
     * title direction
     * description select direction
     * 2019/2/25 上午12:02
     * @param string $mode
     * @return $this
     * @throws \Exception
     */
    public function direction($mode = "auto")
    {
        $this->setAttributes("xm-select-direction", $mode);

        return $this;
    }

    /**
     * title radio
     * description
     * 2019/2/25 上午12:06
     * @return $this
     * @throws \Exception
     */
    public function radio()
    {
        $this->setAttributes("xm-select-radio", true);

        return $this;
    }

    /**
     * title count
     * description
     * 2019/2/25 上午12:07
     * @param $count
     * @return $this
     * @throws \Exception
     */
    public function count($count)
    {
        $this->setAttributes('xm-select-show-count', $count);

        return $this;
    }

    /**
     * title search
     * description
     * 2019/2/25 上午12:28
     * @param string $search
     * @param string $type
     * @return $this
     * @throws \Exception
     */
    public function search($search = '', $type = 'dl')
    {
        $this->setAttributes('xm-select-search', $search);

        $this->setAttributes('xm-select-search-type', $type);

        return $this;
    }

    /**
     * title skin
     * description
     * 2019/2/25 上午12:27
     * @param string $skin
     * @return $this
     * @throws \Exception
     */
    public function skin($skin = 'primary')
    {
        $this->setAttributes('xm-select-skin', $skin);

        return $this;
    }

    /**
     * title template
     * description set template
     * 2019/2/25 上午11:26
     * @param $template
     * @return $this
     * @throws \Exception
     */
    public function template($template)
    {
        $this->setAttributes('data-template', htmlspecialchars($template));

        return $this;
    }

    /**
     * title linkage
     * description
     * 2019/2/25 上午11:41
     * @param $data
     * @param int $width
     * @return $this
     * @throws \Exception
     */
    public function linkage($data, $width = 130)
    {
        if (is_array($data)) {
            $data = json_encode($data);
            EsdUI::script(<<<HTML
layui.formSelects.data("{$this->getId()}", 'local', {
    arr: $data,
    linkage: true,
    linkageWidth: {$width}
});
HTML
            );
        } else {
            EsdUI::script(<<<HTML
layui.formSelects.data("{$this->getId()}", 'server', {
    url: "{$data}",
    linkage: true,
    linkageWidth: {$width}
});
HTML
            );
        }

        return $this;
    }

    /**
     * title setJsValue
     * description
     * 2019/3/6 下午2:26
     * @param array $value
     */
    public function setJsValue(array $value)
    {
        if (!empty($value)) {
            $value = json_encode($value);
            EsdUI::script(<<<HTML
layui.formSelects.value("{$this->getId()}", {$value});
HTML
            );
        }
    }

    /**
     * title on
     * description
     * 2019/2/25 下午12:03
     * @param $callback
     * @param bool $isNow
     * @return $this
     * @throws \Exception
     */
    public function on($callback, $isNow = true)
    {
        EsdUI::script(<<<HTML
layui.formSelects.on("{$this->getId()}", function(id, vals, val, isAdd, isDisabled){
    {$callback}
}, $isNow);
HTML
        );

        return $this;
    }

    /**
     * title afterSetForm
     * description
     * 2019/2/24 下午11:28
     */
    protected function afterSetForm()
    {
        EsdUI::script('formSelects', 2);

        Admin::style('formSelects', 1);

        $this->setAttributes("xm-select", $this->getId());
    }
}