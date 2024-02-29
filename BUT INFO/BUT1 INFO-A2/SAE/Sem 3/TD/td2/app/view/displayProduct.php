<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Sheeeesh2</title>
</head>
<body>
<?php
    if ($product==null) {
        echo "<p> not found </p>";
    }
    else { ?>
<table>
    <thead>
    <tr>
        <th> id </th>
        <th> name </th>
        <th> price </th>
        <th> quantity </th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td> <?= $product->getId() ?> </td>
        <td> <?= $product->getName() ?> </td>
        <td> <?= $product->getPrice() ?> </td>
        <td> <?= $product->getQuantity() ?> </td>
    </tr>

    </tbody>
</table>
   <?php } ?>
   <style>
        table,
        td {
            background-color: #fff;
            text-align:center;
        }

        thead,
        tfoot {
            background-color: #fff;
        }
        table {
            background-color: #333;
        }
    </style>

</body>
</html>
