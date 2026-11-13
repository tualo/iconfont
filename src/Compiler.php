<?php

namespace Tualo\Office\IconFont;

use Tualo\Office\Basic\TualoApplication;
use Tualo\Office\ExtJSCompiler\ICompiler;
use Tualo\Office\ExtJSCompiler\CompilerHelper;

class Compiler implements ICompiler
{
    public static function getFiles()
    {
        $toolkits = [];
        $useToolkits = CompilerHelper::getFiles(__DIR__, 'iconfont', 10004);
        foreach ($useToolkits as $toolkit) {
            if (($toolkit['toolkit'] == '')) {
                $files = [];
                foreach ($toolkit['files'] as $file) {
                    if (basename($file['file']) === 'FontAwesomePanel.scss') {
                        if (TualoApplication::configuration('fontawesome', 'license', 'free') !== 'pro') {

                            continue;
                        }
                        $files[] = $file;
                    } else {
                        $files[] = $file;
                    }
                    $toolkit['files'] = $files;
                }
                $toolkits[] = $toolkit;
            } else {
                $toolkits[] = $toolkit;
            }
        }
        return $toolkits;
    }
}
