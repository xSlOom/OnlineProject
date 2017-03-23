<?php

class Stagiaire {
    // Insererun nouveau stagiaire
    public static function InsertStagiaire($nom, $prenom, $cp, $ville, $email, $telephone, $promo) {
        $query      = "INSERT INTO stagiaires (nom, prenom, cp, ville, mail, telephone, promo) VALUES(:nom, :prenom, :cp, :ville, :mail, :telephone, :promo)";
        $execute    = DataBase::bdd()->prepare($query);
        $execute->bindParam(':nom', $nom);
        $execute->bindParam(':prenom', $prenom);
        $execute->bindParam(':cp', $cp);
        $execute->bindParam(':ville', $ville);
        $execute->bindParam(':mail', $email);
        $execute->bindParam(':telephone', $telephone);
        $execute->bindParam(':promo', $promo);
        return $execute->execute();
    }

    // Recuperer un stagiare depuis la base de données
    public static function recupStagiaire(){
        $promo  = ModelFormation::getLastPromo()["promo"];
        $query  = DataBase::bdd()->prepare("SELECT * from stagiaires WHERE promo = :promo ORDER by id DESC");
        $query->bindParam(":promo", $promo);
        $query->execute();
        $fetch  = $query->fetchAll();
        return sizeof($fetch) > 0 ? $fetch : false;
    }
    
    public static function recupStages() {
        $data   = [];
        $promo = ModelFormation::getLastPromo()['promo'];
        $query  = DataBase::bdd()->prepare("SELECT * from stage WHERE promo = :promo");
        $query->bindParam(":promo", $promo);
        $query->execute();
        $fetch  = $query->fetchAll();
        for ($i = 0; $i < sizeof($fetch); $i++) {
            $data[$fetch[$i]['date']][] .= $fetch[$i]["adresse"] . " " . $fetch[$i]["cp"] . " " . $fetch[$i]["ville"];
        }
        return $data;

    }
    
    public static function modifStagiaire($stagiaire){
        $query  = "UPDATE stagiaires SET cp = :cp,
                                         ville = :ville,
                                         mail = :mail,
                                         telephone = :telephone,
                                         adresse = :adresse,
                                         accepter = :accepter
                       WHERE nom = :nom AND prenom = :prenom";

        $execute = DataBase::bdd()->prepare($query);
        $execute->bindParam(":nom", $stagiaire[0]);
        $execute->bindParam(":prenom", $stagiaire[1]);
        $execute->bindParam(':telephone', $stagiaire[2]);
        $execute->bindParam(':mail', $stagiaire[3]);
        $execute->bindParam(":adresse", $stagiaire[4]);
        $execute->bindParam(':cp', $stagiaire[5]);
        $execute->bindParam(':ville', $stagiaire[6]);
        $execute->bindParam(':accepter', $stagiaire[7]);
        return $execute->execute();
    }
    
    public static function rechercheStagiaire($prenom, $nom){
        $query = DataBase::bdd()->prepare("SELECT * FROM stagiaires WHERE prenom =:prenom AND nom =:nom");
        $query->bindParam(":prenom", $prenom);
        $query->bindParam(":nom", $nom);
        $query->execute();

        $fetch = $query->fetch();
        return $fetch;
    }

    // Inserer un resultat de test
    public static function InsertResultat($resultat){
        $query      = "INSERT INTO resultatTest (date, connuFormation, age,prescription,status, prescripteur,
                    contreIndic, commentaire, resultatNiveau, resultatFormation, resultatExperience, idStagiaire,
                    pointNiveau, pointFormation, pointExperience, commentaire1, prerequis,resultatTravail,
                    resultatCuriosite, resultatDynamisme, resultatDiscours, resultatMobilite, pointTravail,
                    pointCuriosite, pointDynamisme, pointDiscours, pointMobilite, total, commentaire2, resultatMetier, resultatEntreprise, resultatProjet, pointMetier, pointEntreprise, pointProjet, total1, commentaire3, resultatCulture, pointCulture, total2, commentaire4, NbPoints, note) VALUES(:date, :connuFormation, :age, :prescription, :status, :prescripteur, :contreIndic, :commentaire, :resultatNiveau, :resultatFormation, :resultatExperience, :idStagiaire, :pointNiveau, :pointFormation, :pointExperience, :commentaire1, :prerequis, :resultatTravail, :resultatCuriosite, :resultatDynamisme, :resultatDiscours, :resultatMobilite, :pointTravail, :pointCuriosite, :pointDynamisme, :pointDiscours, :pointMobilite, :total, :commentaire2, :resultatMetier, :resultatEntreprise, :resultatProjet, :pointMetier, :pointEntreprise, :pointProjet, :total1, :commentaire3, :resultatCulture, :pointCulture, :total2, :commentaire4, :NbPoints, :note)";

        $execute    = DataBase::bdd()->prepare($query);
        $execute->bindParam(':date', $resultat[0]);
        $execute->bindParam(':connuFormation', $resultat[1]);
        $execute->bindParam(':age', $resultat[2]);
        $execute->bindParam(':prescription', $resultat[3]);
        $execute->bindParam(':status', $resultat[4]);
        $execute->bindParam(':prescripteur', $resultat[5]);
        $execute->bindParam(':contreIndic', $resultat[6]);
        $execute->bindParam(':commentaire', $resultat[7]);
        $execute->bindParam(':resultatNiveau', $resultat[8]);
        $execute->bindParam(':resultatFormation', $resultat[9]);
        $execute->bindParam(':resultatExperience', $resultat[10]);
        $execute->bindParam(':pointNiveau', $resultat[11]);
        $execute->bindParam(':pointFormation', $resultat[12]);
        $execute->bindParam(':pointExperience', $resultat[13]);
        $execute->bindParam(':commentaire1', $resultat[14]);
        $execute->bindParam(':prerequis', $resultat[15]);
        $execute->bindParam(':resultatTravail', $resultat[16]);
        $execute->bindParam(':resultatCuriosite', $resultat[17]);
        $execute->bindParam(':resultatDynamisme', $resultat[18]);
        $execute->bindParam(':resultatDiscours', $resultat[19]);
        $execute->bindParam(':resultatMobilite', $resultat[20]);
        $execute->bindParam(':pointTravail', $resultat[21]);
        $execute->bindParam(':pointCuriosite', $resultat[22]);
        $execute->bindParam(':pointDynamisme', $resultat[23]);
        $execute->bindParam(':pointDiscours', $resultat[24]);
        $execute->bindParam(':pointMobilite', $resultat[25]);
        $execute->bindParam(':total', $resultat[26]);
        $execute->bindParam(':commentaire2', $resultat[27]);
        $execute->bindParam(':resultatMetier', $resultat[28]);
        $execute->bindParam(':resultatEntreprise', $resultat[29]);
        $execute->bindParam(':resultatProjet', $resultat[30]);
        $execute->bindParam(':pointMetier', $resultat[31]);
        $execute->bindParam(':pointEntreprise', $resultat[32]);
        $execute->bindParam(':pointProjet', $resultat[33]);
        $execute->bindParam(':total1', $resultat[34]);
        $execute->bindParam(':commentaire3', $resultat[35]);
        $execute->bindParam(':resultatCulture', $resultat[36]);
        $execute->bindParam(':pointCulture', $resultat[37]);
        $execute->bindParam(':total2', $resultat[38]);
        $execute->bindParam(':commentaire4', $resultat[39]);
        $execute->bindParam(':NbPoints', $resultat[40]);
        $execute->bindParam(':note', $resultat[41]);
        $id = "1";
        $execute->bindParam(":idStagiaire", $id);
        $execute->execute();
    }
}
