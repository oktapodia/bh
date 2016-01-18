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

use Babylon\Model\PromotionalRule\PromotionalRule;

/**
 * Class PromotionalRuleContainer
 */
class PromotionalRuleContainer
{
    /**
     * @var array|PromotionalRule[]
     */
    protected $promotionalRules;

    /**
     * PromotionalRuleContainer constructor.
     */
    public function __construct()
    {
        $this->promotionalRules = array();
    }

    /**
     * @param string $name
     *
     * @return PromotionalRule
     */
    public function get($name)
    {
        return $this->promotionalRules[$name];
    }

    /**
     * @param PromotionalRule $promotionalRule
     *
     * @return $this
     */
    public function add(PromotionalRule $promotionalRule)
    {
        if (!in_array($promotionalRule, $this->promotionalRules)) {
            $this->promotionalRules[$promotionalRule->getName()] = $promotionalRule;
        }

        return $this;
    }

    /**
     * @return array|PromotionalRule[]
     */
    public function getAll()
    {
        return $this->promotionalRules;
    }
}
