<?php
use Ramsey\Uuid\Doctrine\UuidGenerator;

return [
    'App\Domain\Teacher\Teacher' => [
        'type'   => 'entity',
        'table'  => 'teachers',
        'id'     => [
            'id' => [
                'type'     => 'uuid',
                'generator' => [
                    'strategy' => 'custom'
                ],
                'customIdGenerator' => [
                    'class' => UuidGenerator::class
                ],
            ],
        ],
        'fields' => [
            'name' => [
                'type' => 'string'
            ]
        ]
    ]
];