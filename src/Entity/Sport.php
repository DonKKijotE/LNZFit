<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SportRepository")
 */
class Sport
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
     private $name;

    /**
     * @ORM\Column(type="integer")
     */
     private $minSlots;

     /**
      * @ORM\Column(type="integer")
      */
      private $maxSlots;

      /**
       * @ORM\OneToMany(targetEntity="App\Entity\Event", mappedBy="sport")
       */
       private $events;

       public function __construct()
        {
          $this->events = new ArrayCollection();
        }

    /**
     * @return Collection|Event[]
     */
      public function getEvents()
      {
          return $this->events;
      }



    public function getId()
    {
        return $this->id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;


    }


    public function getMaxSlots()
    {
        return $this->maxSlots;
    }


    public function setMaxSlots($max_slots)
    {
        $this->maxSlots = $max_slots;


    }

    public function getMinSlots()
    {
        return $this->minSlots;
    }


    public function setMinSlots($min_slots)
    {
        $this->minSlots = $min_slots;


    }
}
