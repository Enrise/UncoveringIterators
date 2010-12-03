<?php

class FibonacciIterator implements Iterator
{
	/**#@+
	 * @var int
	 */
	protected $_previous;
	protected $_current;
	protected $_key;
	/**#@-*/

    /**
     * Rewinds to the first element
     *
     * @return void
     */
    public function rewind()
    {
    	$this->_previous = 1;
    	$this->_current = 0;
    	$this->_key = 0;
    }

    /**
     * Gets the value of the current element
     *
     * @return int
     */
    public function current()
    {
    	return $this->_current;
    }

    /**
     * Gets the key of the current element
     *
     * @return int
     */
    public function key()
    {
    	return $this->_key;
    }

    /**
     * Forwards to the next element
     *
     * @return void
     */
    public function next()
    {
        $current = $this->_current;
        $this->_current += $this->_previous;
        $this->_previous = $current;
        $this->_key++;
    }

    /**
     * Checks whether the iterator is valid
     *
     * @return bool
     */
    public function valid()
    {
    	return true; // Actually, $this->current() <= PHP_INT_MAX
    }
}