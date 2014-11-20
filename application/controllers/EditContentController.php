<?php

class EditContentController extends Zend_Controller_Action
{

    public function init()
    {
    	if(!Zend_Auth::getInstance()->hasIdentity())
    		$this->_helper->redirector('index', 'index');
    }

    public function indexAction()
    {
    }

    public function editPageAction()
    {
    	$pageForm = new Application_Form_Page();
    	$pageModel = new Application_Model_DbTable_Pages();
    	
    	if($this->_request->isPost() && $pageForm->isValid($this->_request->getPost()))
    	{
    		$formValues = $pageForm->getValues();
    		$data = array(
    				'keywords'		=> $formValues['keywords'],
    				'description'	=> $formValues['description'],
    				'textpage'			=> $formValues['textpage']
    				);
    		
    		$pageModel->updatePageInfo($data, $formValues['id']);
    		
    		if ($formValues['id'] == '1')
    			$this->_helper->redirector('index', 'index');
    		else if ($formValues['id'] == '2')
    			$this->_helper->redirector->gotoUrl('/about');
    	}
    	else
    	{
    		if (is_null($this->_request->getParam('id')))
    			$this->_helper->redirector('index', 'index');	
    	
    		if ($this->_request->getParam('id')== '1')
    			$page = $pageModel->getHomePageInfo();
    		else if ($this->_request->getParam('id')== '2')
    			$page = $pageModel->getAboutPageInfo();
    	
    		$pageForm->populate($page); 		
    		
    	} 
    	
    	$this->view->pageForm = $pageForm;
    }

    public function addEventAction()
    {
        $eventForm = new Application_Form_Event();
        $eventModel = new Application_Model_DbTable_Events();
        
        if($this->_request->isPost() && $eventForm->isValid($this->_request->getPost()))
        {
        	$formValues = $eventForm->getValues();
        	$data = array(
        			'textevent'	=> $formValues['textevent'],
        			'date'	=> date('Y-m-d H:i:s')
        					);
        	
        	$eventModel->addEvent($data);     
			$this->_helper->redirector('index', 'index'); 					
        }
        
        $this->view->eventForm = $eventForm;

    }

    public function editEventAction()
    {
        $eventForm = new Application_Form_Event();
        $eventModel = new Application_Model_DbTable_Events();
        
        if($this->_request->isPost() && $eventForm->isValid($this->_request->getPost()))
        {
        	$formValues = $eventForm->getValues();
    		$data = array(
        			'textevent'	=> $formValues['textevent'],
        			'date'	=> date('Y-m-d H:i:s')
        					);
    		$eventModel->editEvent($data, $formValues['id']);
					$this->_helper->redirector('index', 'index');  
        }
        else
        {
        	if(is_null($this->_request->getParam('id')))
        			$this->_helper->redirector('index', 'index');     

        	$event = $eventModel->getEventById($this->_request->getParam('id'));
        	$eventForm->populate($event);
        }
        
        
        $this->view->eventForm = $eventForm;
	
    }

    public function deleteEventAction()
    {
        
        if(!is_null($this->_request->getParam('id')))
        {
        	$eventModel = new Application_Model_DbTable_Events();
        	
        	$eventModel->deleteEvent($this->_request->getParam('id'));
        }
        	$this->_helper->redirector('index', 'index');
    }

    public function addServiceAction()
    {
        $serviceForm = new Application_Form_Service();
       
        
        if($this->_request->isPost() && $serviceForm->isValid($this->_request->getPost()))
        {
        	$formValues = $serviceForm->getValues();
        	
        	if (!is_null($formValues['image']) && $serviceForm->image->receive())
        	{
        		$newName = Zend_Registry::get('myimages') . "/" . md5(date('Y-m-d H:i')) . "_" . $formValues['image'];
        		rename(Zend_Registry::get('myimages') . '/' . $formValues['image'], $newName); 
           	}
        	
        	$serviceModel = new Application_Model_DbTable_Services();
        	
        	$data = array(
        			'keywords'		=> $formValues['keywords'],
        			'description'	=> $formValues['description'],
        			'title'			=> $formValues['title'],
        			'textservice'			=> $formValues['textservice']        			
        	);
        	
        	if (!is_null($formValues['image']))
        	{
        		$data['image'] = md5(date('Y-m-d H:i')) . "_" . $formValues['image'];
        	}
        	else{
        		$data['image'] = '';
        	}
        
        	$serviceModel->addService($data);
        	$this->_helper->redirector->gotoUrl('/services');
        }
        
        $this->view->serviceForm = $serviceForm;
            
    }

