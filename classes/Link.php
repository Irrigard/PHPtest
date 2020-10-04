<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 03.10.2020
 * Time: 22:54
 */

class Link extends Tag
{
    const ACTIVE_CLASS = 'active';
    public function __construct()
    {
        parent::__construct('a');
        $this->setAttr('href', '');
    }

    private function activateSelf()
    {
        if ($this->getAttr('href') == $_SERVER['REQUEST_URI'])
        {
            $this->addClass(Link::ACTIVE_CLASS);
        }
    }

    public function show()
    {
        $this->activateSelf();
        return parent::show();
    }

}