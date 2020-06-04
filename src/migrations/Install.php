<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutsentemail\migrations;

use barrelstrength\sproutbase\config\base\DependencyInterface;
use barrelstrength\sproutbase\migrations\Install as SproutBaseInstall;
use barrelstrength\sproutbase\SproutBase;
use barrelstrength\sproutbase\app\sentemail\migrations\Install as SproutBaseSentEmailInstall;
use barrelstrength\sproutsentemail\SproutSentEmail;
use barrelstrength\sproutbase\app\metadata\SproutSeo;
use craft\db\Migration;
use Throwable;

class Install extends Migration
{
    /**
     * @return bool
     */
    public function safeUp(): bool
    {
        SproutBase::$app->config->runInstallMigrations(SproutSentEmail::getInstance());

        return true;
    }

    /**
     * @return bool
     * @throws Throwable
     */
    public function safeDown(): bool
    {
        SproutBase::$app->config->runUninstallMigrations(SproutSentEmail::getInstance());

        return true;
    }
}
