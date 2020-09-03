<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 03.09.2020
 * Time: 19:57
 */

class Interval
{
    private $date1;
    private $date2;
    public function __construct(Date $date1, Date $date2)
    {
        $this->date1 = (string) $date1;
        $this->date2 = (string) $date2;
    }
    private function diff($format)
    {
        $origin = new DateTime($this->date1);
        $target = new DateTime($this->date2);
        $interval = $origin->diff($target);
        return $interval->format($format);
    }
    public function toDays($full = true)
    {
        if ($full){
            $days = (int) $this->diff('%a');
        } else {
            $days = (int) $this->diff('%d');
        }
        if ($days == 1){
            return $days . ' день';
        } elseif ($days >= 2 and $days <= 4) {
            return $days . ' дня';
        } else {
            return $days . ' дней';
        }
    }
    public function toMonths($full = true)
    {
        $months = (int) $this->diff('%m');
        $years = (int) $this->diff('%y');
        if ($years > 0 and $full){
            $fullMonths = $years * 12;
        } else {
            $fullMonths = 1;
        }
        if ($months == 1){
            return $months * $fullMonths . ' месяц';
        } elseif ($months >= 2 and $months <= 4) {
            return $months * $fullMonths. ' месяца';
        } else {
            return $months * $fullMonths. ' месяцев';
        }
    }
    public function toYears()
    {
        $years = (int) $this->diff('%y');
        if ($years == 1) {
            return $years . ' год';
        } elseif ($years >= 2 and $years <= 4) {
            return $years . ' года';
        } else {
            return $years . ' лет';
        }
    }
    public function __toString()
    {
        $str = $this->toYears() . ' ' . $this->toMonths(false) . ' ' . $this->toDays(false);
        return $str;
    }
}