<?php

class ImdbTopMoviesIterator implements Iterator
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
     * @return void
     */
    public function __construct()
    {
        $file = 'http://www.imdb.com/chart/top';
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
    	$movie->title = html_entity_decode(strip_tags($this->_matches[3][0]), ENT_QUOTES, 'utf-8');
    	$movie->rating = (float) strip_tags($this->_matches[2][0]);

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
        $this->_offset += $this->_matches[4][1] + strlen($this->_matches[4][0]);
    }

    /**
     * Checks whether the iterator is valid
     *
     * @return bool
     */
    public function valid()
    {
    	$pattern = '~<tr.*?><td.*?>(.*?)</td><td.*?>(.*?)</td><td.*?>(.*?)</td><td.*?>(.*?)</td></tr>~i';
    	$retval = preg_match($pattern, substr($this->_contents, $this->_offset), $matches, PREG_OFFSET_CAPTURE);
    	if ($retval)
    	{
    		$this->_matches = $matches;
    	}
        return (bool) $retval;
    }
}