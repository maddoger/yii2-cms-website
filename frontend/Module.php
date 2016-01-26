<?php
/**
 * @copyright Copyright (c) 2016 Vitaliy Syrchikov
 * @link http://syrchikov.name
 */

namespace maddoger\website\frontend;

use maddoger\core\behaviors\ConfigurationBehavior;
use Yii;

/**
 * WebsiteModule
 *
 *
 * @method \maddoger\website\common\models\Config getConfiguration()
 * @method \maddoger\website\common\models\Config getConfigurationModel()
 * @method boolean saveConfigurationModel($model, $validate = true, $apply = true)
 *
 * @author Vitaliy Syrchikov <maddoger@gmail.com>
 * @link http://syrchikov.name
 * @package maddoger/yii2-website
 */
class Module extends \yii\base\Module
{
    /**
     * @var string page model class
     */
    public $pageModelClass = 'maddoger\website\common\models\Page';

    /**
     * @var string view file path
     */
    public $pageView = '@maddoger/website/frontend/views/page/index.php';

    /**
     * Init module
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'configurationBehavior' => [
                'class' => ConfigurationBehavior::className(),
                'key' => 'maddoger\website\Module',
                //Model for configuration saving and validating
                'modelClass' => 'maddoger\website\common\models\Config',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function registerTranslations()
    {
        if (!isset(Yii::$app->i18n->translations['maddoger/website'])) {
            Yii::$app->i18n->translations['maddoger/website'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@maddoger/website/common/messages',
                'sourceLanguage' => 'en-US',
            ];
        }
    }
}