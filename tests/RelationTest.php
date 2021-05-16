<?php
/**
 * @author yuriy.yakubskiy@rocketroute.com
 *
 */

namespace App\Tests;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\Video;
use App\Repository\VideoRepository;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RelationTest extends KernelTestCase
{
    public function purgeData()
    {
        $purger = new ORMPurger($this->em);
        $purger->purge();        
    }
    
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function setUp(): void
    {
        static::bootKernel();
        $this->em = static::$kernel->getContainer()->get('doctrine.orm.entity_manager');
    }

    /**
     * @test
     */
    public function can_create_a_video_with_comments()
    {
        $this->purgeData();
        
        $videoTitle = "Once upon a time in hollywood";
        $video = new Video();
        $video->setVideoPath("/storage/video/some.mp4");
        $video->setTitle($videoTitle);

        $comment = new Comment();
        $comment->setCommentText("Mmm. Like this movie!!!");

        $comment1 = new Comment();
        $comment1->setCommentText("What a crap!! How to unsee it, please?!!");

        $comment2 = new Comment();
        $comment2->setCommentText("Wow, My favorite movie so far!");

        $video->addComment($comment);
        $video->addComment($comment1);
        $video->addComment($comment2);

        $this->em->persist($comment);
        $this->em->persist($comment1);
        $this->em->persist($comment2);
        $this->em->persist($video);
        $this->em->flush();
        
        $this->em->clear();
        
        /* @var $video Video */
        $video = $this->em->getRepository(Video::class)->findOneBy([
            'title' => $videoTitle,
        ]);

        \dump($video);
        
        $comments = $video->getComments();

        \dump($video);
        $collectionItem = $comments->next();
        
//        $collectionItem = $comments->get(1);
            
        if ($collectionItem) {
            $collectionItem->getCommentText();
        }

        \dump($video);
    }    

    /**
     * @test
     */
    public function can_create_a_post_with_comments()
    {
        $post = new Post();
        $post->setPostText("Check this out. This is really interesting!!! Amazing!");
        $post->setTitle("My first post");
        
        $comment = new Comment();
        $comment->setCommentText("Yes, I like it!!! Post more of that, please.");

        $comment1 = new Comment();
        $comment1->setCommentText("This is crap!! Don't do it again!");

        $comment2 = new Comment();
        $comment2->setCommentText("Ha ha ha. Dude"); 
        
        $post->addComment($comment);
        $post->addComment($comment1);
        $post->addComment($comment2);

        $this->em->persist($comment);
        $this->em->persist($comment1);
        $this->em->persist($comment2);
        $this->em->persist($post);
        $this->em->flush();
    }
}