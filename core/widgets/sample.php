<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 */
class Elementor_oEmbed_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     */
    public function get_name()
    {
        return 'oembed';
    }

    /**
     * Get widget title.
     *
     */
    public function get_title()
    {
        return esc_html__('oEmbed', 'elementor-oembed-widget');
    }

    /**
     * Get widget icon.
     *
     */
    public function get_icon()
    {
        return 'eicon-code';
    }

    /**
     * Get widget categories.
     *
     */
    public function get_categories()
    {
        return ['general'];
    }


    /**
     * Get custom help URL.
     *
     */
    public function get_custom_help_url()
    {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Register oEmbed widget controls.
     *
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-oembed-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'url',
            [
                'label' => esc_html__('URL to embed', 'elementor-oembed-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-link.com', 'elementor-oembed-widget'),
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $html = wp_oembed_get($settings['url']);

        echo '<div class="oembed-elementor-widget">';
        echo ($html) ? $html : $settings['url'];
        echo '</div>';
    }
}
