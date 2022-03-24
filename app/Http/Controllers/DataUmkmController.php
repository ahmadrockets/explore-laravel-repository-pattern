<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DataUmkmService;

class DataUmkmController extends Controller
{
    private $umkmService;
    public function __construct(DataUmkmService $umkmService)
    {
        $this->umkmService = $umkmService;
    }
    public function index()
    {
        $result['status'] = 200;
        try {
            $result['data'] = $this->umkmService->getAllDataUMKM(10);
        } catch (\Exception $e) {
            $result = [
                'status'=>500,
                'error'=>$e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
