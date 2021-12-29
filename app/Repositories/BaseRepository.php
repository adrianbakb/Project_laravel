<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository{

  protected $model;

  public function getAll($columns = array('*')){
    return $this->model->get($columns);
  }

  public function create($date){
    return $this->model->create($date);
  }

  public function update($date,$id){
    return $this->model->where("id",'=',$id)->update($date);
  }

  public function delete($id){
    return $this->model->destroy($id);
  }

  public function find($id){
    return $this->model->find($id);
  }

}
