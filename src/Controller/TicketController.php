<?php
// src/Controller/TicketController.php
namespace App\Controller;

use App\Entity\Event;
use App\Entity\User;
use App\Entity\Sport;
use App\Entity\Ticket;


use App\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class TicketController extends Controller
{


  /**
    * @Route("/ticket_register/{id}", name="ticket_register", requirements={"id"="\d+"})
    */

   public function registerTicket($id)
   {

     $event = $this->getDoctrine()
        ->getRepository(Event::class)
        ->find($id);

     $ticket = new Ticket();
     $user = $this->getUser();

     $ticket->setOwner($user);

     $ticket->setEvent($event);


     $em = $this->getDoctrine()->getManager();
     $em->persist($ticket);
     $em->flush();

     return $this->redirectToRoute('view_events');

   }



}
