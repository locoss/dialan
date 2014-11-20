<?php

class Application_Form_Contacts extends Zend_Form
{

    public function init()
    {
        $email = new Zend_Form_Element_Text('email');
    	$email	-> setLabel('Ваш email:')
    			->setAttrib('style', 'width:40%')
    			->setRequired(true)
    			-> addValidator('NotEmpty', true, array(
    												'messages' => array(
    																'isEmpty' => 'Поле обязательно для заполнения'
    																	)
    													)
    					
    							)
    			-> addValidator('EmailAddress', true);
    
    	$textarea = new Zend_Form_Element_Textarea('textarea');
    	$textarea	-> setLabel('Введите текст вашего сообщения:')
    				->setRequired(true)
    				->addValidator('NotEmpty', true, array(
    						'messages' => array(
    								'isEmpty' => 'Поле обязательно для заполнения'
    											)
    									)
    							 	);
    	$textarea->setAttribs(array('cols' 	=> 70, 'rows'  => 20));
    	
    	$reCaptchaService = new Zend_Service_ReCaptcha(
    							Zend_Registry::get('reCaptchaPublic'),
    							Zend_Registry::get('reCaptchaPrivate'),
    							null,
    							array(
    									'lang' => 'ru',
    									'theme' => 'clean'
    									)
    			
    						);
    	$reCaptcha = new Zend_Captcha_ReCaptcha();
    	$reCaptcha->setService($reCaptchaService);
    	
    	$reCaptchaFormElement = new Zend_Form_Element_Captcha('
    													recaptcha',
    								array(
    										'label' => 'Проверочный код',
    										'captcha' => $reCaptcha)
    									);
    	
    	$reCaptchaFormElement->getValidator('ReCaptcha')
    						->setMessages(array(
    								'badCaptcha' => 'Вы ввели неверное значение',
    								'missingValue' => 'Введите проверочный код' 
    								)); 
    	
    	$submit = new Zend_Form_Element_Submit('submit');
    	$submit	->setLabel('Отправить');
    	 
    	$elements = array($email,  $textarea,$reCaptchaFormElement, $submit);
    	$this->addElements($elements);
    }


}

