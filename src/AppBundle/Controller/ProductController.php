<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Product;
use AppBundle\Entity\Category;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="Produkt einpflegen")
     */
    public function productAction(Request $request)
    {
	    $product = new Product();

	    $product->setName('A Foo Bar');
	    $product->setPrice('19.99');
	    $product->setDescription('Lorem ipsum dolor');
	    
	    $em = $this->getDoctrine()->getManager();
	    
	    $em->persist($product);
	    
	    $em->flush();
	    
        // replace this example code with whatever you need
    
        return new Response('Created product id '.$product->getId());
	
	}
	
	/**
     * @Route("/product/{id}", name="Produkt einpflegen", requirements = {"id": "\d+"})
     */
     
	public function showAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		
	    $product = $em->getRepository('AppBundle:Product')->find($id);
		    if (!$product) {
		        throw $this->createNotFoundException(
		            'No product found for id '.$id
		        );
		}
		    // ... do something, like pass the $product object into a template
		    
		    $product->setName("BLaBlaaa");
		    
		  $em->flush();
		    
		return new Response('Produktdaten: '.$product->getId().$product->getName().$product->getDescription());
	
	}
	
	/**
     * @Route("/product/all", name="Produkt einpflegen")
     */
     
	public function zeigeAction()
	{
		$em = $this->getDoctrine()->getManager();
		
	    $product = $em->getRepository('AppBundle:Product')->findAllOrderedByName();
	    
		    if (!$product) {
		        throw $this->createNotFoundException(
		            'No product found for id '.$id
		        );
		}
		    // ... do something, like pass the $product object into a template
		    
	
		return new Response('Produkte: '.sizeof($product));
	}
	
	/**
     * @Route("/productcategory", name="Produkt mit Kategorie einpflegen")
     */
	
	public function createProductAction() 
	{
		$category = new Category();
        $category->setName('Main Products');
        
        $product = new Product();
        $product->setName('Foo');
        $product->setPrice(19.99);
        $product->setDescription('Lorem ipsum dolor');
        // relate this product to the category
        $product->setCategory($category);
        
        $em = $this->getDoctrine()->getManager();
        
        $em->persist($category);
        $em->persist($product);
        
        $em->flush();
        
        return new Response(
            'Created product id: '.$product->getId()
            .' and category id: '.$category->getId()
			);
		
	}
	
}
