<?php
/**
 * This file is part of the babylontest project
 *
 * (c) BRAMILLE Sébastien <sebastien.bramille@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Babylon\Calculator;

use Babylon\Model\Item;

/**
 * Class TotalCalculator
 */
class TotalCalculator
{
    /**
     * @param array|Item[] $items
     *
     * @return int
     */
    public function calculate($items)
    {
        $total = 0;

        foreach ($items as $item) {
            $total += $item->getPrice() * $item->getQuantity();
        }

        return $total;
    }
}
