
<?php
require ('./app/View/common/header.php');
?>
<div class="dropdown show">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown link
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
    </div>
</div>
<table class="table table-dark table-striped table-condensed"">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data['customers'] as $customer) { ?>
    <tr>
        <th scope="row"><?php echo $customer['id']?></th>
        <td><?php echo $customer['name']?></td>
        <td><?php echo $customer['phone']?></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<ul class="pagination">
    <li><a href="?pageno=1">First</a></li>
    <li class="<?php if($data['attachment']['pageNo'] <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($data['attachment']['pageNo'] <= 1){ echo '#'; } else { echo "?pageno=".($data['attachment']['pageNo'] - 1); } ?>">Prev</a>
    </li>
    <li class="<?php if($data['attachment']['pageNo'] >= $data['attachment']['totalPages']){ echo 'disabled'; } ?>">
        <a href="<?php if($data['attachment']['pageNo'] >= $data['attachment']['totalPages']){ echo '#'; } else { echo "?pageno=".($data['attachment']['pageNo'] + 1); } ?>">Next</a>
    </li>
    <li><a href="?pageno=<?php echo $data['attachment']['totalPages']; ?>">Last</a></li>
</ul>

</body>
</html>