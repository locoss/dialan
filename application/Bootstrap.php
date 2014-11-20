<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initView()
	{
		$this->bootstrap('layout');
		$view = $this->getResource('layout')->getView();
		
		$view	->doctype('XHTML1_TRANSITIONAL');
		
		$view	->headTitle('Dialan Telecom Srv')
				->setSeparator(' - ');
		
		$view	->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=utf-8')
							->appendName('author', 'AleXandr Gudenko');
		
		$view	->headLink()->appendStylesheet('/css/style.css','screen, projection')
							->appendStylesheet('/css/style_modal.css', 'screen, projection')
							->appendStylesheet('/css/jflow.style.css', 'screen, projection');
							//->appendStylesheet('/css/bootstrap.css', 'screen, projection');
							

		$view	->headScript()	->appendFile('/js/jquery-1.9.1.min.js');
		$view	->headScript()	->appendFile('/js/slider.js');
		$view	->headScript()	->appendFile('/js/up-button.js');
		$view	->headScript()	->appendFile('/js/zayavka.js');
		$view	->headScript()	->appendFile('/js/modal_tabs.js');
		$view	->headScript()	->appendFile('/js/prise_sum.js');
		$view	->headScript()	->appendFile('/js/validator.js');
		$view	->headScript()	->appendFile('/js/tiny_mce/tiny_mce.js');
		$view	->headScript() 	->appendFile('/js/tinymce.js');
		
		
							
	}
	
	protected function _initRouter()
	{
		$front = Zend_Controller_Front::getInstance();
		$router = $front->getRouter();
		
		$home = new Zend_Controller_Router_Route_Static('home',
														array(
																'controller'	=> 'index',
																'action' 		=> 'index'
																)
														);
		$faq = new Zend_Controller_Router_Route_Static('about',
														array(
																'controller'	=> 'index',
																'action' 		=> 'faq'
																)
														);
		
		$services = new Zend_Controller_Router_Route_Static('services',
														array(
																'controller'	=> 'index',
																'action' 		=> 'services'
																)
														);
		
		$fullService = new Zend_Controller_Router_Route(
				'services/:id',
				array(
						'controller'	=> 'index',
						'action' 		=> 'view-full-service'
				)
		);
		
		$promos = new Zend_Controller_Router_Route_Static('promos',
				array(
						'controller'	=> 'promos',
						'action' 		=> 'index'
				)
		);
		
		$fullPromo = new Zend_Controller_Router_Route(
				'promos/:id',
				array(
						'controller'	=> 'promos',
						'action' 		=> 'view-full-promo'
				)
		);
		
		$contacts = new Zend_Controller_Router_Route_Static('contacts',
														array(
																'controller'	=> 'index',
																'action' 		=> 'contacts'
																)
														);
		
		$login = new Zend_Controller_Router_Route_Static('login',
														array(
																'controller'	=> 'auth',
																'action' 		=> 'index'
																)
														);
		
		$logout = new Zend_Controller_Router_Route_Static('logout',
														array(
																'controller'	=> 'auth',
																'action' 		=> 'logout'
																)
														);
		$cabinet = new Zend_Controller_Router_Route_Static('cabinet',
														array(
																'controller'		=> 'index',
																'action'		=>	'index'
																)
														);
																										
		
		
		$router->addRoutes(array(
				'home'			=>	$home,
				'faq'			=>	$faq,
				'services'		=>	$services,
				'contacts'		=>	$contacts,
				'fullService' 	=>	$fullService,
				'promos'		=>	$promos,
				'fullPromo'		=> 	$fullPromo,
				'login'			=>	$login,
				'logout'		=>	$logout,
				'cabinet'		=>	$cabinet
								)
							);
		
		
	}
	
	protected function _initNavigation()
	{
		$this->bootstrap('layout');
		$view = $this->getResource('layout')->getView();
		
		$pages = array(
				/*array(
						'label'	=> 'Главная',
						'route'	=> 'home'
						),*/
				array(
						'label'	=> 'Услуги',
						'route'	=> 'services',
						'id'	=> 'services'
						),
				array(
						'label'	=> 'Акции',
						'route'	=> 'promos',
						'id'	=> 'promos'
						),
				
				array(
						'label'	=> 'Поддержка',
						'route'	=> 'faq'
						)
				);
				
		
		$navigation = new Zend_Navigation($pages);
		$view->navigation($navigation);
		$view->navigation()->menu()->setPartial('menu.phtml');
	}
	
	
	protected function _initHelper()
	{
		$this->bootstrap('layout');
		$view = $this->getResource('layout')->getView();
		
		$view->addHelperPath(APPLICATION_PATH . '/views/helpers', 'Application_View_Helper');
		
		Zend_Controller_Action_HelperBroker::addPath(
												APPLICATION_PATH . '/controllers/helpers/',
												'Application_Controller_Helper'
													);
	}
	
	protected function _initConfig()
	{
		Zend_Registry::set('myimages', $this->getOption('myimages'));
		Zend_Registry::set('reCaptchaPublic', $this->getOption('reCaptchaPublic'));
		Zend_Registry::set('reCaptchaPrivate', $this->getOption('reCaptchaPrivate'));
	}

}

