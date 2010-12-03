<?php

class WordIterator extends IteratorIterator
{
    /**
     * Rewinds to the first element
     *
     * @return void
     */
    public function rewind()
    {
    	$this->getInnerIterator()->rewind();
    }

    /**
     * Gets the value of the current element
     *
     * @return string
     */
    public function current()
    {
    	$word = '';
    	$iterator = $this->getInnerIterator();
    	while ($iterator->valid() && $iterator->isAlpha())
    	{
    		$word .= $iterator->current();
    		$iterator->next();
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
    	return $this->getInnerIterator()->key();
    }

    /**
     * Forwards to the next element
     *
     * @return void
     */
    public function next()
    {
    	$iterator = $this->getInnerIterator();
        while ($iterator->valid() && !$iterator->isAlpha())
        {
            $iterator->next();
        }
    }

    /**
     * Checks whether the iterator is valid
     *
     * @return bool
     */
    public function valid()
    {
    	return $this->getInnerIterator()->valid();
    }
}