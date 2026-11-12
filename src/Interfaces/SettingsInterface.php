<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Settings\Interfaces;

interface SettingsInterface
{
    public function getSettings(?array $attributeNames = null) : array;

    public function setSettings(?array $values = null);

    public function getPublicProperties(): array;
}