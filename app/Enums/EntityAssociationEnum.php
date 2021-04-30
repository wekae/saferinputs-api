<?php


namespace App\Enums;

use \Spatie\Enum\Enum;

/**
 * @method static self POST_ASSOCIATION()
 * @method static self MEDIA_ASSOCIATION()
 * @method static self DOWNLOADS_ASSOCIATION()
 */
class EntityAssociationEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'POST_ASSOCIATION' => 'POST',
            'MEDIA_ASSOCIATION' => 'MEDIA',
            'DOWNLOADS_ASSOCIATION' => 'DOWNLOADS',
        ];
    }

}
