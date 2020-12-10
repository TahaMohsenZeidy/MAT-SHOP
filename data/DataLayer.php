<?php
define("DB_USER","root");//nom root
define("DB_PASSWORD","");//pas de mot de passe donc c vide
define("HOST","localhost");//nom du hote
define("DB_NAME","jstore_ecommerce");// nom de data base

class DataLayer{

    private $connexion;

    function __construct(){
        try {
            $this->connexion = new PDO("mysql:host=".HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
            //echo "connexion à la base de données réussie";
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    /**
     * fonction qui créer un customers en base de données
     * @param pseudo le pseudo du customer
     * @param email l'email du customer
     * @param password le mot de passe du customer
     * @return TRUE sien cas de création avec succès du customer, FALSE sinon
     * @return NULL s'il y a une exception déclenchée
     */
    function createCustomers($firstname,$email,$password){
        $sql = 'INSERT INTO customers (	firstname,email,password) VALUES (:firstname,:email,:password)';
        try {
			//print_r( $this->connexion);
            $result = $this->connexion->prepare($sql);
            $var = $result->execute(array(
                ':firstname' => $firstname,
                ':email' => $email,
                ':password' => sha1($password)
            ));
            if($var){
                return TRUE;
            }else{
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }

    }

    /**
     * fonction qui permet d'authentifier un customer
     * @param email l'email du customer
     * @param password le mot de passe du customer
     * @return ARRAY tableau contenant les infos du customer si authentification réussie
     * @return FALSE si authentification échouée
     * @return NULL s'il y a une exception déclenchée
     */
    function authentifier($email,$password){
        $sql = "SELECT * FROM customers WHERE email = :email";
        try {
            $result = $this->connexion->prepare($sql);
            $result->execute(array(':email'=>$email));
            $data = $result->fetch(PDO::FETCH_ASSOC);
            if($data && ($data['password'] == sha1($password))){
                unset($data['password']);
                return $data;
            }else{
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }
    function authentifierAdmin($email,$password){
        $sql = "SELECT * FROM admin WHERE email = :email";
        try {
            $result = $this->connexion->prepare($sql);
            $result->execute(array(':email'=>$email));
            $data = $result->fetch(PDO::FETCH_ASSOC);
            if($data && ($data['password'] == ($password))){
                unset($data['password']);
                return $data;
            }else{
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }

    /**
     * fonction qui créer un customers en base de données
     * @param idCustomers l'identifiant du customers
     * @param idPoduct l'identifiant du produt de la commande
     * @param quantity La quantité du produit commandé
     * @param price Le prix de la commande
     * @return TRUE si en cas de commande réalisée avec succès, FALSE sinon
     * @return NULL s'il y a une exception déclenchée
     */
    function createOrders($idCustomers,$idPoduct,$quantity,$price){
        $sql = 'INSERT INTO orders (id_customers, id_product, quantity, price) VALUES
        (:id_customers,:id_product,:quantity,:price)';
        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute(array(
                ':id_customers' => $idCustomers,
                ':id_product' => $idPoduct,
                ':quantity' => $quantity,
                ':price' => $price
            ));
            if($var){
                return TRUE;
            }else{
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }

    }

    function insertProduct($name,$description,$price,$stock,$category,$image){
      $sql = "INSERT INTO product ( name, description, price, stock , category, image) VALUES
      (:name,:description,:price,:stock,:category,:image)";
      try {
        echo"s1";
          $result = $this->connexion->prepare($sql);
          echo "string2";
          $var = $result->execute(array(
              ':name' => $name,
              ':description'=>$description,
              ':price' => $price,
              ':stock'=>$stock,
              ':category' => $category,
              ':image' => $image
          ));
          echo "string3";
          if($var){
            echo "string4";
              return TRUE;
          }else{
            echo "string5";
              return FALSE;
          }
          exit(0);
      } catch (PDOException $th) {
          return NULL;
      }

    }



    /**
     * fonction qui met à jour les information d'un utilisateur
     * en base de données
     * @param newInfos Tableau de associatif "nom_champ_a_mettre_a_jour" => "nouvelle_valeur"
     * @return TRUE si en cas de succès de la mise à jour, FALSE sinon
     * @return NULL s'il y a une exception déclenchée
     */
    // exemple de paramètre array('pseudo'=>'jean','firstname'=>'DUPONT')
    function updateInfosCustomer($newInfos){
        $sql = "UPDATE 'customers' SET ";
        $id = $newInfos["id"];
        unset($newInfos["id"]);
        try {
            foreach($newInfos as $key => $value){
                $value = addslashes($value);
                $sql .= " $key = '$value' ,";
            }
            $sql = substr($sql,0,-1);
            $sql .= " WHERE id = :id";
            //print_r($sql); exit();
            $result = $this->connexion->prepare($sql);
            $var = $result->execute(array('id'=>$id));

            if($var){
                return TRUE;
            }else{
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }

    }

    /**
     * fonction qui sert à récupérer les catégories de produits au sein de la base de données
     * @param rien ne prend pas de paramètre
     * @return array tableau contenant les catégories, en cas de succès, FALSE sinon
     * @return NULL s'il y a une exception déclenchée
     */
    function getCategory(){
        $sql = "SELECT * FROM category";
        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            if($data){
                return $data;
            }else{
                return FALSE;
            }

        } catch (PDOException $th) {
            return NULL;
        }


    }


    /**
     * fonction qui sert à récupérer les catégories de produits au sein de la base de données
     * @param id id de l'utilisateur
     * @return array tableau contenant les infos de l'utilisateur, en cas de succès, FALSE sinon
     * @return FALSE dans le cas d'echec
     * @return NULL s'il y a une exception déclenchée
     */
    function getCustomer(){
        $sql = "SELECT * FROM customers ";
        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            if($data){
                unset($data[0]['password']);
                return $data;
            }else{
                return FALSE;
            }

        } catch (PDOException $th) {
            return NULL;
        }
    }
    function getoneCustomer($email){
        $sql = "SELECT * FROM customers WHERE email = '$email' ";
        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            if($data){
                unset($data[0]['password']);
                return $data;
            }else{
                return FALSE;
            }

        } catch (PDOException $th) {
            return NULL;
        }
    }

    /**
     * fonction qui sert à récupérer les produits au sein de la base de données
     * @param limit parametre optionnel, permet de définir le nombre max de produits attendu
     * @return array tableau contenant les produits, en cas de succès, FALSE sinon
     * @return NULL s'il y a une exception déclenchée
     */
    function getProduct($limit=NULL,$category = NULL,$id=NULL){
        $sql = "SELECT * FROM product ";
        try {
            if(!is_null($id)){
                $sql .= ' WHERE id = '.$id;
            }
            if(!is_null($category)){
                $sql .= ' WHERE category = '.$category;
            }
            if(!is_null($limit)){
                $sql .= ' LIMIT '.$limit;
            }
            //print_r($sql);exit();
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            //print_r($data);exit();
            if($data){
                return $data;
            }else{
                return FALSE;
            }



        } catch (PDOException $th) {
            return NULL;
        }
    }

    //hedhom li zed'hom Taha

    function createMessage($name, $email, $message){
        $sql = 'INSERT INTO messages (name, email, message) VALUES
        (:na, :em, :mess)';
        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute(array(
                ':na' => $name,
                ':em' => $email,
                ':mess' => $message
            ));
            if($var){
                return true;
            }
            return false;
        }catch (PDOException $th) {
            return $th;
        }
    }

    function deleteprod($id){
      $sql = "DELETE FROM product WHERE id =$id ";
      try {
        $result = $this->connexion->prepare($sql);
        $var = $result->execute();
        if($var){
            return TRUE;

        }else{
            return FALSE;
        }

      } catch (\Exception $e) {
        return NULL;
      }

    }

 function rechercher($name){

        $sql = "SELECT * FROM product WHERE name LIKE '%$name%'";
         try {
            $result = $this->connexion->prepare($sql);

            $var = $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);//un tableau de la base de données
            if($data){
                return $data;

            }else{
                return FALSE;
            }

        } catch (PDOException $th) {
            return NULL;
        }

    }
    function getorders(){
            $sql = "SELECT * FROM orders";
            try {
                $result = $this->connexion->prepare($sql);
                $var = $result->execute();
                $data = $result->fetchAll(PDO::FETCH_ASSOC);
                if($data){
                    return $data;
                }else{
                    return FALSE;
                }

            } catch (PDOException $th) {
                return NULL;
            }
        }
    
        function getProductsByPrice($prRange){
            $sql = "SELECT * FROM product WHERE price BETWEEN 0.0 AND :price";
            try {
                $result = $this->connexion->prepare($sql);
                $result->execute(array(':price'=>$prRange));
                $data = $result->fetchAll(PDO::FETCH_ASSOC);
                if($data){
                    return $data;
                }
                return FALSE;
            } catch (PDOException $ex) {
                return NULL;
            }
        }
    

}
