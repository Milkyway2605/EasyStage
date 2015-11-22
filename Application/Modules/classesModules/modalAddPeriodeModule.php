<div class="modal fade" id="addPeriode">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter une période</h4>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nomOrganisme">Date de début : </label>
                            <input id="nomOrganisme" name='nomOrganisme' 
                            type="text" class="form-control" placeholder="format: jj/mm/aaaa">
                        </div>
                        <div class="form-group">
                            <label for="metierPrincipal">Date de fin : </label>
                            <input id="metierPrincipal" name='metierPrincipal' 
                            type="text" class="form-control" placeholder="format: jj/mm/aaaa">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Ajouter la période" class="btn pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>