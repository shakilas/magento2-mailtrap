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

interface ConfigInterface
{
    /**
     * Returns SMTP username
     *
     * @return string
     */
    public function getUsername();

    /**
     * Returns SMTP user password
     *
     * @return string
     */
    public function getPassword();

    /**
     * Returns SMTP server host
     *
     * @return string
     */
    public function getHost();

    /**
     * Returns SMTP server port
     *
     * @return int
     */
    public function getPort();

    /**
     * Returns SMTP auth type
     *
     * @return string
     */
    public function getAuth();
}
