<?php
/**
 * This file is part of the Magebit learning package.
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


class StockQty implements ArgumentInterface{

    private $getSourceItemsBySku;

    /**
     * StockQty constructor.
     * @param \Magento\InventoryApi\Api\GetSourceItemsBySkuInterface $getSourceItemsBySku
     */
    public function __construct(
        \Magento\InventoryApi\Api\GetSourceItemsBySkuInterface $getSourceItemsBySku
    ) {
        $this->getSourceItemsBySku = $getSourceItemsBySku;
    }

    /**
     * @param $sku
     * @return float|int|null
     */
    public function getStockQtyLeft($sku)
    {
        $stocks = $this->getSourceItemsBySku->execute($sku);
        $totalQty = 0;
        foreach($stocks as $stock){
            $totalQty+=$stock->getQuantity();
        }
        return $totalQty;
    }
}
