<?php

namespace App\gds;

/**
 * Description of Library
 *
 * @author kenjiro
 */
class Library
{
    public string $name;
    public array $units;
    public array $bgnlib;

    /**
     * array(string => Structure)
     */
    public array $structures = [];

    function addStructure(Structure $structure): void
    {
        $this->structures[$structure->name] = $structure;
    }

    /**
     * @return array(Structure)
     */
    function structures(): array
    {
        return $this->structures;
    }

    /**
     * @return array(string)
     */
    function structureNames(): array
    {
        return array_keys($this->structures);
    }

    /**
     * @return bool
     */
    function hasStructureName(string $name): bool
    {
        return array_key_exists($name, $this->structures);
    }

    /**
     * @return Structure|null
     */
    function structureNamed(string $name): ?Structure
    {
        if ($this->hasStructureName($name)) {
            return $this->structures[$name];
        }
        return null;
    }
}
