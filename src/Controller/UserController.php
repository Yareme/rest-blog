<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Post;
use App\Entity\Tag;
use App\Service\PostService;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class UserController extends AbstractController
{
    public function __construct(
        private UserService         $userService,
        private SerializerInterface $serializer
    )
    {
    }

    #[Route('/api/user/{id}', name: 'user_show', methods: ['GET'])]
    public function getOneUser($id): JsonResponse
    {
        $user = $this->userService->findOneById($id);
        $data = $this->serializer->serialize($user, 'json', ['groups' => ['user:item']]);
        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/api/users', name: 'users_show', methods: ['GET'])]
    public function getAll(): JsonResponse
    {
        $users = $this->userService->findAll();
        $data = $this->serializer->serialize($users, 'json', ['groups' => ['user:list']]);
        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/api/users', name: 'users_add', methods: ['POST'])]
    public function addUser(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $ddd =['item1'=>  1,'item2'=>2,'item3'=>3,'item4'=>4,'item5'=>5];

        return new JsonResponse($ddd, 200);
    }
}
