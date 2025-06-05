<?php
    function wbdm_fields_socials() {

        add_action( 'acf/include_fields', function() {
            if ( ! function_exists( 'acf_add_local_field_group' ) ) {
                return;
            }

            acf_add_local_field_group( array(
                'key' => 'group_6840f7e16eaf4',
                'title' => 'Socials',
                'fields' => array(
                    array(
                        'key' => 'field_6840f7e2ad72c',
                        'label' => 'Social media profil',
                        'name' => 'social_media_profile',
                        'aria-label' => '',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'layout' => 'row',
                        'pagination' => 0,
                        'min' => 0,
                        'max' => 0,
                        'collapsed' => '',
                        'button_label' => 'Dodaj wiersz',
                        'rows_per_page' => 20,
                        'sub_fields' => array(
                            array(
                                'key' => 'field_6840f7fead72d',
                                'label' => 'Zdjecie',
                                'name' => 'img',
                                'aria-label' => '',
                                'type' => 'image',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'return_format' => 'url',
                                'library' => 'all',
                                'min_width' => '',
                                'min_height' => '',
                                'min_size' => '',
                                'max_width' => '',
                                'max_height' => '',
                                'max_size' => '',
                                'mime_types' => '',
                                'preview_size' => 'medium',
                                'parent_repeater' => 'field_6840f7e2ad72c',
                            ),
                            array(
                                'key' => 'field_6840fe0cbadca',
                                'label' => 'Numer Followersow',
                                'name' => 'followers_count',
                                'aria-label' => '',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'maxlength' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'parent_repeater' => 'field_6840f7e2ad72c',
                            ),
                            array(
                                'key' => 'field_6840f826ad72f',
                                'label' => 'Tekst',
                                'name' => 'text',
                                'aria-label' => '',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'maxlength' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'parent_repeater' => 'field_6840f7e2ad72c',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'block',
                            'operator' => '==',
                            'value' => 'wbdm/socials',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
                'show_in_rest' => 0,
            ) );
        } );

    }
    add_action('acf/init', __NAMESPACE__ .'\wbdm_fields_socials');