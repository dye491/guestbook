<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        /** @var CrudUrlBuilder $routeBuilder */
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this
            ->redirect(
                $routeBuilder
                    ->setController(ConferenceCrudController::class)
                    ->generateUrl()
            );
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Guestbook');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::linkToCrud(
            'Conference',
            'fa fa-folder-open',
            ConferenceCrudController::getEntityFqcn()
        );

        yield MenuItem::linkToCrud('Comment', 'fa fa-folder-open', CommentCrudController::getEntityFqcn());
    }
}
