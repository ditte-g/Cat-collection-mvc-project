<?php
require('header.php');
?>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2>My Cat Collection</h2>
                <div class="table-responsive">
                    <button type="button" class="btn btn-success btn pull-right" data-title="Add" data-toggle="modal"
                            data-target="#add"><span
                                class="glyphicon glyphicon-plus"></span> Add a cat</span></button>

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
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                                                data-target="#edit"><span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </p>
                                </td>
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                                        <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"
                                                data-target="#delete" name="delete"><span
                                                    class="glyphicon glyphicon-trash"></span></button>
                                    </p>
                                </td>
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

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edit your cat</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Name">
                    </div>
                    <div class="form-group">

                        <input class="form-control " type="date" placeholder="Birthday">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Breed">


                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span
                                class="glyphicon glyphicon-ok-sign"></span> Update
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this cat</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure
                        you want to delete this cat?
                    </div>

                </div>
                <div class="modal-footer ">
                    <form action="index.php?page=view" method="post">
                        <input type="hidden" name="delete" value="<?php echo $cat->getId(); ?>"/>
                        <button type="submit" class="btn btn-success" name="btn-delete"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal" name="btn-delete"><span
                                class="glyphicon glyphicon-remove"></span> No
                    </button></form>
                </div>
            </div>
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<?php
require('create.php');
require('footer.php');
?>