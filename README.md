# Yii2 Menu and Pages manager

## Installation

1. clone
1. migrate: ``yii migrate --migrationPath=@maddoger/website/common/migrations``
1. modules:

```php
'modules' => [
		...
		'website' => 'maddoger\website\frontend\Module',
		'website-backend' => 'maddoger\website\backend\Module',
		...
	],
```

## Multi language support

For using multi languages you need to replace i18n component to the I18N from `maddoger\yii2-cms-core` package:

```
'i18n' => [
    'class' => 'maddoger\core\i18n\I18N',
    'availableLanguages' => [
        [
            'slug' => 'ru',
            'locale' => 'ru-RU',
            'name' => 'Русский',
        ],
        [
            'slug' => 'en',
            'locale' => 'en-US',
            'name' => 'English',
        ],
    ],
],
```

## Text formats

```php
Yii->$app->params['textFormats'] => 
  [
      'text' => [
          'label' => 'Text',
          //no widget, simple textarea
          'formatter' => function ($text) {
              return Yii::$app->formatter->asNtext($text);
          }
      ],
      'md' => [
          'label' => 'Markdown',
          //no widget, simple textarea
          'formatter' => function ($text) {
              return yii\helpers\Markdown::process($text, 'gfm');
          }
      ],
      'html' => [
          'label' => Yii::t('maddoger/website', 'HTML'),
          'widgetClass' => '\vova07\imperavi\Widget',
      ],
      'raw' => [
          'label' => Yii::t('maddoger/website', 'Raw'),
      ],
  ],
```

## URL rule

```php
'<languageSlug:[\w-]+>/<slug:.*?>' => 'website/page/index',
```