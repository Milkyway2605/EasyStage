                <div class="panel">
                    <div class="panel-heading row">
                        <div class='col-lg-3 col-md-3 col-sm-3'><strong>Nom</strong></div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <span class="nameComponent">
                            <?php
                                echo($_SESSION['prenom'].' '.$_SESSION['nom']);
                            ?>
                            </span>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-3'>
                            <a class="pull-right pull-top edit nameComponent" href="#item1" 
                            data-parent="#informationsGeneralesContainer" data-toggle="collapse">
                                <i class="fa fa-pencil editingIcon"></i>
                                <span id="modifyName" class="editingText">Modifier</span>
                            </a>
                        </div>
                    </div>
                    <div id="item1" class="panel-collapse collapse" data-sibling=".nameComponent">
                        <div class="panel-body">
                            <form class="col-lg-12">
                                <div class="form-group col-sm-8">
                                    <input id="prenom" name="prenom" type="text" 
                                    placeholder="Prénom" class="form-control">
                                </div>
                                <div class="form-group col-sm-8">
                                    <input id="nom" name="nom" type="text" 
                                    placeholder="Nom de famille" class="form-control">
                                </div>
                                <div class="form-group col-sm-8">
                                    <a class="btn col-sm-4" href="#item1" 
                                    data-parent="#informationsGeneralesContainer" data-toggle="collapse">
                                        <i class="fa fa-times pull-left"></i>
                                        <span class="hideLater">Annuler</span>
                                    </a>
                                    <button type="submit" class="btn col-sm-4">
                                        <i class="fa fa-check pull-left"></i>
                                        <span class="hideLater">Valider</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

