<?php
    /**
     * Méthode qui vérifie si un admin existe en BDD avec son email
     * @param email string email de l'admin
     * @return bool true si existe sion false
     */
    function isAdminExistByEmail(string $email): bool {
        try {
                //Récupération de la valeur de name (category)
                $email = $email;
                //Ecrire la requête SQL
                $request = "SELECT a.id_Admins FROM admins AS a WHERE a.email = ?";
                //préparer la requête
                $req = connectBDD()->prepare($request);
                //assigner le paramètre
                $req->bindParam(1, $email, PDO::PARAM_STR);
                //exécuter la requête
                $req->execute();
                //récupérer le resultat
                $data = $req->fetch(PDO::FETCH_ASSOC);
                //Test si l'enrgistrement est vide
                if (empty($data)) {
                    return false;
                }
                return true;
            } catch (Exception $e) {
                return false;
            }
    }
        /**
     * Méthode qui  ajoute un admin en BDD
     * @param array $admin tableau de l'utilisateur
     * @return void ne retrourne rien
     */
    function saveAdmin(array $admin): void {
        try {
                //Récupération des données de l'utilisateur
                $firstname = $admin["firstname"];
                $lastname = $admin["lastname"];
                $email = $admin["email"];
                $password = $admin["password"];
                $request = "INSERT INTO admins(firstname, lastname, email, password) VALUE (?,?,?,?)";

                //prépararation de la requête
                $req = connectBDD()->prepare($request);
                //bind param
                $req->bindParam(1, $firstname, \PDO::PARAM_STR);
                $req->bindParam(2, $lastname, \PDO::PARAM_STR);
                $req->bindParam(3, $email, \PDO::PARAM_STR);
                $req->bindParam(4, $password, \PDO::PARAM_STR);
        
                //éxécution de la requête
                $req->execute();
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
    }
        /**
     * Méthode qui vérifie si un admin existe en BDD avec son email
     * @param email string email de l'utilisateur
     * @return array retourne le tableau de l'utilisateur
     */
    function findAdminByEmail(string $email,): array
    {
        try {
            //Ecrire la requête SQL
            $request = "SELECT a.id_Admins AS idAdmin, a.firstname, a.lastname, a.password, a.email FROM admins AS a WHERE a.email = ?";
            //préparer la requête
            $req = connectBDD()->prepare($request);
            //assigner le paramètre
            $req->bindParam(1, $email, \PDO::PARAM_STR);
            //exécuter la requête
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }