<?php

class Mp3RecursiveDirectoryIterator extends FilterIterator
{
    /**
     * Constructor
     *
     * @param string $path
     * @return void
     */
    public function __construct($path)
    {
    	parent::__construct(
            new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($path),
                RecursiveIteratorIterator::SELF_FIRST
        ));
    }

    /**
     * Checks whether the current element is acceptable
     *
     * @return bool
     */
    public function accept()
    {
        return $this->isDir() || (($this->isFile() && substr(strtolower($this->getBasename()), -4) == '.mp3'));
    }
}