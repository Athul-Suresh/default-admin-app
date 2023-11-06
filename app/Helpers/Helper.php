<?php

use App\Models\MenuItems;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;

if(!function_exists('route_is')){
    function route_is($route=null){
        if(Request::routeIs($route)){
            return true;
        }else{
            return false;
        }
    }
}


if (!function_exists('selectOptions')) {
    function selectOptions($menuId, $ignoreItemId = null, \Closure $closure = null)
    {
        $options = (new MenuItems())->withQuery($closure)->buildSelectOptions($menuId, $ignoreItemId);
        return Collection::make($options)->all();
    }
}
