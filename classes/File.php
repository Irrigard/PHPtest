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
    public function __construct ($filePath)
    {
        $this->filePath = $filePath;
    }
    public function getPath()
    {
        return $this->filePath;
    }
    public function getDir()
    {
        if (preg_match('#(.+/)(.+)(\..+)#', $this->filePath, $matches))
        {
            return $matches[1];
        } else {
            return '';
        }
    }
    public function getName()
    {
        if (preg_match('#(.+/)?(.+)(\..+)#', $this->filePath, $matches))
        {
            return $matches[2];
        } else {
            return '';
        }
    }
    public function getExt()
    {
        if (preg_match('#(.+/)?(.+)(\..+)#', $this->filePath, $matches))
        {
            return $matches[3];
        } else {
            return '';
        }
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
        return file_get_contents($this->filePath);
    }
    public function setText($text)
    {
        if (file_put_contents($this->filePath, $text) !== false)
        {
            return true;
        } else {
            return false;
        }
    }
    public function appendText($text)
    {
        $curent = $this->getText();
        $curent .= $text;
        if ($this->setText($curent) === true){
            return true;
        } else {
            return false;
        }
    }
    public function copy($copyPath)
    {
        if ($copyPath === $this->filePath)
        {
            return false;
        }
        if (file_put_contents($copyPath, $this->getText()))
        {
            return true;
        } else {
            return false;
        }
    }
    public function delete()
    {
        return unlink($this->filePath);
    }
    public function rename($newName)
    {
        preg_match('#(.+/)?(.+)(\..+)#', $this->filePath, $matches);
        $fullName = $matches[1] . $newName;
        return rename($this->filePath, $fullName);
    }
    public function replace($newPath)
    {
        preg_match('#(.+/)?(.+)(\..+)#', $newPath, $matches);
        if (isset($matches[1])){
            $path = $matches[1];
        } else {
            $path = '';
        }
        if ($this->copy($path . $this->getName() . $this->getExt()))
        {
            $this->delete();
            return true;
        } else {
            return false;
        }

    }
}