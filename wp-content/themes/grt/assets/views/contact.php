
<?php global $wpdb;?>

    <?php $results = $wpdb->get_results("SELECT * FROM wp_contacts") ; ?>
<div id="contactPage">
    <h1>Prise de contact</h1>

    <div class="alert alert-success w-auto float-left d-none" role="alert" id="success-message">
     Sélection suprimée ! <button type="button" class="x-closed" aria-label="Close" id="success-button"><span aria-hidden="true">&times;</span></button>
    </div>
        <button type="button" class="btn btn-success float-left mb-2" id="export__button">
            Exporter la sélection
        </button>
    <button type="button" class="btn btn-danger float-right mb-2" data-toggle="modal" data-target="#exampleModalCenter">
        Supprimer la sélection
    </button>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Voulez-vous supprimer la sélection ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                    <button id="delete__button" type="button" class="btn btn-danger">Supprimer</button>
                </div>
            </div>
        </div>
    </div>


    <table class="table table-striped"
             id="table"
             data-toggle="table"
			 data-search="true"
			 data-filter-control="true" 
			 data-show-export="false"
			 data-click-to-select="false"
			 data-toolbar="#toolbar">
        <thead>
        <tr>
            <th data-field="nom" data-filter-control="input" data-sortable="true" scope="col">Nom</th>
            <th data-field="prenom" data-filter-control="input" data-sortable="true" scope="col">Prénom</th>
            <th data-field="fonction" data-filter-control="input" data-sortable="true" scope="col">Fonction</th>
            <th data-field="email" data-filter-control="input" data-sortable="true" scope="col">Email</th>
            <th data-field="objet" data-filter-control="input" data-sortable="true" scope="col">Objet</th>
            <th data-field="message" data-filter-control="input" data-sortable="true" scope="col">Message</th>
            <th data-field="date" data-filter-control="input" data-sortable="true" scope="col">Date</th>
            <th data-field="state" data-checkbox="true"></th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($results as $result) { ?>
            <tr id="<?= $result->ID; ?>">
                <td><?= $result->name; ?></td>
                <td><?= $result->firstname; ?></td>
                <td><?= $result->position; ?></td>
                <td><?= $result->email; ?></td>
                <td><?= $result->object; ?></td>
                <td><?= $result->message; ?></td>
                <td><?= $result->created_at; ?></td>
                <td class="bs-checkbox" scope="row"><input data-index="<?= $result->ID; ?>" name="btSelectItem" type="checkbox"></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.0/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>


<script>
  function mounted() {
    $('#table').bootstrapTable()
  }
</script>