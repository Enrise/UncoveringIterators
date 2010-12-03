<?php

class Mp3ShortSongsFilterIterator extends FilterIterator
{
	/**
	 * @var int
	 */
	protected $_maxTime;

	/**
	 * Constructor
	 *
	 * @param Iterator $iterator
	 * @param int $maxTime
	 * @return void
	 * @throws Exception
	 */
	public function __construct(Iterator $iterator, $maxTime)
	{
		parent::__construct($iterator);
		$this->_maxTime = $maxTime;

		if (!class_exists('getID3'))
		{
			throw new Exception('Please first download getID3 and put it inside directory "classes"');
		}
	}

    /**
     * Checks whether the current element is acceptable
     *
     * @return bool
     */
    public function accept()
    {
    	$id3 = new getID3();
    	$info = $id3->analyze($this->getPathname());

        return (isset($info['playtime_seconds']) && $info['playtime_seconds'] < $this->_maxTime); // In seconds
    }
}