<?php
namespace Pulpmedia\AnalyticsPlugin;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class AnalyticsPluginAssets extends AssetBundle
{
    public function init()
    {
       $this->sourcePath = '@Pulpmedia/AnalyticsPlugin/resources';

       $this->js = [
           'script.js',
       ];

       $this->css = [
           'style.css',
       ];

        parent::init();
    }
}