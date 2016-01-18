<?php
/**
 * This file is part of the babylontest project
 *
 * (c) BRAMILLE Sébastien <sebastien.bramille@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Babylon\Model\PromotionalRule;

use Babylon\Model\Item;

/**
 * Interface ProductPricePromotionalRuleInterface
 */
interface ProductPricePromotionalRuleInterface
{
    /**
     * @return Item
     */
    public function getItem();

    /**
     * @param Item $item
     *
     * @return $this
     */
    public function setItem(Item $item);
}
