<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 02.09.2020
 * Time: 21:33
 */

class Date
{
    private $year;
    private $month;
    private $day;
    public function __construct($date = null)
    {
        if ($date === null)
        {
            $date = date('Y-m-d', time());
        }
        $arr = explode('-', $date);
        $this->year = $arr[0];
        $this->month = $arr[1];
        $this->day = $arr[2];
    }
    public function getDay()
    {
        return $this->day;
    }
    public function getMonth($lang = null)
    {
        $arrRu = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
        $arrEn = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        if (strtolower($lang) === 'ru')
        {
            return $arrRu[$this->month-1];
        }
        if (strtolower($lang) === 'en')
        {
            return $arrEn[$this->month-1];
        }
        return $this->month;
    }
    public function getYear()
    {
        return $this->year;
    }
    public function getWeekDay($lang = null)
    {
        $arrRu = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
        $arrEn = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Satarday'];
        if (strtolower($lang) === 'ru')
        {
            return $arrRu[date('w', mktime(0, 0, 0, $this->month, $this->day, $this->year))];
        }
        if (strtolower($lang) === 'en')
        {
            return $arrEn[date('w', mktime(0, 0, 0, $this->month, $this->day, $this->year))];
        }
        return date('w', mktime(0, 0, 0, $this->month, $this->day, $this->year));
    }
    private function modDate($dif)
    {
        $date = date_create($this->day . '-' . $this->month . '-' . $this->year);
        date_modify($date, $dif);
        $arr = explode('-', date_format($date, 'Y-m-d'));
        $this->year = $arr[0];
        $this->month = $arr[1];
        $this->day = $arr[2];
    }
    public function addDay($num)
    {
        $this->modDate($num . ' day');
    }
    public function subDay($num)
    {
        $this->modDate('-' . $num . ' day');
    }
    public function addMonth($num)
    {
        $this->modDate($num . ' month');
    }
    public function subMonth($num)
    {
        $this->modDate('-' . $num . ' month');
    }
    public function addYear($num)
    {
        $this->modDate($num . ' year');
    }
    public function subYear($num)
    {
        $this->modDate('-' . $num . ' year');
    }
    public function format($str)
    {
        return date($str, mktime(0, 0, 0, $this->month, $this->day, $this->year));
    }
    public function __toString()
    {
        return $this->year . '-' . $this->month . '-' . $this->day;
    }
}