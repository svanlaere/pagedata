<?php
/* Security measure */
if (!defined('IN_CMS')) {
    exit();
}

Plugin::setInfos(array(
    'id' => 'pagedata',
    'title' => __('Pagedata'),
    'description' => __('Store additional page data'),
    'version' => '0.1.0',
    'license' => 'MIT',
    'website' => 'http://svanlaere.nl/',
    'update_url' => 'http://svanlaere.nl/plugin-versions.xml',
    'require_wolf_version' => '0.8.3'
));

if (!defined("PAGEDATA")) {
    define('PAGEDATA', PLUGINS_ROOT . DS . 'pagedata');
}

Plugin::addController('pagedata', __('Pagedata'), 'admin_view', false);

//Plugin::addJavascript('pagedata', 'js/javascript.js');
Observer::observe('view_page_edit_tabs', 'page_data_tab_js');
Observer::observe('view_page_edit_tab_links', 'page_data_tab_link');
Observer::observe('view_page_edit_tabs', 'page_data_tab');
Observer::observe('page_add_after_save', 'page_data_tab_save');
Observer::observe('page_edit_after_save', 'page_data_tab_save');
Observer::observe('page_found', 'page_data_tab_content');

AutoLoader::addFolder(PAGEDATA . '/models');

function page_data_tab_link($page)
{
    echo '<li class="tab"><a href="#pagedata">' . __('Pagedata') . '</a></li>';
}

function page_data_tab($page)
{
    if (!$pd = Pagedata::findByPageId($page->id)) {
        $pd = new Pagedata();
    }
    
    echo new View(PAGEDATA . DS . 'views' . DS . 'page_tab', array(
        'pd' => $pd
    ));
}

function page_data_tab_save($page)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $keynames  = isset($_POST['keynames']) ? $_POST['keynames'] : '';
        $keyvalues = isset($_POST['keyvalues']) ? $_POST['keyvalues'] : '';
        
        if (!$pd = Pagedata::findByPageId($page->id)) {
            $pd = new Pagedata();
        }
        
        if ($keynames && $keyvalues) {
            
            $keynames = array_map("sanitizeKeys", $keynames);
            
            $pd->data    = array_combine($keynames, $keyvalues);
            $pd->page_id = $page->id;
            
            if (!$pd->save()) {
                echo '<pre>' . print_r($boxes, true) . '</pre>';
                die;
            }
        } else {
            echo 'Nothing to save!';
        }
    }
}

function page_data_tab_content($page)
{
    if (!$pd = Pagedata::findByPageId($page->id)) {
        $pd = new Pagedata();
    }
    
    $page->pagedata = json_decode($pd->data);
}


function page_data_tab_js()
{
    echo new View(PAGEDATA . DS . 'views' . DS . 'javascript', array());
}

function sanitizeKeys($string)
{
	return trim(preg_replace('/[^\w-]/', "_", $string), "_");
}
