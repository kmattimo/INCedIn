<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    /**
     * @Route("/search", name="search")
     */
    public function searchAction(Request $request)
    {
      if(isset($_POST['searchString'])) {
        $searchString = $_POST['searchString'];
        $conn = $this->get('database_connection');
        $data= $conn->fetchAll($searchString);
         
        return $this->render('default/search.html.twig', array(
          'data' => print_r($data, true), 
          'searchString' => $searchString
       ));
      }
        return $this->render('default/search.html.twig', array(
          
        ));
    }    
    /**
     * @Route("/search/{searchString}", name="searchResults")
     */
    public function searchResultsAction(Request $request, $searchString)
    {
      
      $conn = $this->get('database_connection');
       $data= $conn->fetchAll('SELECT count(*) FROM sentence');
       
        return $this->render('default/search.html.twig', array(
          'data' => print_r($data, true), 
          'searchString' => $searchString
      
      ));
    }
    
    /**
     * @Route("/graph/{searchString}", name="graph")
     */
    public function graph(Request $request, $searchString)
    {
      
      $conn = $this->get('database_connection');
       $data= $conn->fetchAll("SELECT subreddit, sentiment FROM sentence WHERE body LIKE '%$searchString%' ORDER BY id");
       
        return $this->render('default/graph.html.twig', array(
          'data' => print_r($data, true),
          'dataObject' => $data,
          'searchString' => $searchString
      
      ));
    }
    
    
    
    
}
