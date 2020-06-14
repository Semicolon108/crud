<?php 
    class Crud extends Database{
        public function insert($fields){
            $keys = implode(",",array_keys($fields));
            $values = implode(", :",array_keys($fields));
            $sql = "INSERT INTO employee ($keys) VALUES (:".$values.")";
            $stmt = $this->connect()->prepare($sql);
            foreach ($fields as $key => $value) {
                # code...
                $stmt->bindValue(":".$key,$value);
            }
            $success = $stmt->execute();
            if($success){
                echo "successful upload";
            }
        }
        public function select_this($id){
            $sql = "SELECT * FROM employee WHERE id=:id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(":id",$id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }
        public function select(){
            $sql = "SELECT * FROM employee WHERE deleted = 0";
            $stmt = $this->connect()->query($sql);
            if($stmt->rowCount() > 0){
                while($row = $stmt->fetch()){
                    $data[] = $row;
                }
                return $data;
            }
        }
        public function update($field,$id){
            $st = "";
            $counter = 1;
            $total_field = count($field);
            foreach ($field as $key => $value) {
                # code...
                if($counter === $total_field){
                    $set = "$key = :".$key;
                    $st = $st.$set;
                }else{
                    $set = "$key = :".$key.", ";
                    $st = $st.$set;
                    $counter++;
                }
            }
            $sql = "";
            $sql.= "UPDATE employee SET ".$st;
            $sql.= " WHERE id = ".$id;
            $stmt = $this->connect()->prepare($sql);
            foreach ($field as $key => $value) {
                # code...
                $stmt->bindValue(":".$key,$value);
            }
            $exe = $stmt->execute();
            if($exe){
                header('Location: index.php');
                echo "Edited Successfully";
            }
        }
        public function delete_this($id){
            $sql = "UPDATE employee SET deleted=1 WHERE id=:id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(":id",$id);
            $exec = $stmt->execute();
            if($exec){
                header('Location: index.php');
                echo "Deleted Successfully";
            }
        }
    }
?>