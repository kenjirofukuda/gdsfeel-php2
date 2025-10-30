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

    public static ?Library $seed_instance = null;

    public static function seed_instance(): Library
    {
        if (self::$seed_instance === null) {
            $lib = Inform::seed_instance()->library;
            $lib->make_cache();
            $lib->export_to_js();
            self::$seed_instance = $lib;
        }
        return self::$seed_instance;
    }

    public function cache_path(): string
    {
        return storage_path('data.bin');
    }

    public function make_cache(): void
    {
        $ser = serialize($this);
        file_put_contents($this->cache_path(), $ser);
    }

    public function invalidate_cache(): void
    {
        unlink($this->cache_path());
    }

    public function export_to_js(): void
    {
        $lib_json = json_encode($this);
        $data_js = [];
        $data_js[] = 'function jsonData() {';
        $data_js[] = 'return ';
        $data_js[] = $lib_json;
        $data_js[] = '; }';

        $json_path = storage_path('lib_data.js');
        file_put_contents($json_path, join($data_js));
    }

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
