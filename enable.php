<?php
if (!defined('IN_CMS')) { exit(); }

/**
 * Pagedata
 * 
 * Store additional pagedata
 * 
 * @package     Plugins
 * @subpackage  Pagedata
 * 
 * @author      svanlaere <samuelvanlaere@gmail.com>
 * @version     0.1.0
 */


$PDO = Record::getConnection();

$PDO->exec("CREATE  TABLE IF NOT EXISTS `".TABLE_PREFIX."pagedata` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `data` text COLLATE utf8_unicode_ci,
  `page_id` INT(1) NOT NULL ,
  PRIMARY KEY (`id`))
ENGINE = InnoDB");