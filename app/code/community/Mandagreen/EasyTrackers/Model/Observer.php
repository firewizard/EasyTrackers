<?php

class Mandagreen_EasyTrackers_Model_Observer
{
    /**
     * Observes controller_action_layout_render_before
     * @param Varien_Event_Observer $observer
     */
    public function hookTrackers(Varien_Event_Observer $observer)
    {
        $layout = Mage::app()->getLayout();
        $handles = $layout->getUpdate()->getHandles();

        /** @var Mage_Core_Block_Text $block */
        $block = $layout->createBlock('core/text');

        if (in_array('cms_index_index', $handles)) {
            if ($trackers = Mage::getStoreConfig('mgeasytrackers/homepage/trackers')) {
                $block->setText($trackers);
                $layout->getBlock('before_body_end')->append($block);
            }
        } elseif (in_array('catalog_category_view', $handles)) {
            if ($trackers = Mage::getStoreConfig('mgeasytrackers/category/trackers')) {
                $block->setText($trackers);
                $layout->getBlock('before_body_end')->append($block);
            }
        } elseif (in_array('catalog_product_view', $handles)) {
            if ($trackers = Mage::getStoreConfig('mgeasytrackers/product/trackers')) {
                $block->setText($trackers);
                $layout->getBlock('before_body_end')->append($block);
            }
        } elseif (in_array('checkout_cart_index', $handles)) {
            if ($trackers = Mage::getStoreConfig('mgeasytrackers/cart/trackers')) {
                $block->setText($trackers);
                $layout->getBlock('before_body_end')->append($block);
            }
        } elseif (in_array('checkout_onepage_index', $handles) || in_array('onestepcheckout_index_index', $handles)) {
            if ($trackers = Mage::getStoreConfig('mgeasytrackers/checkout/trackers')) {
                $block->setText($trackers);
                $layout->getBlock('before_body_end')->append($block);
            }
        } elseif (in_array('checkout_onepage_success', $handles)) {
            if ($trackers = Mage::getStoreConfig('mgeasytrackers/sale/trackers')) {
                $block->setText($trackers);
                $layout->getBlock('before_body_end')->append($block);
            }
        }
    }
}