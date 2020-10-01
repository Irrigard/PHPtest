<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 01.10.2020
 * Time: 23:00
 */

class Image extends Tag
{
    public function __construct()
    {
        $this->setAttr('src', '')->setAttr('alt', '');
        parent::__construct('img');
    }

    public function __toString()
    {
        return parent::open();
    }

}