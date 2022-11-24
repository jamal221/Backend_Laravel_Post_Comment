<?php
namespace App\Traits;
use Illuminate\Support\Facades\Cache;

trait increase_time_local_cache
{
    public function add_10_minutes($cache_name)
    {
        if(Cache::store('database')->has('$cache_name'))
        {
            Cache::store('database')->increment('$cache_name','5');
        }

    }
}
