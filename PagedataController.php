<?php
/* Security measure */
if (!defined('IN_CMS')) { exit(); }

class PagedataController extends PluginController {

    public function __construct() {
        $this->setLayout('backend');
        $this->assignToLayout('sidebar', new View('../../plugins/pagedata/views/sidebar'));
    }

    public function index() {
     $this->display('pagedata/views/index', array());	
    }

    public function documentation() {
        $this->display('pagedata/views/documentation');
    }

    function settings() {
        /** You can do this...
        $tmp = Plugin::getAllSettings('skeleton');
        $settings = array('my_setting1' => $tmp['setting1'],
                          'setting2' => $tmp['setting2'],
                          'a_setting3' => $tmp['setting3']
                         );
        $this->display('comment/views/settings', $settings);
         *
         * Or even this...
         */

        $this->display('pagedata/views/settings', Plugin::getAllSettings('pagedata'));
    }
}