<?php

namespace App\Controller\Admin;

use App\Entity\Room;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Clean Team');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Chambres');
        yield MenuItem::linkToCrud('Chambres', 'fa fa-bed', Room::class);

        //yield MenuItem::linkToCrud('Mes Chambres', 'fa fa-bed', Room::class)
        //    ->setQueryParameter('filters[toto]', 0);
        //yield MenuItem::linkToUrl('Mes Chambres', 'fa fa-bed', '#');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
