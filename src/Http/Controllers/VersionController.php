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
            'laravel' => app()->version(),
            'nova' => Nova::version(),
        ];
    }

    private function getDatabase()
    {
        $knownDatabases = [
            'sqlite',
            'mysql',
            'pgsql',
            'sqlsrv',
        ];

        if (! in_array(config('database.default'), $knownDatabases)) {
            return 'Unkown';
        }

        $results = DB::select(DB::raw("select version()"));

        return $results[0]->{'version()'};
    }
}
