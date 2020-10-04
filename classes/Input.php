<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 04.10.2020
 * Time: 21:21
 */

class Input extends Tag
{
    public function __construct()
    {
        parent::__construct('input');
    }

    public function open()
    {
        $inputName = $this->getAttr('name');
        if ($inputName)
        {
            if (isset($_REQUEST[$inputName]))
            {
                $value = $_REQUEST[$inputName];
                $this->setAttr('value', $value);
            }
        }
        return parent::open();
    }

    public function __toString()
    {
        return $this->open();
    }
}