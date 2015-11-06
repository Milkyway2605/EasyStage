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
    p {font-size: 9px; margin: 8px 0}

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
        <table>
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
                        Représenté par (signataire de la convention) : <br>
                        <strong>Pascal HARY</strong>
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
                        Représenté par (nom du signataire de la convention) : <br> 
                        <strong><?php echo($signataire->prenom.' '.strtoupper($signataire->nom)); ?></strong>                    
                    </p>
                    <p>
                        Qualité du représentant : <?php echo($signataire->fonction); ?>
                    </p>
                    <p>
                        Service dans lequel le stage sera effectué :<br><br>
                        .....................................................................
                    </p>
                    <p>
                        Téléphone : <?php echo($infoOrganisme->telephone); ?>
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
                                    Nom : <strong><?php echo(strtoupper($nomEtudiant)); ?></strong>
                                </td>
                                <td style="width: 25%;">
                                    Prenom : <strong><?php echo($prenomEtudiant); ?></strong>
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
                                    Formation continue
                                </td>
                            </tr>
                        </table>
                    </p>
                </td>
            </tr>
        </table>
        <table style="margin-top: 10px;">
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
        <table style="margin-top: 20px;">
            <tr>
                <td style="width: 50%;">
                    <p>
                        ENCADREMENT DU STAGIAIRE PAR L'ETABLISSEMENT D'ENSEIGNMENT : 
                    </p>
                    <p>
                        Nom et prénom de l'enseignant référent : <br>
                        <strong>Equipe enseignante du lycée André Malraux</strong>
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
                                    Mél : bruno.marais@ac-lille.fr
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
                        Nom et prénom du tuteur de stage : <br>
                        <strong><?php echo($tuteur->prenom.' '.strtoupper($tuteur->nom)); ?></strong>
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
                        Caisse primaire d'assurance maladie à contacter en cas d'accident (lieu de domicile du stagiaire sauf exception) : <br><br>
                        .................................................................................................................................................................................................................................................................................................<br>
                        .................................................................................................................................................................................................................................................................................................
                    </p>
                </td>
            </tr>
        </table>
    </div>
