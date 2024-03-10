<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Widget.
 *
 */
class section_button_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     */
    public function get_name()
    {
        return 'saas-button';
    }

    /**
     * Get widget title.
     *
     */
    public function get_title()
    {
        return esc_html__('Section Button', 'elementor-oembed-widget');
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
        return ['custom-category'];
    }


    /**
     * Get custom help URL.
     *
     */

    /**
     * Register oEmbed widget controls.
     *
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'btn_content_section',
            [
                'label' => esc_html__('Button', 'saasgrids'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'btn_label',
            [
                'label' => esc_html__('Button text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get Started', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__('Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        //Start Style Section
        $this->start_controls_section(
            'button_style',
            [
                'label' => esc_html__('Button One', 'saasgrids'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'btn_style_tabs'
        );

        $this->start_controls_tab(
            'btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'textdomain'),
            ]
        );
        $this->add_control(
            'btn_text_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button .btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'btn_bg_color',
            [
                'label' => esc_html__('Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button .btn' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'textdomain'),
            ]
        );
        $this->add_control(
            'btn_bg_hov_color',
            [
                'label' => esc_html__('Background Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button .btn:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_text_hov_color',
            [
                'label' => esc_html__('Text Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button .btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();
?>
        <div class="button wow fadeInUp" data-wow-delay=".6s">
            <a href="<?php echo $settings['btn_link'] ?>" class="btn"><?php echo $settings['btn_label'] ?></a>
        </div>
<?php
    }
}
