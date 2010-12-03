<?php

class SongsIterator extends FilterIterator
{
    /**
     * Gets the value of the current element
     *
     * @return Song
     */
    public function current()
    {
        $song = new Song();

        $id3 = new getID3();
        $info = $id3->analyze($this->getPathname());

        if (isset($info['id3v1']))
        {
	        $song->title = $info['id3v1']['title'];
	        $song->album = $info['id3v1']['album'];
	        $song->artist = $info['id3v1']['artist'];
	        $song->year = $info['id3v1']['year'];
        }

        return $song;
    }

    /**
     * Checks whether the current element is acceptable
     *
     * @return bool
     */
    public function accept()
    {
    	return $this->isFile();
    }
}