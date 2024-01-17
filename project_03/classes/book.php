<?
    class Book{
        private $id;
        private $title;
        private $description;
        private $author;
        private $imageFile;

        public function __construct($title, $description, $author, $imageFile){
            $this->title = $title;
            $this->description = $description;
            $this->author = $author;
            $this->imageFile = $imageFile;
        }

        public function validate(){
            return $this->title && $this->description 
                && $this->author && $this->imageFile;
        }

        public function addBook($conn){
            $sql = "insert into book(title, description, author, imageFile) 
                values(:title, :description, :author, :imageFile)";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(':title', $this->title, PDO::PARAM_STR);
            $stmt -> bindValue(':description', $this->description, PDO::PARAM_STR);
            $stmt -> bindValue(':author', $this->author, PDO::PARAM_STR);
            $stmt -> bindValue(':imageFile', $this->imageFile, PDO::PARAM_STR);
            return $stmt->execute();
        }

        public function getAll($conn){
            try{
                $sql = "select * from book";
                $stmt = $conn->prepare($sql);
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
                $stmt->execute();
                $books = $stmt->fetch();
            }
            catch(PDOException $ex){
                echo $ex->getMessage();
            }
        }
        public function getById($conn, $id){
            try{
                $sql = "select * from book where id=:id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', PDO::PARAM_INT);
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
                $stmt->execute();
                $books = $stmt->fetch();
            }
            catch(PDOException $ex){
                echo $ex->getMessage();
            }
        }
        public function update($conn, $id){

        }
        public function delete($conn, $id){

        }
    }
?>