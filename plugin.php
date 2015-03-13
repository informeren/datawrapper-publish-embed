<?php

class DatawrapperPlugin_ExportEmbed extends DatawrapperPlugin {

    public function init() {
        $plugin = $this;
        // hook into chart publication
        DatawrapperHooks::register(DatawrapperHooks::GET_CHART_ACTIONS, function() use ($plugin) {
            // no export possible without email
            $cfg = $plugin->getConfig();
            return array(
                'id' => 'export-embed',
                'title' => __('publish / button-label', $plugin->getName()),
                'icon' => 'code',
                'order' => 350,
                'banner' => array(
                    'text' => __('publish / button / banner'),
                    'style' => ''
                )
            );
        });


        
        // provide static assets files
        $this->declareAssets(
            array('make-embed.js'),
            "|/chart/[^/]+/publish|"
        );

    }

}
