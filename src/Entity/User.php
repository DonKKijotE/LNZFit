<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields="email", message="Email already in use")
 * @UniqueEntity(fields="username", message="Username already taken")
 */
class User implements UserInterface
{
      /**
       * @ORM\Id
       * @ORM\GeneratedValue
       * @ORM\Column(type="integer")
       */
       private $id;

      /**
       * @ORM\Column(type="string", length=25, unique=true)
       * @Assert\Length(
       *      min = 2,
       *      max = 20,
       *      minMessage = "Your username must be at least {{ limit }} characters long",
       *      maxMessage = "Your username cannot be longer than {{ limit }} characters"
       * )
       */

       private $username;

      /**
       * @ORM\Column(type="string", length=25)
       * @Assert\Length(
       *      min = 2,
       *      max = 20,
       *      minMessage = "Your first name must be at least {{ limit }} characters long",
       *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
       * )
       */
       private $name;

      /**
       * @ORM\Column(type="string", length=50)
       * @Assert\Length(
       *      min = 2,
       *      max = 20,
       *      minMessage = "Your surname must be at least {{ limit }} characters long",
       *      maxMessage = "Your surname cannot be longer than {{ limit }} characters"
       * )
       */
       private $surname;

       /**
        * @ORM\Column(type="string", length=60, unique=true)
        */
        private $email;

       /**
        * @ORM\Column(type="string", length=64)
        */
        private $password;

       /**
        * @Assert\NotBlank()
        * @Assert\Length(
        *      min = 6,
        *      minMessage = "Your password must be at least {{ limit }} characters long"
        * )
        */
        private $plainPassword;



       /**
        * @ORM\Column(name="is_active", type="boolean")
        */
        private $isActive;

        /**
         * @ORM\Column(type="array", nullable=true)
         */
         private $roles = array();

         /**
           * @Assert\NotBlank()
           * @Assert\DateTime()
           * @ORM\Column(type="datetime")
           */
           private $created;

         /**
          * @ORM\OneToMany(targetEntity="App\Entity\Event", mappedBy="owner")
          */
          private $events;

          /**
           * @ORM\OneToMany(targetEntity="App\Entity\Ticket", mappedBy="owner")
           */
           private $tickets;

        public function __construct()
        {
            $this->isActive = true;
            $roles = array('ROLE_USER');
            $this->setRoles($roles);
            $this->events = new ArrayCollection();
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


        public function getUsername()
        {
            return $this->username;
        }


        public function setUsername($username)
        {
            $this->username = $username;
        }


        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getSurname()
        {
            return $this->surname;
        }

        public function setSurname($surname)
        {
            $this->surname = $surname;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function getRoles()
        {
            $tmpRoles = $this->roles;
            if (in_array('ROLE_USER', $tmpRoles) === false) {
                $tmpRoles[] = 'ROLE_USER';
            }
            return $tmpRoles;
        }

        public function setRoles($roles)
        {
            $this->roles = $roles;
        }

        public function eraseCredentials()
        {
        }

        public function getSalt()
        {
            // you *may* need a real salt depending on your encoder
            // see section on salt below
            return null;
        }


        public function getPlainPassword()
        {
            return $this->plainPassword;
        }


        public function setPlainPassword($plainPassword)
        {
            $this->plainPassword = $plainPassword;
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
