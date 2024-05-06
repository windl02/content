<?php

class Type
{
    public static function getType()
    {
        $db = new Database;
        return $db->getData('type');
    }
}

?>