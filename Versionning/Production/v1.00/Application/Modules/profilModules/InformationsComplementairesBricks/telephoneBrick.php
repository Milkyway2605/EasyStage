                <div class="panel">
                    <div class="panel-heading row">
                        <div class='col-lg-3 col-md-3 col-sm-3'>
                            <strong>Téléphone</strong>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <?php echo($_SESSION['telephone']) ?>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-3'>
                            <a class="pull-right pull-top edit" href="#item5" 
                            data-parent="#informationsComplementairesContainer" data-toggle="collapse">
                                <i class="fa fa-pencil editingIcon"></i>
                                <span id="modifyName" class="editingText">Modifier</span>
                            </a>
                        </div>
                    </div>
                    <div id="item5" class="panel-collapse collapse">
                        <div class="panel-body"> Ce plugin permet de créer des effets "accordéon" totalement paramétrables</div>
                    </div>
                </div>