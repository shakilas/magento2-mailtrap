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

namespace Xylo\Mailtrap\Service;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config implements ConfigInterface
{
    /**
     * Config path to Mailtrap username
     */
    const XML_PATH_USERNAME = 'system/mailtrap/username';

    /**
     * Config path to Mailtrap user password
     */
    const XML_PATH_PASSWORD = 'system/mailtrap/password';

    /**
     * Config path to Mailtrap STMP host
     */
    const XML_PATH_HOST = 'system/mailtrap/host';

    /**
     * Config path to Mailtrap STMP server port
     */
    const XML_PATH_PORT = 'system/mailtrap/port';

    /**
     * Config path to Mailtrap STMP auth method
     */
    const XML_PATH_AUTH = 'system/mailtrap/auth';

    /**
     * Default SMTP port used when config returns incorrect value
     */
    const DEFAULT_SMTP_PORT = 25;

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @inheritdoc
     */
    public function getUsername()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_USERNAME);
    }

    /**
     * @inheritdoc
     */
    public function getPassword()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_PASSWORD);
    }

    /**
     * @inheritdoc
     */
    public function getHost()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_HOST);
    }

    /**
     * @inheritdoc
     */
    public function getPort()
    {
        $port = (int)$this->scopeConfig->getValue(self::XML_PATH_PORT);
        return $port > 0 ? $port : self::DEFAULT_SMTP_PORT;
    }

    /**
     * @inheritdoc
     */
    public function getAuth()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_AUTH);
    }
}
