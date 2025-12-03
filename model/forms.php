<?php
    /**
     * Méthode qui ajoute un formulaire en BDD
     * @param array $form tableau de formulaire
     * @return void ne retourne rien
     */
    function saveForms(array $form): void {
        try {
            //Requête SQL
            $request = "INSERT INTO forms(firstname, lastname, email, phone, message)
            VALUES(?,?,?,?,?)";
            //préparation
            $req = connectBDD()->prepare($request);
            //bind des paramètres
            $req->bindParam(1, $form["firstname"], PDO::PARAM_STR);
            $req->bindParam(2, $form["lastname"], PDO::PARAM_STR);
            $req->bindParam(3, $form["email"], PDO::PARAM_STR);
            $req->bindParam(4, $form["phone"], PDO::PARAM_STR);
            $req->bindParam(5, $form["message"], PDO::PARAM_STR);
            //exécution de la requête
            $req->execute();
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    /**
     * @return array tableau de formulaire
     */
    function findAllForm(): array {
    try {
        $request = "SELECT Id_Forms, firstname, lastname, email, phone, message
                    FROM forms";

        $req = connectBDD()->prepare($request);
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);

    } catch(Exception $e) {
        throw new Exception($e->getMessage());
    }
}
?>