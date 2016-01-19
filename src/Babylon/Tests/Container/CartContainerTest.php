<?php
/**
 * This file is part of the babylontest project
 *
 * (c) BRAMILLE Sébastien <sebastien.bramille@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Babylon\Tests\Container;

use Babylon\Container\CartContainer;
use Babylon\Container\PromotionalRuleContainer;
use Babylon\Model\Item;
use Babylon\Model\PromotionalRule\PromotionalRuleInterface;
use Babylon\Tests\TestCaseHelper;

/**
 * Class CartContainerTest
 */
class CartContainerTest extends TestCaseHelper
{
    /**
     * @var CartContainer
     */
    protected $cartContainer;

    /**
     * SetUp
     */
    protected function setUp()
    {
        $promotionalRule          = \Phake::mock(PromotionalRuleInterface::class);
        \Phake::when($promotionalRule)->needApply(\Phake::anyParameters())->thenReturn(false);
        \Phake::when($promotionalRule)->getName()->thenReturn('promotional1');

        $promotionalRule2         = \Phake::mock(PromotionalRuleInterface::class);
        \Phake::when($promotionalRule2)->needApply(\Phake::anyParameters())->thenReturn(true);
        \Phake::when($promotionalRule2)->apply()->thenReturn(true);
        \Phake::when($promotionalRule2)->getName()->thenReturn('promotional2');

        $promotionalRuleContainer = new PromotionalRuleContainer();
        $promotionalRuleContainer->add($promotionalRule);
        $promotionalRuleContainer->add($promotionalRule2);
        $this->cartContainer      = new CartContainer($promotionalRuleContainer);
    }

    public function testAdd()
    {
        $expected         = array();

        $this->cartContainer->add($this->getItem001());
        $expected[$this->getItem001()->getCode()] = $this->getItem001();
        $this->assertSame($expected, $this->cartContainer->getAll());

        $this->cartContainer->add($this->getItem002());
        $expected[$this->getItem002()->getCode()] = $this->getItem002();
        $this->assertSame($expected, $this->cartContainer->getAll());

        $this->cartContainer->add($this->getItem002());
        $expected[$this->getItem002()->getCode()]->increaseQuantity();
        $this->assertSame($expected, $this->cartContainer->getAll());

        $this->cartContainer->calculateTotal();

        $total = 0;
        /** @var Item $item */
        foreach ($expected as $item) {
            $total += $item->getPrice() * $item->getQuantity();
        }

        $this->assertEquals($total, $this->cartContainer->getTotal());

        $expectedTotal = 42.42;
        $this->cartContainer->setTotal($expectedTotal);
        $this->assertEquals($expectedTotal, $this->cartContainer->getTotal());

        $this->cartContainer->applyPromotionalRules();
    }
}
