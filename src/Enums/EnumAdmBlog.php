<?php
/**
 * Created By PhpStorm
 * User: trungphuna
 * Date: 6/6/24
 * Time: 3:05 PM
 */

namespace Pigs\BlogAdmin\Enums;

class EnumAdmBlog
{
    const STATUS_PENDING = 1;
    const STATUS_PUBLISHED = 2;
    const STATUS_DRAFT = -1;

    const GET_TEXT_STATUS = [
        self::STATUS_PENDING   => [
            'name'  => 'Pending',
            'class' => ''
        ],
        self::STATUS_PUBLISHED => [
            'name'  => 'Published',
            'class' => ''
        ],
        self::STATUS_DRAFT     => [
            'name'  => 'Draft',
            'class' => ''
        ]
    ];
}
