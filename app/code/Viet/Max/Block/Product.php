<?php
//
//namespace Viet\Max\Block;
//
//use Magento\Framework\View\Element\Template;
//use Viet\Max\Model\ResourceModel\Post\CollectionFactory;
//
//class Product extends Template
//{
//    protected $PostFactory;
//
//    public function __construct(
//        Template\Context $context,
//        CollectionFactory $PostFactory
//    )
//    {
//        $this->PostFactory = $PostFactory;
//        parent::__construct($context);
//    }
//
//    public function GetProduct()
//    {
//        $product = $this->PostFactory->create();
//        return $product;
//    }
//}


namespace Viet\Max\Block;

use Magento\Framework\View\Element\Template;
use Viet\Max\Model\ResourceModel\Post\CollectionFactory;

class Product extends Template
{
    protected $PostFactory;

    public function __construct(
        Template\Context $context,
        CollectionFactory $postFactory
    )
    {
        $this->PostFactory = $postFactory;
        parent::__construct($context);
    }

    public function GetProduct()
    {
        $blog = $this->PostFactory->create();
        return $blog;
    }
}

