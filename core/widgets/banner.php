<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 */
class Saas_Banner_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     */
    public function get_name()
    {
        return 'saas-banner';
    }

    /**
     * Get widget title
     */
    public function get_title()
    {
        return esc_html__('Banner', 'saasgrids');
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
     */
    public function get_categories()
    {
        return ['basic', 'custom-category'];
    }

    /**
     * Register oEmbed widget controls.
     */
    protected function register_controls()
    {

        //Start Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'saasgrids'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'banner_title',
            [
                'label' => esc_html__('Banner Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Powerful Solutions For Your Startup.', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'banner_desc',
            [
                'label' => esc_html__('Banner Description', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => esc_html__('We are a digital agency that helps brands to achieve their business outcomes.', 'textdomain'),
                'placeholder' => esc_html__('Type your description here', 'textdomain'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'feat_image',
            [
                'label' => esc_html__('Choose Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

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
                'label' => esc_html__('Button One', 'textdomain'),
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

        $this->add_control(
            'btn_options',
            [
                'label' => esc_html__('Video Button', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'play_btn_label',
            [
                'label' => esc_html__('Button Two', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Watch Intro', 'textdomain'),
                'placeholder' => esc_html__('Watch Intro', 'textdomain'),
            ]
        );

        $this->add_control(
            'play_btn_link',
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

        //End Content Section

        //Start Style Section
        $this->start_controls_section(
            'content_style',
            [
                'label' => esc_html__('Style', 'saasgrids'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__('Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-area' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'banner-padding',
            [
                'label' => esc_html__('Banner Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-area .hero-content h1' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .hero-area .hero-content h1',
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
                    '{{WRAPPER}} .hero-area .hero-content h1' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__('Description Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-area .hero-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'desc_gap',
            [
                'label' => esc_html__('Description Spacing', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'custom'],
                'default' => [
                    'top' => 2,
                    'right' => 0,
                    'bottom' => 2,
                    'left' => 0,
                    'unit' => 'em',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-area .hero-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'after',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'button_one_style',
            [
                'label' => esc_html__('Button One', 'saasgrids'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'btn_one_style_tabs'
        );

        $this->start_controls_tab(
            'btn_one_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'textdomain'),
            ]
        );
        $this->add_control(
            'btn_one_text_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-area .hero-content .button .btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'btn_one_bg_color',
            [
                'label' => esc_html__('Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-area .hero-content .button .btn' => 'background: {{VALUE}}',
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
            'btn_one_bg_hov_color',
            [
                'label' => esc_html__('Background Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-area .hero-content .button .btn:hover' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_one_text_hov_color',
            [
                'label' => esc_html__('Text Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-area .hero-content .button .btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tabs();

        $this->end_controls_section();




        $this->start_controls_section(
            'button_two_style',
            [
                'label' => esc_html__('Button Two', 'saasgrids'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'show_btn_two',
            [
                'label' => esc_html__('Show Button Two', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'textdomain'),
                'label_off' => esc_html__('Hide', 'textdomain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->start_controls_tabs(
            'btn_two_style_tabs'
        );

        $this->start_controls_tab(
            'btn_two_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'textdomain'),
            ]
        );
        $this->add_control(
            'btn_two_text_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-area .hero-content .button .video-button .text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_two_bg_color',
            [
                'label' => esc_html__('Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-area .hero-content .button .video-button .video' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'btn_two_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'textdomain'),
            ]
        );

        $this->add_control(
            'btn_two_hov_color',
            [
                'label' => esc_html__('Button Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-area .hero-content .button .video-button .video:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tabs();

        $this->end_controls_section();
        //End Style Section

    }

    /**
     * Render oEmbed widget output on the frontend.
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();
?>
        <!-- Start Hero Area -->
        <section id="home" class="hero-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12 col-12">
                        <div class="hero-content">
                            <h1 class="wow fadeInLeft" data-wow-delay=".4s"><?php echo $settings['banner_title']; ?></h1>
                            <p class="wow fadeInLeft" data-wow-delay=".6s"><?php echo $settings['banner_desc']; ?></p>
                            <div class="button wow fadeInLeft" data-wow-delay=".8s">
                                <a href="<?php echo $settings['btn_link']['url']; ?>" class="btn"><?php echo $settings['btn_label']; ?></a>
                                <?php if ('yes' === $settings['show_btn_two']) { ?>
                                    <a href="<?php echo $settings['play_btn_link']['url']; ?>" class="glightbox video-button"><span class="video"><i class="lni lni-play"></i></span><span class="text"><?php echo $settings['play_btn_label']; ?></span></a>
                                <?php
                                }
                                ?>
                                <!-- <a href="https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM" -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-12">
                        <div class="hero-image wow fadeInRight" data-wow-delay=".4s">
                            <img src="<?php echo $settings['feat_image']['url']; ?>" alt="<?php the_title_attribute(); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Hero Area -->

<?php
    }
}
