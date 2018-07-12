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
class Goat_StoreRating_StoreController extends Mage_Core_Controller_Front_Action
{

	/**
     * Action predispatch
     *
     * Check customer authentication for some actions
     */
   /* public function preDispatch()
    {
        parent::preDispatch();
        if (!Mage::getSingleton('customer/session')->authenticate($this)) {
            $this->setFlag('', 'no-dispatch', true);
        }
    }*/

	public function indexAction()
	{
		$this->loadLayout();
			$this->_initLayoutMessages('customer/session');
		$this->renderLayout();
	}

	public function postRatingAction()
	{
		if (!$this->_validateFormKey()) {
            return $this->_redirect('*/*/');
        }

        $post = $this->getRequest()->getPost();

        $translate = Mage::getSingleton('core/translate');
        #$customer = $this->_getCustomer();
        
        /* @var $translate Mage_Core_Model_Translate */
        $translate->setTranslateInline(false);

        try {
            $ratingObject = Mage::getModel('storerating/rating');
            $ratingObject->setData($post);

            $error = false;
            $errorMsg = array();

            if (!Zend_Validate::is(trim($post['customer_id']) , 'NotEmpty')) {
                $error = true;
                $errorMsg[] = $this->__('Required customer login');
            }

            if (!Zend_Validate::is(trim($post['title']) , 'NotEmpty')) {
                $error = true;
                $errorMsg[] = $this->__('Required Title');
            }

            if (!Zend_Validate::is(trim($post['text']) , 'NotEmpty')) {
                $error = true;
                $errorMsg[] = $this->__('Required Text');
            }

            if (!Zend_Validate::is(trim($post['stars']), 'NotEmpty')) {
                $error = true;
                $errorMsg[] = $this->__('Required Stars');
            }

            if ($error) {
                throw new Exception(implode("<br />",$errorMsg));
            }

            $ratingObject->save();

        } catch (Exception $e) {
            $translate->setTranslateInline(true);

            Mage::getSingleton('customer/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
            return;
        }

        Mage::getSingleton('customer/session')->addSuccess($this->__('Thank you!'));
        $this->_redirect('*/');
        return;
	}

	protected function _getCustomer()
	{
		return Mage::getSingleton('customer/session')->getCustomer();
	}
}