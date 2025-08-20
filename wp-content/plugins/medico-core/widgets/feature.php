<?php
namespace ElementorMedico\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Medico_Feature extends Widget_Base {
/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'medico_feature';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Medico Feature', 'medico' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'medico-widget-category' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'medico' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */

    protected function register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'medico' ),
            ]
        );

        $this->add_control(
            'icon_style',
            [
                'label' => esc_html__( 'Icon Style', 'textdomain' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'image' => esc_html__( 'Image', 'textdomain' ),
                    'svg'   => esc_html__( 'Svg', 'textdomain' ),
                    'icon'  => esc_html__( 'Icon', 'textdomain' ),
                ],
            ]
        );

        $this->add_control(
            'svg',
            [
                'label' => esc_html__( 'SVG Code', 'medico' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#121018" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="7" r="4"/>
                                <path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/>
                                <path d="M18 15c2 0 3-2 3-2v-3a3 3 0 0 0-6 0v3s1 2 3 2z"/>
                            </svg>',
                'label_block' => true,
                'condition' => [
                    'icon_style' => 'svg',
                ],
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'textdomain' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-heartbeat',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'icon_style' => 'icon',
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Choose Image', 'textdomain' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'icon_style' => 'image',
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'medico' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Lorem Ipsum', 'medico' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__( 'Content', 'medico' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi', 'medico' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'medico' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( '#', 'medico' ),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Style section
        $this->style_control_section();
    }

    protected function style_control_section() {
        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Style', 'medico' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_transform',
            [
                'label' => __( 'Text Transform', 'medico' ),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => __( 'None', 'medico' ),
                    'uppercase' => __( 'UPPERCASE', 'medico' ),
                    'lowercase' => __( 'lowercase', 'medico' ),
                    'capitalize' => __( 'Capitalize', 'medico' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero h2' => 'text-transform: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- Featured Services Section -->
       <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <?php if ( $settings['icon_style'] == 'icon' ) : ?>
                                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                <?php elseif ( $settings['icon_style'] == 'image' ) : ?>
                                    <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="">
                                <?php elseif ( $settings['icon_style'] == 'svg' ) : ?>
                                    <?php echo $settings['svg']; ?>
                                <?php endif; ?>
                            </div>
                            <h4><a href="<?php echo esc_url($settings['link']); ?>" class="stretched-link"><?php echo esc_html($settings['title']); ?></a></h4>
                            <p><?php echo medico_kses_function($settings['content']); ?></p>
                        </div>
                    </div><!-- End Service Item --><!-- /Featured Services Section -->
        <?php
    }

   protected function content_template() {
		?>
		<div class="title">
			{{{ settings.title }}}
		</div>
		<?php
	}
}

$widgets_manager->register( new Medico_Feature() );
