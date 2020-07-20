<?php

namespace Viet\Max\Model;

use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Viet\Max\Model\ResourceModel\Post');
    }
}
