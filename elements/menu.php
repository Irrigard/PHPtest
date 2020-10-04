<?php
for ($i=1;$i<=5;$i++)
{
    echo (new Link())->setText("$i")->setAttr('href', "/$i.php")->show() . ' ';
}