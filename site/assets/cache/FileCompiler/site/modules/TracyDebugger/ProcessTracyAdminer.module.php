<?php

class ProcessTracyAdminer extends \ProcessWire\Process implements \ProcessWire\Module, \ProcessWire\ConfigurableModule {
    public static function getModuleInfo() {
        return array(
            'title' => \ProcessWire\__('Process Tracy Adminer', \ProcessWire\wire("config")->paths->root . 'site/modules/TracyDebugger/ProcessTracyAdminer.module.php'),
            'summary' => \ProcessWire\__('Adminer page for TracyDebugger.', \ProcessWire\wire("config")->paths->root . 'site/modules/TracyDebugger/ProcessTracyAdminer.module.php'),
            'author' => 'Adrian Jones',
            'href' => 'https://processwire.com/talk/topic/12208-tracy-debugger/',
            'version' => '1.0.6',
            'autoload' => false,
            'singular' => true,
            'requires'  => 'ProcessWire>=2.7.2, PHP>=5.4.4, TracyDebugger',
            'icon' => 'database',
            'page' => array(
                'name' => 'adminer',
                'parent' => 'setup',
                'title' => 'Adminer'
            )
        );
    }


   /**
     * Default configuration for module
     *
     */
    static public function getDefaultData() {
        return array(
            "themeColor" => 'blue',
            "jsonMaxTextLength" => 500
        );
    }


    /**
     * Populate the default config data
     *
     */
    public function __construct() {
        foreach(self::getDefaultData() as $key => $value) {
            $this->$key = $value;
        }
    }


    public function ___execute() {

        error_reporting(0);
        ini_set('display_errors', 0);

        $_GET['db'] = $this->wire('config')->dbName;

        function adminer_object() {

 require_once(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . 'site/modules/TracyDebugger/panels/Adminer/plugins/plugin.php',array('includes'=>true,'namespace'=>true,'modules'=>false,'skipIfNamespace'=>false)));

            foreach (glob(\ProcessWire\wire("config")->paths->root . 'site/modules/TracyDebugger'.'/panels/Adminer/plugins/*.php') as $filename) {
                require_once $filename/*NoCompile*/;
            }

            $data = \ProcessWire\wire('modules')->getModuleConfigData('ProcessTracyAdminer');
            $themeColor = isset($data['themeColor']) ? $data['themeColor'] : 'blue';
            $jsonMaxTextLength = isset($data['jsonMaxTextLength']) ? $data['jsonMaxTextLength'] : 200;

            $port = \ProcessWire\wire('config')->dbPort ? ':' . \ProcessWire\wire('config')->dbPort : '';

            $plugins = [
                new AdminerFrames,
                new AdminerProcessWireLogin(\ProcessWire\wire('config')->urls->admin, \ProcessWire\wire('config')->dbHost . $port, \ProcessWire\wire('config')->dbName, \ProcessWire\wire('config')->dbUser, \ProcessWire\wire('config')->dbPass, \ProcessWire\wire('config')->dbName),
                new AdminerTablesFilter(),
                new AdminerSimpleMenu(),
                new AdminerCollations(),
                new AdminerJsonPreview(0, true, true, $jsonMaxTextLength),
                new AdminerDumpJson,
                new AdminerDumpBz2,
                new AdminerDumpZip,
                new AdminerDumpAlter,
                new AdminerTheme("default-".$themeColor)
            ];

            return new AdminerPlugin($plugins);
        }

        require_once \ProcessWire\wire("config")->paths->root . 'site/modules/TracyDebugger' . '/panels/Adminer/adminer-4.7.1-mysql.php'/*NoCompile*/;
        exit;
    }

    /**
     * Return an InputfieldWrapper of Inputfields used to configure the class
     *
     * @param array $data Array of config values indexed by field name
     * @return InputfieldsWrapper
     *
     */
    public function getModuleConfigInputfields(array $data) {

        $wrapper = new \ProcessWire\InputfieldWrapper();

        $f = $this->wire('modules')->get("InputfieldSelect");
        $f->attr('name', 'themeColor');
        $f->label = \ProcessWire\__('Theme color', \ProcessWire\wire("config")->paths->root . 'site/modules/TracyDebugger/ProcessTracyAdminer.module.php');
        $f->addOption('blue', 'Blue');
        $f->addOption('green', 'Green');
        $f->addOption('orange', 'Orange');
        $f->required = true;
        if($this->data['themeColor']) $f->attr('value', $this->data['themeColor']);
        $wrapper->add($f);

        $f = $this->wire('modules')->get("InputfieldText");
        $f->attr('name', 'jsonMaxTextLength');
        $f->label = \ProcessWire\__('JSON max text length', \ProcessWire\wire("config")->paths->root . 'site/modules/TracyDebugger/ProcessTracyAdminer.module.php');
        $f->required = true;
        if($this->data['jsonMaxTextLength']) $f->attr('value', $this->data['jsonMaxTextLength']);
        $wrapper->add($f);

        return $wrapper;

    }

}
