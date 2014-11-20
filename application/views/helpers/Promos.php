<?php
class Application_View_Helper_Promos extends Zend_View_Helper_Abstract
{
		public function promos()
		{
			$promosModel = new Application_Model_DbTable_Promos();
			
			
			$promos = $promosModel->getAllPromos();
			
			$html = '';
			
				
			
			$html .= '<div class="promo"><ul>';
			$html .= $this->view->partialLoop('partial-loops/promo.phtml', $promos);
			$html .= '</ul></div>';
			
			
			return $html; 
			
		
		}
}