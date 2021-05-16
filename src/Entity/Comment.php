<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", length=255)
     */
    private $commentText;

    /**
     * @ORM\ManyToOne(targetEntity="AbstractContent", inversedBy="comments")
     */
    private $content;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCommentText()
    {
        return $this->commentText;
    }

    /**
     * @param mixed $commentText
     */
    public function setCommentText($commentText): void
    {
        $this->commentText = $commentText;
    }

    public function getContent(): ?AbstractContent
    {
        return $this->content;
    }

    public function setContent(?AbstractContent $content): self
    {
        $this->content = $content;

        return $this;
    }
}
