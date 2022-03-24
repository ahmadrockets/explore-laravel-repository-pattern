<?php 

namespace App\Services;

use App\Repositories\JenisUsahaRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class JenisUsahaService
{
    private $jenisUsahaRepo;
    public function __construct(JenisUsahaRepositoryInterface $jenisUsahaRepo)
    {
        $this->jenisUsahaRepo = $jenisUsahaRepo;
    }

    public function getAllData()
    {
        return $this->jenisUsahaRepo->getAllData();
    }
    public function getDetailData($id)
    {
        return $this->jenisUsahaRepo->findById($id);
    }
    public function saveData($requests)
    {
        $rules = [
            'nama'=>'required'
        ];
        $validator = Validator::make($requests,$rules);

        if ($validator->fails()) {
            throw new \Exception(json_encode($validator->errors()->all()));
        } else {
            return $this->jenisUsahaRepo->saveData($requests);
        }
    }
    public function updateData($id, $requests)
    {
        $rules = [
            'nama' => 'required'
        ];
        $validator = Validator::make($requests, $rules);

        if ($validator->fails()) {
            throw new \Exception(json_encode($validator->errors()->all()));
        } else {
            return $this->jenisUsahaRepo->updateData($id, $requests);
        }
    }
    public function deleteData($id)
    {
        return $this->jenisUsahaRepo->deleteData($id);
    }
}