<?php

use app\Exception\GameExcepction;
use app\Model\Group;
use app\Model\RedPacket;
use app\Process\RobotManagerEvent;
use ESD\Core\Server\Server;

/**
 * File: helpers.php
 * User: 4213509@qq.com
 * Date: 2019-06-16
 * Time: ${Time}
 **/

function getTopicName($groupId)
{
    return 'Group:' . $groupId;
}

function getOpenRedListKey($id)
{
    return 'openPacketList:' . $id;
}

function send($data, $cmd = 0, $msg = '', $code = 0)
{
    return ['data' => $data, 'code' => $code, 'msg' => $msg, 'cmd' => $cmd];
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

function toMoney($money)
{
    return sprintf('%.2f', round($money, 2));
}

function getTime()
{
    list($msec, $sec) = explode(' ', microtime());
    $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
    return $msectime;
}

/**
 * @param string $type
 * @param $data
 */
function robotEvent($type, $data)
{
    p("事件类型{$type},消息内容{$data}");
    $eventDispatcher = Server::$instance->getEventDispatcher();
    $processes = Server::$instance->getProcessManager()->getProcessGroup(RobotManagerEvent::groupName);
    try {
        $eventDispatcher->dispatchProcessEvent(new RobotManagerEvent($type, $data), $processes->getProcesses()[0]);
    } catch (GameExcepction $e) {
        p($e->getMessage(), "机器人运行异常");
    }
}