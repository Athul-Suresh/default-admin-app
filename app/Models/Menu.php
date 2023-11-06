<?php

namespace App\Models;

use App\Exceptions\InvalidCodeException;
use App\Exceptions\MenuAlreadyExistsException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = [];


    public static function createMenu(array $attributes = [])
    {
        if (!static::isValidCode($attributes['code'])) {
            throw new InvalidCodeException("Invalid code name");
        }

        if (static::menuExists($attributes['code'])) {
            throw new MenuAlreadyExistsException("Menu already exists");
        }

        return static::create($attributes);
    }

    public static function isValidCode($code)
    {
        return preg_match('/^[a-z0-9_-]+$/', $code);
    }

    public static function menuExists($code)
    {
        return static::where('code', $code)->exists();
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItems::class);
    }

    public function children()
    {
        return $this->hasMany(MenuItems::class);
    }
}

