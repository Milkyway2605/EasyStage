<?php
    
    //Fonction utilitaires
    include_once '../Application/Features/date.php';
    include_once '../Application/Features/calculPeriode.php';
    include_once '../Base/Ressources/html2pdf/html2pdf.class.php';
    
    //Fonction d'accès aux données
    include_once '../Modeles/accesBDD.php';
    include_once '../Modeles/accesStage.php';
    include_once '../Modeles/accesInscrit.php';
    include_once '../Modeles/accesPeriodeStage.php';
    include_once '../Modeles/accesOrganisme.php';
    include_once '../Modeles/accesEnseigne.php';
    include_once '../Modeles/accesEmployes.php';
    
    $connexion = getConnexion();
    $codeStage = $_SESSION['codeStage'];
    $unStage = getUnStage($codeStage, $connexion);
    $anneeUniversitaire = $_SESSION['anneeScolaire'];
    $periodeStage = getLaPeriode((int)$unStage->codePeriode, $connexion);
    $infoOrganisme = getInfosOrganisme((int)$unStage->codeOrganisme, $connexion);
    $signataire = getInfosSignataire($unStage->codeSignataire, $connexion);
    $tuteur = getInfosTuteur($unStage->codeTuteur, $connexion);
    $nomEtudiant = $_SESSION['nom'];
    $prenomEtudiant = $_SESSION['prenom'];
    $adresseEtudiant = $_SESSION['adresse'].', '.$_SESSION['codePostal'].' '.$_SESSION['ville'];
    if($_SESSION['sexe'] == 0)
    {
        $sexe = "Masculin";
    }
    else
    {
        $sexe = "Féminin";
    }
    $dateNaissanceEtudiant = dateAnglaisVersFrancais($_SESSION['dateNaissance']);
    $telephoneEtudiant = $_SESSION['telephone'];
    $emailEtudiant = $_SESSION['email'];

?>

<style type="text/css">

    table {width: 100%; border: none;}
    p {font-size: 8px; margin: 8px 0}

