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

namespace Xylo\Mailtrap\Test\Integration;

use Magento\Framework\Component\ComponentRegistrar;
use Magento\Framework\Module\ModuleList;
use Magento\TestFramework\ObjectManager;

class ExtensionSetupTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    private $moduleName = 'Xylo_Mailtrap';

    /**
     * @var ObjectManager
     */
    private $objectManager;

    // @codingStandardsIgnoreStart
    /**
     * @codingStandardsIgnoreLine
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    protected function setUp()
    {
        $this->objectManager = ObjectManager::getInstance();
    }
    // @codingStandardsIgnoreEnd

    public function testMailtrapIsRegisteredAsModule()
    {
        /** @var ComponentRegistrar $componentRegistrar */
        // @codingStandardsIgnoreLine
        $componentRegistrar = new ComponentRegistrar();
        $this->assertArrayHasKey(
            $this->moduleName,
            $componentRegistrar->getPaths(ComponentRegistrar::MODULE)
        );
    }

    public function testMailtrapIsEnabled()
    {
        /** @var ModuleList $moduleList */
        // @codingStandardsIgnoreLine
        $moduleList = $this->objectManager->get(ModuleList::class);
        $this->assertTrue($moduleList->has($this->moduleName));
    }
}
