<?php

$user = $_SERVER['USER'];
require "/home/$user/config-final.php";

/**
 * The Database class that works with the final project database
 *
 * The Database class connects, reads, and writes to the final project database
 *
 * @author Zack L.
 */
class Database
{
    private $_dbh;

    /**
     * The constructor for the Database class
     */
    function __construct()
    {
        $this->_connect();
    }

    private function _connect()
    {
        try {
            //Instantiate a db object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

            return $this->_dbh;
        } catch(PDOException $e) {

            echo $e->getMessage();
        }
    }

    /**
     * Adds a new article to the database
     *
     * @param OnlineArticle $newArticle The online article to be added
     * @return void
     */
    function addArticle($newArticle)
    {
        //1. Define the query
        $sql = "INSERT INTO article(title, author, date, text, picture, region, tag, isTrending, isRecent, viewCount)
                VALUES (':title', ':author', ':date', ':text', ':picture', ':region', ':tag', ':isTrending', 
                ':isRecent', ':viewCount');";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':title', $newArticle->getTitle(), PDO::PARAM_STR);
        $statement->bindParam(':author', $newArticle->getAuthor(), PDO::PARAM_STR);
        $statement->bindParam(':date', $newArticle->getDate(), PDO::PARAM_STR);
        $statement->bindParam(':text', $newArticle->getText(), PDO::PARAM_STR);
        $statement->bindParam(':picture', $newArticle->getPicture(), PDO::PARAM_STR);
        $statement->bindParam(':region', $newArticle->getRegion(), PDO::PARAM_STR);
        $statement->bindParam(':tag', $newArticle->getTag(), PDO::PARAM_STR);
        $statement->bindParam(':isTrending', $newArticle->isTrending() ? 1 : 0, PDO::PARAM_INT);
        $statement->bindParam(':isRecent', $newArticle->isRecent() ? 1 : 0, PDO::PARAM_INT);
        $statement->bindParam(':viewCount', $newArticle->getViewCount(), PDO::PARAM_INT);

        //4. Execute the statement
        $statement->execute();
    }

    /**
     * Gets an article's main elements from the database using an id
     *
     * @param int $article_id the id for the requested article
     * @return mixed An array of all the values of the article
     */
    function getArticle($article_id)
    {
        //1. Define the query
        $sql = "SELECT title, username, text, picture, article_date FROM article, users
                WHERE article_id = :id AND article.author = users.user_id";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':id', $article_id, PDO::PARAM_INT);

        //4. Execute the statement
        $statement->execute();

        //5. Return the result
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function getArticleStubs()
    {
        //1. Define the query
        $sql = "SELECT article_id, title, username FROM article, users
                WHERE article.author = users.user_id";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        // none

        //4. Execute the statement
        $statement->execute();

        //5. Return the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}