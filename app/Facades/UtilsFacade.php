<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * Facade to be used with Utils class in Services
 * Class UtilsFacade
 * @package App\Facades
 * @method static integer  formatToBinary($value) Convert value to 0 or 1.
 * @method static object  uploadImage($image, $saved_item) Upload image to the server
 * @method static object  updateImage($image, $saved_item) Update image belonging to an item in the server
 */
class UtilsFacade extends Facade
{
    protected static function getFacadeAccessor(){
        return 'utils';
    }
}
