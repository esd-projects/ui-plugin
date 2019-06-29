<?php
/**
 * File: index.php
 * User: 4213509@qq.com
 * Date: 2019-06-29
 * Time: ${Time}
 **/

namespace ESD\Plugins\Admin;


use ESD\Core\Plugins\Config\BaseConfig;

class AdminConfig extends BaseConfig
{
    const key = "admin";

    protected $token;

    public function __construct()
    {
        parent::__construct(self::key);
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }


}
