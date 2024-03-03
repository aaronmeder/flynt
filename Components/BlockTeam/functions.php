<?php

namespace Flynt\Components\BlockTeam;

use Flynt\FieldVariables;

function getACFLayout(): array
{
    return [
        'name' => 'blockTeam',
        'label' => __('Block: Team', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => 'Team Members',
                'name' => 'teamMembers',
                'type' => 'repeater',
                'collapsed' => '',
                'min' => 1,
                'layout' => 'table',
                'button_label' => 'Add Team Member',
                'sub_fields' => [
                    [
                        'label' => 'Name',
                        'name' => 'name',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'label' => 'Photo',
                        'name' => 'photo',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => 1200,
                        'mime_types' => 'jpg,jpeg',
                        'required' => 1,
                    ],
                ]
            ],
            [
                'label' => __('Options', 'flynt'),
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    FieldVariables\getTheme(),
                    FieldVariables\getSize(),
                    FieldVariables\getAlignment(),
                    FieldVariables\getTextAlignment()
                ]
            ]
        ]
    ];
}
