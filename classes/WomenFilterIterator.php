<?php

class WomenFilterIterator extends FilterIterator
{
	/**
	 * Checks whether the current element is acceptable
	 *
	 * @return bool
	 */
	public function accept()
	{
		return strpos($this->current(), 'z') !== false;
	}
}