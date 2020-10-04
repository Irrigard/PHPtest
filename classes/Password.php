<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 04.10.2020
 * Time: 22:04
 */

class Password extends Input
{
    public function __construct()
    {
        parent::__construct();
        $this->setAttr('type', 'password');
    }

}