<?php

namespace Learning\ClothingMaterial\Model\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class Material extends AbstractSource
{
    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = [
                ['label' => __('Yes'), 'value' => 'yes'],
                ['label' => __('No'), 'value' => 'no'],
                ['label' => __('None'), 'value' => 'none']
            ];
        }
        return $this->_options;
    }
}
