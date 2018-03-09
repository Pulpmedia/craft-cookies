<?php

namespace Pulpmedia\AnalyticsPlugin\Models;

use craft\base\Model;

class Settings extends Model {
    
    public $code = '';
    public $messageText = 'This page uses Cookies';
    public $ctaText = 'OK';
    public $enabled = false;

    public function rules() {
        return [
            [['code'], 'required'],
            [['messageText', 'ctaText'], 'string'],
            [['enabled'], 'boolean'],
        ];
    }
}