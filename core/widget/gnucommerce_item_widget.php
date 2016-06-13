<?php
if( ! defined( 'ABSPATH' ) ) exit;

class sir_latest_item_widget extends SIR_COMM_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {
        
        if( ! is_gnucommerce_activated() ){
            return;
        }

        global $wpdb;

		$this->widget_cssclass    = 'sirfurniture_widget_item';
		$this->widget_description = __( '그누커머스 상품 위젯입니다.', 'sir-furniture' );
		$this->widget_id          = 'sirfurniture_item_view';
		$this->widget_name        = __( '그누커머스 상품 위젯', 'sir-furniture' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'title', 'sir-furniture' )
			),
			'limit' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => 12,
				'std'   => 4,
				'label' => __( '출력할 갯수', 'sir-furniture' ),
			),
            'order'   => array(
                'type'  => 'select',
                'options' => array(
                    'ASC' => 'ASC',
                    'DESC' => 'DESC',
                ),
				'std'   => 'DESC',
                'label' => __( '정렬를 지정합니다.', 'sir-furniture' ),
            ),
            'orderby'   => array(
                'type'  => 'select',
                'options' => array(
                    'date' => __('날짜', 'sir-furniture'),
                    'name' => __('제목', 'sir-furniture'),
                    'price' =>  __('가격', 'sir-furniture'),
                    'it_sum_qty' =>  __('판매', 'sir-furniture'),
                    'comment_count' => __('상품후기수', 'sir-furniture'),
                ),
				'std'   => 'date',
                'label' => __( '정렬순서를 지정합니다.', 'sir-furniture' ),
            ),
            'category'   => array(
                'type'  => 'text',
				'std'   => '',
                'label' => __( '카테고리 이름을 입력합니다.', 'sir-furniture' ),
            ),
            'link_url'   => array(
                'type'  => 'text',
				'std'   => '',
                'label' => __( 'more 주소( url )를 지정합니다.', 'sir-furniture' ),
            ),
            'background_url'   => array(
                'type'  => 'text',
				'std'   => '',
                'label' => __( 'background image url 을 지정합니다.', 'sir-furniture' ),
            ),
		);

		parent::__construct();
	}

	/**
	 * Output widget.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		if ( $this->get_cached_widget( $args ) ) {
			return;
		}

		ob_start();

        echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			//echo $args['before_title'] . apply_filters( 'sir_comm_latest_widget_title', $instance['title'] ). $args['after_title'];
		}

        $widget_attr = '';

        $attributes = wp_parse_args( $instance, array(
            'limit' => 4 ,
            'link_url'  => '',
            'background_url' => '',
        ));

        sirfurniture_latest_gnucommerce_shop($attributes);

        echo $args['after_widget'];

		echo $this->cache_widget( $args, ob_get_clean() );
	}
}

?>