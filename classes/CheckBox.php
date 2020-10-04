<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 04.10.2020
 * Time: 22:23
 */

class CheckBox extends Tag
{
    public function __construct()
    {
        parent::__construct('input');
        $this->setAttr('type', 'checkbox');
        $this->setAttr('value', '1');
    }

    public function open()
    {
        $name = $this->getAttr('name');
        if ($name)
        {
            $hidden = (new Hidden())->setAttr('name', $name)->setAttr('value', '0');
            if (isset($_REQUEST[$name]))
            {
                $value = $_REQUEST[$name];
                if ($value === '1')
                {
                    $this->setAttr('checked');
                } else {
                    $this->removeAttr('checked');
                }
            }
            return $hidden->open() . parent::open();
        } else {
            return parent::open();
        }
    }

    public function __toString()
    {
        return $this->open();
    }
}