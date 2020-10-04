<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 04.10.2020
 * Time: 22:08
 */

class Hidden extends Input
{
    public function __construct()
    {
        parent::__construct();
        $this->setAttr('type', 'hidden');
    }
}