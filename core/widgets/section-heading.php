<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Widget.
 *
 */
class section_heading_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     */
    public function get_name()
    {
        return 'saas-heading';
    }

    /**
     * Get widget title.
     *
     */
    public function get_title()
    {
        return esc_html__('Section Heading', 'elementor-oembed-widget');
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
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-oembed-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_sub_title',
            [
                'label' => esc_html__('Show Sub Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'textdomain'),
                'label_off' => esc_html__('Hide', 'textdomain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__('Sub Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('FEATURES', 'textdomain'),
                'condition' => [
                    'show_sub_title' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Your Experience Gets Better And Better Over Time.', 'textdomain'),
            ]
        );

        $this->add_control(
            'desc',
            [
                'label' => esc_html__('Description', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 4,
                'default' => esc_html__('There are many variations of passages of Lorem Ipsum available', 'textdomain'),
                'placeholder' => esc_html__('Type your description here', 'textdomain'),
            ]
        );

        $this->end_controls_section();

        //Start Style Section
        $this->start_controls_section(
            'content_style',
            [
                'label' => esc_html__('Style', 'saasgrids'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .section-title h2',
            ]
        );

        $this->add_control(
            'title_gap',
            [
                'label' => esc_html__('Title Bottom Gap', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__('Description Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}}',
                ],
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
?>
        <!-- Start Features Text Area -->
        <div class="section-title">
            <?php if ('yes' === $settings['show_sub_title']) { ?>
                <h3 class="wow zoomIn" data-wow-delay=".2s"><?php echo esc_html($settings['sub_title']) ?></h3>
            <?php
            }
            ?>
            <h2 class="wow fadeInUp" data-wow-delay=".4s"><?php echo esc_html($settings['title']) ?>
            </h2>
            <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo esc_html($settings['desc']) ?></p>
        </div>
        <!-- End Features Text Area -->
<?php
    }
}
