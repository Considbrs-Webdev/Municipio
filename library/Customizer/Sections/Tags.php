<?php

namespace Municipio\Customizer\Sections;

class Tags
{
    public function __construct(string $sectionID)
    {
        \Kirki::add_field(\Municipio\Customizer::KIRKI_CONFIG, [
            'type'        => 'select',
            'settings'    => 'tags_style_settings',
            'label'       => esc_html__('Tag styling', 'municipio'),
            'description' => esc_html__('Which styling to use for tags.', 'municipio'),
            'section'     => $sectionID,
            'default'     => '',
            'priority'    => 10,
            'choices'     => [
                ''   => esc_html__('Default', 'municipio'),
                'pill' => esc_html__('Pill', 'municipio')
            ],
            'output' => [
                [
                    'type' => 'component_data',
                    'dataKey' => 'tagsStyle',
                    'context' => [
                        [
                            'context' => 'component.tags',
                            'operator' => '==',
                        ],
                    ]
                ]
            ],
        ]);

        \Kirki::add_field(\Municipio\Customizer::KIRKI_CONFIG, [
            'type'        => 'select',
            'settings'    => 'tags_markings_style',
            'label'       => esc_html__('Tag icon', 'municipio'),
            'description' => esc_html__('Icon to prepend tags with.', 'municipio'),
            'section'     => $sectionID,
            'default'     => '',
            'priority'    => 10,
            'choices'     => [
                ''   => esc_html__("Default", 'municipio'),
                'taxonomy-colors' => esc_html__('Dot', 'municipio')
            ],
            'output' => [
                [
                    'type' => 'component_data',
                    'dataKey' => 'tagsMarker',
                    'context' => [
                        [
                            'context' => 'component.tags',
                            'operator' => '==',
                        ],
                    ]
                ]
            ],
        ]);
    }
}
