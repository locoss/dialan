<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        
    	$pagesModel = new Application_Model_DbTable_Pages();
    	
    	$homePage = $pagesModel->getHomePageInfo();
    	
    	
    	$this->view->keywords = $homePage['keywords'];
    	 
    	$this->view->description = $homePage['description'];
    	$this->view->textpage = $homePage['textpage']; 
    }

    public function faqAction()
    {
        // action body
    	$pagesModel = new Application_Model_DbTable_Pages();
    	 
    	$homePage = $pagesModel->getAboutPageInfo();
    	 
    	 
    	$this->view->keywords = $homePage['keywords'];
    	
    	$this->view->description = $homePage['description'];
    	$this->view->textpage = $homePage['textpage'];
    }

    public function servicesAction()
    {
        // action body
        $this->view->imagesPath = Zend_Registry::get('myimages');
    	
    	$servicesModel = new Application_Model_DbTable_Services();
    	$this->view->services = $servicesModel->getAllServices();
    	
    	
    }
    
    public function viewFullServiceAction()
    {
        // action body
        $id = $this->_request->getParam('id');
        
        $this->view->navigation()->findOneById('services')->setActive(true);
        
        $servicesModel = new Application_Model_DbTable_Services();
        $this->view->service = $servicesModel->getServiceById($id);
    }


    public function contactsAction()
    {
        $contactForm = new Application_Form_Contacts();
        
        if($this->_request->isPost() && $contactForm->isValid($this->_request->getPost()))
        {
        	$mail = new Zend_Mail('utf-8');
        	$mail->setBodyHtml('Вам пришло письмо от ' . 
        			$contactForm->getValue('email') . '<br /><br />' . $contactForm->getValue('text'))
        		->addTo('lidhen@list.ru')
        		->setSubject('Контактная форма');
        	
        	if (APPLICATION_ENV == 'development')
        	{
        		$config = array (
        				'auth' => 'login',
        				'username' => 'lidhen@list.ru',
        				'password' => 'gai060788' 
        				);
        		
        		$connection = new Zend_Mail_Transport_Smtp('smtp.mail.ru', $config);
        	}
        	try{
        		if (APPLICATION_ENV == 'development') $mail->send($connection);
        		else $mail->send();
        		$this->view->message = 'Сообщение отправлено!';
        		
        	}
        	catch(Exception $e){
        		$this->view->message = 'Во время отправки возникла ошибка';
        	}
        }
        
        
        $this->view->contactForm = $contactForm;
    }
    
    
    

}









