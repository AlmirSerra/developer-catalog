<?php

namespace App\Services;

use App\Exceptions\ApiException;
use App\Models\Level;
use App\Repositories\LevelRepository;
use App\Validators\LevelValidator;

class LevelService
{
    protected $levelRepository;
    protected $levelValidator;

    public function __construct(LevelRepository $levelRepository, LevelValidator $levelValidator)
    {
        $this->levelRepository = $levelRepository;
        $this->levelValidator = $levelValidator;
    }

    public function getAll()
    {
        return $this->levelRepository->getAll();
    }

    public function getById($id)
    {
        $level = $this->levelRepository->getById($id);

        if (!$level) {
            throw new ApiException('Nível não encontrado', 404);
        }

        return $level;
    }

    public function create(array $data)
    {
        $this->levelValidator->validate($data);

        return $this->levelRepository->create($data);
    }

    public function update($id, array $data)
    {
        $this->levelValidator->validate($data);

        $level = $this->getById($id);

        return $this->levelRepository->update($level, $data);
    }

    public function delete($id)
    {
        $level = $this->getById($id);

        return $this->levelRepository->delete($level);
    }
}
