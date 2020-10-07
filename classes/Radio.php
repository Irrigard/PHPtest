<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 07.10.2020
 * Time: 18:42
 */

class Radio extends Tag
{
    public function __construct()
    {
        parent::__construct('input');
        $this->setAttr('type', 'radio');
    }

    public function open()
    {
        $name = $this->getAttr('name');
        if ($name){
            if (isset($_REQUEST[$name]))
            {
                $value = $_REQUEST[$name];
                if ($value == $this->getAttr('value'))
                {
                    $this->setAttr('checked');
                } else {
                    $this->removeAttr('checked');
                }
            }
            return parent::open();
        } else {
            return parent::open();
        }
    }

    public function __toString()
    {
        return $this->open();
    }
}