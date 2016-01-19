<?php
/**
 * This file is part of the babylontest project
 *
 * (c) BRAMILLE Sébastien <sebastien.bramille@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Babylon;

use Babylon\Container\PromotionalRuleContainer;
use Babylon\Model\Item;
use Babylon\PromotionalRule\MoreThanPercentPromotionalRule;
use Babylon\PromotionalRule\ProductPricePromotionalRule;

// Items
$item001 = new Item();
$item001
    ->setName('Lavender heart')
    ->setCode('001')
    ->setPrice(9.25);

$item002 = new Item();
$item002
    ->setName('Personalised cufflinks')
    ->setCode('002')
    ->setPrice(45);

$item003 = new Item();
$item003
    ->setName('Kids T-shirt')
    ->setCode('003')
    ->setPrice(19.95);

// PromotionalRules
$rule1 = new ProductPricePromotionalRule();
$rule1
    ->setItem($item001)
    ->setValue(2)
    ->setAmount(8.5);

$rule2 = new MoreThanPercentPromotionalRule();
$rule2
    ->setAmount(60)
    ->setValue(10);

$promotionalRuleContainer = new PromotionalRuleContainer();
$promotionalRuleContainer->add($rule1);
$promotionalRuleContainer->add($rule2);

