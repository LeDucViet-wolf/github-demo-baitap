<?php

namespace Learning\ClothingMaterial\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Isspecial implements ObserverInterface
{
    public function execute(Observer $observer)
    {
//        if (null !== $subject->getCustomAttribute('is_special')) {
//            if ($subject->getCustomAttribute('is_special')->getValue() == 'Yes'){
//                $result = $result . ' - Special Promotion';
//            }
        $product = $observer->getProduct();
        $originalName = $product->getName();
        if (null !== $product->getCustomAttribute('is_special')) {
            if ($product->getCustomAttribute('is_special')->getValue() == 'yes') {
                $modifiedName = $originalName . ' - Special Product';
                $product->setName($modifiedName);
            }
        }
//        $modifiedName = $originalName . " - Cream Milk";
    }
}
