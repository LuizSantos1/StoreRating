<?php
/**
 * Magento
 */

class Goat_StoreRating_Model_Rating extends Mage_Core_Model_Abstract
{
    /**
     * rating status
     *
     */
    const PENDING       = 'pending';
    const APPROVED      = 'approved';
    const DECLINED      = 'declined';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('storerating/rating');
    }

}
