<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Settings\Traits;

use ReflectionClass;

trait Settings
{
    public function getSettingsName(): string
    {
        return (new ReflectionClass($this))->getShortName();
    }

    public function getSettings(?array $attributeNames = null) : array
    {
        $settingsClass = $this->getSettingsName();

        if ($attributeNames === null)
        {    
            $attributeNames = array_keys($this->getPublicProperties());
        }

        $settingNames = [];

        foreach($attributeNames as $attribute) 
        {
            $settingNames[] = $settingsClass . '.' . $attribute;
        }

        $return = [];

        foreach(service('settings')->getMany($settingNames) as $key => $value) 
        {
            list($class, $var) = explode('.', $key);

            if ($value !== null)
            {
                $return[$var] = $value;
            }
        }

        return $return;
    }

    public function setSettings(?array $values = null)
    {
        $settingsClass = $this->getSettingsName();

        if ($values === null)
        {
            $values = $this->getPublicProperties();
        }

        $settings = [];

        foreach($values as $key => $value)
        {
            $settings[$settingsClass . '.' . $key] = $value;
        }

        service('settings')->setMany($settings);
    }
}