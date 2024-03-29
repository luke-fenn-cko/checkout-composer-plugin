<?php

/**
 * Checkout.com
 * Authorised and regulated as an electronic money institution
 * by the UK Financial Conduct Authority (FCA) under number 900816.
 *
 * PHP version 7
 *
 * @category  SDK
 * @package   Checkout.com
 * @author    Platforms Development Team <platforms@checkout.com>
 * @copyright 2010-2019 Checkout.com
 * @license   https://opensource.org/licenses/mit-license.html MIT License
 * @link      https://docs.checkout.com/
 */

namespace Checkout\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
use Checkout\Controllers\FileController;
use Composer\Repository\InstalledRepositoryInterface;

class CheckoutInstaller extends LibraryInstaller {

    public function install(InstalledRepositoryInterface $repo, PackageInterface $package) {
       FileController::modifyProjectComposer('composer.json');
    }
}
