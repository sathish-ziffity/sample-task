<?php

namespace Ziffity\TaskManagement\Model;

class Status
{
    const STATUS_TODO = 0;
    const STATUS_INPROGRESS = 1;
    const STATUS_DONE = 2;
    
    /**
     * Retrieve option array
     *
     * @return string[]
     */
    public static function getOptionArray()
    {
        return [
            self::STATUS_TODO => __('TODO'),
            self::STATUS_INPROGRESS => __('In Progress'),
            self::STATUS_DONE => __('Done')
       ];
    }

    /**
     * Retrieve option array with empty value
     *
     * @return string[]
     */
    public function getAllOptions()
    {
        $result = [];

        foreach (self::getOptionArray() as $index => $value) {
            $result[] = ['value' => $index, 'label' => $value];
        }

        return $result;
    }

    /**
     * Retrieve option text by option value
     *
     * @param string $optionId
     * @return string
     */
    public function getOptionText($optionId)
    {
        $options = self::getOptionArray();

        return isset($options[$optionId]) ? $options[$optionId] : null;
    }
}