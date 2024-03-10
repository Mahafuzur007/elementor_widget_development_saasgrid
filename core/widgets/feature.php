<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Widget.
 *
 */
class section_feature_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     */
    public function get_name()
    {
        return 'saas-feature';
    }

    /**
     * Get widget title.
     *
     */
    public function get_title()
    {
        return esc_html__('Feature', 'elementor-oembed-widget');
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
            'title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Your Experience Gets Better And Better Over Time.', 'textdomain'),
                'label_block' => true,
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

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Color', 'elementor-oembed-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'choose_icon_type',
            [
                'label' => esc_html__('Choose Icon Style', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'custom',
                'options' => [
                    'custom' => esc_html__('Custom', 'textdomain'),
                    'fontawesome'  => esc_html__('Fontawesome', 'textdomain'),
                ],
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'choose_icon_type' => 'fontawesome',
                ],
            ]
        );

        $this->add_control(
            'select-icon',
            [
                'label' => esc_html__('Custom Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    '' => esc_html__('Default', 'textdomain'),
                    'lni-cloud-upload' => esc_html__('Upload', 'textdomain'),
                    'lni-lock'  => esc_html__('Security', 'textdomain'),
                    'lni-reload' => esc_html__('Reload', 'textdomain'),
                    'lni-shield' => esc_html__('Shield', 'textdomain'),
                    'lni-cog' => esc_html__('API', 'textdomain'),
                    'lni-layers' => esc_html__('Database', 'textdomain'),
                ],

                'condition' => [
                    'choose_icon_type' => 'custom',
                ],
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feature h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__('Description Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feature p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feature i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_bg_color',
            [
                'label' => esc_html__('Icon Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feature i' => 'background: {{VALUE}}',
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
        $icon_type = $settings['choose_icon_type'];
?>
        <!-- Start Single Feature -->
        <div class="single-feature wow fadeInUp" data-wow-delay=".2s">

            <?php if ('custom' === $icon_type) : ?>
                <i class="lni <?php echo esc_html($settings['select-icon']) ?>"></i>
            <?php
            endif
            ?>
            <?php if ('fontawesome' === $icon_type) : ?>
                <i class="<?php echo esc_html($settings['icon']['value']) ?>"></i>
            <?php
            endif
            ?>
            <h3><?php echo esc_html($settings['title']) ?></h3>
            <p><?php echo esc_html($settings['desc']) ?></p>
        </div>
        <!-- End Single Feature -->
<?php
    }
}
