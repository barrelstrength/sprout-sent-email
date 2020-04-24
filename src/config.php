<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   https://craftcms.github.io/license
 */

/**
 * Sprout Sent Email config.php
 *
 * This file exists only as a template for the Sprout Sent Email settings.
 * It does nothing on its own.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'sprout-sent-email.php'
 * and make your changes there to override default settings.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just as
 * you do for 'general.php'
 */

return [
    // The name to display in the control panel in place of the plugin name
    'pluginNameOverride' => 'Sprout Sent Email',

    // Enable Sent Email tracking
    'enableSentEmails' => false,

    // The total number of Sent Emails that will be stored
    // in the database per-site
    'sentEmailsLimit' => 5000,

    // The probability that the Sent Emails cleanup task will run
    // each time a Sent Email is tracked
    'cleanupProbability' => 1000
];
