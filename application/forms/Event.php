<?php

class Application_Form_Event extends Zend_Form
{

    public function init()
    {
        $id = new Zend_Form_Element_Hidden('id');
        
        $textevent = new Zend_Form_Element_Textarea('textevent');
        $textevent->setLabel('Текст события:')
        	->addValidator('NotEmpty');
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Сохранить');
        
        $this->addElements(array($id, $textevent, $submit));
    }


}

