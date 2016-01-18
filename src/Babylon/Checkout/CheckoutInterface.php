<?php
/**
 * This file is part of the babylontest project
 *
 * (c) BRAMILLE Sébastien <sebastien.bramille@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Babylon\Checkout;

use Babylon\Container\PromotionalRuleContainer;
use Babylon\Model\Item;

/**
 * Interface CheckoutInterface
 */
interface CheckoutInterface
{
    /**
     * CheckoutInterface constructor.
     *
     * @param PromotionalRuleContainer $promotionalRules
     */
    public function __construct($promotionalRules);

    /**
     * @param Item $item
     *
     * @return $this
     */
    public function scan($item);

    /**
     * @return float
     */
    public function total();
}
