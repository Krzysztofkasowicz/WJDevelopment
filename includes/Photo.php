<?php

class Photo
{
    private $id;
    private $file;
    private $fileName;
    private $path = "../images/gallery/";
    private $extensions = ['gif', 'jpeg', 'jpg', 'png'];
    /**
     * @var PDO
     */
    private $connection;

    /**
     * Photo constructor.
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */

    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }


    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    public function hasCorrectFileExtension()
    {
        if (in_array(pathinfo($this->fileName, PATHINFO_EXTENSION), $this->extensions)) {
            return true;
        } else {
            $_SESSION["errors"] = "Niepoprawne rozszerzenie przesyłanego pliku!";
            return false;
        }
    }

    public function hasCorrectSize()
    {
        if (filesize($this->path . $this->fileName) < 100000000)
            return true;
        else
            $_SESSION["errors"] = "Zbyt duży rozmiar przesyłanego pliku!";
        return false;
    }

    public function hasBeenAdded()
    {
        $query = $this->connection->prepare("SELECT * FROM images WHERE filename = :filename");
        $query->bindParam(":filename", $this->fileName);
        $query->execute();
        $result = $query->fetchAll();
        if (count($result) == 0)
            return true;
        else {
            $_SESSION["errors"] = "Istnieje już plik z tą samą nazwą!";
            return false;
        }

    }

    public function uploadPhoto()
    {
        move_uploaded_file($this->file, $this->path . $this->fileName);
        $_SESSION["success"] = true;
    }

    public function insertImagePathToDatabase()
    {
        $query = $this->connection->prepare("INSERT INTO images (filename) VALUES(:filename)");
        $query->bindParam(":filename", $this->fileName);
        $query->execute();
    }

    public function getImagesFromDatabase()
    {
        $query = $this->connection->prepare("SELECT * FROM images ORDER BY id DESC");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function removeImageFromDatabase()
    {
        try {
            $this->id = $_GET["id"];
            $query = $this->connection->prepare("DELETE FROM images WHERE id = :id");
            $query->bindParam(':id', $this->id);
            $query->execute();
            $_SESSION["successfulDelete"] = true;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}