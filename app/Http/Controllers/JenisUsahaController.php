<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JenisUsahaService;

class JenisUsahaController extends Controller
{
    private $jenisUsahaService;

    public function __construct(JenisUsahaService $jenisUsahaService)
    {
        $this->jenisUsahaService = $jenisUsahaService;
    }
    public function index()
    {
        $result['status'] = 200;
        try {
            $result['data'] = $this->jenisUsahaService->getAllData();
        } catch (\Exception $err) {
            $result = [
                'status'=>500,
                'error'=>$err->getMessage(),
            ];
        }

        return response()->json($result, $result['status']);
    }
    public function show($id)
    {
        $result['status'] = 200;
        try {
            $result['data'] = $this->jenisUsahaService->getDetailData($id);
        } catch (\Exception $err) {
            $result = [
                'status' => 500,
                'error' => $err->getMessage(),
            ];
        }

        return response()->json($result, $result['status']);
    }
    public function save(Request $req)
    {
        $requests = $req->json()->all();

        $result['status'] = 200;
        try {
            $result['data'] = $this->jenisUsahaService->saveData($requests);
        } catch (\Exception $err) {
            $result = [
                'status' => 500,
                'error' => $err->getMessage(),
            ];
        }

        return response()->json($result, $result['status']);
    }
    public function update($id, Request $req)
    {
        $requests = $req->json()->all();

        $result['status'] = 200;
        try {
            $result['data'] = $this->jenisUsahaService->updateData($id, $requests);
        } catch (\Exception $err) {
            $result = [
                'status' => 500,
                'error' => $err->getMessage(),
            ];
        }

        return response()->json($result, $result['status']);
    }
    public function delete($id)
    {
        $result['status'] = 200;
        try {
            $result['data'] = $this->jenisUsahaService->deleteData($id);
        } catch (\Exception $err) {
            $result = [
                'status' => 500,
                'error' => $err->getMessage(),
            ];
        }

        return response()->json($result, $result['status']);
    }
}
