<?php
/**
 * File: helpers.php
 * User: 4213509@qq.com
 * Date: 2019-06-16
 * Time: ${Time}
 **/


/**
 * @param array $data
 * @param int $code
 * @param string $msg
 * @param array $header
 * @return array
 */
function ajax($data = [], $code = 1, $msg = "success", $header = [])
{
    return ([
        'data' => $data,
        'code' => $code,
        'msg' => $msg
    ]);
}

function p($val, $title = null, $starttime = '')
{
    print_r('[ ' . date("Y-m-d H:i:s") . ']:');
    if ($title != null) {
        print_r("[" . $title . "]:");
    }
    print_r($val);
    print_r("\r\n");
}
