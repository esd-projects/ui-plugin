<?php

namespace ESD\Plugins\EsdUI\Helpers;
class Install
{
    public static function postUpdate()
    {
        $ROOT = __DIR__;
        // $SRC_ROOT =realpath(__DIR__ . '/../../../src' );
        self::displayMsg('请手动将' . realpath($ROOT . '/../assets') . ' 下的静态文件复制至您的静态文件目录夹内。', 'red');
    }

    /**
     * @param $content
     * @param string $colour
     * @param string $type
     */
    public static function displayMsg($content, $colour = 'green', $type = 'center')
    {
        switch ($colour) {
            case 'red':
            case '红':
                $strStart = "\033[31;50m";
                break;
            case 'green':
            case '绿':
                $strStart = "\033[32;50m";
                break;
            case 'yellow':
            case '黄':
                $strStart = "\033[33;50m";
                break;
            case 'blue':
            case '蓝':
                $strStart = "\033[34;50m";
                break;
            case 'violet':
            case '紫':
                $strStart = "\033[35;50m";
                break;
            default :
                $strStart = "\033[0m";
        }
        if ($type == 'center') {
            $len = (strlen($content) + mb_strlen($content)) / 4;
            for ($i = $len; $i < 50; $i++) {
                $content = "=$content=";
            }
        }
        echo $strStart . $content . "\033[0m" . PHP_EOL;
    }
}
