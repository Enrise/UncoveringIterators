<?php

class WordFrequencyIterator extends ArrayIterator
{
	/**
	 * Constructor
	 *
	 * @param Iterator $iterator
	 * @return void
	 */
	public function __construct(Iterator $iterator)
	{
        foreach ($iterator as $word)
        {
            $this->append($word);
        }
	}

	/**
	 * Sets a value at the specified index
	 *
	 * @param mixed $index
	 * @param mixed $value
	 * @return void
	 * @throws BadMethodCallException
	 */
	public function offsetSet($index, $value)
	{
		throw new BadMethodCallException();
	}

    /**
     * Appends a new element
     *
     * @param string $word
     * @return void
     */
    public function append($word)
    {
        $frequency = 1;
    	$word = strtolower($word);
        if ($this->offsetExists($word))
        {
            $frequency += $this->offsetGet($word);
        }
        parent::offsetSet($word, $frequency);
    }

	/**
	 * Reverse sorts values
	 *
	 * @return void
	 */
	public function arsort()
	{
		$this->uasort(create_function('$a, $b', 'return ($a == $b) ? 0 : ($a < $b) ? 1 : -1;'));
	}
}