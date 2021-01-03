<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- //<?php echo '<pre>' ?>
<?php //print_r($users); 
?> -->

<div class="contantainer">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Admin Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)) : ?>
                        <?php foreach ($users as $row) : ?>

                            <tr>
                                <td><?= $row->admin_id ?></td>
                                <td><?= $row->admin_name ?></td>
                                <td><?= $row->email ?></td>
                                <td><?= $row->contact_no ?></td>
                                <td><?= $row->address ?></td>
                            </tr>

                        <?php endforeach ?>

                    <?php else : ?>
                        <h1>Sorry! No records found</h1>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<?= $this->endSection() ?>