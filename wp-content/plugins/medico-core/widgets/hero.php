<?php
namespace MedicoCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Medico Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Medico_Hero extends Widget_Base {

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
		return 'medico-hero';
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
		return __( 'Medico Hero', 'medico-core' );
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
		return [ 'medico-core' ];
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Title', 'medico' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Welcome to Medicio' , 'medico' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content',
			[
				'label' => esc_html__( 'Content', 'medico' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...', 'medico' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button Text', 'medico' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More' , 'medico' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button URL', 'medico' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'https://your-link.com', 'medico' ),
				'default' => [
					'url' => '#',
				],
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'medico' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'hero_list',
			[
				'label' => esc_html__( 'Slides', 'medico' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Welcome to Medicio', 'medico' ),
						'list_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'medico' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();






		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'medico-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'medico-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'medico-core' ),
					'uppercase' => __( 'UPPERCASE', 'medico-core' ),
					'lowercase' => __( 'lowercase', 'medico-core' ),
					'capitalize' => __( 'Capitalize', 'medico-core' ),
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<!-- Hero Section -->
	<section id="hero" class="hero section">

		<div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

			<?php 
			if ( ! empty( $settings['hero_list'] ) ) : 
				foreach ( $settings['hero_list'] as $index => $item ) :
					$active_class = ( $index === 0 ) ? ' active' : '';

					// unique key per slide button
					$button_key = 'button_arg_' . $index;

					if ( ! empty( $item['button_text'] ) && ! empty( $item['button_link'] ) ) {
						$this->add_link_attributes( $button_key, $item['button_link'] );
						$this->add_render_attribute( $button_key, 'class', 'btn-get-started' );
					}
			?>
				<div class="carousel-item<?php echo esc_attr( $active_class ); ?>">
					<img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="">
					<div class="container">
						<h2><?php echo esc_html( $item['list_title'] ); ?></h2>
						<div class="desc"><?php echo medico_kses_function( $item['list_content'] ); ?></div>
						
						<?php if ( ! empty( $item['button_text'] ) ) : ?>
							<a <?php echo $this->get_render_attribute_string( $button_key ); ?>>
								<?php echo medico_kses_function( $item['button_text'] ); ?>
							</a>
						<?php endif; ?>
					</div>
				</div><!-- End Carousel Item -->
			<?php 
				endforeach;
			endif;
			?>

			<a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>



			<ol class="carousel-indicators"></ol>

		</div>

	</section><!-- /Hero Section -->
		<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>
		<div class="title">
			{{{ settings.title }}}
		</div>
		<?php
	}
}
$widgets_manager->register( new Medico_Hero() );