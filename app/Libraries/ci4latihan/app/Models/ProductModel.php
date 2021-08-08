<?php

namespace App\Models;

use CodeIgniter\Model;


class ProductModel extends Model
{
    public function get_product()
    {
        return $this->db->table('product')->get()->getResultArray();
    }

    public function get_penjualan()
    {
        return $this->db->table('tbl_penjualan')->get()->getResultArray();
    }

    public function insert_product($data)
    {
        return $this->db->table('product')->insert($data);
    }

    public function insert_penjualan($data)
    {
        return $this->db->table('tbl_penjualan')->insert($data);
    }

    public function edit_product($product_id)
    {
        return $this->db->table('product')->where('product_id', $product_id)->get()->getRowArray();
    }

    public function update_product($data, $product_id)
    {
        return $this->db->table('product')->update($data, array('product_id' => $product_id));
    }

    public function delete_product($product_id)
    {
        return $this->db->table('product')->delete(array('product_id' => $product_id));
    }
}
