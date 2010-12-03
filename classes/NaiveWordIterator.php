<?php

class NaiveWordIterator implements Iterator
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
    	$word = '';
    	while (isset($this->_contents[$this->_offset]))
    	{
    		if (!ctype_alpha($this->_contents[$this->_offset]))
    		{
    			break;
    		}
    		$word .= $this->_contents[$this->_offset];
    		$this->_offset++;
    	}

        return $word;
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
    	while (isset($this->_contents[$this->_offset]))
    	{
    		if (ctype_alpha($this->_contents[$this->_offset]))
    		{
    			break;
    		}
    		$this->_offset++;
    	}
    }

    /**
     * Checks if the iterator is valid
     *
     * @return bool
     */
    public function valid()
    {
    	return isset($this->_contents[$this->_offset]);
    }
}