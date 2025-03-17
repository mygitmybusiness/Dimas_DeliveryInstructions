<?php

namespace Vendor\Module\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class SaveOrderObserver implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        if (!$order) {
            return;
        }

        // For each address in the order
        foreach ($order->getAddresses() as $orderAddress) {
            $quoteAddress = $orderAddress->getQuoteAddress();
            if ($quoteAddress && $quoteAddress->getDeliveryInstructions()) {
                $orderAddress->setData('delivery_instructions', $quoteAddress->getDeliveryInstructions());
            }
        }
    }
}