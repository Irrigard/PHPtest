<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 03.09.2020
 * Time: 22:30
 */

class File implements iFile
{
    private $filePath;
    public function __constructor($filePath)
    {
        $this->filePath = $filePath;
    }
    public function getPath()
    {
        return $this->filePath;
    }
    public function getDir()
    {
        return true;// TODO: Implement getDir() method.
    }
    public function getName()
    {
        return true;// TODO: Implement getName() method.
    }
    public function getExt()
    {
        return true;// TODO: Implement getExt() method.
    }
    public function getSize()
    {
        if (file_exists($this->filePath))
        {
            return filesize($this->filePath);
        }
    }
    public function getText()
    {
        return true;// TODO: Implement getText() method.
    }
    public function setText($text)
    {
        return true;// TODO: Implement setText() method.
    }
    public function appendText($text)
    {
        return true;// TODO: Implement appendText() method.
    }
    public function copy($copyPath)
    {
        return true;// TODO: Implement copy() method.
    }
    public function delete()
    {
        return true;// TODO: Implement delete() method.
    }
    public function rename($newName)
    {
        return true;// TODO: Implement rename() method.
    }
    public function replace($newPath)
    {
        return true;// TODO: Implement replace() method.
    }
}