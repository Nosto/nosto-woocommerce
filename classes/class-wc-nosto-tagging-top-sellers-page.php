<?php
/**
 * Holds a wrapper class for the "Top Sellers" page post.
 * The class is used from the main plugin file.
 *
 * @package WooCommerce Nosto Tagging
 */

/**
 * Wrapper class for the Top Sellers page post.
 *
 * @since 1.0.0
 */
class WC_Nosto_Tagging_Top_Sellers_Page
{
	/**
	 * A WP_Post publish state value.
	 *
	 * @since 1.0.0
	 */
	const STATUS_PUBLISH = 'publish';

	/**
	 * A WP_Post draft state value.
	 *
	 * @since 1.0.0
	 */
	const STATUS_DRAFT = 'draft';

	/**
	 * A WP_Post trash state value.
	 *
	 * @since 1.0.0
	 */
	const STATUS_TRASH = 'trash';

	/**
	 * Default data for the page post when created.
	 *
	 * @since 1.0.0
	 * @var array
	 */
	protected static $post_default_data = array(
		'post_title'     => 'Top Sellers',
		'post_content'   => '<div class="nosto_element" id="nosto-page-top-sellers"></div>',
		'post_type'      => 'page',
		'comment_status' => 'closed',
	);

	/**
	 * The id of the post.
	 *
	 * @since 1.0.0
	 * @var null|int
	 */
	protected $post_id = null;

	/**
	 * The post object.
	 *
	 * @since 1.0.0
	 * @var null|WP_Post
	 */
	protected $post = null;

	/**
	 * Constructor.
	 *
	 * Loads or creates a Top Sellers page.
	 *
	 * @since 1.0.0
	 * @param null $post_id Optional post id if we want to load an existing post
	 * @return WC_Nosto_Tagging_Top_Sellers_Page
	 */
	public function __construct( $post_id = null ) {
		$this->post_id = $post_id;
		// Only create a new if the given id is null.
		if ( $post_id === null ) {
			$this->create();
		} else {
			$this->load();
		}
	}

	/**
	 * Getter for the page id.
	 *
	 * @since 1.0.0
	 * @return int|null
	 */
	public function get_id() {
		return $this->post_id;
	}

	/**
	 * Publish the page.
	 *
	 * @since 1.0.0
	 */
	public function publish() {
		if ( $this->post && self::STATUS_PUBLISH !== $this->post->post_status
			&& self::STATUS_TRASH !== $this->post->post_status
		) {
			$this->post->post_status = self::STATUS_PUBLISH;
			wp_update_post( $this->post );
		}
	}

	/**
	 * Un-publish the page.
	 *
	 * @since 1.0.0
	 */
	public function unpublish() {
		if ( $this->post && self::STATUS_PUBLISH === $this->post->post_status ) {
			$this->post->post_status = self::STATUS_DRAFT;
			wp_update_post( $this->post );
		}
	}

	/**
	 * Removes the page.
	 *
	 * @since 1.0.0
	 */
	public function remove() {
		if ( $this->post ) {
			wp_delete_post( $this->post_id, true );
		}
	}

	/**
	 * Loads an existing page post.
	 *
	 * @since 1.0.0
	 * @return null|WP_Post
	 */
	protected function load() {
		if ( ! $this->post && ! empty( $this->post_id ) ) {
			$post = get_post( $this->post_id );
			if ( $post instanceof WP_Post ) {
				$this->post = $post;
			}
		}
		return $this->post;
	}

	/**
	 * Creates a new page post.
	 *
	 * @since 1.0.0
	 * @return null|WP_Post
	 */
	protected function create() {
		$this->post_id = wp_insert_post( self::$post_default_data );
		return $this->load();
	}
}
