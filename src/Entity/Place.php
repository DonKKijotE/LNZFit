<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlaceRepository")
 */
class Place
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
       * @Assert\NotBlank()
       * @Assert\DateTime()
       * @ORM\Column(type="datetime")
       */
       private $created;

       /**
        * @ORM\Column(type="string", length=500)
        */
        private $maplink;



     /**
      * @ORM\OneToMany(targetEntity="App\Entity\Event", mappedBy="place")
      */
      private $events;

      /**
       * @ORM\Column(type="array", nullable=true)
       */
       private $admin = array();

       /**
        * @ORM\Column(type="string", length=50)
        */
        private $telephone;

        /**
         * @ORM\Column(type="string", length=50)
         */
         private $email;

         /**
          * @ORM\Column(type="string", length=100)
          */
          private $facebook;

          /**
           * @ORM\Column(type="string", length=50)
           */
           private $whatsapp;


      public function __construct()
       {
         $this->events = new ArrayCollection();
         $this->setCreated(new \DateTime('now'));
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

      public function getCreated()
      {
          return $this->created;
      }


      public function setCreated($created)
      {
          $this->created = $created;
      }

      public function getMaplink()
      {
          return $this->maplink;
      }


      public function setMaplink($maplink)
      {
          $this->maplink = $maplink;

          return $this;
      }

      public function getAdmin()
      {
          return $this->admin;
      }


      public function setAdmin($admin)
      {
          $this->admin = $admin;

      }


    public function getTelephone()
    {
        return $this->telephone;
    }


    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getFacebook()
    {
        return $this->facebook;
    }


    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }


    public function getWhatsapp()
    {
        return $this->whatsapp;
    }


    public function setWhatsapp($whatsapp)
    {
        $this->whatsapp = $whatsapp;

        return $this;
    }

}
