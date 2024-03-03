<?php

namespace Flynt\Components\ServiceSlider;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=ServiceSlider', function (array $data): array {
    $data['sliderOptions'] = Options::getTranslatable('SliderOptions');
    $data['jsonData'] = [
        'options' => array_merge($data['sliderOptions'], $data['options']),
    ];
    return $data;
});

function getACFLayout(): array
{
    return [
        'name' => 'ServiceSlider',
        'label' => __('Block: Service Slider', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Title Alignment', 'flynt'),
                'name' => 'titleAlignment',
                'type' => 'button_group',
                'choices' => [
                    'left' => sprintf('<i class="dashicons dashicons-editor-alignleft" title="%1$s"></i>', __('Align items left', 'flynt')),
                    'center' => sprintf('<i class="dashicons dashicons-editor-aligncenter" title="%1$s"></i>', __('Align items center', 'flynt'))
                ],
                'default_value' => 'left'
            ],
            [
                'label' => __('Title', 'flynt'),
                'instructions' => __('Want to add a headline? And a paragraph? Go ahead! Or just leave it empty and nothing will be shown.', 'flynt'),
                'name' => 'preContentHtml',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'media_upload' => 0,
                'delay' => 0,
            ],
            [
                'label' => __('Services', 'flynt'),
                'name' => 'items',
                'type' => 'repeater',
                'collapsed' => '',
                'layout' => 'table',
                'button_label' => __('Add A Service', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Image', 'flynt'),
                        'instructions' => __('Image-Format: JPG, PNG, SVG, WebP. Aspect Ratio: 3:2.', 'flynt'),
                        'name' => 'image',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'mime_types' => 'jpg,jpeg,png,svg,webp',
                    ],
                    [
                        'label' => 'Image 2',
                        'name' => 'image-2',
                        'type' => 'image',
                        //'return_format' => 'array',
                        'preview_size' => 'medium',
                        'mime_types' => 'jpg,jpeg,png,svg,webp',

                    ],
                    [
                        'label' => 'Service Title',
                        'name' => 'servicetitle',
                        'type' => 'text'
                    ],
                    [
                        'label' => __('Text', 'flynt'),
                        'name' => 'contentHtml',
                        'type' => 'wysiwyg',
                        'delay' => 0,
                        'media_upload' => 0,
                        'required' => 1,
                        'wrapper' => [
                            'width' => 60
                        ],
                    ],
                    [
                        'label' => 'Link to Page',
                        'name' => 'linkpage',
                        'type' => 'link',
                        'return_format' => 'url'
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
                'label' => __('Enable Autoplay', 'flynt'),
                'name' => 'autoplay',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1
            ],
            [
                'label' => __('Autoplay Speed (in milliseconds)', 'flynt'),
                'name' => 'autoplaySpeed',
                'type' => 'number',
                'min' => 2000,
                'step' => 1,
                'default_value' => 4000,
                'required' => 1,
                'conditional_logic' => [
                    [
                        [
                            'fieldPath' => 'autoplay',
                            'operator' => '==',
                            'value' => 1
                        ]
                    ]
                ],
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    FieldVariables\getTheme(),
                    
                    [
                        'label' => __('Show as Card', 'flynt'),
                        'name' => 'card',
                        'type' => 'true_false',
                        'default_value' => 0,
                        'ui' => 1
                    ]
                ]
            ]
        ]
    ];
}
