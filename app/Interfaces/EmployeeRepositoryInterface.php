<?php

namespace App\Interfaces;

use App\Data\EmployeeData;

interface EmployeeRepositoryInterface
{
    public function getAllEmployees(): array;

    public function getEmployeesById(int $id): array;

    public function updateEmployee(EmployeeData $user): bool;

    public function createEmployee(EmployeeData $user, string $typeOfEmployee): bool;

    public function deleteEmployee(int $id, string $typeOfEmployee): bool;
}
