<?php
/**
 * Magento
 *
 */
class  Goat_StoreRating_Model_Resource_Rating extends Mage_Core_Model_Resource_Db_Abstract
{
	/**
     * Initialize resource model
     *
     */
    protected function _construct()
    {
        $this->_init('storerating/rating', 'rating_id');
    }
    
    /**
     * Prepare data for save
     *
     * @param Mage_Core_Model_Abstract $object
     * @return array
     */
    protected function _prepareDataForSave(Mage_Core_Model_Abstract $object)
    {
        $currentTime = Varien_Date::now();
        if ((!$object->getId() || $object->isObjectNew()) && !$object->getCreatedAt()) {
            $object->setCreatedAt($currentTime);
        }
        $object->setUpdatedAt($currentTime);
        $data = parent::_prepareDataForSave($object);
        return $data;
    }
}