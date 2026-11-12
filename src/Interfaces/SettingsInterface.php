<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Settings\Interfaces;

interface SettingsInterface
{
    public function getSettings(?string $settingsClass = null, ?array $attributeNames = null) : array;

    public function setSettings(?string $settingsClass = null, ?array $values = null);
}