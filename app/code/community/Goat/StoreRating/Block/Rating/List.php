<?php
/**
 * Magento
 *
 */

class Goat_StoreRating_Block_Rating_List extends Mage_Core_Block_Template
{

    /**
     * Rating Collection
     *
     * @var Goat_StoreRating_Model_Resource_Rating_Collection
     */
    protected $_storeRatingCollection;

    /**
     * Retrieve loaded point collection
     *
     * @return Goat_StoreRating_Model_Resource_Rating_Collection
     */
    protected function _getStoreRatingCollection()
    {
        if (is_null($this->_storeRatingCollection)) {

            /** @var $ratingModel Goat_StoreRating_Model_Rating */
            $storeRatingModel = Mage::getModel('storerating/rating');

            $this->_storeRatingCollection = $storeRatingModel->getCollection();

            $this->_storeRatingCollection->setOrder('stars', 'DESC');
            $this->_storeRatingCollection->setOrder('created_at', 'DESC');
        }
        return $this->_storeRatingCollection;
    }

    /**
     * Retrieve loaded point collection
     *
     * @return Goat_StoreRating_Model_Resource_Rating_Collection
     */
    public function getLoadedStoreRatingCollection()
    {
        return $this->_getStoreRatingCollection();
    }
}
