<?php


use App\DTO\UpdateSupportDTO;
use App\DTO\CreateSupportDTO;
use App\Repositories\SupportRepositoryInterface;


class SupportEloquentORM implements SupportRepositoryInterface
{

    public function getAll(string $filter = null): array
    {
        // Example return value, replace with actual implementation
        return [];
    }

    public function findOne(string $id): stdClass | null
    {
        return null;
    }

    public function delete(string $id): void
    {

    }

    public function new(CreateSupportDTO $dto): stdClass
    {
        $support = new \stdClass();
        // Populate $support with data from $dto
        return $support;
    }

    public function update(UpdateSupportDTO $dto): stdClass | null
    {
        return null;
    }
}