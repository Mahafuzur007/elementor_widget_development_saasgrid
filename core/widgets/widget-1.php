<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Widget_1 extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'js-heading';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('JS Heading', 'js-addon');
    }

    /**
     * Get widget icon.
     */
    public function get_icon()
    {
        return 'eicon-code';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['basic', 'general'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return ['oembed', 'url', 'link'];
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget help URL.
     */
    public function get_custom_help_url()
    {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Register oEmbed widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'js-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );



        $this->add_control(
            'show_title',
            [
                'label' => esc_html__('Show Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'textdomain'),
                'label_off' => esc_html__('Hide', 'textdomain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'widget-title',
            [
                'label' => esc_html__('Heading Text', 'js-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html('Add Your Text Here', 'js-addon'),
                'placeholder' => esc_html__('Enter your title', 'js-addon'),
                'label_block' => true,
                'separator' => 'after',
                'condition' => [
                    'show_title' => 'yes',
                ],
            ]
        );

        //add textarea
        $this->add_control(
            'widget_description',
            [
                'label' => esc_html__('Description', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 4,
                'default' => esc_html__('Default description', 'textdomain'),
                'placeholder' => esc_html__('Type your description here', 'textdomain'),
            ]
        );

        $this->add_control(
            'font-size',
            [
                'label' => esc_html__('Font Size', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .heading p' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .heading h2',
            ]
        );

        //add border
        $this->add_control(
            'border_style',
            [
                'label' => esc_html__('Border Style', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    '' => esc_html__('Default', 'textdomain'),
                    'none' => esc_html__('None', 'textdomain'),
                    'solid'  => esc_html__('Solid', 'textdomain'),
                    'dashed' => esc_html__('Dashed', 'textdomain'),
                    'dotted' => esc_html__('Dotted', 'textdomain'),
                    'double' => esc_html__('Double', 'textdomain'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .your-class' => 'border-style: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color2',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .heading h2' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'border_style' => 'dashed',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_align',
            [
                'label' => esc_html__('Title Alignment', 'textdomain'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'textdomain'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'textdomain'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'textdomain'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justify', 'textdomain'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .heading' => 'text-align: {{VALUE}};',
                ],

            ]
        );

        $this->add_control(
            'widget_link',
            [
                'label' => esc_html__('Link', 'js-addon'),
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

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'js-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .heading h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__('Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .heading h2' => 'background: {{VALUE}}',
                ],
            ]
        );


        $this->end_controls_section();
    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $title = $settings['widget-title'];
        $desc = $settings['widget_description'];
        $border_color = $settings['title_color2'];
?>

        <div class="heading">

            <?php if ('yes' === $settings['show_title']) { ?>
                <h2>
                    <?php echo $title; ?>
                </h2>
            <?php
            }
            ?>
            <p><?php echo $desc; ?></p>

            <a href="<?php echo $settings['widget_link']['url']; ?>"><?php echo $title; ?></a>

            <i class="<?php echo $settings['icon']['value']; ?>"></i>
        </div>
<?php
    }
}
?>