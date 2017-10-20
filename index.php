<?php
/**
 * Water Corporation - Contractor Induction PhaseII
 *
 * Update transcript table task Main landing page.
 *
 * @package   local_certificatetranscript
 * @author    Priya Ramakrishnan <priya@pukunui.com>, Pukunui
 * @copyright 2017 onwards, Pukunui
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once('../../config.php');
require($CFG->dirroot.'/local/certificatetranscript/locallib.php');
local_certificatetranscript_updatetranscript();

//redirect($CFG->wwwroot);