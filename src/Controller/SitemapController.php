<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * This Controller create the Sitemap for the SEO
 */

class SitemapController extends AbstractController
{
    #[Route('/sitemap.xml', name: 'app_sitemap', defaults: ['_format'=>'xml'])]
    public function index(Request $request): Response
    {
        
        $hostname = $request->getSchemeAndHttpHost();
        
        // Creation of an array of URL
        $urls= [];
        
        $urls[] = ['loc' => $this->generateUrl('home.index')];
        $urls[] = ['loc' => $this->generateUrl('cvg')];
        $urls[] = ['loc' => $this->generateUrl('rgpd')];
        $urls[] = ['loc' => $this->generateUrl('app_register')];              
        $urls[] = ['loc' => $this->generateUrl('app_login')];       
        
        $response = new Response(
            $this->renderView('sitemap/index.html.twig', [
                'urls'=>$urls,
                'hostname'=>$hostname,
            ]),
            200
        );
        //header and content-type
        $response->headers->set('Content-type', 'text/xml' );
        return $response;
    }
}