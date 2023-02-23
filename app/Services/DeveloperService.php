<?php

namespace App\Services;

use App\Exceptions\ApiException;
use App\Models\Developer;
use App\Repositories\DeveloperRepository;
use App\Validators\DeveloperValidator;

class DeveloperService
{
    protected $developerRepository;
    protected $developerValidator;

    public function __construct(DeveloperRepository $developerRepository, DeveloperValidator $developerValidator)
    {
        $this->developerRepository = $developerRepository;
        $this->developerValidator = $developerValidator;
    }

    public function getAll()
    {
        return $this->developerRepository->getAll();
    }

    public function getById($id)
    {
        $developer = $this->developerRepository->getById($id);

        if (!$developer) {
            throw new ApiException('Desenvolvedor não encontrado', 404);
        }

        return $developer;
    }

    public function create(array $data)
    {
        $this->developerValidator->validate($data);

        return $this->developerRepository->create($data);
    }

    public function update($id, array $data)
    {
        $this->developerValidator->validate($data);

        $developer = $this->getById($id);

        return $this->developerRepository->update($developer, $data);
    }

    public function delete($id)
    {
        $developer = $this->getById($id);

        return $this->developerRepository->delete($developer);
    }
}
