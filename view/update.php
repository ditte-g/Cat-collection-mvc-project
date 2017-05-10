<?php
require('header.php');
?>

    <h1 class="text-center">Update this cat</h1>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <p>
            <form action="/index.php?page=update" method="post">
            </p>

            <div class="form-group">
                <input class="form-control " type="text" placeholder="Name" name="name" id="name" required value="<?php echo $cat->getName() ?>">
            </div>

            <div class="form-group">
                <input class="form-control " type="date" placeholder="yyyy-mm-dd" name="birthday" id="birthday" required value="<?php echo $cat->getBirthday() ?>">
            </div>

            <div class="form-group">
                <input class="form-control" type="text" placeholder="Breed" name="breed" id="breed" required value="<?php echo $cat->getBreed() ?>">
            </div>

            <input type="hidden" name="id" value="<?= $cat->getId() ?>"/>
            <button class="btn btn-warning btn-lg" style="width: 100%;" type="submit">
                <span class="glyphicon glyphicon-ok-sign"></span> Update
            </button>

            <br>
            <br>
            <a href="/index.php"/>
            <button type="button" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-arrow-left"></span> Back to home page
            </button>
            </a>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>

<?php
require('footer.php');
?>