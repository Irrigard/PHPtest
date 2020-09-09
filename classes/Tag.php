<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 08.09.2020
 * Time: 23:04
 */

class Tag
{
    private $name;
    private $attrs;

    public function __construct($name, $attrs = [])
    {
        $this->name = $name;
        $this->attrs = $attrs;
    }

    public function setAttr($name, $value)
    {
        $this->attrs[$name] = $value;
        return $this;
    }

    public function removeAttr($name)
    {
        if (array_key_exists($name, $this->attrs))
        {
            unset($this->attrs[$name]);
        }
        return $this;
    }

    public function open()
    {
        $name = $this->name;
        $attrsStr = $this->getAttrsStr($this->attrs);
        return "<$name$attrsStr>";
    }

    public function close()
    {
        return "</$this->name>";
    }

    private function getAttrsStr($attrs)
    {
        if (!empty($attrs)){
            $outStr = '';
            foreach ($attrs as $key=>$attr)
            {
                $outStr .= " $key=\"$attr\"";
            }
            return $outStr;
        } else {
            return '';
        }
    }

}