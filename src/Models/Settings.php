<?php

namespace Pulpmedia\AnalyticsPlugin\Models;

use craft\base\Model;

class Settings extends Model {
    
    public $code = '';
    public $messageText = 'This page uses Cookies';
    public $ctaText = 'OK';
    public $enabled = false;
    public $bgColor = '#000';
    public $textColor = '#fff';
    public $buttonColor = '#fff';
    public $buttonTextColor = '#000';

    public function rules() {
        return [
            [['code'], 'required'],
            [['messageText', 'ctaText', 'bgColor', 'textColor', 'buttonColor', 'buttonTextColor'], 'string'],
            [['enabled'], 'boolean'],
        ];
    }
}