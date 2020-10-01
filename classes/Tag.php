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

    public function setAttr($name, $value = true)
    {
        $this->attrs[$name] = $value;
        return $this;
    }

    public function setAttrs($attrs)
    {
        foreach ($attrs as $key=>$elem){
            $this->setAttr($key, $elem);
        }
        return $this;
    }

    public function addClass($className)
    {
        if (!isset($this->attrs['class'])){
            $this->setAttr('class', $className);
        } else {
            $classArr = explode(' ', $this->attrs['class']);
            if(!in_array($className, $classArr)){
                $classArr[] = $className;
            }
            $this->attrs['class'] = implode(' ', $classArr);
        }
        return $this;
    }

    public function removeClass($className)
    {
        if (isset($this->attrs['class']))
        {
            $classNames = explode(' ', $this->attrs['class']);
            if (in_array($className, $classNames))
            {
                $this->attrs['class'] = implode(' ', $this->removeElem($className, $classNames));
            }
        }
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
                if ($attr === true){
                    $outStr .= " $key";
                } else {
                    $outStr .= " $key=\"$attr\"";
                }
            }
            return $outStr;
        } else {
            return '';
        }
    }

    private function removeElem($elem, $arr)
    {
        $key = array_search($elem, $arr);
        array_splice($arr, $key, 1);
        return $arr;
    }

}