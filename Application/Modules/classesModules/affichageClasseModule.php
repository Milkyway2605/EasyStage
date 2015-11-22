<div class="tab-pane fade" id="affichageClasse">
            <div class="col-lg-12 containerRetourMenu">
                <a href="#selectionClasse" data-toggle="tab">
                    <small>Retour au menu précédent</small>
                </a>
            </div>
            <div class="col-lg-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Informations diverses</div>
                    </div>
                    <div class="panel-body">
                        <p>Section : SIO</p>
                        <p>Niveau: 1ère année</p>
                        <p>Période: 2014-2015</p>
                        <p>Période des stages :</p>
                        <form>
                            <fieldset>
                                <a class="addPeriode" data-toggle="modal" 
                                   href="#addPeriode">
                                    <i class="fa fa-plus-circle"></i> 
                                    Ajouter une période
                                </a>
                                <div class="periode">
                                    11/01/2016 - 04/03/2016
                                    <a class="fa fa-pencil pull-right" 
                                    data-toggle="modal" href="#modifyPeriode"></a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Liste des éleves</div>
                    </div>
                    <div class="panel-body">
                        Filtres :
                        <form class="form-inline">
                            <fieldset>
                                <label for="EtudiantAvecStages" class="checkbox-inline">
                                    <input type="checkbox" name="EtudiantAvecStages" id="EtudiantAvecStages">
                                    Etudiants avec stages
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox"> 
                                    Etudiants sans stages
                                </label>
                                <button class="fa fa-print pull-right">
                                </button>
                            </fieldset>
                        </form>
                        <br>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Date de naissance</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-toggle="modal" href="#showEtudiant">
                                    <td data-label="Nom">
                                        <span class="td-responsive">  
                                            Lespagnol
                                        </span>
                                    </td>     
                                    <td data-label="Prenom" id="UKI4KfE2KHRcmDDNWo/0dYLNRvM6N5dEHJOB+PMMQ72w6LL957vamg==">
                                        <span class="td-responsive">
                                            Guillaume
                                        </span>
                                    </td>  
                                    <td data-label="Date de naissance">
                                        <span class="td-responsive">
                                            26/05/1994
                                        </span>
                                    </td>  
                                    <td data-label="Adresse">                                            
                                        <span class="td-responsive">
                                            21 rue Jean Jacques Rousseau, 62114, Sains-en-Gohelle
                                        </span>
                                    </td>  
                                    <td data-label="Telephone">
                                        <span class="td-responsive">
                                            07.81.70.84.85
                                        </span>
                                    </td>  
                                    <td data-label="Email">                                            
                                        <span class="td-responsive">
                                            guillaume.lespagnol26@gmail.com
                                        </span>
                                    </td>
                                </tr>
                                <tr data-toggle="modal" href="#showEtudiant">
                                    <td data-label="Nom">
                                        <span class="td-responsive">  
                                            Lespagnol
                                        </span>
                                    </td>     
                                    <td data-label="Prenom" id="UKI4KfE2KHRcmDDNWo/0dYLNRvM6N5dEHJOB+PMMQ72w6LL957vamg==">
                                        <span class="td-responsive">
                                            Guillaume
                                        </span>
                                    </td>  
                                    <td data-label="Date de naissance">
                                        <span class="td-responsive">
                                            26/05/1994
                                        </span>
                                    </td>  
                                    <td data-label="Adresse">                                            
                                        <span class="td-responsive">
                                            21 rue Jean Jacques Rousseau, 62114, Sains-en-Gohelle
                                        </span>
                                    </td>  
                                    <td data-label="Telephone">
                                        <span class="td-responsive">
                                            07.81.70.84.85
                                        </span>
                                    </td>  
                                    <td data-label="Email">                                            
                                        <span class="td-responsive">
                                            guillaume.lespagnol26@gmail.com
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>                
        </div>

