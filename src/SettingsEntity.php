<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Settings;

use BasicApp\Settings\Interfaces\SettingsInterface;
use BasicApp\Form\Interfaces\FormInterface;
use BasicApp\Settings\Traits\Settings;
use BasicApp\Form\Traits\Form;
use CodeIgniter\Entity\Entity;

abstract class SettingsEntity extends Entity implements SettingsInterface, FormInterface
{
    use Settings, Form;

    static bool $override = true;

    public function __construct(?array $data = null)
    {
        parent::__construct($data);

        if (static::$override)
        {
            static::$override = false;

            $settings = $this->getSettings(array_keys($this->attributes));

            static::$override = true;

            $this->fill($settings);

            $this->syncOriginal();
        }
    }

    public function save(&$errors = null) : bool
    {
        $this->setSettings($this->attributes);

        return true;
    }

    public function getPublicProperties(): array
    {
        return $this->attributes;
    }
} 