<?php

class BigWordsFilterIterator extends FilterIterator
{
    /**
     * @var int
     */
    protected $_length;

    /**
     * Constructor
     *
     * @param Iterator $iterator
     * @param int $length
     * @return void
     */
    public function __construct(Iterator $iterator, $length)
    {
        parent::__construct($iterator);
        $this->_length = $length;
    }

    /**
     * Checks whether the current element is acceptable
     *
     * @return bool
     */
    public function accept()
    {
    	return (strlen($this->current()) >= $this->_length);
    }
}