<?php

/**
 * The OnlineArticle class represents an online news article
 *
 * The OnlineArticle class represents an online news article with a tag, isTrending, isRecent, region, and viewCount
 *
 * @author Zack L.
 */
class OnlineArticle extends Article
{
    private $_region;
    private $_isTrending;
    private $_isRecent;
    private $_viewCount;
    private $_tag;

    /**
     * The constructor for the OnlineArticle class
     *
     * @param String $title The title for the article
     * @param String $author The author of the article
     * @param String $date The date the article was posted
     * @param String $text The text within the article
     * @param String $region The region the article is about
     * @param int $isTrending Tracks if the article is trending or not
     * @param int $isRecent Tracks if the article is recent
     * @param int $viewCount The articles view count
     * @param String $tag The articles tag
     * @param String $picture The path to the articles picture
     */
    function __construct($title, $author, $date, $text, $region,
                         $isTrending, $isRecent, $viewCount, $tag="", $picture="")
    {
        parent::__construct($title, $author, $date, $text, $picture);

        $this->_region = $region;
        $this->_isTrending = $isTrending;
        $this->_isRecent = $isRecent;
        $this->_viewCount = $viewCount;
        $this->_tag = $tag;
    }

    /**
     * Gets the region of the article
     *
     * @return string
     */
    function getRegion()
    {
        return $this->_region;
    }

    /**
     * Sets the region of the article
     *
     * @param string $region The new region for the article
     * @return void
     */
    function setRegion($region)
    {
        $this->_region = $region;
    }

    /**
     * Gets the isTrending field
     *
     * @return int
     */
    function isTrending()
    {
        return $this->_isTrending;
    }

    /**
     * Sets the isTrending of the article
     *
     * @param int $isTrending The new isTrending for the article
     * @return void
     */
    function setTrending($isTrending)
    {
        $this->_isTrending = $isTrending;
    }

    /**
     * Gets the isRecent of the article
     *
     * @return int
     */
    function isRecent()
    {
        return $this->_isRecent;
    }

    /**
     * Sets the isRecent of the article
     *
     * @param int $isRecent The new isRecent for the article
     * @return void
     */
    function setRecent($isRecent)
    {
        $this->_isRecent = $isRecent;
    }

    /**
     * Gets the viewCount of the article
     *
     * @return int
     */
    function getViewCount()
    {
        return $this->_viewCount;
    }

    /**
     * Sets the viewCount of the article
     *
     * @param int $viewCount The new viewCount for the article
     * @return void
     */
    function setViewCount($viewCount)
    {
        $this->_viewCount = $viewCount;
    }

    /**
     * Gets the tag of the article
     *
     * @return string
     */
    function getTag()
    {
        return $this->_tag;
    }

    /**
     * Sets the tag of the article
     *
     * @param string $tag The new tag for the article
     * @return void
     */
    function setTag($tag)
    {
        $this->_tag = $tag;
    }
}