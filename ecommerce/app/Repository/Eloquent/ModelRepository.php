<?php

namespace App\Repository\Eloquent;

use App\Repository\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ModelRepository implements RepositoryInterface
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function get($id) : ?Model
    {
        return $this->model::find($id);
    }

    public function save($item) : Model
    {
        $item->save();
        return $item;
    }

    public function index()
    {
        return $this->model::all();
    }

    public function delete($item): bool
    {
        if(!$item->delete()){
            throw new \Exception("can't delete " . get_class($item));
        }
        return true;
    }
}