<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutsentemail\migrations;

use barrelstrength\sproutbase\base\SproutDependencyInterface;
use barrelstrength\sproutbase\migrations\Install as SproutBaseInstall;
use barrelstrength\sproutbasesentemail\migrations\Install as SproutBaseSentEmailInstall;
use barrelstrength\sproutsentemail\SproutSentEmail;
use craft\db\Migration;
use Throwable;

class Install extends Migration
{
    /**
     * @return bool
     */
    public function safeUp(): bool
    {
        $migration = new SproutBaseInstall();
        ob_start();
        $migration->safeUp();
        ob_end_clean();

        $migration = new SproutBaseSentEmailInstall();
        ob_start();
        $migration->safeUp();
        ob_end_clean();

        return true;
    }

    /**
     * @return bool
     * @throws Throwable
     */
    public function safeDown(): bool
    {
        /** @var SproutSentEmail $plugin */
        $plugin = SproutSentEmail::getInstance();

        $sproutBaseSentEmailInUse = $plugin->dependencyInUse(SproutDependencyInterface::SPROUT_BASE_SENT_EMAIL);
        $sproutBaseInUse = $plugin->dependencyInUse(SproutDependencyInterface::SPROUT_BASE);

        if (!$sproutBaseSentEmailInUse) {
            $migration = new SproutBaseSentEmailInstall();

            ob_start();
            $migration->safeDown();
            ob_end_clean();
        }

        if (!$sproutBaseInUse) {
            $migration = new SproutBaseInstall();

            ob_start();
            $migration->safeDown();
            ob_end_clean();
        }

        return true;
    }
}
