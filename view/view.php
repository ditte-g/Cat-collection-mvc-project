<?php
$cat = $this->getAllCats();
?>
<h1>Min kattsamling</h1>
    <table>
        <tr>
            <th>Namn</th>
            <th>Födelsedag</th>
            <th>Ras</th>
        </tr>

        <?php foreach ($cat as $cat) { ?>
            <tr>
                <td><?= $cat->getName()?></td>
                <td><?= $cat->getBirthday()?></td>
                <td><?= $cat->getBreed()?></td>
            </tr>
        <?php } ?>
    </table>