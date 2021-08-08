<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadsModel extends Model
{
    public function insert_upload($data)
    {
        return $this->db->table('tbl_uploads')->insert($data);
    }

    public function insert_galeries($data)
    {
        return $this->db->table('tbl_galeries')->insert($data);
    }
}
