<?php

class Product
{
    public static function getProduct($condition = null)
    {
        $db = new Database;
        if ($condition == null)
            return $db->getData('product, type',"product.ptype_id = type.ptype_id");
        else
            return $db->getData('product', $condition);
    }

    public static function getProductByID($id)
    {
        $db = new Database;
        return $db->getDataByID('product', $id);
    }

    public static function addProduct($data)
    {
        $db = new Database;
        $db->addData('product', $data);
    }

    public static function editProduct($id, $data)
    {
        $table = "product";
        $condition = "`id` = $id";

        $db = new Database;
        $db->editData($table, $data, $condition);
    }

}

?>