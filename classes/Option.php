<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 09.10.2020
 * Time: 23:12
 */

class Option extends Tag
{
    public function __construct()
    {
        parent::__construct('option');
    }

    public function __toString()
    {
        return $this->show();
    }

    public function setSelected()
    {
        $this->setAttr('selected');
        return $this;
    }
}