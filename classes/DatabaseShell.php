<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 15.10.2020
 * Time: 22:04
 */

class DatabaseShell
{
    private $link;

    public function __construct($host, $user, $password, $database)
    {
        $this->link = mysqli_connect($host, $user, $password, $database);
        mysqli_query($this->link, "SET NAMES 'utf8'"); // устанавливаем кодировку
    }

    public function save($table, $data)// сохраняет запись в базу, вернет id если успешно, 0 - если не генерируется UTO_INCREMENT value, false - нет соединения
    {
        $query = "INSERT INTO $table SET";
        foreach ($data as $key=>$elem)
        {
            $query .= " $key='$elem'";
        }
        mysqli_query($this->link, $query);
        return mysqli_insert_id($this->link);
    }

    public function del($table, $id)// удаляет запись по ее id
    {
        $query = "DELETE FROM $table WHERE id=$id";
        return mysqli_query($this->link, $query) or die(mysqli_error($this->link));
    }

    public function delAll($table, $ids)// удаляет записи по их id
    {
        $query = "DELETE FROM $table WHERE";
        for ($i=0;$i<count($ids);$i++)
        {
            if ($i>0)
            {
                $query .= " OR id='$ids[$i]'";
            } else {
                $query .= " id='$ids[$i]'";
            }
        }
        return mysqli_query($this->link, $query) or die(mysqli_error($this->link));
    }

    public function get($table, $id)// получает одну запись по ее id
    {
        $query = "SELECT * FROM $table WHERE id ='$id'";
        $result = mysqli_query($this->link, $query) or die(mysqli_error($this->link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        return $data;
    }

    public function getAll($table, $ids)// получает массив записей по их id
    {
        $query = "SELECT * FROM $table WHERE";
        for ($i=0;$i<count($ids);$i++)
        {
            if ($i>0)
            {
                $query .= " OR id='$ids[$i]'";
            } else {
                $query .= " id='$ids[$i]'";
            }
        }
        $result = mysqli_query($this->link, $query) or die(mysqli_error($this->link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        return $data;
    }

    public function selectAll($table, $condition)// получает массив записей по условию
    {
        $query = "SELECT * FROM $table WHERE $condition";
        $result = mysqli_query($this->link, $query) or die(mysqli_error($this->link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        return $data;
    }
}