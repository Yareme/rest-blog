<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TestController
{

    public function __construct(private EntityManagerInterface $em, private SerializerInterface $serializer)
    {
    }

    #[Route('/save')]
    public function hello(): JsonResponse
    {

        $user = $this->em->getRepository(User::class)->find(1);
        //dd($user);
        $json= $this->serializer->serialize($user, 'json');
        return new JsonResponse($json,200,[],true);
         /*    $user = new User();
            $user->setLogin('Jankowol');
            $user->setEmail('Jankow12@gmail.com');
            $user->setBirthday(new \DateTime('1990-01-01'));
            $user->setPassword('jankow12345');
            $this->em->persist($user);
            $this->em->flush();*/

    }

    #[Route('/api/posts', name: 'posts_store', methods: ['POST'])]
    public function addPost(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        dd($data);

    }
}
