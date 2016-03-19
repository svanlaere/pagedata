<?php
if (!defined('IN_CMS')) {
    exit();
}

/**
 * pagedata
 * 
 * Store additional page data
 * 
 * @package     Plugins
 * @subpackage  pagedata
 * 
 * @author      svanlaere <samuelvanlaere@gmail.com>
 * @version     0.1.0
 */

class Pagedata extends Record
{
    const TABLE_NAME = 'pagedata';
    
    public $id;
    public $data;
    public $page_id;
    
    public function __construct()
    {
        if (!isset($this->page)) {
            if ($page = Page::findById($this->page_id)) {
                $this->page = $page;
                $this->page->__construct();
            }
        }
    }
    
    public static function findByPageId($page_id)
    {
        return Pagedata::findOneFrom('Pagedata', 'page_id = ?', array(
            $page_id
        ));
    }
      
    public function getColumns()
    {
        return array(
            'id',
            'data',
            'page_id'
        );
    }
    
    public function beforeSave()
    {
        $this->data = array_change_key_case($this->data, CASE_LOWER);
        $this->data = ($filter = array_filter($this->data)) ? json_encode($filter) : '';
        return true;
    }
}