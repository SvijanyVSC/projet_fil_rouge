<?php
    /**
     * Méthode qui ajoute un escape game en BDD
     * @param array $escapeGame tableau de escapeGame
     * @return void ne retourne rien
     */
    function saveEscapeGame(array $escapeGame): void {
        try {
            //Requête SQL
            $request = "INSERT INTO escape_games(title, description, creation_date)
            VALUES(?,?,?)";
            //préparation
            $req = connectBDD()->prepare($request);
            //bind des paramètres
            $req->bindParam(1, $escapeGame["title"], PDO::PARAM_STR);
            $req->bindParam(2, $escapeGame["description"], PDO::PARAM_STR);
            $req->bindParam(3, $escapeGame["creation_date"], PDO::PARAM_STR);

            //exécution de la requête
            $req->execute();
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    /**
     * @return array tableau des escape games
     */
    function findAllEscapeGames(): array {
    try {
        $request = "SELECT Id_Escape_Game, title, description, creation_date
                    FROM escape_games
                    ORDER BY creation_date DESC";

        $req = connectBDD()->prepare($request);
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);

    } catch(Exception $e) {
        throw new Exception($e->getMessage());
    }
}
?>