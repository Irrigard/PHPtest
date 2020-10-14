<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 14.10.2020
 * Time: 21:34
 */

class FileManipulator
{
    public function create($filePath, $data = '')
    {
        return file_put_contents($filePath, $data);// создает файл
    }

    public function delete($filePath)
    {
        return unlink($filePath);// удаляет файл
    }

    public function copy($filePath, $copyPath)
    {
        if (file_exists($filePath))
        {
            return file_put_contents($copyPath, file_get_contents($filePath));// копирует файл
        } else {
            return false;
        }
    }

    public function rename($filePath, $newName)// переименовывает файл, вторым параметром принимает новое имя файла (только имя, не путь)
    {
        preg_match('#(.+/)?(.+)(\..+)#', $filePath, $matches);
        $fullName = $matches[1] . $newName;
        return rename($filePath, $fullName);
    }

    public function replace($filePath, $newPath)
    {
        return rename($filePath, $newPath);// перемещает файл
    }

    public function weigh($filePath)
    {
        if (file_exists($filePath))
        {
            return filesize($filePath);// узнает размер файла
        } else {
            return null;
        }
    }
}