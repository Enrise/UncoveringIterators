<?php

class CharacterIterator implements Iterator
{
    /**#@+
     * @var mixed
     */
	protected $_contents;
	protected $_offset;
    /**#@-*/

	/**
	 * Constructor
	 *
	 * @param string $contents
	 * @return void
	 */
	public function __construct($contents)
	{
	    $this->_contents = $contents;
	}

    /**
     * Rewinds to the first element
     *
     * @return void
     */
    public function rewind()
    {
    	$this->_offset = 0;
    }

    /**
     * Gets the value of the current element
     *
     * @return string
     */
    public function current()
    {
    	return $this->_contents[$this->key()];
    }

    /**
     * Gets the key of the current element
     *
     * @return int
     */
    public function key()
    {
    	return $this->_offset;
    }

    /**
     * Forwards to the next element
     *
     * @return void
     */
    public function next()
    {
    	$this->_offset++;
    }

    /**
     * Checks whether the iterator is valid
     *
     * @return bool
     */
    public function valid()
    {
    	return (isset($this->_contents[$this->key()]));
    }

    /**
     * Checks whether the current element is an alphabetic character
     *
     * @return bool
     */
    public function isAlpha()
    {
        return ctype_alpha($this->current());
    }
}