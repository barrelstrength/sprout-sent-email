<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutsentemail\migrations;

use barrelstrength\sproutbase\SproutBase;
use barrelstrength\sproutsentemail\SproutSentEmail;
use craft\db\Migration;
use ReflectionException;
use Throwable;
use yii\base\ErrorException;
use yii\base\Exception;
use yii\base\NotSupportedException;
use yii\web\ServerErrorHttpException;

class Install extends Migration
{
    /**
     * @throws ReflectionException
     * @throws ErrorException
     * @throws Exception
     * @throws NotSupportedException
     * @throws ServerErrorHttpException
     */
    public function safeUp()
    {
        SproutBase::$app->config->runInstallMigrations(SproutSentEmail::getInstance());
    }

    /**
     * @return bool
     * @throws Throwable
     */
    public function safeDown(): bool
    {
        SproutBase::$app->config->runUninstallMigrations(SproutSentEmail::getInstance());
    }
}
