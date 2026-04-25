<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class UserService
{
    public function __construct(
        private UserRepository $userRepository)
    {

    }

    public function create(User $user): User
    {
        return $this->userRepository->create($user);
    }

    public function findOneById(int $id): User
    {
        return $this->userRepository->findOneById($id);
    }
    public function findAll():array
    {
        return $this->userRepository->findAll();
    }

}
