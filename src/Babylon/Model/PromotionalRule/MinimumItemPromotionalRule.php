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
 * Class MinimumItemPromotionalRule
 */
abstract class MinimumItemPromotionalRule extends PromotionalRule
{
    /**
     * @var Item
     */
    protected $item;

    /**
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param Item $item
     *
     * @return $this
     */
    public function setItem(Item $item)
    {
        $this->item = $item;

        return $this;
    }
}
