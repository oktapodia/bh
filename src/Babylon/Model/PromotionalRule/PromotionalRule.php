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

use Babylon\Container\CartContainer;

/**
 * Class PromotionalRule
 */
abstract class PromotionalRule implements PromotionalRuleInterface
{
    /**
     * @var float
     */
    protected $value;

    /**
     * @var int
     */
    protected $amount;

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param CartContainer $cart
     *
     * @return $this
     */
    abstract public function apply($cart);
}
