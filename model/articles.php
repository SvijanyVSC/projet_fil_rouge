<?php
/**
 * Méthode qui ajoute un article en BDD
 * @param array $article tableau d'article
 * @return void
 */

//Ajouter un article
function saveArticle(array $article): void {
    try {
        // Requête SQL
        $request = "INSERT INTO articles (title, description, update_at)
                    VALUES (?, ?, ?)";

        $req = connectBDD()->prepare($request);

        $req->bindParam(1, $article["title"], PDO::PARAM_STR);
        $req->bindParam(2, $article["description"], PDO::PARAM_STR);
        $req->bindParam(3, $article["update_at"], PDO::PARAM_STR);

        $req->execute();

    } catch(Exception $e) {
        throw new Exception($e->getMessage());
    }
}

//Affiche la liste des articles
    /**
     * @return array tableau de articles
     */
    function findAllArticle(): array {
    try {
        $request = "SELECT Id_Articles, title, description, update_at
                    FROM articles
                    ORDER BY update_at DESC";

        $req = connectBDD()->prepare($request);
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);

    } catch(Exception $e) {
        throw new Exception($e->getMessage());
    }
}

// Envoyer un article sur le Blog côté visiteur
function findAllArticlePublic(): array {
    try {
        $request = "SELECT Id_Articles, title, description, update_at
                    FROM articles
                    WHERE published = 1
                    ORDER BY update_at DESC";
        $req = connectBDD()->prepare($request);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e) {
        throw new Exception($e->getMessage());
    }
}

// Supprimer un article
function deleteArticle(int $id): void {
    try {
        $request = "DELETE FROM articles WHERE Id_Articles = ?";

        $req = connectBDD()->prepare($request);
        $req->bindParam(1, $id, PDO::PARAM_INT);

        $req->execute();

    } catch (Exception $e) {
        throw new Exception($e->getMessage());
    }
}

//Modifier un article
function updateArticle(array $article): void {
    try {
        $request = "UPDATE articles 
                    SET title = ?, description = ?, update_at = ? 
                    WHERE Id_Articles = ?";

        $req = connectBDD()->prepare($request);

        $req->bindParam(1, $article["title"], PDO::PARAM_STR);
        $req->bindParam(2, $article["description"], PDO::PARAM_STR);
        $req->bindParam(3, $article["update_at"], PDO::PARAM_STR);
        $req->bindParam(4, $article["Id_Articles"], PDO::PARAM_INT);

        $req->execute();

    } catch (Exception $e) {
        throw new Exception($e->getMessage());
    }
}

?>