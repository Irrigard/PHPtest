<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 04.10.2020
 * Time: 20:20
 */

class HtmlList extends Tag
{
    private $items = [];

    public function addItem(ListItem $li)
    {
        $this->items[] = $li;
        return $this;
    }

    public function show()
    {
        $result = $this->open();
        foreach ($this->items as $item)
        {
            $result .= $item->show();
        }
        $result .= $this->close();
        return $result;
    }

    public function __toString()
    {
        return $this->show();
    }
}