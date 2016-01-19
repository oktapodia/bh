<?php
/**
 * This file is part of the babylontest project
 *
 * (c) BRAMILLE Sébastien <sebastien.bramille@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Babylon\Container;

use Babylon\Calculator\TotalCalculator;
use Babylon\Model\Item;
use Babylon\Model\PromotionalRule\PromotionalRuleApplyInterface;

/**
 * Class CartContainer
 */
class CartContainer
{
    /**
     * @var PromotionalRuleContainer $promotionalRules
     */
    private $promotionalRules;

    /**
     * @var array|Item[]
     */
    protected $cart;

    /**
     * @var TotalCalculator
     */
    protected $totalCalculator;

    /**
     * @var float
     */
    protected $totalPrice;

    /**
     * CartContainer constructor.
     *
     * @param PromotionalRuleContainer $promotionalRules
     */
    public function __construct($promotionalRules)
    {
        $this->promotionalRules = $promotionalRules;
        $this->cart             = array();
        $this->totalCalculator  = new TotalCalculator();
    }

    /**
     * @param string $code
     *
     * @return Item
     */
    public function get($code)
    {
        return $this->cart[$code];
    }

    /**
     * @param Item $item
     *
     * @return $this
     */
    public function add(Item $item)
    {
        if (!in_array($item, $this->cart)) {
            $this->cart[$item->getCode()] = $item;
        } else {
            $this->cart[$item->getCode()]->increaseQuantity();
        }

        $this->calculateTotal();

        return $this;
    }

    /**
     * Apply promotional rules
     *
     * @return $this
     */
    public function applyPromotionalRules()
    {
        foreach ($this->promotionalRules->getAll() as $promotionalRule) {
            if ($promotionalRule instanceof PromotionalRuleApplyInterface) {
                if ($promotionalRule->needApply($this)) {
                    $promotionalRule->apply($this);
                }
            }
        }

        return $this;
    }

    /**
     * @return array|Item[]
     */
    public function getAll()
    {
        return $this->cart;
    }

    /**
     * @return $this
     */
    public function calculateTotal()
    {
        $this->totalPrice = $this->totalCalculator->calculate($this->cart);

        return $this;
    }

    /**
     * @param float $total
     *
     * @return $this
     */
    public function setTotal($total)
    {
        $this->totalPrice = $total;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->totalPrice;
    }
}
