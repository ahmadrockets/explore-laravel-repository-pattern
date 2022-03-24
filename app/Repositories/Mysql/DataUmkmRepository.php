<?php 

namespace App\Repositories\Mysql;
use App\Repositories\DataUmkmRepositoryInterface;
use App\Models\DataUMKM;

class DataUmkmRepository implements DataUmkmRepositoryInterface
{
    private $model;
    public function __construct(DataUMKM $model)
    {
        $this->model = $model;
    }

    public function getAllDataUMKM($limit=0)
    {
        $umkm = [];
        if ($limit==0){
            $umkm = $this->model::all()->map(function($umkm){
                return $this->formatDataUMKM($umkm);
            });
        }else{
            $umkm = $this->model::limit($limit)->get()->map(function($umkm){
                return $this->formatDataUMKM($umkm);
            });
        }
        return $umkm;
    }

    public function formatDataUMKM($umkm){
        return [
            'dataumkm_id'=> $umkm->dataumkm_id,
            'nama_usaha' => $umkm->nama_usaha,
            'pemilik' => $umkm->pemilik,
            'thn_mulai' => $umkm->thn_mulai,
            'kelurahan_id' => $umkm->kelurahan_id,
            'jenis_usaha_id' => $umkm->jenis_usaha_id,
            'namaproduk' => $umkm->namaproduk,
            'notelepon' => $umkm->notelepon,
            'koordinat' => $umkm->koordinat,
            'website' => $umkm->website,
            'email' => $umkm->email,
            'instagram' => $umkm->instagram,
            'facebook' => $umkm->facebook,
            'twitter' => $umkm->twitter,
            'keterangan' => $umkm->keterangan,
            'user_id' => $umkm->user_id,
            'statusverifikasi' => $umkm->statusverifikasi,
        ];
    }
}
