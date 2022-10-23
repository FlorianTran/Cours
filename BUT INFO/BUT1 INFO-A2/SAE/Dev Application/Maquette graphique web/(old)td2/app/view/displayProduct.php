<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon magasin</title>
    <link href="style.css" rel="stylesheet" />
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
            <?php ?>
            <tr>
                <td> <?= $product->getId()?> </td>
                <td> <?= $product->getName()?> </td>
                <td> <?= $product->getPrice()?> </td>
                <td> <?= $product->getQuantity()?> </td>
            </tr>
            <?php ?>
        </tbody>
    </table>



<style>
    body {


    }
    table {
        background-color: rgb(235,235,235);
        border-collapse: collapse;

    }
    thead{
        background-color: rgb(200,200,200);
    }
    td,th {
/*      background-image:url("https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Portrait_d%27%C3%89ric_Zemmour%2C_avril_2022.jpg/428px-Portrait_d%27%C3%89ric_Zemmour%2C_avril_2022.jpg?20220526091054");
 */     padding: 15px;
        border: 1px solid black;
        text-align: center;
    }
    
</style>
</body>
</html>