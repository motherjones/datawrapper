<?php
class DatawrapperPlugin_ThemeMojo extends DatawrapperPlugin {
    public function init() {
        DatawrapperTheme::register($this, $this->getMeta());
    }
    private function getMeta() {
        return array(
            'id' => 'mojo',
            'extends' => 'default',            
            'title' => 'Mother Jones',
            'link' => 'http://www.motherjones.com',
            'restricted' => NULL,
            'version' => '0.0.0'
        );
    }
}
