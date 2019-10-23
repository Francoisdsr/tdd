<?php

namespace App\Controller;

use App\Utils\Convert;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/convert", name="convert")
     */
    public function convert(Request $request)
    {
        $nombre = $request->query->get('nombre');
        $base_dep = $request->query->get('base_dep');
        $base_arr = $request->query->get('base_arr');
        
        $convert = new Convert();
        $convert->setNombre($request->query->get('nombre'));
        $res = $convert->convert("any-any", intval($base_dep), intval($base_arr));
        return $this->render('home/convert.html.twig', [
            'controller_name' => 'HomeController',
            'nombre' => $nombre,
            'base_dep' => $base_dep,
            'base_arr' => $base_arr,
            'res' => $res,
        ]);
    }
}
