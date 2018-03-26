<?php

namespace Pulpmedia\AnalyticsPlugin;
use craft\web\assets\cp\CpAsset;
use craft\web\View;

class Plugin extends \craft\base\Plugin{

    public function init() {
        // Template Hook
		\Craft::$app->view->hook(
			'pulp-analytics',
			[$this, 'onRegisterAnalyticsHook']
        );

        parent::init();
    }

    public $hasCpSettings = true;

    protected function createSettingsModel()
    {
        return new \Pulpmedia\AnalyticsPlugin\Models\Settings();
    }
    protected function settingsHtml()
    {
        return \Craft::$app->getView()->renderTemplate('pulpmedia-analytics/settings', [
            'settings' => $this->getSettings()
        ]);
    }

    /**
	 * @param $context
	 *
	 * @return string
	 * @throws \Twig_Error_Loader
	 * @throws \yii\base\Exception
	 */
	public function onRegisterAnalyticsHook (&$context)
	{
        $enabled = $this->getSettings()['enabled'];
        if($enabled){

            $craft = \Craft::$app;
            $messageText = $this->getSettings()['messageText'];
            $ctaText = $this->getSettings()['ctaText'];
            $code = $this->getSettings()['code'];
            $bgColor = $this->getSettings()['bgColor'];
            $textColor = $this->getSettings()['textColor'];
            $buttonTextColor = $this->getSettings()['buttonTextColor'];
            $buttonColor = $this->getSettings()['buttonColor'];
            $oldTemplateMode = $craft->view->getTemplateMode();
            $craft->view->setTemplateMode(View::TEMPLATE_MODE_CP);
            $accepted = isset($_COOKIE['user-accepted-cookies']);

            $rendered = $craft->getView()->renderTemplate(
                'pulpmedia-analytics/analytics',
                [
                    'messageText' => $messageText,
                    'ctaText' => $ctaText,
                    'code' => $code,
                    'accepted' => $accepted,
                    'bgColor' => $bgColor,
                    'textColor' => $textColor,
                    'buttonColor' => $buttonColor,
                    'buttonTextColor' => $buttonTextColor,
                    ]
            );
            $craft->view->setTemplateMode($oldTemplateMode);

            return $rendered;
        }
	}
}