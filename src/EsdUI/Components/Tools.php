<?php
/**
 * Created by PhpStorm.
 * User: yangyuance
 * Date: 2019/2/21
 * Time: 下午10:36
 */

namespace ESD\Plugins\EsdUI\Components;


class Tools
{
    /**
     * @param array $data
     * @param null $keys
     * @param array|null $config
     * @return array
     */
    public function tree(array $data, $keys = null, array $config = null)
    {
        if (empty($data)) return [];

        //set config
        if (is_null($config)) {
            $config = [
                'parentid' => "pid",
                'id' => "id",
                'topindex' => 0,
                'sublist' => "list"
            ];
        } else {
            $config = array_merge([
                'parentid' => "pid",
                'id' => "id",
                'topindex' => 0,
                'sublist' => "list"
            ], $config);
        }

        //first, add all data to array and set key = pid
        $pidForList = [];
        foreach ($data as $i => $v) {
            if (!isset($pidForList[$v[$config['parentid']]])) $pidForList[$v[$config['parentid']]] = [];

            $pidForList[$v[$config['parentid']]][] = $v;
        }
        //use key to sort, asc
        ksort($pidForList);

        return $this->subTree($pidForList, $config["topindex"], $keys, $config);
    }

    /**
     * @param $pidForList
     * @param $pid
     * @param $keys
     * @param $config
     * @return array
     */
    protected function subTree($pidForList, $pid, $keys, $config)
    {
        $subTree = [];
        foreach ($pidForList[$pid] as $i => $v) {
            if (is_null($keys)) {
                $tempTree = $v;
            } else {
                if (is_array($keys)) {
                    $tempTree = [];
                    foreach ($keys as $key) {
                        $tempTree[$key] = isset($v[$key]) ? $v[$key] : '';
                    }
                } else if ($keys instanceof \Closure) {
                    $tempTree = $keys($v);
                }
            }

            $tempTree[$config['sublist']] = [];

            //judge pidForList is have this pid
            if (isset($pidForList[$v[$config['id']]])) {
                $tempTree[$config['sublist']] = $this->subTree($pidForList, $v[$config['id']], $keys, $config);
            }

            $subTree[] = $tempTree;
        }

        return $subTree;
    }

    /**
     * title rand
     * @param int $len
     * @param string $format
     * @return string
     */
    public function rand($len = 6, $format = 'NUMBER')
    {
        $format = strtoupper($format);
        switch ($format) {
            case 'ALL':
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~';
                break;
            case 'CHAR':
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-@#~';
                break;
            case 'NUMBER':
                $chars = '0123456789';
                break;
            default :
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~';
                break;
        }
        $password = "";
        while (strlen($password) < $len)
            $password .= substr($chars, (mt_rand() % strlen($chars)), 1);
        return $password;
    }

    /**
     * 金额小数点四舍五入
     * @param $amount
     * @param string $type
     * @return string
     */
    public function amountRound($amount, $type = "floor")
    {
        return sprintf("%.2f", $type($amount * 100) / 100);
    }

    /**
     * 使证书字符串整齐化
     * @param $certStr
     * @param string $prefix
     * @return string
     */
    public function neatCertificate($certStr, $prefix = 'PRIVATE KEY')
    {
        $trueInfo = str_replace(['-----BEGIN ' . $prefix . '-----', '-----END ' . $prefix . '-----'], '', $certStr);
        $trueInfo = str_replace(" ", "\n", $trueInfo);
        return "-----BEGIN " . $prefix . "-----\n" . $trueInfo . "\n-----END " . $prefix . "-----";
    }

    /**
     *  formatDate
     * 把一个时间格式化城几天之前
     * @param $time
     * @param float|int $deadLine
     * @return string
     */
    public function formatDate($time, $deadLine = 86400 * 30)
    {
        if (empty($time)) {
            return "无时间";
        }
        if (is_numeric($time)) {
            $t = time() - $time;
        } else {
            $t = time() - strtotime($time);
        }
        $f = array(
            '31536000' => '年',
            '2592000' => '个月',
            '604800' => '星期',
            '86400' => '天',
            '3600' => '小时',
            '60' => '分钟',
            '1' => '秒'
        );
        //如果是一个月之前的，直接显示时间
        if ($t > $deadLine) {
            return $time;
        }
        $result = "无时间";
        foreach ($f as $k => $v) {
            if (0 != $c = floor($t / (int)$k)) {
                $result = $c . $v . '前';
                break;
            }
        }
        return $result;
    }
}