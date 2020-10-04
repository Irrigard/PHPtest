<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 04.10.2020
 * Time: 22:12
 */

class TextArea extends Tag
{
    public function __construct()
    {
        parent::__construct('textarea');
    }

    public function show()
    {
        $name = $this->getAttr('name');
        if($name)
        {
            if (isset($_REQUEST[$name]))
            {
                $this->setText($_REQUEST[$name]);
            }
        }
        return parent::show();
    }

    public function __toString()
    {
        return $this->show();
    }
}