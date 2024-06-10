<?php

abstract class AbstractEntity 
{
  protected int $id = -1;

  public function __construct(array $dat = [])
  {
    if (!empty($data)) {
      $this->hydrate($data);
    }
  }

  protected function hydrate(array $data) : void 
  {
    foreach ($data as $key => $value) {
      $methid = 'set' . str_replace('_', '', ucwords($key, '_'));
      if (method_exists($this, $method)) {
        if ($value !== null) {
          $this->$method($value);
        }
      }
    }
  }

  public function setId(int $id) : void 
  {
    $this->id = $id;
  }

  public function getId() : int 
  {
    return $this->id;
  }
}