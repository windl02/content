<?php

class Lop
{
    public static function getLop() {
        $db = new Database;
        return $db->getData('tbl_lop');
    }
}

?>