</page>
<page backtop="7mm" backbottom="7mm" backleft="5mm" backright="5mm" >
    <table>
        <tr>
            <td style="width: 50%;">
                <table>
                    <tr>
                        <td style="width: 85%; vertical-align: top;">
                            <p>
                                <p style='font-size: 10px;'>Article 1 – Objet de la convention</p>
                                La présente convention règle les rapports de l’organisme d’accueil avec
                                l’établissement d’enseignement et le stagiaire.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 85%;">
                            <p>
                                <p style='font-size: 10px;'>Article 2 – Objectif du stage</p>
                                Le stage correspond à une période temporaire de mise en situation en milieu
                                professionnel au cours de laquelle l’étudiant(e) acquiert des compétences
                                professionnelles et met en œuvre les acquis de sa formation en vue de
                                l’obtention d’un diplôme ou d’une certification et de favoriser son insertion
                                professionnelle. Le stagiaire se voit confier une ou des missions conformes
                                au projet pédagogique défini par son établissement d’enseignement et
                                approuvées par l’organisme d’accueil.<br>
                                Le programme est établi par l’établissement d’enseignement et l’organisme
                                d’accueil en fonction du programme général de la formation dispensée.<br><br>
                                ACTIVITÉS CONFIÉES :<br>
                                …………………………………………………………………………………………..
                                …………………………………………………………………………………………..<br><br>
                                COMPÉTENCES À ACQUÉRIR OU À DÉVELOPPER :
                                …………………………………………………………………………………………..

                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 85%;">
                            <p>
                                <p style='font-size: 10px;'>Article 3 – Modalités du stage</p>
                                La durée hebdomadaire de présence du stagiaire dans l’organisme d’accueil
                                sera de ……………………… heures sur la base d’un temps complet/temps
                                partiel (rayer la mention inutile), <br>
                                <p>
                                    Si le stagiaire doit être présent dans l’organisme d’accueil la nuit, le
                                    dimanche ou un jour férié, préciser les cas particuliers : 
                                    …………………………………………………………………………………………..
                                …………………………………………………………………………………………..<br><br>

                                </p>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 85%;">
                            <p>
                                <p style='font-size: 10px;'>Article 4 – Accueil et encadrement du stagiaire</p>
                                Le stagiaire est suivi par l’enseignant référent désigné dans la présente
                                convention ainsi que par le service de l’établissement en charge des stages.
                                Le tuteur de stage désigné par l’organisme d’accueil dans la présente
                                convention est chargé d’assurer le suivi du stagiaire et d’optimiser les
                                conditions de réalisation du stage conformément aux stipulations
                                pédagogiques définies.<br>
                                Le stagiaire est autorisé à revenir dans son établissement d’enseignement
                                pendant la durée du stage pour y suivre des cours demandés explicitement
                                par le programme, ou pour participer à des réunions ; les dates sont portées
                                à la connaissance de l’organisme d’accueil par l’établissement.<br>
                                L’organisme d’accueil peut autoriser le stagiaire à se déplacer.<br>
                                Toute difficulté survenue dans la réalisation et le déroulement du stage,
                                qu’elle soit constatée par le stagiaire ou par le tuteur de stage, doit être
                                portée à la connaissance de l’enseignant-référent et de l’établissement
                                d’enseignement afin d’être résolue au plus vite.<br><br>
                                MODALITÉS D’ENCADREMENT (visites, rendez-vous téléphoniques, etc.)
                                …………………………………………………………………………………………..
                                …………………………………………………………………………………………..<br><br>

                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 85%;">
                            <p>
                                <p style='font-size: 10px;'>Article 5 – Gratification - Avantages</p>
                                En France, lorsque la durée du stage est supérieure à deux mois consécutifs
                                ou non, celui-ci fait obligatoirement l’objet d’une gratification, sauf en cas de
                                règles particulières applicables dans certaines collectivités d’outre-mer
                                françaises et pour les stages relevant de l’article L4381-1 du Code de la
                                santé publique.<br>
                                Le montant horaire de la gratification est fixé à 13,75 % du plafond horaire
                                de la sécurité sociale défini en application de l’article L.241-3 du Code de la
                                Sécurité sociale. Une convention de branche ou un accord professionnel
                                peut définir un montant supérieur à ce taux.<br>
                                La gratification due par un organisme de droit public ne peut être cumulée
                                avec une rémunération versée par ce même organisme au cours de la
                                période concernée.<br>
                                La gratification est due sans préjudice du remboursement des frais engagés
                                par le stagiaire pour effectuer son stage et des avantages offerts, le cas
                                échéant, pour la restauration, l’hébergement et le transport.<br>
                                L’organisme peut décider de verser une gratification pour les stages dont la
                                durée est inférieure ou égale à deux mois.<br>
                                En cas de suspension ou de résiliation de la présente
                                convention, le montant de la gratification due au stagiaire est proratisé en
                                fonction de la durée du stage effectué.<br>
                                La durée donnant droit à gratification s’apprécie compte tenu de la
                                présente convention et de ses avenants éventuels, ainsi que du nombre
                                de jours de présence effective du/de la stagiaire dans l’organisme.

                                </p><br>
                            <p>
                                LE MONTANT DE LA GRATIFICATION est fixé à . ……………………. €
                                par heure / jour / mois (rayer les mentions inutiles)
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 50%; vertical-align: top">
                <table>
                     <tr>
                        <td style="width: 85%;">
                            <p>
                            <p style='font-size: 10px;'>Article 5 bis – Accès aux droits des salariés – Avantages <span style='font-size: 7.5px;'>(organisme
                                de droit privé en France sauf en cas de règles particulières applicables
                                dans certaines collectivités d’outre-mer françaises)</span> :</p>
                                Le stagiaire bénéficie des protections et droits mentionnés aux articles
                                L.1121-1, L.1152-1 et L.1153-1 du Code du travail, dans les mêmes
                                conditions que les salariés.<br>
                                Le stagiaire a accès au restaurant d’entreprise ou aux titres-restaurants
                                prévus à l’article L.3262-1 du Code du travail, dans les mêmes conditions
                                que les salariés de l’organisme d’accueil. Il bénéficie également de la prise
                                en charge des frais de transport prévue à l’article L. 3261-2 du même
                                code.<br>
                                Le stagiaire accède aux activités sociales et culturelles mentionnées à
                                l’article L.2323-83 du Code du travail dans les mêmes conditions que les
                                salariés.<br><br>
                                AUTRES AVANTAGES ACCORDÉS : ………………………………….
                                ………………………………………………………………………………….

                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 85%;">
                            <p>
                            <p style='font-size: 10px;'>Article 5ter – Accès aux droits des agents - Avantages <span style='font-size: 7.5px;'>(Organisme de
                            droit public en France sauf en cas de règles particulières applicables dans
                            certaines collectivités d’outre-mer françaises)</span> :</p>
                            Les trajets effectués par le stagiaire d’un organisme de droit public entre
                            leur domicile et leur lieu de stage sont pris en charge dans les conditions
                            fixées par le décret n° 2010-676 du 21 juin 2010 instituant une prise en
                            charge partielle du prix des titres d’abonnement correspondant aux
                            déplacements effectués par les agents publics entre leur résidence
                            habituelle et leur lieu de travail.<br>
                            Le stagiaire accueilli dans un organisme de droit public et qui effectue une
                            mission dans ce cadre bénéficie de la prise en charge de ses frais de
                            déplacement temporaire selon la réglementation en vigueur.<br>
                            Est considéré comme sa résidence administrative le lieu du stage indiqué
                            dans la présente convention.<br><br>
                            AUTRES AVANTAGES ACCORDÉS : …………………………………
                            …………………………………………………………………………………

                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 85%;">
                            <p>
                            <p style='font-size: 10px;'>Article 6 – Régime de protection sociale</p>
                            Pendant la durée du stage, le stagiaire reste affilié à son régime de
                            Sécurité sociale antérieur.<br>
                            Les stages effectués à l’étranger sont signalés préalablement au départ du
                            stagiaire à la Sécurité sociale lorsque celle-ci le demande.<br>
                            Pour les stages à l’étranger, les dispositions suivantes sont applicables
                            sous réserve de conformité avec la législation du pays d’accueil et de celle
                            régissant le type d’organisme d’accueil.

                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 85%;">
                            <p>
                            <p style='font-size: 10px;'>6-1 Gratification d’un montant maximum de 13,75 % du plafond
                            horaire de la sécurité sociale :</p>
                            La gratification n’est pas soumise à cotisation sociale.<br>
                            Le stagiaire bénéficie de la législation sur les accidents de travail au titre
                            du régime étudiant de l’article L. 412-8 2° du Code de la Sécurité sociale.<br>
                            En cas d’accident survenant au stagiaire soit au cours d’activités dans
                            l’organisme, soit au cours du trajet, soit sur les lieux rendus utiles pour les
                            besoins du stage et pour les étudiants en médecine, en chirurgie dentaire
                            ou en pharmacie qui n’ont pas un statut hospitalier pendant le stage
                            effectué dans les conditions prévues au b du 2e de l’article L. 418-2,
                            l’organisme d’accueil envoie la déclaration à la Caisse primaire
                            d’assurance maladie ou la caisse compétente (voir adresse en page 1) en
                            mentionnant l’établissement d’enseignement comme employeur, avec
                            copie à l’établissement d’enseignement.

                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 85%;">
                            <p>
                            <p style='font-size: 10px;'>6.2 – Gratification supérieure à 13,75 % du plafond horaire de la Sécurité
                                sociale :</p>
                            Les cotisations sociales sont calculées sur le différentiel entre le montant de
                            la gratification et 13,75 % du plafond horaire de la Sécurité sociale.<br>
                            L’étudiant bénéficie de la couverture légale en application des dispositions
                            des articles L. 411-1 et suivants du code de la Sécurité sociale. En cas
                            d’accident survenant au stagiaire soit au cours des activités dans
                            l’organisme, soit au cours du trajet, soit sur des lieux rendus utiles pour les
                            besoins de son stage, l’organisme d’accueil effectue toutes les démarches
                            nécessaires auprès de la Caisse primaire d’assurance maladie et informe
                            l’établissement dans les meilleurs délais.

                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 85%;">
                            <p>
                            <p style='font-size: 10px;'>6.3 – Protection maladie du/de la stagiaire à l’étranger</p>
                            1) Protection issue du régime étudiant français
                            - pour les stages au sein de l’Espace économique européen (EEE)
                            effectués par des ressortissants d’un État de l’Union européenne, ou de la
                            Norvège, de l’Islande, du Liechtenstein ou de la Suisse, ou encore de tout
                            autre État (dans ce dernier cas, cette disposition n’est pas applicable pour
                            un stage au Danemark, Norvège, Islande, Liechtenstein ou Suisse),
                            l’étudiant doit demander la Carte européenne d’assurance maladie (CEAM).
                            - pour les stages effectués au Québec par les étudiant(e)s de nationalité
                            française, l’étudiant doit demander le formulaire SE401Q (104 pour les
                            stages en entreprises, 106 pour les stages en université) ;
                            - dans tous les autres cas les étudiants qui engagent des frais de santé
                            peuvent être remboursés auprès de la mutuelle qui leur tient lieu de Caisse
                            de Sécurité sociale étudiante, au retour et sur présentation des justificatifs :
                            le remboursement s’effectue alors sur la base des tarifs de soins français.

                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</page>
