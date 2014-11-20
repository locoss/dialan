<?php

class Application_Model_DbTable_Promos extends Zend_Db_Table_Abstract
{

    protected $_name = 'promos';
    
    public function getAllPromos()
    {
    	$select = $this->select()
    					->from(
    							$this->_name,
    							array('id', 'keywords', 'description', 'title', 'textpromo', 'image')
    							)
    					->order('id DESC');
    	
    	return $this->fetchAll($select)->toArray();
    }

    public function getPromoById($id)
    {
    	$where = $this->getDefaultAdapter()->quoteInto('id = ?', $id);
    	return $this->fetchRow($where)->toArray();
    }
    
    public function addPromo($data)
    {
    	$this->insert($data);
    }
    
    public function editPromo($data, $id)
    {
    	$where = $this->getDefaultAdapter()->quoteInto('id = ?', $id);
    	$this->update($data, $where);
    }
    
    public function deletePromo($id)
    {
    	$where = $this->getDefaultAdapter()->quoteInto('id = ?', $id);
    	$this->delete($where);
    }

}

