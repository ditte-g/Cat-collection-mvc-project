<?php
require('header.php');
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>My Cat Collection</h1>
                <div class="table-responsive">
                    <button type="button" class="btn btn-success btn pull-right" data-title="Add cat" data-toggle="modal"
                            data-target="#add">
                        <span class="glyphicon glyphicon-plus"></span> Add a cat</span></button>
                    <br><br><button type="button" class="btn btn-success btn pull-right" data-title="Add owner" data-toggle="modal"
                            data-target="#add2">
                        <span class="glyphicon glyphicon-plus"></span> Add an owner</span></button>

                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <th>Name</th>
                        <th>Birthday</th>
                        <th>Breed</th>
                        <th>Show owner</th>
                        <th>Update</th>
                        <th>Delete</th>
                        </thead>
                        <tbody>
                        <?php foreach ($this->getAllCats() as $cat) {?>
        <tr>
            <td><?= $cat->getName() ?></td>
            <td><?= $cat->getBirthday() ?></td>
            <td><?= $cat->getBreed() ?></td>
            <td><a name="btn-owner" href="/index.php?page=owner&id=<?php echo $cat->getId(); ?>">
                    <button class="btn btn-info btn-xs">
                        <span class="glyphicon glyphicon-user"></span></button>
                </a></td>
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
    <form action="/index.php?page=add2" method="post">
        <?php require('create_owner.php') ?>
    </form>

    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <h1>Owners</h1>
    <div class="table-responsive">
    <table id="mytable2" class="table table-bordred table-striped">
    <thead>
    <th>Name</th>
    </thead>
    <tbody>
<?php foreach ($this->getOwner() as $owner) {
    ?>
    <tr><td><?= $owner->getOwnerName() ?></td>
    <td><a name="btn-update" href="/index.php?page=updateOwner&id=<?php echo $owner->getId(); ?>">
            <button class="btn btn-primary btn-xs">
                <span class="glyphicon glyphicon-pencil"></span></button>
        </a></td>
    <td><a name="btn-delete" href="/index.php?page=deleteOwner&id=<?php echo $owner->getId(); ?>">
            <button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash">
            </button>
        </a></td>
    </tr>
<?php }
?>
    </tbody>

<?php
require('footer.php');
?>