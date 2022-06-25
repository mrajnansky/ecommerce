<?php

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function get($id) : ?Model;
    public function index();
    public function save(Model $item) : Model;
    public function delete(Model $item);
}
