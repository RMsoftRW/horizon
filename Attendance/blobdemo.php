<?php

class BobDemo_  {

    const DB_HOST = 'localhost';
    const DB_NAME = 'attendance';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    /**
     * PDO instance
     * @var PDO 
     */
    private $pdo = null;

    /**
     * Open the database connection
     */
    public function __construct() {
        // open database connection
        $conStr = sprintf("mysql:host=%s;dbname=%s;charset=utf8", self::DB_HOST, self::DB_NAME);

        try {
            $this->pdo = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);
            //for prior PHP 5.3.6
            //$conn->exec("set names utf8");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * insert blob into the files table
     * @param string $filePath
     * @param string $mime mimetype
     * @return bool
     */
    public function insertBlob($filePath, $mime,$size) {
        $blob = fopen($filePath, 'rb');

        $sql = "INSERT INTO files(mime,data,size) VALUES(:mime,:data,:size)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':mime', $mime);
        $stmt->bindParam(':data', $blob, PDO::PARAM_LOB);
        $stmt->bindParam(':size', $size);

        return $stmt->execute();
    }

    /**
     * update the files table with the new blob from the file specified
     * by the filepath
     * @param int $id
     * @param string $filePath
     * @param string $mime
     * @return bool
     */
    function updateBlob($id, $filePath, $mime) {

        $blob = fopen($filePath, 'rb');

        $sql = "UPDATE files
                SET mime = :mime,
                    data = :data
                WHERE id = :id;";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':mime', $mime);
        $stmt->bindParam(':data', $blob, PDO::PARAM_LOB);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    /**
     * select data from the the files
     * @param int $id
     * @return array contains mime type and BLOB data
     */
    public function selectBlob($id) {

        $sql = "SELECT mime,
                        data
                   FROM files
                  WHERE id = :id;";
        // $sql = "SELECT img
                   // FROM files
                  // WHERE id = :id;";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(":id" => $id));
        $stmt->bindColumn(1, $mime);
        $stmt->bindColumn(2, $data, PDO::PARAM_LOB);

        $stmt->fetch(PDO::FETCH_BOUND);

        return array("mime" => $mime,
            "data" => $data);
    }

    /**
     * close the database connection
     */
    public function __destruct() {
        // close the database connection
        $this->pdo = null;
    }

}

$blobObj__ = new BobDemo_();

// test insert gif image
// $blobObj_->insertBlob('images/php-mysql-blob.gif',"image/gif");
// $a = $blobObj_->selectBlob(1);
// header("Content-Type:" . $a['mime']);
// echo $a['data'];
// test insert pdf
//$blobObj_->insertBlob('pdf/php-mysql-blob.pdf',"application/pdf");
//$a = $blobObj_->selectBlob(2);
// save it to the pdf file
//file_put_contents("pdf/output.pdf", $a['data']);
// $a = $blobObj_->selectBlob(2);
// header("Content-Type:" . $a['mime']);
// echo $a['data'];
// replace the PDF by gif file
// $blobObj_->updateBlob(2, 'images/php-mysql-blob.gif', "image/gif");

$a = $blobObj__->selectBlob(13);
header("Content-Type:" . $a['mime']);
echo $a['data'];
if (isset($_POST['submit'])) {
// echo($_FILES['fileToUpload']['name']);
// echo "<br>";
// echo($_FILES['fileToUpload']['type']);
// echo "<br>";
// echo($_FILES['fileToUpload']['size']);
// echo "<br>";
// echo($_FILES['fileToUpload']['error']);
// echo "<br>";
// print_r($_FILES);
    if($blobObj__->insertBlob($_FILES['fileToUpload']['tmp_name'],$_FILES['fileToUpload']['type'],$_FILES['fileToUpload']['size'])){

    echo "Inserted";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
<div>
    <!-- <p> -->
       <!-- <img src="<?php header("Content-Type:" . $a['mime']); echo $a['data']; ?>">  -->
    <!-- </p> -->
</div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>