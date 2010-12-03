<?php

class Song implements IteratorAggregate
{
	/**
	 * @var array
	 */
	protected $_properties = array(
	   'title' => '',
	   'album' => '',
	   'artist' => '',
	   'year' => '',
	);

	/**
	 * Sets the specified property
	 *
	 * @param string $name
	 * @param mixed $value
	 * @return void
	 */
	public function __set($name, $value)
	{
	    $this->_properties[$name] = $value;
	}

	/**
	 * Gets the specified property
	 *
	 * @param string $name
	 * @return void
	 */
	public function __get($name)
	{
		return $this->_properties[$name];
	}

	/**
	 * Gets the iterator
	 *
	 * @return ArrayIterator
	 */
	public function getIterator()
	{
	    return new ArrayIterator($this->_properties);
	}
}