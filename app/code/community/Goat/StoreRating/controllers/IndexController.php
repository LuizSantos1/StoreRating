<?php
/**
 * Magento
 *
 *
 */


/**
 * Customers Rating Store
 *
 * @package    Goat_StoreRating
 */
class Goat_StoreRating_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		$this->loadLayout();
			$this->_initLayoutMessages('customer/session');
			$this->_initLayoutMessages('catalog/session');
		$this->renderLayout();
	}
}