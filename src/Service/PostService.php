<?php

namespace App\Service;

use App\Entity\Post;
use App\Repository\PostRepository;

class PostService
{
public function __construct(private PostRepository $postRepository)
{
}

public function findOneById(int $id): Post{
    return $this->postRepository->findOneById($id);
}

public function findAll():array{
    return $this->postRepository->findAll();
}

}
