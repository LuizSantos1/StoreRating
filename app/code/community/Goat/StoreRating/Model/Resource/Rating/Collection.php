<?php
/**
 * Magento
 *
 */
class Goat_StoreRating_Model_Resource_Rating_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Initialize collection
     *
     */
    public function _construct()
    {
        $this->_init('storerating/rating');
    }

    /**
     *
     *  perform summary stars qty
     */
    public function getStarsQtySummary()
    {
		$this->getSelect()
			->reset(Zend_Db_Select::COLUMNS)
			->columns('stars AS star, COUNT(*) AS qty')
			->group('main_table.stars');
		
		return $this;
    }
}