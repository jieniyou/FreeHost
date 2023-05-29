<?php

namespace entity;

class SongsEntity
{
    private  $id;
    private $artist;
    private $lrc;
    private $name;
    private $pic;
    private $showlrc;
    private $url;

    /**
     * @param $id
     * @param $artist
     * @param $lrc
     * @param $name
     * @param $pic
     * @param $showlrc
     * @param $url
     */
    public function __construct($id, $artist, $lrc, $name, $pic, $showlrc, $url)
    {
        $this->id = $id;
        $this->artist = $artist;
        $this->lrc = $lrc;
        $this->name = $name;
        $this->pic = $pic;
        $this->showlrc = $showlrc;
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param mixed $artist
     */
    public function setArtist($artist): void
    {
        $this->artist = $artist;
    }

    /**
     * @return mixed
     */
    public function getLrc()
    {
        return $this->lrc;
    }

    /**
     * @param mixed $lrc
     */
    public function setLrc($lrc): void
    {
        $this->lrc = $lrc;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPic()
    {
        return $this->pic;
    }

    /**
     * @param mixed $pic
     */
    public function setPic($pic): void
    {
        $this->pic = $pic;
    }

    /**
     * @return mixed
     */
    public function getShowlrc()
    {
        return $this->showlrc;
    }

    /**
     * @param mixed $showlrc
     */
    public function setShowlrc($showlrc): void
    {
        $this->showlrc = $showlrc;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return json_encode([
            'id' => $this->id,
            'artist' => $this->artist,
            'lrc' => $this->lrc,
            'name' => $this->name,
            'pic' => $this->pic,
            'showLrc' => $this->showLrc,
            'url' => $this->url,
        ]);
    }


}