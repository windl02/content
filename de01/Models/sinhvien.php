<?php

class Sinhvien
{
    public static function getSinhvien($condition = null)
    {
        $db = new Database;
        if ($condition == null)
            return $db->getData('tbl_sinhvien, tbl_lop',"tbl_sinhvien.ma_lop = tbl_lop.ma_lop");
        else
            return $db->getData('tbl_sinhvien', $condition);
    }

    public static function getSinhvienByID($id)
    {
        $db = new Database;
        return $db->getDataByID('tbl_sinhvien', $id);
    }

    public static function addSinhvien($data)
    {
        $db = new Database;
        $db->addData('tbl_sinhvien', $data);
    }

    public static function editSinhvien($id, $data)
    {
        $table = "tbl_sinhvien";
        $condition = "`ma_sv` = $id";

        $db = new Database;
        $db->editData($table, $data, $condition);
    }

}

?>