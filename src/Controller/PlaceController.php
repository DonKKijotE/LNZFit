<?php
// src/Controller/PlaceController.php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\User;
use App\Entity\Sport;
use App\Entity\Ticket;
use App\Entity\Place;
use App\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class PlaceController extends Controller
{

      /**
      * @Route("/place/{id}", name="view_place", requirements={"id"="\d+"})
      */
      public function placeView($id)
      {
         $place = $this->getDoctrine()
            ->getRepository(Place::class)
            ->find($id);

         if (!$place) {
            $place = NULL;
         }

         return $this->render('place.html.twig', array(
            'place' => $place
         ));
      }
}
