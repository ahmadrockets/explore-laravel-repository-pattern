<?php 

namespace App\Repositories\Mysql;

use App\Repositories\JenisUsahaRepositoryInterface;
use App\Models\JenisUsaha;

class JenisUsahaRepository implements JenisUsahaRepositoryInterface
{
  private $model;
  public function __construct(JenisUsaha $model)
  {
    $this->model = $model;
  }
  public function getAllData()
  {
    return $this->model::all();
  }
  public function findById($id)
  {
    return $this->model::findOrFail($id);
  }
  public function saveData($params){
    return $this->model::create([
      'nama'=>$params['nama']
    ]);
  }
  public function updateData($id, $params)
  {
    $data = $this->model::find($id);
    $data->nama = $params['nama'];
    $data->save();
    return $data;
  }
  public function deleteData($id)
  {
    $data = $this->model::where('jenis_usaha_id', '=', $id)->firstOrFail();
    return $data->delete();
  }
}