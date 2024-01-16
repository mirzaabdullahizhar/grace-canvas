<?php

namespace App\Models;

use App\Contracts\DefaultMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model implements DefaultMethods
{
    use HasFactory;

    protected $table = 'users';

    public static function insertInfo()
    {
    }

    public static function insertBulkInfo()
    {
    }

    public static function updateInfo()
    {
    }

    public static function deleteInfo()
    {
    }

    public static function restoreInfoByID()
    {
    }

    public static function getInfoByID(int $ID)
    {
        return self::find($ID);
    }

    public static function getAll()
    {
        return self::all();
    }

    public static function getUsers()
    {
        return self::all();
    }
}
