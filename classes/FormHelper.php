<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 12.10.2020
 * Time: 21:13
 */

class FormHelper extends TagHelper
{
    public function openForm($attrs = [])
    {
        return $this->open('form', $attrs);
    }

    public function closeForm()
    {
        return $this->close('form');
    }

    public function input($attrs = [])
    {
        if (isset($attrs['name']))
        {
            $name = $attrs['name'];

            if(isset($_REQUEST[$name]))
            {
                $attrs['value'] = $_REQUEST[$name];
            }
        }
        return $this->open('input', $attrs);
    }

    public function password($attrs = [])
    {
        $attrs['type'] = 'password';
        return $this->input($attrs);
    }

    public function hidden($attrs = [])
    {
        $attrs['type'] = 'hidden';
        return $this->open('input', $attrs);
    }

    public function submit($attrs = [])
    {
        $attrs['type'] = 'submit';
        return $this->open('input', $attrs);
    }

    public function checkbox($attrs = [])
    {
        $attrs['type'] = 'checkbox';
        $attrs['value'] = '1';

        if (isset($attrs['name']))
        {
            $name = $attrs['name'];
            if (isset($_REQUEST[$name]) and $_REQUEST[$name] == 1)
            {
                $attrs['checked'] = true;
            }
            $hidden = $this->hidden(['name'=>$name, 'value'=>'0']);
        } else {
            $hidden = '';
        }
        return $hidden . $this->open('input', $attrs);
    }

    public function textArea($text = '', $attrs = [])
    {
        if (isset($attrs['name']))
        {
            $name = $attrs['name'];
            if (isset($_REQUEST[$name]))
            {
                $text = $_REQUEST[$name];
            }
        }
        return $this->show('textarea', $text, $attrs);
    }

    public function select($attrs = [], $optionsArr = [])
    {
        $options = '';
        if (isset($attrs['name']))
        {
            $name = $attrs['name'];
            if (isset($_REQUEST[$name]))
            {
                $value = $_REQUEST[$name];
            }
        }
        foreach ($optionsArr as $elem)
        {
            if (isset($value) and $elem['attrs']['value'] == $value)
            {
                $elem['attrs']['selected'] = true;
            }
            $options .= $this->show('option', $elem['text'], $elem['attrs']);
        }
        return $this->open('select', $attrs) . $options . $this->close('select');
    }
}