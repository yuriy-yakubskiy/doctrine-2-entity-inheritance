<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post extends AbstractContent
{
    /**
     * @ORM\Column(type="text")
     */
    private $postText;

    /**
     * @return mixed
     */
    public function getPostText()
    {
        return $this->postText;
    }

    /**
     * @param mixed $postText
     */
    public function setPostText($postText): void
    {
        $this->postText = $postText;
    }
}
