<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 04.10.2020
 * Time: 21:44
 */

class Submit extends Input
{
    public function __construct()
    {
        parent::__construct();
        $this->setAttr('type', 'submit');
    }
}