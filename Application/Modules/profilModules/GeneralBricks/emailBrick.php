                <div class="panel">
                    <div class="panel-heading row">
                        <div class='col-lg-3 col-md-3 col-sm-3'><strong>E-mail</strong></div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <span class="emailComponent">
                            <?php
                                echo($_SESSION['email']);
                            ?>
                            </span>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-3'>
                            <a class="pull-right pull-top edit emailComponent" href="#item2" 
                            data-parent="#informationsGeneralesContainer" data-toggle="collapse">
                                <i class="fa fa-pencil editingIcon"></i>
                                <span id="modifyName" class="editingText">Modifier</span>
                            </a>
                        </div>
                    </div>
                    <div id="item2" class="panel-collapse collapse" data-sibling=".emailComponent">
                        <div class="panel-body">
                            <form class="col-lg-12">
                                <div class="form-group col-sm-8">
                                    <input id="newEmail" name="newEmail" type="email" 
                                    placeholder="Nouvelle adresse email" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-8">
                                    <input id="confirmationEmail" name="confirmationEmail" type="email" 
                                    placeholder="Confirmation de l'adresse email" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-8">
                                    <a class="btn col-sm-4" href="#item2" 
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
