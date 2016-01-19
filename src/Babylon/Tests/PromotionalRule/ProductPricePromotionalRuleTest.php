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
use Babylon\Model\Item;
use Babylon\Tests\TestCaseHelper;

/**
 * Class ProductPricePromotionalRuleTest
 */
class ProductPricePromotionalRuleTest extends TestCaseHelper
{
    /**
     * @dataProvider getNeedApplyProvider
     */
    public function testNeedApply($value, $expectedResult)
    {
        $item = new Item();
        $item
            ->setCode('001')
            ->setQuantity(5);

        $cartContainer = \Phake::mock(CartContainer::class);
        \Phake::when($cartContainer)->get(\Phake::anyParameters())->thenReturn($item);

        $productPricePromotionalRule = new ProductPricePromotionalRule();
        $productPricePromotionalRule
            ->setValue($value)
            ->setItem($item);

        $this->assertEquals($expectedResult, $productPricePromotionalRule->needApply($cartContainer));


    }

    public function getNeedApplyProvider()
    {
        return array (
            array(
                'value'         => 1,
                'expectedResult' => true,
            ),
            array(
                'value'         => 5,
                'expectedResult' => true,
            ),
            array(
                'value'         => 10,
                'expectedResult' => false,
            ),
        );
    }
}
