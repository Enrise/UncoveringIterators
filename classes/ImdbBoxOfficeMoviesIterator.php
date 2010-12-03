<?php

class ImdbBoxOfficeMoviesIterator implements Iterator
{
    /**#@+
     * @var mixed
     */
    protected $_contents;
    protected $_offset;
    protected $_matches;
    /**#@-*/

    /**
     * Constructor
     *
     * @param string $file
     * @return void
     */
    public function __construct($file)
    {
        $this->_contents = loadFile($file);
    }

    /**
     * Rewinds to the first element
     *
     * @return void
     */
    public function rewind()
    {
        $this->_offset = 0;
        $this->_matches = array();
    }

    /**
     * Gets the value of the current element
     *
     * @return int
     */
    public function current()
    {
    	$movie = new Movie();
        $movie->rank = (int) strip_tags($this->_matches[1][0]);
    	$movie->title = html_entity_decode(strip_tags($this->_matches[2][0]), ENT_QUOTES, 'utf-8');
    	$movie->revenue = html_entity_decode(strip_tags($this->_matches[3][0]), ENT_QUOTES, 'utf-8');

        return $movie;
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
        $this->_offset += $this->_matches[3][1] + strlen($this->_matches[3][0]);
    }

    /**
     * Checks whether the iterator is valid
     *
     * @return bool
     */
    public function valid()
    {
    	$pattern = '~<tr.*?>\s*<td.*?>(.*?)</td>\s*<td.*?>(.*?)</td>\s*<td.*?>(.*?)</td>\s*</tr>~is';
    	$retval = preg_match($pattern, substr($this->_contents, $this->_offset), $matches, PREG_OFFSET_CAPTURE);
    	if ($retval)
    	{
    		$this->_matches = $matches;
    	}
        return (bool) $retval;
    }
}