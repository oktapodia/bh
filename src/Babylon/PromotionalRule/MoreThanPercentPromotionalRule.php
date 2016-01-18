<?php
/**
 * This file is part of the babylontest project
 *
 * (c) BRAMILLE Sébastien <sebastien.bramille@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Babylon\PromotionalRule;

use Babylon\Container\CartContainer;
use Babylon\Model\PromotionalRule\PercentPromotionalRuleInterface;
use Babylon\Model\PromotionalRule\PromotionalRule;

/**
 * Class MoreThanPercentPromotionalRule
 */
class MoreThanPercentPromotionalRule extends PromotionalRule implements PercentPromotionalRuleInterface
{
    /**
     * @param CartContainer $cart
     *
     * @return $this
     */
    public function apply($cart)
    {
        $total = $cart->getTotal();

        if ($total > $this->getAmount()) {
            $cart->setTotal($this->calculatePercentage($total));
        }

        return $this;
    }

    protected function calculatePercentage($amount)
    {
        return $amount - ($amount / 100 * $this->getValue());
    }

    /**
     * @return string
     */
    public function getName()
    {
        return sprintf('MoreThan_%d', $this->getAmount());
    }
}
