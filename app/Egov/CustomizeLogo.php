<?php
/**
 * @package cam-portal-2
 */

namespace App\Egov;

class CustomizeLogo
{
    public function register() {
        add_action( 'customize_register', array( $this, 'customizeManager') );
    }

    public function customizeManager( $manager ) {
        /**
         * Add a customize panel.
         */
        $manager->add_panel(
            /**
             * (WP_Customize_Panel|string) (Required) Customize Panel object, or ID.
             */
            'panel_id',
            
            /**
             * (array) (Optional) Array of properties for the new Panel object. 
             * See WP_Customize_Panel::__construct() for information on accepted arguments.
             * Default value: array()
             */
            array(
                /**
                 * int) Priority of the panel, defining the display order of panels and sections. 
                 * Default 160.
                 */
                'priority' => 160,

                /**
                 * (string) Capability required for the panel. 
                 * Default edit_theme_options.
                 */
                'capability' => 'edit_theme_options',

                /**
                 * (string|string[]) Theme features required to support the panel.
                 */
                // 'theme_supports' => '',

                /**
                 * (string) Title of the panel to show in UI.
                 */
                'title' => __( 'Panel Title', 'sage' ),

                /**
                 * (string) Description to show in the UI.
                 */
                'description' => __( 'Panel Description', 'sage' ),

                /**
                 * (string) Type of the panel.
                 */
                // 'type' => '',

                /**
                 * (callable) Active callback.
                 */
                // 'active_callback' => array( $this, 'activeCallback' )
            )
        );

        /**
         * Add a customize section.
         */
        $manager->add_section(
            /**
             * (WP_Customize_Section|string) (Required) Customize Section object, or ID.
             */
            'section_id',

            /**
             * (array) (Optional) Array of properties for the new Section object. 
             * See WP_Customize_Section::__construct() for information on accepted arguments.
             * Default value: array()
             */ 
            array(
                /**
                 * (int) Priority of the section, defining the display order of panels and sections. 
                 * Default 160.
                 */
                'priority' => 1,

                /**
                 * (string) The panel this section belongs to (if any).
                 */
                // 'panel' => 'panel_id',
                
                /**
                 * (string) Capability required for the section. 
                 * Default 'edit_theme_options'
                 */
                'capability' => 'edit_theme_options',

                /**
                 * (string|string[]) Theme features required to support the section.
                 */
                // 'theme_supports' => '',
                
                /**
                 * (string) Title of the section to show in UI.
                 */
                'title' => __( 'Section Title', 'sage' ),

                /**
                 * (string) Description to show in the UI.
                 */
                'description' => __( 'Section Description', 'sage' ),

                /**
                 * (string) Type of the section.
                 */
                // 'type' => 'text',

                /**
                 * (callable) Active callback.
                 */
                // 'active_callback' => array( $this, 'activeCallback' ),

                /**
                 * (bool) Hide the description behind a help icon, instead of inline above the first control. 
                 * Default false.
                 */
                'description_hidden' => false
            )
        ); 
        
        $manager->add_setting(
            'logo_small_setting_id',
            array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
            )
        );

        $manager->add_setting(
            'logo_medium_setting_id',
            array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
            )
        );
        
        $manager->add_setting(
            'logo_large_setting_id',
            array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
            )
        );

        $manager->add_setting(
            'theme_color_setting',
            array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'default' => '#0956AE',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        
        $manager->add_setting(
            'theme_color_secondary_setting',
            array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'default' => '#0956AE',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        
        $manager->add_setting(
            'khmer_font_setting',
            array(
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'default'    => 'Koh-Santepheap',
            )
        );
        
        $manager->add_control( 
            new \WP_Customize_Cropped_Image_Control(
                $manager,
                'logo_small_control_id', 
                array(
                    'width' => 40,
                    'height' => 40,
                    'section' => 'title_tagline',
                    'settings' => 'logo_small_setting_id',
                    'description' => __( '40 × 40 pixels', 'sage' ),
                )
            )
        );

        $manager->add_control( 
            new \WP_Customize_Cropped_Image_Control(
                $manager,
                'logo_medium_control_id', 
                array(
                    'width' => 60,
                    'height' => 60,
                    'section' => 'title_tagline',
                    'settings' => 'logo_medium_setting_id',
                    'description' => __( '60 × 60 pixels', 'sage' ),
                )
            )
        );

        $manager->add_control( 
            new \WP_Customize_Cropped_Image_Control(
                $manager,
                'logo_large_control_id', 
                array(
                    'width' => 110,
                    'height' => 110,
                    'section' => 'title_tagline',
                    'settings' => 'logo_large_setting_id',
                    'description' => __( '110 × 110 pixels', 'sage' ),
                )
            )
        );

        $manager->add_control( 
            new \WP_Customize_Color_Control(
                $manager,
                'color_control', 
                array(
                    'section' => 'title_tagline',
                    'settings' => 'theme_color_setting',
                    'label'      => __( 'Primary Color', 'sage' )
                )
            )
        );

        $manager->add_control( 
            new \WP_Customize_Color_Control(
                $manager,
                'color_control_secondary', 
                array(
                    'section' => 'title_tagline',
                    'settings' => 'theme_color_secondary_setting',
                    'label'      => __( 'Secondary Color', 'sage' )
                )
            )
        );
        
        $manager->add_control( 
            new \WP_Customize_Control(
            $manager,
            'khmer_font_control', 
            array(
               'label'      => __( 'Khmer Font', 'sage' ),
               'settings'   => 'khmer_font_setting',
               'section'    => 'title_tagline',
               'type'    => 'select',
               'choices' => array(
                   'Koh-Santepheap' => 'Koh-Santepheap',
                   'Kantumruy' => 'Kantumruy'
               )
           )
           ) );
    }    
}