<?php
/**
 * File: index.php
 * User: 4213509@qq.com
 * Date: 2019-06-29
 * Time: ${Time}
 **/

namespace ESD\Plugins\EsdUI;


use ESD\Core\Plugins\Config\BaseConfig;

class EsdUIConfig extends BaseConfig
{
    const key = "ui";

    public function __construct()
    {
        parent::__construct(self::key);
    }
}
