<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Settings;

use BasicApp\Settings\Interfaces\SettingsInterface;
use BasicApp\Form\Interfaces\FormInterface;
use BasicApp\Settings\Traits\Settings as SettingsTrait;
use BasicApp\Form\Traits\Form;
use CodeIgniter\Traits\PropertiesTrait;

abstract class Settings implements SettingsInterface, FormInterface
{
    use SettingsTrait, Form, PropertiesTrait;

    static bool $override = true;

    public function __construct()
    {
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