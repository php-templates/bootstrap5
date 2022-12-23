<?php

namespace PhpTemplates;

use PhpTemplates\Template;

class Bootstrap
{
    private $components;
    
    public function mount(Template $template, $options = []) 
    {
        $prefix = isset($options['prefix']) ? $options['prefix'] : 'b-';
        $cfg = $template->subconfig('bootstrap', __DIR__ . '/bootstrap/');
        foreach ($this->getCached() as $alias => $rfilepath) {
            // echo $prefix.$alias . ' => ' . $rfilepath . PHP_EOL;
            
            $template->setAlias($prefix.$alias, $rfilepath);
        }
    }
    
    private function getCached()
    {
        $cache = __DIR__ . '/cache.json';
        if (!file_exists($cache) || !json_decode(file_get_contents($cache)) || 1) {// todo
            $json = [];
            // components
            $files = $this->recursiveScanDir(__DIR__ . '/bootstrap/components/');
            foreach ($files as $file) {
                $rfilepath = explode(DIRECTORY_SEPARATOR . 'bootstrap' . DIRECTORY_SEPARATOR, str_replace('.t.php', '', $file))[1];
                $alias = explode(DIRECTORY_SEPARATOR, $rfilepath); $alias = end($alias);
                $json[$alias] = 'bootstrap:' . $rfilepath;
            }
            // forms
            $files = $this->recursiveScanDir(__DIR__ . '/bootstrap/forms/');
            foreach ($files as $file) {
                $rfilepath = explode(DIRECTORY_SEPARATOR . 'bootstrap' . DIRECTORY_SEPARATOR, str_replace('.t.php', '', $file))[1];
                $alias = explode(DIRECTORY_SEPARATOR, $rfilepath); $alias = end($alias);
                $json[$alias] = 'bootstrap:' . $rfilepath;
            }
            
            file_put_contents($cache, json_encode($json));
        }
        
        return json_decode(file_get_contents($cache), true);
    }
    
    private function recursiveScanDir(string $path, array &$payload = [])
    {
        $files = array_diff(scandir($path), array('.', '..'));
        foreach($files as $file){
            $file = rtrim($path, DIRECTORY_SEPARATOR) . '/' . $file;
            if (is_file($file)) {
                if (strpos($file, '.t.php')) {
                    $payload[] = $file;
                }
            } else {
                $this->recursiveScanDir($file, $payload);
            }
        }
        
        return $payload;
    }
}