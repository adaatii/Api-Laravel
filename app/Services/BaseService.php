<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseService
{
    protected ?array $data;

    public function index(): Collection
    {
        return User::get();
    }

    public function show(int $id): Model
    {
        return User::findOrfail($id);
    }

    public function store(): Model
    {
        return User::create($this->data);
    }

    public function update(int $id): Model
    {
        $user = $this->show($id);
        $user->update($this->data);
        return $user->refresh();
    }

    public function destroy(int $id): bool
    {
        $user = $this->show($id);
        return $user->delete();
    }

    public function setData(array $value): self
    {
        $this->data = $value;

        return $this->data;
    }
}