<page backtop="7mm" backbottom="7mm" backleft="5mm" backright="5mm">
        <table>
        <tr>
            <td style="width: 50%; vertical-align: top;">
                <table>
                    <tr>
                        <td style="width: 85%; vertical-align: top">
                            <p>
                            <p style='font-size: 10px;'>(6.3 suite)</p>
                                Des écarts importants peuvent exister entre les frais engagés et les tarifs
                                français base du remboursement. Il est donc fortement conseillé aux
                                étudiants de souscrire une assurance Maladie complémentaire spécifique,
                                valable pour le pays et la durée du stage, auprès de l’organisme
                                d’assurance de son choix (mutuelle étudiante, mutuelle des parents,
                                compagnie privée ad hoc…) ou, éventuellement et après vérification de
                                l’étendue des garanties proposées, auprès de l’organisme d’accueil si celui-
                                ci fournit au stagiaire une couverture maladie en vertu du droit local (voir 2e
                                ci-dessous).<br>
                                2) Protection sociale issue de l’organisme d’accueil
                                En cochant la case appropriée, l’organisme d’accueil indique ci-après s’il
                                fournit une protection maladie au stagiaire, en vertu du droit local :<br>
                                <ul style="list-style-type: circle; margin-left: -20px; font-size: 12px;">
                                    <li>
                                        <span style="font-size: 9px;">
                                            OUI : cette protection s’ajoute au maintien, à l’étranger, des droits issus
                                            du droit français.
                                        </span>
                                    </li>
                                    <li>
                                        <span style="font-size: 9px;">
                                        NON : la protection découle alors exclusivement du maintien, à
                                        l’étranger, des droits issus du régime français étudiant).
                                        Si aucune case n’est cochée, le 6.3 – 1 s’applique.
                                        </span>
                                    </li>
                                </ul>

                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 85%; vertical-align: top">
                            <p>
                            <p style='font-size: 10px;'>6.4 Protection accident du travail du stagiaire à l’étranger</p>
                            1) Pour pouvoir bénéficier de la législation française sur la couverture
                            accident de travail, le présent stage doit :<br>
                            - être d’une durée au plus égale à 6 mois, prolongations incluses ;<br>
                            - ne donner lieu à aucune rémunération susceptible d’ouvrir des droits à une
                            protection accident de travail dans le pays d’accueil ; une indemnité ou
                            gratification est admise dans la limite de 13,75 % du plafond horaire de la
                            sécurité sociale (cf. point 5), et sous réserve de l’accord de la Caisse
                            primaire d’assurance maladie sur la demande de maintien de droit ;<br>
                            - se dérouler exclusivement dans l’organisme signataire de la présente
                            convention ;<br>
                            - se dérouler exclusivement dans le pays d’accueil étranger cité.
                            Lorsque ces conditions ne sont pas remplies, l’organisme d’accueil
                            s’engage à cotiser pour la protection du stagiaire et à faire les déclarations
                            nécessaires en cas d’accident de travail.<br>
                            2) La déclaration des accidents de travail incombe à l’établissement
                            d’enseignement qui doit en être informé par l’organisme d’accueil par écrit
                            dans un délai de 48 heures.<br>
                            3) La couverture concerne les accidents survenus :
                            <ul style="margin-top: -8px; margin-left: -20px;">
                                <li>dans l’enceinte du lieu du stage et aux heures du stage ;</li>
                                <li>sur le trajet aller-retour habituel entre la résidence du stagiaire sur le territoire étranger et le lieu du stage ;</li>
                                <li>dans le cadre d’une mission confiée par l’organisme d’accueil du
                                stagiaire et obligatoirement par ordre de mission ;
                                </li>
                                <li>lors du premier trajet pour se rendre depuis son domicile sur le lieu de sa
                                résidence durant le stage (déplacement à la date du début du stage) ;
                                </li>
                                <li>lors du dernier trajet de retour depuis sa résidence durant le stage à son
                                domicile personnel.
                                </li>
                            </ul>
                            4) Pour le cas où l’une seule des conditions prévues au point 6.4-1/ n’est
                            pas remplie, l’organisme d’accueil s’engage à couvrir le/la stagiaire contre
                            le risque d’accident de travail, de trajet et les maladies professionnelles et
                            à en assurer toutes les déclarations nécessaires.<br>
                            5) Dans tous les cas :
                            <ul style="margin-top: -8px; margin-left: -20px;">
                                <li>si l’étudiant est victime d’un accident de travail durant le stage,
                                l’organisme d’accueil doit impérativement signaler immédiatement cet
                                accident à l’établissement d’enseignement ;
                                </li>
                                                                <li>si l’étudiant remplit des missions limitées en-dehors de l’organisme
                                d’accueil ou en-dehors du pays du stage, l’organisme d’accueil doit prendre
                                toutes les dispositions nécessaires pour lui fournir les assurances
                                appropriées.
                                </li>
                            </ul>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 85%; vertical-align: top">
                            <p>
                            <p style='font-size: 10px;'>Article 7 – Responsabilité et assurance</p>
                            L’organisme d’accueil et le stagiaire déclarent être garantis au titre de la
                            responsabilité civile.<br>
                            Pour les stages à l’étranger ou outre-mer, le stagiaire s’engage à souscrire
                            un contrat d’assistance (rapatriement sanitaire, assistance juridique…) et
                            un contrat d’assurance individuel accident.<br>
                            Lorsque l’organisme d’accueil met un véhicule à la disposition du stagiaire,
                            il lui incombe de vérifier préalablement que la police d’assurance du
                            véhicule couvre son utilisation par un étudiant.<br>
                            Lorsque dans le cadre de son stage, l’étudiant utilise son propre véhicule
                            ou un véhicule prêté par un tiers, il déclare expressément à l’assureur dudit
                            véhicule et, le cas échéant, s’acquitte de la prime y afférente.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 85%; vertical-align: top">
                            <p>
                            <p style='font-size: 10px;'>Article 8 – Discipline</p>
                            Le stagiaire est soumis à la discipline et aux clauses du règlement intérieur
                            qui lui sont applicables et qui sont portées à sa connaissance avant le
                            début du stage, notamment en ce qui concerne les horaires et les règles
                            d’hygiène et de sécurité en vigueur dans l’organisme d’accueil.<br>
                            Toute sanction disciplinaire ne peut être décidée que par l’établissement
                            d’enseignement. Dans ce cas, l’organisme d’accueil informe l’enseignant
                            référent et l’établissement des manquements et fournit éventuellement les
                            éléments constitutifs.<br>
                            En cas de manquement particulièrement grave à la discipline, l’organisme
                            d’accueil se réserve le droit de mettre fin au stage tout en respectant les
                            dispositions fixées à l’article 9 de la présente convention.<br>

                            </p>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 50%; vertical-align: top">
                <table>
                     <tr>
                        <td style="width: 85%;">
                            <p>
                            <p style='font-size: 10px;'>Article 9 – Congés – Interruption du stage</p>
                            En France (sauf en cas de règles particulières applicables dans certaines
                            collectivités d’outre-mer françaises ou dans les organismes de droit public),
                            en cas de grossesse, de paternité ou d’adoption, le stagiaire bénéficie de
                            congés et d’autorisations d’absence d’une durée équivalente à celle
                            prévues pour les salariés aux articles L. 1225-16 à L. 1225-28, L. 1225-35,
                            L. 1225-37, L. 1225-46 du Code du travail.<br>
                            Pour les stages dont la durée est supérieure à deux mois et dans la limite
                            de la durée maximale de 6 mois, des congés ou autorisations d’absence
                            sont possibles.<br><br>
                            NOMBRE DE JOURS DE CONGÉS AUTORISÉS / ou modalités des
                            congés et autorisations d’absence durant le stage :
                            …………………………………….<br><br>
                            Pour toute autre interruption temporaire du stage (maladie, absence
                            injustifiée…) l’organisme d’accueil avertit l’établissement d’enseignement
                            par courrier.<br>
                            Toute interruption du stage, est signalée aux autres parties à la convention
                            et à l’enseignant référent. Une modalité de validation est mise en place le
                            cas échéant par l’établissement. En cas d’accord des parties à la
                            convention, un report de la fin du stage est possible afin de permettre la
                            réalisation de la durée totale du stage prévue initialement. Ce report fera
                            l’objet d’un avenant à la convention de stage.<br>
                            Un avenant à la convention pourra être établi en cas de prolongation du
                            stage sur demande conjointe de l’organisme d’accueil et du stagiaire, dans
                            le respect de la durée maximale du stage fixée par la loi (6 mois). En cas de
                            volonté d’une des trois parties (organisme d’accueil, stagiaire, établissement
                            d’enseignement) d’arrêter le stage, celle-ci doit immédiatement en informer
                            les deux autres parties par écrit. Les raisons invoquées seront examinées
                            en étroite concertation. La décision définitive d’arrêt du stage ne sera prise
                            qu’à l’issue de cette phase de concertation.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 85%;">
                            <p>
                            <p style='font-size: 10px;'>Article 10 – Devoir de réserve et confidentialité</p>
                            Le devoir de réserve est de rigueur absolue et apprécié par l’organisme
                            d’accueil compte-tenu de ses spécificités. Le stagiaire prend donc
                            l’engagement de n’utiliser en aucun cas les informations recueillies ou
                            obtenues par eux pour en faire publication, communication à des tiers sans
                            accord préalable de l’organisme d’accueil, y compris le rapport de stage.<br>
                            Cet engagement vaut non seulement pour la durée du stage mais
                            également après son expiration. Le stagiaire s’engage à ne conserver,
                            emporter, ou prendre copie d’aucun document ou logiciel, de quelque
                            nature que ce soit, appartenant à l’organisme d’accueil, sauf accord de ce
                            dernier.<br>
                            Dans le cadre de la confidentialité des informations contenues dans le
                            rapport de stage, l’organisme d’accueil peut demander une restriction de la
                            diffusion du rapport, voire le retrait de certains éléments confidentiels.<br>
                            Les personnes amenées à en connaître sont contraintes par le secret
                            professionnel à n’utiliser ni ne divulguer les informations du rapport.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 85%;">
                            <p>
                            <p style='font-size: 10px;'>Article 11 – Propriété intellectuelle</p>
                            Conformément au Code de la propriété intellectuelle, dans le cas où les
                            activités du stagiaire donnent lieu à la création d’une œuvre protégée par le
                            droit d’auteur ou la propriété industrielle (y compris un logiciel), si
                            l’organisme d’accueil souhaite l’utiliser et que le stagiaire en est d’accord,
                            un contrat devra être signé entre le stagiaire (auteur) et l’organisme
                            d’accueil.
                            Le contrat devra alors notamment préciser l’étendue des droits cédés,
                            l’éventuelle exclusivité, la destination, les supports utilisés et la durée de la
                            cession, ainsi que, le cas échéant, le montant de la rémunération due au
                            stagiaire au titre de la cession. Cette clause s’applique quel que soit le
                            statut de l’organisme d’accueil.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 85%;">
                            <p>
                            <p style='font-size: 10px;'>Article 12 – Fin de stage – Rapport - Évaluation</p>
                            1) Attestation de stage : à l’issue du stage, l’organisme d’accueil délivre
                            une attestation dont le modèle figure en annexe, mentionnant au minimum
                            la durée effective du stage et, le cas échéant, le montant de la gratification
                            perçue. Le stagiaire devra produire cette attestation à l’appui de sa
                            demande éventuelle d’ouverture de droits au régime général d’assurance
                            vieillesse prévue à l’art. L. 351-17 du Code de la Sécurité sociale ;<br>
                            2) Qualité du stage : à l’issue du stage, les parties à la présente convention
                            sont invitées à formuler une appréciation sur la qualité du stage.
                            Le stagiaire transmet au service compétent de l’établissement
                            d’enseignement un document dans lequel il évalue la qualité de l’accueil
                            dont il a bénéficié au sein de l’organisme d’accueil. Ce document n’est pas
                            pris en compte dans son évaluation ou dans l’obtention du diplôme ou de la
                            certification.<br>
                            3) Évaluation de l’activité du stagiaire : à l’issue du stage, l’organisme
                            d’accueil renseigne une fiche d’évaluation de l’activité du stagiaire qu’il
                            retourne à l’enseignant référent(ou préciser si fiche annexe ou modalités
                            d’évaluation préalablement définis en accord avec l’enseignant référent)<br>
                            …………………<br>
                            4) Modalités d’évaluation pédagogiques : le stagiaire devra (préciser la
                            nature du travail à fournir –rapport, etc.- éventuellement en joignant une
                            annexe) ……………………………………………………………………….<br>
                            NOMBRE D’ECTS (le cas échéant) :<br>
                            ………………………………………………………………………………………<br>
                            ……………….<br>
                            ……………………………………………………………………………………..<br>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</page>
