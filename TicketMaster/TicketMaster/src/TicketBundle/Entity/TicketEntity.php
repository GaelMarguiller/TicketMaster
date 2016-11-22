<?php

namespace TicketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketEntity
 *
 * @ORM\Table(name="ticket_entity")
 * @ORM\Entity(repositoryClass="TicketBundle\Repository\TicketEntityRepository")
 */
class TicketEntity
{
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
     * @ORM\Column(name="Title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="Body", type="text")
     */
    private $body;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CreatedTicket", type="datetime")
     */
    private $createdTicket;


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
     * Set title
     *
     * @param string $title
     *
     * @return TicketEntity
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return TicketEntity
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set createdTicket
     *
     * @param \DateTime $createdTicket
     *
     * @return TicketEntity
     */
    public function setCreatedTicket($createdTicket)
    {
        $this->createdTicket = $createdTicket;

        return $this;
    }

    /**
     * Get createdTicket
     *
     * @return \DateTime
     */
    public function getCreatedTicket()
    {
        return $this->createdTicket;
    }
}

