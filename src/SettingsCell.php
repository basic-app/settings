<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Settings;

use CodeIgniter\View\Cells\Cell;
use BasicApp\Settings\Traits\Settings;
use BasicApp\Form\Traits\Form;
use BasicApp\Settings\Interfaces\SettingsInterface;
use BasicApp\Form\Interfaces\FormInterface;

abstract class SettingsCell extends Cell implements SettingsInterface, FormInterface
{
    use Settings, Form;

    public function __construct()
    {
        $values = $this->getSettings();

        $this->fill($values);
    }

    public function save(&$errors = null) : bool
    {
        $this->setSettings();

        return true;
    }
}