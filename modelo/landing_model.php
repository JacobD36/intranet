<?php
class landing_model
{
    private $db;

    public function __construct()
    {
        $this->db = database::conexion();
    }

    public function get_all_menu(){
        try{
            $stmt = $this->db->prepare("select * from menu where estado=1;");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            unset($stmt);
            return $rows;
        }catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function get_status_section($id){
        try{
            $stmt = $this->db->prepare("select * from menu where id='".$id."' order by id desc limit 1;");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            unset($stmt);
            return $rows;
        }catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function get_banner_image(){
        try{
            $stmt = $this->db->prepare("select * from imagenes where id=1 and estado=1 order by id desc limit 1;");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            unset($stmt);
            return $rows;
        }catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function valida_acceso($user,$pass){
        $valor_hash=$this->get_hash($user);
        if($valor_hash!=null) {
            if (password_verify($pass, $valor_hash[0]['hashcode'])) {
                try{
                    $stmt = $this->db->prepare("select * from usuarios where codusuario='".$user."' and estado=1 limit 1;");
                    $stmt->execute();
                    $row = $stmt->fetchAll();
                    unset($stmt);
                    return $row;
                }catch(PDOException $e){
                    print "Error!: " . $e->getMessage() . "<br/>";
                    die();
                }
            } else {
                return "";
            }
        } else {
            return "";
        }
    }

    public function get_hash($codusuario) {
        try{
            $stmt = $this->db->prepare("select * from login_code where codusuario = '".$codusuario."' limit 1;");
            $stmt->execute();
            $row = $stmt->fetchAll();
            unset($stmt);
            return $row;
        }catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function get_user_name($id){
        try{
            $stmt = $this->db->prepare("select * from personas where idusuario='".$id."' limit 1;");
            $stmt->execute();
            $row = $stmt->fetchAll();
            unset($stmt);
            $nombre = $row[0]['nombre1'].' '.$row[0]['apellido1'];
            return $nombre; 
        }catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
?>