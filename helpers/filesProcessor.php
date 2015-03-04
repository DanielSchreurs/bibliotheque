<?php

/**
 *
 */
class FilesProcessor
{
    function __construct()
    {
        ;
    }

    public function save($file)
    {
        $nameParts = explode('.', $file['name']);
        $ext = end($nameParts);
        $newName = time() . '.' . $ext;
        move_uploaded_file($file['tmp_name'], IMAGES_DIR . 'books_covers/' . $newName);
        return $newName;
    }
}