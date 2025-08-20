<?php
namespace MedicoCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Icons_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Medico_Feature extends Widget_Base {

	public function get_name() {
		return 'medico-feature';
	}

	public function get_title() {
		return __( 'Medico Feature', 'medico-core' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return [ 'medico-widget-category' ];
	}

	public function get_script_depends() {
		return [ 'medico-core' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Feature Items', 'medico-core' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'icon_style',
			[
				'label' => esc_html__( 'Icon Style', 'medico' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'icon',
				'options' => [
					'image' => esc_html__( 'Image', 'medico' ),
					'svg'   => esc_html__( 'SVG', 'medico' ),
					'icon'  => esc_html__( 'Icon', 'medico' ),
				],
			]
		);

		$repeater->add_control(
			'svg',
			[
				'label' => esc_html__( 'SVG Code', 'medico' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#121018" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="7" r="4"/><path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/><path d="M18 15c2 0 3-2 3-2v-3a3 3 0 0 0-6 0v3s1 2 3 2z"/></svg>',
				'condition' => [
					'icon_style' => 'svg',
				],
			]
		);

		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'medico' ),
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

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'medico' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'icon_style' => 'image',
				],
			]
		);

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'medico' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Lorem Ipsum', 'medico' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'content',
			[
				'label' => esc_html__( 'Content', 'medico' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi', 'medico' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'medico' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '#', 'medico' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'features',
			[
				'label' => __( 'Feature Items', 'medico-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __( 'Lorem Ipsum', 'medico-core' ),
						'content' => __( 'Voluptatum deleniti atque corrupti quos dolores...', 'medico-core' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
    'section_style_icon',
    [
        'label' => __( 'Icon', 'medico' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    ]
);

$this->add_responsive_control(
    'icon_size',
    [
        'label' => __( 'Icon Size', 'medico' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [
            'px' => [
                'min' => 10,
                'max' => 200,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .service-item .icon' => 'font-size: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}} .service-item .icon img' => 'max-width: {{SIZE}}{{UNIT}};',
        ],
    ]
);

$this->end_controls_section();

	}

	protected function render() {
    $settings = $this->get_settings_for_display();
    ?>

    <section id="featured-services" class="featured-services section">
        <div class="container">
            <div class="row gy-4">
                <?php foreach ( $settings['features'] as $index => $item ) : ?>
                    <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(100 * ($index+1)); ?>">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <?php if ( $item['icon_style'] === 'icon' ) : ?>
                                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true', 'class' => 'icon' ] ); ?>
                                <?php elseif ( $item['icon_style'] === 'image' ) : ?>
                                    <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="">
                                <?php elseif ( $item['icon_style'] === 'svg' ) : ?>
                                    <?php echo $item['svg']; ?>
                                <?php endif; ?>
                            </div>
                            <h4>
                                <a href="<?php echo esc_url( $item['link'] ); ?>" class="stretched-link">
                                    <?php echo esc_html( $item['title'] ); ?>
                                </a>
                            </h4>
                            <p><?php echo esc_html( $item['content'] ); ?></p>
                        </div>
                    </div><!-- End Service Item -->
                <?php endforeach; ?>
            </div>
        </div>
    </section><!-- /Featured Services Section -->

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
$widgets_manager->register( new Medico_Feature() );