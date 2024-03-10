<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Widget.
 *
 */
class section_pricing_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     */
    public function get_name()
    {
        return 'saas-pricing';
    }

    /**
     * Get widget title.
     *
     */
    public function get_title()
    {
        return esc_html__('Section Pricing', 'elementor-oembed-widget');
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
            'content',
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
            'pricing',
            [
                'label' => esc_html__('Pricing', 'elementor-oembed-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'currency_symbol',
            [
                'label' => esc_html__('Currency', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('$', 'textdomain'),
            ]
        );

        $this->add_control(
            'amount',
            [
                'label' => esc_html__('Amount', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('12', 'textdomain'),
            ]
        );

        $this->add_control(
            'duration',
            [
                'label' => esc_html__('Duration', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('/mon', 'textdomain'),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'button',
            [
                'label' => esc_html__('Button', 'saasgrids'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'btn_label',
            [
                'label' => esc_html__('Button Label', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get Started', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__('Button Link', 'textdomain'),
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
            'freatures',
            [
                'label' => esc_html__('Freatures', 'saasgrids'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'feat_title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("WHAT'S INCLUDED", 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
                'label_block' => 'yes',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'feat_title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'textdomain'),
                'label_block' => true,
            ]
        );

        // $repeater->add_control(
        //     'feat_icon',
        //     [
        //         'label' => esc_html__('Icon', 'textdomain'),
        //         'type' => \Elementor\Controls_Manager::ICONS,
        //         'default' => [
        //             'value' => 'fas fa-circle',
        //             'library' => 'fa-solid',
        //         ],
        //     ]
        // );

        $this->add_control(
            'features_list',
            [
                'label' => esc_html__('Features List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feat_title' => esc_html__('Cras justo odio.', 'textdomain'),

                    ],
                    [
                        'feat_title' => esc_html__('Dapibus ac facilisis in.', 'textdomain'),

                    ],
                ],
                'title_field' => '{{{ feat_title }}}',
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
        <div class="single-table wow fadeInUp" data-wow-delay=".2s">
            <!-- Table Head -->
            <div class="table-head">
                <h4 class="title"><?php echo $settings['title'] ?></h4>
                <p><?php echo $settings['desc'] ?></p>
                <div class="price">
                    <h2 class="amount"><?php echo $settings['currency_symbol'] ?><?php echo $settings['amount'] ?><span class="duration"><?php echo $settings['duration'] ?></span></h2>
                </div>
                <div class="button">
                    <a href="<?php echo $settings['btn_link']['url'] ?>" class="btn"><?php echo $settings['btn_label'] ?></a>
                </div>
            </div>
            <!-- End Table Head -->
            <!-- Start Table Content -->
            <div class="table-content">
                <h4 class="middle-title">What's Included</h4>
                <!-- Table List -->
                <ul class="table-list">
                    <?php foreach ($settings['features_list'] as $feature_item) { ?>
                        <li><i class="lni lni-checkmark-circle"></i> <?php echo $feature_item['feat_title'] ?></li>
                    <?php } ?>
                </ul>
                <!-- End Table List -->
            </div>
            <!-- End Table Content -->
        </div>
<?php
    }
}
