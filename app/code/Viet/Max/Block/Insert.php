<?php

namespace Viet\Max\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Result\PageFactory;

class Insert extends Template
{
    protected $pageFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory
    )
    {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute(){
        return $this->pageFactory->create();
    }
}
