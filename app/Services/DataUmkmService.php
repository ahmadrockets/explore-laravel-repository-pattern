<?php

namespace App\Services;
use App\Repositories\DataUmkmRepositoryInterface;

class DataUmkmService {
    private $umkmRepo;
    public function __construct(DataUmkmRepositoryInterface $umkmRepo)
    {
        $this->umkmRepo = $umkmRepo;
    }
    public function getAllDataUmkm()
    {
        return $this->umkmRepo->getAllDataUMKM(10);
    }
}