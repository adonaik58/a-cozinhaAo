<?php

namespace App\Services\Us\V1;

use App\Repositories\Us\V1\UserRepository;

class UserService {
    private $repository;

    public function __construct(UserRepository $repository) {
        $this->repository = $repository;
    }

    public function create($data) {
        return $this->repository->create($data);
    }
}
