<?php 


namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
    protected $table = 'pengumuman';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['judul', 'pengumuman'];

}
