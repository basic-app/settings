<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Settings\Traits;

trait Settings
{
    public function getSettings(?array $attributeNames = null) : array
    {
        $settingsClass = get_class($this);

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
        $settingsClass = get_class($this);

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