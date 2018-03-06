<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Sport;
use App\Entity\User;
use App\Entity\Event;
use App\Entity\Place;
use App\Entity\Ticket;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="events")
     * @ORM\JoinColumn(nullable=true)
     */
     private $owner;

    /**
      * @Assert\NotBlank()
      * @Assert\DateTime()
      * @ORM\Column(type="datetime")
      */
    private $date;

    /**
      * @Assert\NotBlank()
      * @Assert\DateTime()
      * @ORM\Column(type="datetime")
      */
      private $created;



    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Place", inversedBy="events")
     * @ORM\JoinColumn(nullable=true)
     */
     private $place;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sport", inversedBy="events")
     * @ORM\JoinColumn(nullable=true)
     */
     private $sport;

     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ticket", mappedBy="event")
     */
    private $tickets;



     public function __construct()
      {
        $this->setCreated(new \DateTime('now'));
        $this->tickets = new ArrayCollection();
      }

    /**
     * @return Collection|Ticket[]
     */
     public function getTickets()
     {
          return $this->tickets;
     }

    public function getOwner(): User
    {
        return $this->owner;
    }

    public function setOwner(User $owner)
    {
        $this->owner = $owner;
    }

    public function getSport(): ?Sport
    {
      return $this->sport;
    }

    public function setSport(Sport $sport)
    {
        $this->sport = $sport;
    }

    public function getPlace(): ?Place
    {
      return $this->place;
    }

    public function setPlace(Place $place)
    {
        $this->place = $place;
    }


    public function getId()
    {
        return $this->id;
    }




    public function getDate()
    {
        return $this->date;
    }


    public function setDate($date)
    {
        $this->date = $date;


    }



    public function getCreated()
    {
        return $this->created;
    }


    public function setCreated($created)
    {
        $this->created = $created;
    }



    

}
