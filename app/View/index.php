
<!--//var_dump($data);die();

<?php
require ('./app/View/common/header.php');
//var_dump($customers);die();
?>
<!--<ul>-->
<!--    <li><a href="#">1</a></li>-->
<!--    <li><a href="#">2</a></li>-->
<!--    <li><a href="#">3</a></li>-->
<!--    <li><a href="#">4</a></li>-->
<!--    <li><a href="#">5</a></li>-->
<!--</ul>-->
<!--</body>-->
<!--</html>-->

<!--<ul class="pagination">-->
<!--        <li><a href="#">--><?php ////var_dump($customers); ?><!--</a></li>-->
<!--        <li><a href="#">2</a></li>-->
<!--        <li><a href="#">3</a></li>-->
<!--        <li><a href="#">4</a></li>-->
<!--        <li><a href="#">5</a></li>-->
<!--    </ul>-->

<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($customers as $customer) { ?>
    <tr>
        <th scope="row"><?php echo $customer['id']?></th>
        <td><?php echo $customer['name']?></td>
        <td><?php echo $customer['name']?></td>
<!--        <td>@mdo</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <th scope="row">2</th>-->
<!--        <td>Jacob</td>-->
<!--        <td>Thornton</td>-->
<!--        <td>@fat</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <th scope="row">3</th>-->
<!--        <td>Larry</td>-->
<!--        <td>the Bird</td>-->
<!--        <td>@twitter</td>-->
    </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>