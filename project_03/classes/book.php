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
                && $this->author;
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

        public static function getAll($conn){
            try{
                $sql = "select * from book order by title asc";
                $stmt = $conn->prepare($sql);
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
                $stmt->execute();
                return $stmt->fetchAll();
            }
            catch(PDOException $ex){
                echo $ex->getMessage();
                return null;
            }
        }
        public function getById($conn, $id){
            try{
                $sql = "select * from book where id=:id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', PDO::PARAM_INT);
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
                if($stmt->execute()){
                    $book = $stmt->fetch();
                    return $book;
                }
            }
            catch(PDOException $ex){
                echo $ex->getMessage();
                return null;
            }
        }
        public function update($conn){
            try{
                $sql = "update book
                        set title=:title, description =:description,
                        author=:author, imageFile =:imageFile
                        where id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
                $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
                $stmt->bindValue(':author', $this->author, PDO::PARAM_STR);
                $stmt->bindValue(':imageFile', $this->imageFile, PDO::PARAM_STR);
                $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
                return $stmt->execute();
            }catch(PDOException $ex){
                $ex->getMessage();
                return false;
            }
        }
        public function deleteById($conn, $id){
            try{
                $sql = "delete from book where id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                return $stmt->execute();
            }catch(PDOException $ex){
                $ex->getMessage();
                return false;
            }
        }
        public function getPaging($conn, $limit, $offset){
            try{
                $sql = "select * from book order by title asc 
                        limit :limit
                        offset :offset";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
                if($stmt->execute()){
                    $books = $stmt->fetchAll();
                    return $books;
                }
            }
            catch(PDOException $ex){
                echo $ex->getMessage();
                return null;
            }
        }
        public function updateImage($conn, $id, $imageFile){
            try{
                $sql = "update book
                        set imageFile =:imageFile where id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':imageFile', $imageFile, $imageFile ? PDO::PARAM_STR : PDO::PARAM_NULL);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                return $stmt->execute();
            }catch(PDOException $ex){
                $ex->getMessage();
                return false;
            }
        }
        public static function count($conn){
            try{
                $sql = "select count(id) from book";
                return $conn->query($sql)->fetchColumn();
            }catch(PDOException $ex){
                $ex->getMessage();
                return -1;
            }
        }
    }
?>