<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 12.10.2020
 * Time: 15:56
 */

class TagHelper
{
    public function open($name, $attrs = [])
    {
        $attrsStr = $this->getAttrsStr($attrs);
        return "<$name$attrsStr>";
    }

    public function close($name)
    {
        return "</$name>";
    }

    public function show($name, $text, $attrs = [])
    {
        $attrsStr = $this->getAttrsStr($attrs);
        return "<$name$attrsStr>$text</$name>";
    }

    private function getAttrsStr($attrs)
    {
        if (!empty($attrs))
        {
            $result = '';
            foreach ($attrs as $name => $value) {
                if ($value === true) {
                    $result .= " $name";
                } else {
                    $result .= " $name=\"$value\"";
                }
            }
            return $result;
        } else {
            return '';
        }
    }
}

