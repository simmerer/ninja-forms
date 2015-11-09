<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class NF_Fields_Phone
 */
class NF_Fields_Phone extends NF_Abstracts_UserInfo
{
    protected $_name = 'phone';

    protected $_nicename = 'Phone';

    protected $_section = 'userinfo';

    protected $_type = 'textbox';

    protected $_templates = array( 'tel', 'textbox', 'input' );

    public function __construct()
    {
        parent::__construct();

        $this->_nicename = __( 'Phone', 'ninja-forms' );
    }
}