<page backtop="7mm" backbottom="7mm" backleft="5mm" backright="5mm">
    <table>
        <tr>
            <td style="width: 50%; vertical-align: top;">
                <table>
                    <tr>
                        <td style="width: 85%; vertical-align: top">
                            <p>
                            <p style='font-size: 10px;'>(Article 12 suite)</p>
                                5) Le tuteur de l’organisme d’accueil ou tout membre de l’organisme
                                d’accueil appelé à se rendre dans l’établissement d’enseignement dans le
                                cadre de la préparation, du déroulement et de la validation du stage ne
                                peut prétendre à une quelconque prise en charge ou indemnisation de la
                                part de l’établissement d’enseignement.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 85%; vertical-align: top">
                            <p>
                            <p style='font-size: 10px;'>Article 13 – Droit applicable – Tribunaux compétents</p>
                            La présente convention est régie exclusivement par le droit français.
                            Tout litige non résolu par voie amiable sera soumis à la compétence de la
                            juridiction française compétente.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table style="margin-top: 610px;">
        <tr>
            <td>
                <p>FAIT À ………………………….. LE………………………………</p><br>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; vertical-align: top;">
                <p>POUR L’ÉTABLISSEMENT D’ENSEIGNEMENT<br>
                Nom et signature du représentant de l’établissement<br>
                <strong>Pascal HARY</strong></p>
            </td>
            <td style="width: 50%; vertical-align: top;">
                <p>POUR L’ORGANISME D’ACCUEIL<br>
                Nom et signature du représentant de l’organisme d’accueil<br><br><br>
                ………………………………………………………</p>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; vertical-align: top;">
                <p>STAGIAIRE (ET SON REPRÉSENTANT LÉGAL LE CAS ÉCHÉANT)<br>
                Nom et signature<br><br><br>
                ……………………………………………………………</p>

            </td>
        </tr>
        <tr>
            <td style="width: 50%; vertical-align: top;">
                <p>L’enseignant référent du stagiaire<br>
                    Nom et signature<br><br><br>
                    ……………………………………………………………</p>
            </td>
            <td style="width: 50%; vertical-align: top;">
                <p>Le tuteur de stage de l’organisme d’accueil<br>
                    Nom et signature<br><br><br>
                    ……………………………………………………………</p>
            </td>
        </tr>
    </table>
</page>