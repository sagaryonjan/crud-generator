<?php

namespace App\DevUtils\Services;

use Illuminate\Filesystem\Filesystem as FileManager;

class Stub
{
    /**
     * Stub File
     */
    private $stubFile;

    /**
     * Content
     */
    private $content;

    /**
     * Patterns
     */
    private $patterns;

    /**
     * File Manager
     */
    private $fileManager;

    public function __construct(FileManager $fileManager)
    {
        $this->fileManager = $fileManager;
    }

    /**
     * Set file
     */
    public function file($stubFile)
    {
        $this->stubFile = $stubFile;

        return $this;
    }

    /**
     * Set Patterns
     */
    public function patterns($patterns)
    {
        $this->patterns = $patterns;

        return $this;
    }

    public function stubFilePath()
    {
        return app_path(
            'DevUtils' . DIRECTORY_SEPARATOR .
            'stubs' . DIRECTORY_SEPARATOR .
             $this->stubFile . '.stub'
        );
    }

    /**
     * Update Content
     */
    public function updateContent()
    {
        $path = realpath($this->stubFilePath());
        $content = $this->fileManager->get($path);
        if (!empty($this->patterns)) {
            $content = str_replace(array_keys($this->patterns), array_values($this->patterns), $content);
        }
        $this->content = $content;

        return $this;
    }

    /**
     * Save Content To
     */
    public function make($file)
    {
        if (!$this->fileManager->exists($file)) {
            $this->fileManager->put($file, $this->content);
        }
    }

    /**
     * Save Content To
     */
    public function appendToFile($file)
    {
        if ($this->fileManager->exists($file)) {
            $this->fileManager->append($file, $this->content);
        }
    }

    /**
     * Make Director
     */
    public function mkdir($path)
    {
        return $this->fileManager->makeDirectory($path, 0777, true);
    }
}
