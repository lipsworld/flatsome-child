<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>
<div class="product-page-sections">
	<?php $yotpo = true; ?>
	<?php foreach ( $tabs as $key => $tab ) : ?>
		<?php if($tab['callback'] != NULL): ?>
			<?php if($key == 'lifestyle'): ?>
			<div class="row row-full-width row-lifestyle">
				<?php call_user_func( $tab['callback'], $key, $tab ) ?>
			</div>
			<?php else: ?>
			<?php if($yotpo){
				wc_yotpo_show_widget();
			}
				$yotpo = false;
			?>
			<div class="product-section">
				<div class="row">
					<div class="large-2 col pb-0 mb-0">
						 <h5 class="uppercase mt"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></h5>
					</div>

					<div class="large-10 col pb-0 mb-0">
						<div class="panel entry-content">
							<?php call_user_func( $tab['callback'], $key, $tab ) ?>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
<?php endif; ?>
