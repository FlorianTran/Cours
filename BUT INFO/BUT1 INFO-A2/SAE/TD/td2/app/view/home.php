<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Sheeeeeeesh</title>
    </head>
    <body>
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
                <?php foreach($data as $d){?>
                <tr>
                    <td><?=$d->getId() ?></td>
                    <td><?=$d->getName() ?></td>
                    <td><?=$d->getPrice() ?></td>
                    <td><?=$d->getQuantity() ?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </body>

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
</html>