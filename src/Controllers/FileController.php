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

namespace Checkout\Controllers;

/**
 * Class FileController
 * @package Checkout\Controllers
 */

class FileController {

    public static function modifyProjectComposer($file) {


        $composerFile = file_get_contents($file);

        $composerArr = json_decode($composerFile, true);

        $scriptObject = array(
            "update-checkout" => [
                "Checkout\\Controllers\\ConsoleController::update"
            ]
        );

        if (isset($composerArr["scripts"])) {
            $composerArr["scripts"]["post-package-install"] = ["Checkout\\Controllers\\FileController::modifyProjectComposer"];
        }

        if (!isset($composerArr['scripts'])) {
            $composerArr["scripts"] = $scriptObject;
        }

        $composerModified = json_encode($composerArr);

        file_put_contents($composerFile, $composerModified);
    }


}