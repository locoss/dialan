<?php

class PromosController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $this->view->imagesPath = Zend_Registry::get('myimages');
    	 
    	$promosModel = new Application_Model_DbTable_Promos();
    	$this->view->promos = $promosModel->getAllPromos();
    
    }

  
    
    public function viewFullPromoAction()
    {
    	// action body
    	$id = $this->_request->getParam('id');
    
    	$this->view->navigation()->findOneById('promos')->setActive(true);
    
    	$promosModel = new Application_Model_DbTable_Promos();
    	$this->view->promo = $promosModel->getPromoById($id);
    }
    
    
    
}

