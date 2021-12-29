<?php

namespace App\Repositories;

use App\Models\Specialization;

class SpecializationRepository extends BaseRepository{

  public function __construct(Specialization $model){

    $this->model = $model;
  }
  public function getAllSpecializations(){
    return $this->model->select('name')->orderBy('name','asc')->get();
  }

}
