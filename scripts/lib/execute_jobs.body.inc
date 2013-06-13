<?php


//require_once "lib/export_charts.inc";

/*
 * This is where the daemon does it's work
 */

define('ROOT_PATH', dirname(dirname(dirname(__FILE__))) . '/');
define('LOGFILE', ROOT_PATH . "scripts/logs/execute-jobs.log");

define('NO_SLIM', 1);
define('NO_SESSION', 1);

require_once ROOT_PATH . 'lib/bootstrap.php';
date_default_timezone_set('Europe/Berlin');


function run() {
    // if the daemon is sleeping it will check the db for
    // new jobs every ten seconds
    $is_sleeping = false;

    print "running\n";

    while (1) {  // run forever
        print "checking for job\n";
        $job = JobQuery::create()
            ->filterByStatus('queued')
            ->orderByCreatedAt('desc')
            ->findOne();
        if ($job) {
            print "found one ".$job->getType()."\n";
            DatawrapperHooks::execute($job->getType(), $job);
        } else {
            print "nothing found\n";
            if (!$is_sleeping) {
                _log("no new jobs found, going into sleep mode", null, 'DEBUG');
                $is_sleeping = true;
            }
        }

        sleep($is_sleeping ? 10 : 2);
    }
}

$flog = fopen(LOGFILE, 'a+');
if (!$flog) {
    die("could not open logfile!\n");
}

function _log($msg = "", $job=null, $type='LOG') {
    global $flog, $cfg;
    if (!VERBOSE && $type == 'DEBUG') return;
    if (!empty($msg)) {
        $prefix = date('Y-m-d H:i:s').",".$type.",";
        if ($job) {
            $prefix .= $job['job_id'].",";
        } else {
            $prefix .= ",";
        }
        fwrite($flog, $prefix . '"' . $msg . "\"\n");
    }
}

run();