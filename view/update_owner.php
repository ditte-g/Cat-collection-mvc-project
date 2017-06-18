<?php
require('header.php');
?>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class = "container">
                <h1 class="text-center">Update owner</h1>
                <p>
                <form action="/index.php?page=updateOwner" method="post">
                </p>

                <div class="form-group">
                    <input class="form-control " type="text" placeholder="Name" name="ownerName" id="ownerName" required value="<?php echo $owner->getOwnerName() ?>">
                </div>

                <input type="hidden" name="id" value="<?= $owner->getId() ?>"/>
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
        </div>
        <div class="col-md-3"></div>
    </div>

<?php
require('footer.php');
?>