<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 09.10.2020
 * Time: 23:11
 */

class Select extends Tag
{
    public $options = [];
    public function __construct()
    {
        parent::__construct('select');
    }

    public function __toString()
    {
        return $this->show();
    }

    public function Show()
    {
        $str = '';
        $name = $this->getAttr('name');
        $str .= $this->open();
        foreach ($this->options as $item)
        {
            if (isset($_REQUEST[$name]))
            {
                if ($_REQUEST[$name] == $item->getText())
                {
                    $item->setSelected();
                }
            }
            $str .= $item->show();
        }
        $str .= $this->close();
        return $str;
    }

    public function AddOption(Option $option)
    {
        $this->options[] = $option;
        return $this;
    }
}