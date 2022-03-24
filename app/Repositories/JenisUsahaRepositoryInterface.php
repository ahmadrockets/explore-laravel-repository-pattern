<?php

namespace App\Repositories;

interface JenisUsahaRepositoryInterface 
{
  public function getAllData();
  public function findById($id);
  public function saveData($params);
  public function updateData($id, $params);
  public function deleteData($id);
}