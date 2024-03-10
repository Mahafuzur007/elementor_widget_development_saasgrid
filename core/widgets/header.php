<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Widget.
 *
 */
class section_header_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     */
    public function get_name()
    {
        return 'saas-header';
    }

    /**
     * Get widget title.
     *
     */
    public function get_title()
    {
        return esc_html__('Section Header', 'elementor-oembed-widget');
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


    private function get_available_menus()
    {

        $menus = wp_get_nav_menus();

        $options = [];

        foreach ($menus as $menu) {
            $options[$menu->slug] = $menu->name;
        }

        return $options;
    }

    /**
     * Register oEmbed widget controls.
     *
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'section_menu',
            [
                'label' => esc_html__('Menu', 'elementor-oembed-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $menus = $this->get_available_menus();

        $this->add_control(
            'menu',
            [
                'label' => esc_html__('Menu', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $menus,
                'save_default' => true,
                'selectors' => [
                    '{{WRAPPER}} .your-class' => 'menu: {{VALUE}};',
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
        $menus = $this->get_available_menus();
        if (empty($menus)) {
            return false;
        }

        $settings = $this->get_settings_for_display();
?>
        <!-- Start Navbar -->
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.html">
                <img src="assets/images/logo/white-logo.svg" alt="Logo">
            </a>
            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                <ul id="nav" class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#home" class="page-scroll active" aria-label="Toggle navigation"><?php echo $settings['menu'] ?></a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="#features" class="page-scroll" aria-label="Toggle navigation">Features</a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" aria-label="Toggle navigation">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a href="#pricing" class="page-scroll" aria-label="Toggle navigation">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" aria-label="Toggle navigation">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-4" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Blog</a>
                        <ul class="sub-menu collapse" id="submenu-1-4">
                            <li class="nav-item"><a href="javascript:void(0)">Blog Grid Sidebar</a>
                            </li>
                            <li class="nav-item"><a href="javascript:void(0)">Blog Single</a></li>
                            <li class="nav-item"><a href="javascript:void(0)">Blog Single
                                    Sibebar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" aria-label="Toggle navigation">Contact</a>
                    </li> -->
                </ul>
            </div> <!-- navbar collapse -->
            <div class="button add-list-button">
                <a href="javascript:void(0)" class="btn">Get it now</a>
            </div>
        </nav>
        <!-- End Navbar -->
<?php
    }
}
