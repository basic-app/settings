<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Settings;

use CodeIgniter\Config\BaseConfig;
use BasicApp\Settings\Interfaces\SettingsInterface;
use BasicApp\Form\Interfaces\FormInterface;
use BasicApp\Settings\Traits\Settings;
use BasicApp\Form\Traits\Form;
use CodeIgniter\Traits\PropertiesTrait;

abstract class SettingsConfig extends BaseConfig implements SettingsInterface, FormInterface 
{
    use Settings;
    use Form;
    use PropertiesTrait;

    public function __construct()
    {
        parent::__construct();

        if (static::$override)
        {
            static::$override = false;

            $this->fill($this->getSettings());

            static::$override = true;
        }
    }

    public function save(&$errors = null) : bool
    {
        $this->setSettings();

        return true;
    }
}