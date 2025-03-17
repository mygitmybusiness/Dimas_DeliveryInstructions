<?php
namespace Vendor\Module\Plugin\Checkout;

use Magento\Checkout\Api\Data\ShippingInformationInterface;
use Magento\Quote\Api\ShippingInformationManagementInterface;
use Magento\Quote\Model\Quote;

class ShippingInformationManagementPlugin
{
    /**
     * Before saveAddressInformation plugin
     */
    public function beforeSaveAddressInformation(
        ShippingInformationManagementInterface $subject,
        $cartId,
        ShippingInformationInterface $addressInformation
    ) {
        $extensionAttributes = $addressInformation->getShippingAddress()->getExtensionAttributes();
        if ($extensionAttributes && $extensionAttributes->getDeliveryInstructions()) {
            $addressInformation->getShippingAddress()->setDeliveryInstructions($extensionAttributes->getDeliveryInstructions());
        }
    }
}
