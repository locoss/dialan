<?php

class Application_Form_Service extends Zend_Form
{

    public function init()
    {
        $this->setAttrib('enctype', 'multipart/form-data');
        
        $id = new Zend_Form_Element_Hidden('id');
        
        $keywords = new Zend_Form_Element_Textarea('keywords');
        $keywords->setLabel('Ключевые слова:');
        
        $description = new Zend_Form_Element_Textarea('description');
        $description->setLabel('Краткое описание:');
        
        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('Заголовок:')
   			->setAttrib('style', 'width:100%');
        
        $textservice = new Zend_Form_Element_Textarea('textservice');
        $textservice->setLabel('Текст:');
        
        $image = new Zend_Form_Element_File('image');
        $image	->setLabel('Превью:')
        		->setDestination(Zend_Registry::get('myimages'))
        		->addValidator('Extension', true,
        				array(
        						'extension' => 'jpg,gif,png',
        						'messages'	=> array('fileExtensionFalse' => 'Загружать можно только с расширением .jpg, .gif, .png')
        						)
        					)
        		->addValidator('ImageSize', true,
                      	array(
                      			'maxheight' => '100',
                            	'maxwidth' => '100',
                            	'messages' => array('fileImageSizeWidthTooBig' =>  "Ширина загруженного рисунка '%value%' слишком большая - '%maxwidth%'. Должна быть: '%width%'",
                            						'fileImageSizeHeightTooBig' => "Высота загруженного рисунка '%value%' слишком большая - '%maxheight%'. Должна быть: '%height%'"
                            						)
                      		)
                      );
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Сохранить');
        
        $this->addElements(array($id, $keywords, $description, $title, $textservice, $image, $submit));
 	}

}

