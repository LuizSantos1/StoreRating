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
            
            #
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

    /**
     * Need use as _prepareLayout - but problem in declaring collection from
     * another block (was problem with search result)
     */
    protected function _beforeToHtml()
    {
        // called prepare sortable parameters
        $collection = $this->_getStoreRatingCollection();

        $curPage = (int) $this->getRequest()->getParam('p', 1);
        $pageSize = (int) $this->getRequest()->getParam('limit', 20);
        if ($pageSize > 40) {
            $pageSize = 40;
        }
        $collection->setPageSize($pageSize)->setCurPage($curPage);

        $this->_getStoreRatingCollection()->load();

        return parent::_beforeToHtml();
    }

    public function getPagerUrl($params=array())
    {
        $urlParams = array();
        $urlParams['_current']  = true;
        $urlParams['_escape']   = true;
        $urlParams['_use_rewrite']   = true;
        $urlParams['_query']    = $params;
        return $this->getUrl('*/*/*', $urlParams);
    }

    public function getPageUrl($page)
    {
        return $this->getPagerUrl(array('p' => $page));
    }

    /**
     * @return int $totalPages
     */
    public function getTotalPages()
    {
        $collection = $this->_getStoreRatingCollection();

        $totalPages = ceil($collection->getSize() / $collection->getPageSize());

        return $totalPages;
    }
}
