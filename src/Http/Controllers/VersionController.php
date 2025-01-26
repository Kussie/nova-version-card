<?php

namespace Kussie\VersionCard\Http\Controllers;

use DB;
use Laravel\Nova\Nova;

class VersionController
{
    public function versions()
    {
        return [
            'os' => php_uname('s') . ' (' . php_uname('r') . ' - ' . php_uname('v') . ')',
            'php' => phpversion(),
            'database' => $this->getDatabase(),
            'laravel' => \Illuminate\Foundation\Application::VERSION,
            'app' => app()->version(),
            'nova' => Nova::version(),
        ];
    }

    private function getDatabase()
    {
        $knownDatabases = [
            'sqlite' => 'SQLite',
            'mysql' => 'MySQL',
            'pgsql' => 'PostgreSQL',
            'sqlsrv' => 'SQL Server',
        ];

        $databaseType = config('database.default');

        if (! array_key_exists($databaseType, $knownDatabases)) {
            return 'Unknown Database Type';
        }

        try {
            $results = \Illuminate\Support\Facades\DB::select("select version() as version");
            $databaseVersion = $results[0]->version ?? 'Unknown Version';

            return "{$knownDatabases[$databaseType]} - {$databaseVersion}";
        } catch (\Exception $e) {
            return "{$knownDatabases[$databaseType]} - Unable to fetch version: " . $e->getMessage();
        }
    }
}
