
<?php global $wpdb;?>

    <?php $results = $wpdb->get_results("SELECT * FROM wp_contacts") ; ?>
    
    <h1>Prise de contact</h1>


    <table class="table table-striped"
             id="table"
             data-toggle="table"
			 data-search="true"
			 data-filter-control="true" 
			 data-show-export="false"
			 data-click-to-select="true"
			 data-toolbar="#toolbar">
        <thead>
        <tr>
            <th data-field="state" data-checkbox="true"></th>
            <th data-field="nom" data-filter-control="input" data-sortable="true" scope="col">Nom</th>
            <th data-field="prenom" data-filter-control="input" data-sortable="true" scope="col">Prénom</th>
            <th data-field="fonction" data-filter-control="input" data-sortable="true" scope="col">Fonction</th>
            <th data-field="email" data-filter-control="input" data-sortable="true" scope="col">Email</th>
            <th data-field="objet" data-filter-control="input" data-sortable="true" scope="col">Objet</th>
            <th data-field="message" data-filter-control="input" data-sortable="true" scope="col">Message</th>
            <th data-field="date" data-filter-control="input" data-sortable="true" scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($results as $result) { ?>
            <tr>
                <td class="bs-checkbox" scope="row"><input data-index="<?= $result->ID; ?>" name="btSelectItem" type="checkbox"></td>
                <td><?= $result->name; ?></td>
                <td><?= $result->firstname; ?></td>
                <td><?= $result->position; ?></td>
                <td><?= $result->email; ?></td>
                <td><?= $result->object; ?></td>
                <td><?= $result->message; ?></td>
                <td><?= $result->created_at; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.0/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>


<script>
  function mounted() {
    $('#table').bootstrapTable()
  }
</script>