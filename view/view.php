<?php
require('header.php');
?>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>My Cat Collection</h1>
                <div class="table-responsive">
                    <button type="button" class="btn btn-success btn pull-right" data-title="Add" data-toggle="modal"
                            data-target="#add">
                        <span class="glyphicon glyphicon-plus"></span> Add a cat</span></button>

                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <th>Name</th>
                        <th>Birthday</th>
                        <th>Breed</th>
                        <th>Update</th>
                        <th>Delete</th>
                        </thead>
                        <tbody>
                        <?php foreach ($this->getAllCats() as $cat) { ?>
                            <tr>
                                <td><?= $cat->getName() ?></td>
                                <td><?= $cat->getBirthday() ?></td>
                                <td><?= $cat->getBreed() ?></td>
                                <td><a name="btn-update" href="/index.php?page=update&id=<?php echo $cat->getId(); ?>">
                                        <button class="btn btn-primary btn-xs">
                                            <span class="glyphicon glyphicon-pencil"></span></button>
                                    </a></td>
                                <td><a name="btn-delete" href="/index.php?page=delete&id=<?php echo $cat->getId(); ?>">
                                        <button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash">
                                        </button>
                                    </a></td>
                            </tr>
                        <?php }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <form action="/index.php?page=add" method="post">
        <?php require('create.php') ?>
    </form>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<?php
require('footer.php');
?>