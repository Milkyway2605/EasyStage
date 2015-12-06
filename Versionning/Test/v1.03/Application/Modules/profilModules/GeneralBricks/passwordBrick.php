                <div class="panel">
                    <div class="panel-heading row">
                        <div class='col-lg-3 col-md-3 col-sm-3'><strong>Mot de passe</strong></div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <span class='passwordComponent'>
                                ************
                            </span>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-3'>
                            <a class="pull-right pull-top edit passwordComponent" href="#item3" 
                               data-parent="#informationsGeneralesContainer" data-toggle="collapse">
                                <i class="fa fa-pencil editingIcon"></i>
                                <span id="modifyName" class="editingText">Modifier</span>
                            </a>
                        </div>
                    </div>
                    <div id="item3" class="panel-collapse collapse" data-sibling=".passwordComponent">
                        <div class="panel-body">
                            <form class="col-lg-12">
                                <div class="form-group col-sm-8">
                                    <input id="oldPassword" name="oldPassword" type="password" 
                                    placeholder="Mot de passe actuel" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-8">
                                    <input id="newPassword" name="newPassword" type="password" 
                                    placeholder="Nouveau mot de passe" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-8">
                                    <input id="confirmationNewPassword" name="confirmationNewPassword" type="password" 
                                    placeholder="Confirmation du nouveau mot de passe" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-8">
                                    <a class="btn col-sm-4" href="#item3" 
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

