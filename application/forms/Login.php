<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    	$username = new Zend_Form_Element_Text('username');
    	$username	->setLabel('Login:')
    				->setRequired(true)
    				->addValidator('NotEmpty');
    	
    	$password = new Zend_Form_Element_Password('password');
    	$password	->setLabel('Password:')
    				->setRequired(true)
    				->addValidator('NotEmpty');
    	
    	$submit = new Zend_Form_Element_Submit('submit');
    	$submit	->setLabel('Go');
    	
    	$this->addElements(array($username, $password, $submit));
    	
    	$this->setMethod('post');
    }		


}

