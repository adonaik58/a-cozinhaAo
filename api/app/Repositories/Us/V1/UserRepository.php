<?php

namespace App\Repositories\Us\V1;

use App\Models\Us\V1\User;

class UserRepository {

    private $model;
    public function __construct(User $_model) {
        $this->model = $_model;
    }

    public function create($data) {
        return $this->model->create($data);
    }

    public function login(array $data) {
    }
}
