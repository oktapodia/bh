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

/**
 * Interface PromotionalRuleInterface
 */
interface PromotionalRuleInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getAmount();

    /**
     * @return string
     */
    public function getValue();
}