</style>
<page backtop="5mm" backbottom="5mm" backleft="5mm" backright="5mm" >
    <table>
        <tr>
            <td style='width: 50%;'>
                <img src="../Base/Ressources/Images/logo.jpg" alt="Logo Lycée André Malraux" style="height:30mm;">
            </td>
            <td style='width: 50%; vertical-align: bottom; padding: 20px;'>
                &nbsp; Année universitaire: <?php echo($anneeUniversitaire.' - '.((int)$anneeUniversitaire+1)) ?>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <div style='font-weight: bold; text-align: center;'>Convention de stage entre</div>
    <br>      
    <div class='container'>
        <table style='margin-top: 20px;'>
            <tr>
                <td style='width: 50%;'>
                    <p style='font-weight: bold'>
                        1- L'ETABLISSEMENT D'ENSEIGNMENT OU DE FORMATION
                    </p>
                    <p>
                        Nom : Lycée André Malraux
                    </p>
                    <p>
                        Adresse : 314 rue Jules Massenet, 62400 Béthune
                    </p>
                    <p>
                        Télephone: 03 21 64 61 61
                    </p>
                    <p>
                        Représenté par (signataire de la convention) : Pascal HARY
                    </p>
                    <p>
                        Qualité du représentant : Proviseur
                    </p>
                    <p>
                        Mél : ce.0620042j@ac-lille.fr
                    </p>
                    
                </td>
                
                <td style='width: 50%;'>
                    <p style='font-weight: bold'>
                        2- L'ORGANISME D'ACCUEIL
                    </p>
                    <p>
                        Nom : <?php echo($infoOrganisme->nom); ?>
                    </p>
                    <p>
                        Adresse : <?php echo($infoOrganisme->adresse.', '.$infoOrganisme->codePostal.' '.$infoOrganisme->ville); ?> <br>
                    </p>
                    <p>
                        Représenté par (nom du signataire de la convention) :  
                        <?php echo($signataire->prenom.' '.strtoupper($signataire->nom)); ?>                        
                    </p>
                    <p>
                        Qualité du représentant : <?php echo($signataire->fonction); ?>
                    </p>
                    <p>
                        Service dans lequel le stage sera effectué :<br><br>
                        .....................................................................
                    </p>
                    <p>
                        Téléphone : <?php echo($signataire->telephone); ?>
                    </p>
                    <p>
                        Mél : <?php echo($signataire->email); ?>
                    </p>
                    <p>
                        Lieu du stage (si différent de l'adresse de l'organisme) : <br><br>
                        ........................................................................................
                    </p>
                </td>
            </tr>
        </table>
        <table style="margin-top: 20px;">
            <tr>
                <td style="width: 100%;">
                    <p style='text-align: center; font-weight: bold;'>3- LE STAGIAIRE</p>
                    <p>
                        <table>
                            <tr>
                                <td style="width: 25%;">
                                    Nom : <?php echo($nomEtudiant); ?>
                                </td>
                                <td style="width: 25%;">
                                    Prenom : <?php echo($prenomEtudiant); ?>
                                </td>
                                <td style="width: 25%;">
                                    Sexe : <?php echo($sexe); ?>
                                </td>
                                <td style="width: 25%;">
                                    Né(e) le : <?php echo($dateNaissanceEtudiant); ?>
                                </td>
                            </tr>
                        </table>
                    </p>
                    <p>
                        <table>
                            <tr>
                                <td style="width: 50%;">
                                    Adresse : <?php echo($adresseEtudiant); ?>
                                </td>
                            </tr>
                        </table>
                    </p>
                    <p>
                        <table>
                            <tr>
                                <td style="width: 25%;">
                                    Téléphone : <?php echo($telephoneEtudiant); ?>
                                </td>
                                <td style="width: 75%;">
                                    Mél : <?php echo($emailEtudiant); ?>
                                </td>
                            </tr>
                        </table>
                    </p>
                    <p>
                        <table>
                            <tr>
                                <td style="width: 100%;">
                                    INTITULE DE LA FORMATION OU DU CURSUS SUIVI DANS L'ETABLISSEMENT D'ENSEIGNEMENT SUPERIEUR ET VOLUME HORAIRE (ANNUEL OU SEMESTRIEL) : 
                                    <br>
                                    <br>
                                    ......................................................................................................................................................................................................................................................................................
                                </td>
                            </tr>
                        </table>
                    </p>
                </td>
            </tr>
        </table>
        <table style="margin-top: 20px;">
            <tr>
                <td>
                    <p>
                        SUJET DE STAGE : <?php echo($unStage->libelle); ?>
                    </p>
                    <p>
                        Dates : Du <?php echo(dateAnglaisVersFrancais($periodeStage->dateDebut).' au '.dateAnglaisVersFrancais($periodeStage->dateFin))?>
                    </p>
                    <p>
                        Représentant une durée totale de 
                            <?php echo(calculPeriode($periodeStage->dateDebut, $periodeStage->dateFin)); ?>
                    </p>
                    <p>
                        Et correspondant à ....... jours de présence effective dans l'organisme d'accueil.
                    </p>
                    <p>
                        Répartition si présence discontinue : ....... nombre d'heures par semaine ou nombre d'heures par jour (rayer la mention inutile).
                    </p>
                    <p>
                        Commentaire : .................................................................................................................................................................................
                    </p>
                </td>
            </tr>
        </table>
        <table style="margin-top: 30px;">
            <tr>
                <td style="width: 50%;">
                    <p>
                        ENCADREMENT DU STAGIAIRE PAR L'ETABLISSEMENT D'ENSEIGNMENT : 
                    </p>
                    <p>
                        Nom et prénom de l'enseignant référent : <br><br>
                        Equipe enseignante du lycée André Malraux
                    </p>
                    <p>
                        Fonction (ou discipline) : Enseignement
                    </p>
                    <p>
                        <table>
                            <tr>
                                <td style="width: 50%;">
                                    Téléphone : 03 21 64 61 61
                                </td>
                                <td style="width: 50%;">
                                    Mél : 
                                </td>
                            </tr>
                        </table>
                    </p>
                    
                </td>
                <td style="width: 50%;">
                    <p>
                        ENCADREMENT DU STAGIAIRE PAR L'ORGANISME D'ACCUEIL : 
                    </p>
                    <p>
                        Nom et prénom du tuteur de stage : <br><br>
                        <?php echo($tuteur->nom.' '.$tuteur->prenom) ?>
                    </p>
                    <p>
                        Fonction : <?php echo($tuteur->fonction) ?>
                    </p>
                    <p>
                        <table>
                            <tr>
                                <td style="width: 50%;">
                                    Téléphone : <?php echo($tuteur->telephone) ?>
                                </td>
                                <td style="width: 50%;">
                                    Mél : <?php echo($tuteur->email) ?>
                                </td>
                            </tr>
                        </table>
                    </p>
                </td>
            </tr>
        </table>
        <table style="margin-top: 20px;">
            <tr>
                <td>
                    <p>
                        Caisse primaire d'assurance maladie à contacter en cas d'accident (lieu de domicile du stagiaire sauf exception) : ............................................................................................................<br><br>
                        .................................................................................................................................................................................................................................................................................................
                    </p>
                </td>
            </tr>
        </table>
    </div>
</page>

