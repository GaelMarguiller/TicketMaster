<?php

namespace CommentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentEntity
 *
 * @ORM\Table(name="comment_entity")
 * @ORM\Entity(repositoryClass="CommentBundle\Repository\CommentEntityRepository")
 */
class CommentEntity
{


    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="comment")
     * @ORM\JoinColumn(name="username", referencedColumnName="id")
     */

    private $user;



    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Comment", type="text")
     */
    private $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="AddedComment", type="datetime")
     */
    private $addedComment;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return CommentEntity
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set addedComment
     *
     * @param \DateTime $addedComment
     *
     * @return CommentEntity
     */
    public function setAddedComment($addedComment)
    {
        $this->addedComment = $addedComment;

        return $this;
    }

    /**
     * Get addedComment
     *
     * @return \DateTime
     */
    public function getAddedComment()
    {
        return $this->addedComment;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return CommentEntity
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
