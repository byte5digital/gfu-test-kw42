<?php

namespace App\Services;

use App\Data\EmployeeData;
use App\Interfaces\EmployeeRepositoryInterface;
use App\Models\TeamMember;
use App\Models\User;

class EmployeeRepositoryService implements EmployeeRepositoryInterface
{

    public function getAllEmployees(): array
    {
        $allEmployees = [];
        $allUser = User::all();
        $teamMember = TeamMember::all();

        foreach ($allUser as $user) {
            $allEmployees[] = EmployeeData::fromModel($user);
        }

        foreach ($teamMember as $user) {
            $allEmployees[] = EmployeeData::fromModel($user);
        }
        return $allEmployees;
    }

    public function getEmployeesById(int $id): array
    {
        // TODO: Implement getEmployeesById() method.
    }

    public function updateEmployee(EmployeeData $user): bool
    {
        // TODO: Implement updateEmployee() method.
    }

    public function createEmployee(EmployeeData $user, string $typeOfEmployee): bool
    {
        // TODO: Implement createEmployee() method.
    }

    public function deleteEmployee(int $id, string $typeOfEmployee): bool
    {
        // TODO: Implement deleteEmployee() method.
    }
}
