<?php
/**
 * @copyright Copyright (c) 2016 Vitaliy Syrchikov
 * @link http://syrchikov.name
 */

namespace maddoger\website\backend\assets;
use Yii;
use yii\web\AssetBundle;

/**
 * BackendAsset.php
 *
 * @author Vitaliy Syrchikov <maddoger@gmail.com>
 * @link http://syrchikov.name
 * @package 
 */
class BackendAsset extends AssetBundle
{
    public $css = [
        'menu-editor.css'
    ];

    public $js = [
        'jquery.mjs.nestedSortable.js',
    ];

    public $depends = [
        'yii\jui\JuiAsset',
    ];

    public function init()
    {
        $this->sourcePath = __DIR__.'/dist';
        parent::init();
    }
}