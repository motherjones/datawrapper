<?php
require('vendor/autoload.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class DatawrapperPlugin_CoreVisOptions extends DatawrapperPlugin {

    public function init() {
        $plugin = $this;
        global $app;

        // create a log channel to STDERR
        $log = new Logger('omgphp');
        $log->pushHandler(new StreamHandler('php://stderr', Logger::DEBUG));

        DatawrapperHooks::register(
            DatawrapperHooks::VIS_OPTION_CONTROLS,
            function($o, $k) use ($app, $plugin) {
                $env = array('option' => $o, 'key' => $k);

                $log->addInfo(getcwd());

                $app->render('plugins/' . $plugin->getName() . '/templates/controls.twig', $env);
            }
        );

        DatawrapperHooks::register(
            DatawrapperHooks::VIS_OPTION_CONTROLS,
            function($o, $k) use ($app, $plugin) {
                $env = array('option' => $o, 'key' => $k);
                $app->render('plugins/' . $plugin->getName() . '/templates/colorselector.twig', $env);
            }
        );

        $this->declareAssets(array(
            'sync-controls.js',
            'sync-colorselector.js',
            'colorpicker.css'
        ), "|/chart/[^/]+/visualize|");

    }
}
