<?php
/**
 * Mailtrap.io - extension for Magento 2
 *
 * NOTICE OF LICENSE
 *
 * This work is licensed under the terms of the MIT license.
 * For a copy, see <https://opensource.org/licenses/MIT>.
 *
 * @category   Xylo
 * @package    Xylo_Mailtrap
 * @author     Benoît Xylo <benoit.xylo@traverse.waw.pl>
 * @copyright  (c) 2017 Benoît Xylo
 * @license    https://opensource.org/licenses/MIT
 */

namespace Xylo\Mailtrap\Test\Integration\Service;

use Magento\Framework\ObjectManager\ConfigInterface as ObjectManagerConfig;
use Magento\TestFramework\ObjectManager;
use Xylo\Mailtrap\Service\ConfigInterface;

class ConfigInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ObjectManager
     */
    private $objectManager;

    // @codingStandardsIgnoreStart
    /**
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    protected function setUp()
    {
        $this->objectManager = ObjectManager::getInstance();
    }
    // @codingStandardsIgnoreEnd

    public function testPreferenceIsSetForConfigInterface()
    {
        /** @var ObjectManagerConfig $diConfig */
        // @codingStandardsIgnoreLine
        $diConfig = $this->objectManager->get(ObjectManagerConfig::class);
        $this->assertNotEquals(ConfigInterface::class, $diConfig->getPreference(ConfigInterface::class));
    }
}
