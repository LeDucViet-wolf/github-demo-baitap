<?php

namespace Learning\ClothingMaterial\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class View extends Action
{
    protected $PageFactory;

    public function __construct(
        Context $context,
        PageFactory $PageFactory
    )
    {
        $this->PageFactory = $PageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->PageFactory->create();
    }
}
