<?php

namespace MauticPlugin\AivieTrelloBundle\Openapi\lib\Model;

/**
 * UpdateCardPosParameterOneOf Class Doc Comment.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 */
class UpdateCardPosParameterOneOf
{
    /**
     * Possible values of this enum.
     */
    public const TOP = 'top';

    public const BOTTOM = 'bottom';

    /**
     * Gets allowable values of the enum.
     *
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::TOP,
            self::BOTTOM,
        ];
    }
}
