<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutsentemail;

use barrelstrength\sproutbase\config\base\SproutCentralInterface;
use barrelstrength\sproutbase\config\configs\CampaignsConfig;
use barrelstrength\sproutbase\config\configs\EmailConfig;
use barrelstrength\sproutbase\config\configs\GeneralConfig;
use barrelstrength\sproutbase\config\configs\ReportsConfig;
use barrelstrength\sproutbase\config\configs\SentEmailConfig;
use barrelstrength\sproutbase\SproutBaseHelper;
use Craft;
use craft\base\Plugin;
use craft\helpers\UrlHelper;

class SproutSentEmail extends Plugin implements SproutCentralInterface
{
    const EDITION_LITE = 'lite';
    const EDITION_PRO = 'pro';

    /**
     * @var string
     */
    public $schemaVersion = '1.1.1';

    /**
     * @inheritdoc
     */
    public static function editions(): array
    {
        return [
            self::EDITION_LITE,
            self::EDITION_PRO,
        ];
    }

    public static function getSproutConfigs(): array
    {
        return [
            GeneralConfig::class,
            SentEmailConfig::class
        ];
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        SproutBaseHelper::registerModule();

        Craft::setAlias('@sproutsentemail', $this->getBasePath());
    }

    protected function afterInstall()
    {
        // Redirect to welcome page
        if (Craft::$app->getRequest()->getIsConsoleRequest()) {
            return;
        }

        Craft::$app->controller->redirect(UrlHelper::cpUrl('sprout-sent-email/welcome'))->send();
    }
}
