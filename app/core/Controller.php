<?php
class Controller
{
  public function model($model)
  {
    require_once '../app/models/'.$model.'.php';
    return new $model;
  }

  public function view($file_name, $data=[])
  {
    require_once '../app/views/'.$file_name.'.php';
  }

  public function redirect($url){
    header("Location: $url"); 
  }

}
