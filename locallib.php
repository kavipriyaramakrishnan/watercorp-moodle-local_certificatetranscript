<?php
/**
 * Water Corporation - Contractor Induction PhaseII
 *
 * Local library functions
 *
 * @package   local_certificatetranscript
 * @author    Priya Ramakrishnan <priya@pukunui.com>, Pukunui
 * @copyright 2017 onwards, Pukunui
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
/**
 * Schedule task function to send the emails. 
 *
 * @uses $DB
 * @return null- send emails to users
 */
function local_certificatetranscript_updatetranscript() {
    global $DB, $CFG;
	mtrace('Certificate transcript schedule task started');
	// Get the last run time.
    $lastcrontime = get_config('local_certificatetranscript', 'lastrun');
	// For first run.
	if (empty($lastcrontime)) {
		$lastcrontime = 0;
	}
	mtrace('Inserting transcript records');
	$sql = "INSERT INTO {certificate_transcript_bkp} (cert_issue_id,                cert_issue_date, 
	        cert_code, cert_name, courseid, coursename, coursecompleted,
			userid, firstname, lastname)
			SELECT ci.id as cert_issue_id, 
            ci.timecreated as cert_issue_date,
            ci.code as cert_code,
            ct.name as cert_name,
            ct.course as courseid,
            c.fullname as coursename,
            cc.timecompleted as coursecompleted,
            ci.userid as userid,
            u.firstname as firstname,
            u.lastname as lastname
            FROM {certificate_issues} ci
            JOIN {certificate} ct
            ON ct.id = ci.certificateid
            JOIN {course} c
            ON ct.course = c.id
            JOIN {course_completions} cc
            ON cc.course = c.id AND cc.userid = ci.userid
            JOIN {user} u
            ON u.id = cc.userid 
			WHERE ci.timecreated > $lastcrontime";
    $ret = $DB->execute($sql);
    mtrace('Transcript records created');
	if ($ret) {
		set_config('lastrun', $lastcrontime, 'local_certificatetranscript');
	}
  
}