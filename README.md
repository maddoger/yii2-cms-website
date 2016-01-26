# Yii2 Menu and Pages manager

## Installation

1) clone
1) migrate: ``yii migrate --migrationPath=@maddoger/website/common/migrations``
1) modules:

```php
'modules' => [
		...
		'website' => 'maddoger\website\frontend\Module',
		'website-backend' => 'maddoger\website\backend\Module',
		...
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