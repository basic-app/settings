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

    public function __construct()
    {
        $this->fill($this->getSettings());
    }

    public function save(&$errors = null) : bool
    {
        $this->setSettings();

        return true;
    }
}