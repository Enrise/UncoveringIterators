<?php

class NaiveWomenIterator implements Iterator
{
	/**#@+
	 * @var mixed
	 */
	protected $_index;
	protected $_values = array();
	/**#@-*/

	/**
	 * Constructor
	 *
	 * @param array $values
	 * @return void
	 */
	public function __construct(array $values)
	{
	    $this->_values = $values;
	}

    /**
     * Rewinds to the first element
     *
     * @return void
     */
    public function rewind()
    {
    	$this->_index = 0;
    }

    /**
     * Gets the value of the current element
     *
     * @return string
     */
    public function current()
    {
    	return $this->_values[$this->_index];
    }

    /**
     * Gets the key of the current element
     *
     * @return int
     */
    public function key()
    {
    	return $this->_index;
    }

    /**
     * Forwards to the next element
     *
     * @return void
     */
    public function next()
    {
        $this->_index++;
    }

    /**
     * Checks whether the iterator is valid
     *
     * @return bool
     */
    public function valid()
    {
    	return isset($this->_values[$this->_index]);
    }
}