<?php

namespace ESD\Examples\Model;

use ESD\Go\GoModel;

/**
 * File: Menu.php
 * User: 4213509@qq.com
 * Date: 2019-06-30
 * Time: ${Time}
 **/
class Menu extends GoModel{


    public $id;
    public $title;
    public $jump;
    public $icon;
    public $pid;
    public $name;








    /**
     * 获取数据库表名
     * @return string
     */
    public static function getTableName(): string
    {
        // TODO: Implement getTableName() method.
        return '';
    }

    /**
     * 获取主键名
     * @return string
     */
    public static function getPrimaryKey(): string
    {
        // TODO: Implement getPrimaryKey() method.
        return '';
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Menu
     */
    public function setId($id): Menu
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Menu
     */
    public function setTitle($title): Menu
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getJump()
    {
        return $this->jump;
    }

    /**
     * @param mixed $jump
     * @return Menu
     */
    public function setJump($jump): Menu
    {
        $this->jump = $jump;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     * @return Menu
     */
    public function setIcon($icon): Menu
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * @param mixed $pid
     * @return Menu
     */
    public function setPid($pid): Menu
    {
        $this->pid = $pid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Menu
     */
    public function setName($name): Menu
    {
        $this->name = $name;
        return $this;
    }
    public function toArray(){
        return json_decode(json_encode($this),true);
    }
}