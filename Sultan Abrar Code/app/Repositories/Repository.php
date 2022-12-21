<?php


namespace App\Repositories;

use App\Repositories\Interfaces\RepositoryInterface;

class Repository implements RepositoryInterface
{
    public function all()
    {
        return $this->model::all();
    }

    public function allBy($where = [])
    {
        return $this->model::where($where)->get();
    }

    public function create(array $data)
    {
        $model = $this->model::create($data);

        return $model;
    }

    public function find($id)
    {
        return $this->model::where('id', $id)->first();
    }

    public function findBy($where = [])
    {
        return $this->model::where($where)->first();
    }

    public function update($id, array $data)
    {
        $this->model::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        $this->model::where('id', $id)->delete();
    }
}
