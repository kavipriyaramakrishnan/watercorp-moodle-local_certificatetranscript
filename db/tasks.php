<?php
/**
 * Water Corporation - Contractor Induction PhaseII
 *
 * Scheduled task Definition
 *
 * @package   local_certificatetranscript
 * @author    Priya Ramakrishnan <priya@pukunui.com>, Pukunui
 * @copyright 2017 onwards, Pukunui
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

$tasks = array(
             array(
                 'classname' => 'local_certificatetranscript\task\updatetranscript',
                 'blocking'  => 0,
                 'minute'    => '15',
                 'hour'      => '0',
                 'day'       => '*',
                 'dayofweek' => '*',
                 'month'     => '*'
             )
         );