    public function editServiceAction()
    {
        $serviceForm = new Application_Form_Service();
        $serviceModel = new Application_Model_DbTable_Services();         
        
        if($this->_request->isPost() && $serviceForm->isValid($this->_request->getPost()))
        {
        	$formValues = $serviceForm->getValues();
        
        	 if (!is_null($formValues['image']) && $serviceForm->image->receive())
        	{
        		$newName = Zend_Registry::get('myimages') . "/" . md5(date('Y-m-d H:i')) . "_" . $formValues['image'];
        		rename(Zend_Registry::get('myimages') . '/' . $formValues['image'], $newName);
        		
        		$service = $serviceModel->getServiceById($formValues['id']);
        		unlink(Zend_Registry::get('myimages') . '/' . $service['image']);
        	}
        	        	 
        	$data = array(
        			'keywords'		=> $formValues['keywords'],
        			'description'	=> $formValues['description'],
        			'title'			=> $formValues['title'],
        			'textservice'			=> $formValues['textservice']
        	);
        	 
        	if (!is_null($formValues['image']))
        	{
        		$data['image'] = md5(date('Y-m-d H:i')) . "_" . $formValues['image'];
        	}
        	        	
        	$serviceModel->editService($data, $formValues['id']);
        	$this->_helper->redirector->gotoUrl('/services');  
        }
        else
        {
        	if (is_null($this->_request->getParam('id')))
        		$this->_helper->redirector('index', 'index');
        	
        	$service = $serviceModel->getServiceById($this->_request->getParam('id'));
        	$serviceForm->populate($service); 
        }
        
        $this->view->serviceForm = $serviceForm;
    }

    public function deleteServiceAction()
    {
        if(is_null($this->_request->getParam('id')))
        	 $this->_helper->redirector->gotoUrl('/home');
        
        $serviceModel = new Application_Model_DbTable_Services();
        $service = $serviceModel->getServiceById($this->_request->getParam('id'));
       
        if($service['image'] != '')
        	unlink(Zend_Registry::get('myimages') . '/' . $service['image']);
        
        $service = $serviceModel->deleteService($this->_request->getParam('id'));
    }
    
    
    
    
    
    
    public function addPromoAction()
    {
    	$promoForm = new Application_Form_Promo();
    	 
    
    	if($this->_request->isPost() && $promoForm->isValid($this->_request->getPost()))
    	{
    		$formValues = $promoForm->getValues();
    		 
    		if (!is_null($formValues['image']) && $promoForm->image->receive())
    		{
    			$newName = Zend_Registry::get('myimages') . "/promo/" . md5(date('Y-m-d H:i')) . "_" . $formValues['image'];
    			rename(Zend_Registry::get('myimages') . '/promo/' . $formValues['image'], $newName);
    		}
    		 
    		$promoModel = new Application_Model_DbTable_Promos();
    		 
    		$data = array(
    				'keywords'		=> $formValues['keywords'],
    				'description'	=> $formValues['description'],
    				'title'			=> $formValues['title'],
    				'textpromo'			=> $formValues['textpromo']
    		);
    		 
    		if (!is_null($formValues['image']))
    		{
    			$data['image'] = md5(date('Y-m-d H:i')) . "_" . $formValues['image'];
    		}
    		else{
    			$data['image'] = '';
    		}
    
    		$promoModel->addPromo($data);
    		$this->_helper->redirector->gotoUrl('/promos');
    	}
    
    	$this->view->promoForm = $promoForm;
    
    }
    
    public function editPromoAction()
    {
    	$promoForm = new Application_Form_Promo();
    	$promoModel = new Application_Model_DbTable_Promos();
    
    	if($this->_request->isPost() && $promoForm->isValid($this->_request->getPost()))
    	{
    		$formValues = $promoForm->getValues();
    
    		if (!is_null($formValues['image']) && $promoForm->image->receive())
    		{
    			$newName = Zend_Registry::get('myimages') . "/promo/" . md5(date('Y-m-d H:i')) . "_" . $formValues['image'];
    			rename(Zend_Registry::get('myimages') . '/promo/' . $formValues['image'], $newName);
    
    			$promo = $promoModel->getPromoById($formValues['id']);
    			unlink(Zend_Registry::get('myimages') . '/promo/' . $promo['image']);
    		}
    		 
    		$data = array(
    				'keywords'		=> $formValues['keywords'],
    				'description'	=> $formValues['description'],
    				'title'			=> $formValues['title'],
    				'textpromo'			=> $formValues['textpromo']
    		);
    
    		if (!is_null($formValues['image']))
    		{
    			$data['image'] = md5(date('Y-m-d H:i')) . "_" . $formValues['image'];
    		}
    
    		$promoModel->editPromo($data, $formValues['id']);
    		$this->_helper->redirector->gotoUrl('/promos');
    	}
    	else
    	{
    		if (is_null($this->_request->getParam('id')))
    			$this->_helper->redirector('index', 'index');
    		 
    		$promo = $promoModel->getPromoById($this->_request->getParam('id'));
    		$promoForm->populate($promo);
    	}
    
    	$this->view->promoForm = $promoForm;
    }
    
    public function deletePromoAction()
    {
    	if(is_null($this->_request->getParam('id')))
    		$this->_helper->redirector->gotoUrl('/home');
    
    	$promoModel = new Application_Model_DbTable_Promos();
    	$promo = $promoModel->getPromoById($this->_request->getParam('id'));
    	 
    	if($promo['image'] != '')
    		unlink(Zend_Registry::get('myimages') . '/promo/' . $promo['image']);
    
    	$promo = $promoModel->deletePromo($this->_request->getParam('id'));
    }


}







