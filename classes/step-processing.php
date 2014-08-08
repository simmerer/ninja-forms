<?php
/**
 * Class for performing actions incrementally. Internally used for converting submissions, exporting submissions, etc.
 * Very useful when interacting with large amounts of data.
 *
 * @package     Ninja Forms
 * @subpackage  Classes/Step Processing
 * @copyright   Copyright (c) 2014, WPNINJAS
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       2.7.4
*/

class NF_Step_Processing
{

	/**
	 * Get things rolling
	 * 
	 * @since 2.7.4
	 * @return void
	 */
	function __construct() {

		add_action( 'admin_menu', array( $this, 'add_submenu' ) );
	}

	/**
	 * Setup stuff that needs to run on admin_init.
	 * 
	 * @since 2.7.4
	 * @return void
	 */
	public function add_submenu() {
		// Register our admin page
		$admin_page = add_submenu_page( NULL, __( 'Ninja Forms Processing', 'ninja-forms' ), __( 'Processing', 'ninja-forms' ), apply_filters( 'ninja_forms_admin_menu_capabilities', 'manage_options' ), 'nf-processing', array( $this, 'output_admin_page' ) );
		
		

		add_action( 'admin_print_styles-' . $admin_page, array( $this, 'admin_css' ) );
		add_action( 'admin_print_styles-' . $admin_page, array( $this, 'admin_js' ) );
	}

	/**
	 * Enqueue our admin css
	 * 
	 * @since 2.7.4
	 * @return void
	 */
	public function admin_css() {
		wp_enqueue_style( 'jquery-smoothness', NF_PLUGIN_URL .'css/smoothness/jquery-smoothness.css');
	}

	/**
	 * Enqueue our admin js
	 * 
	 * @since 2.7.4
	 * @return void
	 */
	public function admin_js() {
		wp_enqueue_script( 'nf-processing',
		NF_PLUGIN_URL . 'assets/js/dev/step-processing.js',
		array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable', 'jquery-ui-datepicker', 'jquery-ui-draggable', 'jquery-ui-droppable', 'jquery-ui-progressbar' ) );
	}

	/**
	 * Render our admin page
	 * 
	 * @since 2.7.4
	 * @return void
	 */
	public function output_admin_page() {
		?>
		<style>
			.ui-progressbar {
				position: relative;
				width: 800px;
				max-width: 100%;
				height: 40px;
			}
			.progress-label {
				line-height: 30px;
				position: absolute;
				left: 40%;
				top: 4px;
				font-weight: bold;
				text-shadow: 1px 1px 0 #fff;
			}
		</style>
		<script type="text/javascript">
			<?php
			if ( isset ( $_REQUEST['action'] ) && ! empty ( $_REQUEST['action'] ) ) {
				$action = __( 'Loading...', 'ninja-forms' );
				?>
				var nfProcessingAction = '<?php echo $_REQUEST['action']; ?>';
				<?php
			} else {
				$action = __( 'No Action Specified...', 'ninja-forms' );
				?>
				var nfProcessingAction = 'none';
				<?php
			}
			?>
			
		</script>

		<div class="wrap">
			<h2><?php _e( 'Ninja Forms - Processing', 'ninja-forms' ); ?></h2>
				<div id="nf-upgrade-status">
					<p><?php _e( 'The process has started, please be patient. This could take several minutes. You will be automatically redirected when the process is finished.', 'ninja-forms' ); ?></p>
					<div id="progressbar">
						<div class="progress-label">
							<?php echo $action; ?>
						</div>
					</div>
				</div>
		</div>
		<?php
	}
}

function nf_test(){
	echo 'hello world';
	die();
}
add_action( 'wp_ajax_nf_test', 'nf_test' );