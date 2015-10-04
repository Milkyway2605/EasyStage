<div id="mesStages" class="panel-group">

    <div class="panel">
        <div class="panel-heading row"> 
            <a href="#codeStage" data-parent="#STAGEcodeStage" data-toggle="collapse">
                Développement d'un site web
            </a> 
        </div>
        <div id="codeStage" class="panel-collapse collapse">
            <div class="panel-body">
                <table class='col-xs-12'>
                    <thead>
                        <tr>
                            <th>Descriptif</th>
                            <th>Periode</th>
                            <th>Organisme</th>
                            <th>Professeur référent</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Statut">
                                <span class="td-responsive">
                                    <span class="label label-warning">
                                        En attente
                                    </span>
                                </span>
                            </td>
                            <td data-label="Descriptif">
                                <span class="td-responsive">
                                    Développement d'une application web pour la gestion de stage
                                </span>
                            </td>
                            <td data-label="Periode">
                                <span class="td-responsive">
                                    00/00/0000 - 00/00/0000
                                </span>
                            </td>
                            <td data-label="Organisme">
                                <span class="td-responsive">
                                    Lycée André Malraux
                                </span>
                            </td>
                            <td data-label="Professeur référent">                                            
                                <span class="td-responsive">
                                    Séverine Quesque
                                </span>
                            </td>
                            <td data-label="Action">                                            
                                <span class="td-responsive">
                                    <span class="label label-default">
                                        <i class="fa fa-print icon-right"></i>
                                        Imprimer la convention
                                    </span>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <?php
    
        foreach ($lesStages as $unStage)
        {
            $statut = $unStage['statut'];
            
            echo('<div class="panel">');
            echo('<div class="panel-heading row"> 
                  <a href="#'.$unStage['codeStage'].'" data-parent="#STAGE'.$unStage['codeStage'].'" data-toggle="collapse">
                  Développement d\'un site web
                  </a> 
                  </div>');
            echo('<div id="'.$unStage['codeStage'].'" class="panel-collapse collapse">');
            echo('<div class="panel-body">
                  <table class="col-xs-12">');
            echo('<thead>
                        <tr>
                            <th>Descriptif</th>
                            <th>Periode</th>
                            <th>Organisme</th>
                            <th>Professeur référent</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                   </thead>');
            echo('<tbody>');
            echo('<tr>
                    <td data-label="Statut">
                        <span class="td-responsive">
                            <span class="label label-warning">');
            
            
            
            
            echo('          </span>
                        </span>
                    </td>
                    <td data-label="Descriptif">
                        <span class="td-responsive">
                            Développement d\'une application web pour la gestion de stage
                        </span>
                    </td>
                    <td data-label="Periode">
                        <span class="td-responsive">
                            00/00/0000 - 00/00/0000
                        </span>
                    </td>
                    <td data-label="Organisme">
                        <span class="td-responsive">
                            Lycée André Malraux
                        </span>
                    </td>
                    <td data-label="Professeur référent">                                            
                        <span class="td-responsive">
                            Séverine Quesque
                        </span>
                    </td>
                    <td data-label="Action">                                            
                        <span class="td-responsive">
                            <span class="label label-default">
                                <i class="fa fa-print icon-right"></i>
                                Imprimer la convention
                            </span>
                        </span>
                    </td>
                 </tr>');
        }
    
    ?>
    
    
        
        
            
                    
                    
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

