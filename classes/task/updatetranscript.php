<?php
/**
 * Water Corporation - Contractor Induction PhaseII
 *
 * Class definition for schedule task
 *
 * @package   local_certificatetranscript
 * @author    Priya Ramakrishnan <priya@pukunui.com>, Pukunui
 * @copyright 2017 onwards, Pukunui
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace local_certificatetranscript\task;

require_once($CFG->dirroot.'/local/certificatetranscript/locallib.php');

/**
 * Extend core scheduled task
 */
class updatetranscript extends \core\task\scheduled_task {
    /**
     * Return name of the Task
     * 
     * @return string
     */
    public function get_name() {
        return get_string('pluginname', 'local_certificatetranscript');
    }
    
    /**
     * Perform the task
     */
    public function execute() {
        local_certificatetranscript_updatetranscript('auto');
    }
}
