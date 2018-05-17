<?php
class Cammino_Couponlist_Block_Adminhtml_Customer_Edit_Tab_Couponlist extends Mage_Adminhtml_Block_Widget_Form
{
    public function __construct()
    {
    	parent::__construct();
    	$coupons = Mage::getModel('sales/order')->getCollection()
    		->addAttributeToSelect('entity_id')
		    ->addAttributeToSelect('coupon_code')
		    ->addAttributeToSelect('increment_id')
		    ->addAttributeToSelect('created_at')
		    ->addFieldToFilter('customer_id', Mage::registry('current_customer')->getId())
		    ->addFieldToFilter('coupon_code', array('notnull' => true));

		$this->setTemplate('couponlist/customer/tab/couponlist.phtml')->setCoupons($coupons);
    }
}