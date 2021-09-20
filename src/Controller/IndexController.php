<?php

namespace App\Controller;

use App\Entity\GallerieResto;
use App\Entity\Menu;
use App\Entity\MenuPhare;
use App\Entity\Client;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private $manager;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->manager = $this->getDoctrine()->getManager();
    }

    /**
     * @Route("/index", name="index")
     */
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        $menuPhares = $this->manager->getRepository(MenuPhare::class)->findAll();
        $clients = $this->manager->getRepository(Client::class)->findAll();



        return $this->render('juliaFood/home.html.twig', compact('menuPhares', 'clients'));
    }

    /**
     * @Route("/nosmenus", name="nosmenus")
     */
    public function nosmenus(): Response
    {
        $menus = $this->manager->getRepository(Menu::class)->findAll();

        return $this->render('juliaFood/nosmenus.html.twig', compact('menus'));
    }

    /**
     * @Route("/gallerie", name="gallerie")
     */
    public function gallerie(): Response
    {
        $GallerieRestos = $this->manager->getRepository(gallerieResto::class)->findAll();


        return $this->render('juliaFood/gallerie.html.twig', compact('GallerieRestos'));
    }

    /**
     * @Route("/contacts", name="contacts")
     */
    public function contacts(): Response
    {
        return $this->render('juliaFood/contacts.html.twig');
    }
}
