<?php
/**
 * File: index.php
 * User: 4213509@qq.com
 * Date: 2019-06-29
 * Time: ${Time}
 **/

namespace ESD\Plugins\Admin\Controller;

use ESD\Plugins\EasyRoute\Annotation\GetMapping;
use ESD\Plugins\EasyRoute\Annotation\PostMapping;
use ESD\Plugins\EasyRoute\Annotation\RestController;

/**
 * @RestController("/esd_admin")
 * Class Index
 * @package ESD\Plugins\EasyRoute
 */
class Index extends AdminBase
{
    /**
     * @PostMapping("/config")
     * @return string
     */
    public function index()
    {
        return $this->send([
            'menu' => []
        ]);
    }

    /**
     * @GetMapping("/login")
     * @return string
     */
    public function login()
    {
        $data['data'] = [
            'username' => 'admin',
            'userphone' => 'admin',
            'id' => 1212,
            'access_token' => 222222222
        ];
        $data['code'] = 1;
        return $this->send($data);
    }


}
