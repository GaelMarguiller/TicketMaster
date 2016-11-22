<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{

    /**
     * @ORM\OneToMany(targetEntity="TicketBundle\Entity\TicketEntity", mappedBy="user")
     */

    private $ticket;


    /**
     * @ORM\OneToMany(targetEntity="CommentBundle\Entity\CommentEntity", mappedBy="user")
     */

    private $comment;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Add ticket
     *
     * @param \TicketBundle\Entity\TicketEntity $ticket
     *
     * @return User
     */
    public function addTicket(\TicketBundle\Entity\TicketEntity $ticket)
    {
        $this->ticket[] = $ticket;

        return $this;
    }

    /**
     * Remove ticket
     *
     * @param \TicketBundle\Entity\TicketEntity $ticket
     */
    public function removeTicket(\TicketBundle\Entity\TicketEntity $ticket)
    {
        $this->ticket->removeElement($ticket);
    }

    /**
     * Get ticket
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * Add comment
     *
     * @param \CommentBundle\Entity\CommentEntity $comment
     *
     * @return User
     */
    public function addComment(\CommentBundle\Entity\CommentEntity $comment)
    {
        $this->comment[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \CommentBundle\Entity\CommentEntity $comment
     */
    public function removeComment(\CommentBundle\Entity\CommentEntity $comment)
    {
        $this->comment->removeElement($comment);
    }

    /**
     * Get comment
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComment()
    {
        return $this->comment;
    }
}
