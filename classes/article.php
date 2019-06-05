<?php

/**
 * The Article class represents a news article
 *
 * The Article class represents a basic news article with a title, text, picture path, author, and date
 *
 * @author Zack L.
 */
class Article
{
    private $_title;
    private $_text;
    private $_picture;
    private $_author;
    private $_date;

    /**
     * Constructor for the Article class
     *
     * @param String $title The title for the article
     * @param String $author The author of the article
     * @param String $date The date the article was posted
     * @param String $text The text within the article
     * @param String $picture The path to the picture, if there is one
     */
    function __construct($title, $author, $date, $text, $picture="")
    {
        $this->_title = $title;
        $this->_author = $author;
        $this->_date = $date;
        $this->_text = $text;
        $this->_picture = $picture;
    }

    /**
     * Gets the title of the article
     *
     * @return string
     */
    function getTitle()
    {
        return $this->_title;
    }

    /**
     * Sets the title of the article
     *
     * @param string $title The new title for the article
     * @return void
     */
    function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * Gets the author of the article
     *
     * @return string
     */
    function getAuthor()
    {
        return $this->_author;
    }

    /**
     * Sets the author of the article
     *
     * @param string $author The new author for the article
     * @return void
     */
    function setAuthor($author)
    {
        $this->_author = $author;
    }

    /**
     * Gets the date of the article
     *
     * @return string
     */
    function getDate()
    {
        return $this->_date;
    }

    /**
     * Sets the date of the article
     *
     * @param string $date The new date for the article
     * @return void
     */
    function setDate($date)
    {
        $this->_date = $date;
    }

    /**
     * Gets the text of the article
     *
     * @return string
     */
    function getText()
    {
        return $this->_text;
    }

    /**
     * Sets the text of the article
     *
     * @param string $text The new text for the article
     * @return void
     */
    function setText($text)
    {
        $this->_text = $text;
    }

    /**
     * Gets the picture path of the article
     *
     * @return string
     */
    function getPicture()
    {
        return $this->_picture;
    }

    /**
     * Sets the picture path of the article
     *
     * @param string $picture The new picture for the article
     * @return void
     */
    function setPicture($picture)
    {
        $this->_picture = $picture;
    }
}