<?php
/**
 * This file is part of the Magebit PageListWidget package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit PageListWidget
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2019 Magebit, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Magebit\ViewModel\ViewModel;
use Magento\Framework\View\Element\Block\ArgumentInterface;


class Attributes implements ArgumentInterface
{
    /**
     * @param array $attributes
     * @return array
     */
    public function getAttributes(array $attributes)
    {
        /** @var array $displayable */
        $displayable = [];

        $keys = ["dimensions","colour","material"];
        /** @var int $count */
        $count = 0;

        foreach ($keys as $key){
            if(isset($attributes[$key])){
                $displayable[$key]=$attributes[$key];
                unset($attributes[$key]);
                $count++;
            }
        }

        if ($count < 3) {
            foreach (array_keys($attributes) as $attribute_key){
                $displayable[$attribute_key] = $attributes[$attribute_key];
                $count++;
                if ($count===3) break;
            }
        }
        return $displayable;
    }
}
