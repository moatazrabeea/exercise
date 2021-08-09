
<?php
require ('./app/View/common/header.php');
?>
<!-------------------------------------------------------------------------->
<div class="container-fluid">
    <?php if ($data['errors']) { foreach ($data['errors'] as $key => $value){?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $value; ?>

        </div>
    <?php }?>
    <?php } ?>
</div>
<!-------------------------------------------------------------------------->
<div class="panel-body">
    <div class="well">
        <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label" for="input-name">Name</label>
                        <input type="text" name="filter_name"
                               placeholder="filter_name" id="input-name" class="form-control"/>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="control-label" for="input-model">Phone</label>
                        <input type="text" name="filter_phone"
                               placeholder="filter_phone" id="input-model" class="form-control"/>
                    </div>
                </div>
                <div class="col-sm-4">
                  <button type="button" id="button-filter" class="btn btn-primary pull-right"><i
                                class="fa fa-filter"></i>Filter</button>
                </div>
        </div>
    </div>
</div>
          <!------------------------------------------------------------------>

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
<!--<ul class="pagination">-->
<!--    <li><a href="?pageno=1">First</a></li>-->
<!--    <li class="--><?php //if($data['attachment']['pageNo'] <= 1){ echo 'disabled'; } ?><!--">-->
<!--        <a href="--><?php //if($data['attachment']['pageNo'] <= 1){ echo '#'; } else { echo "?pageno=".($data['attachment']['pageNo'] - 1); } ?><!--">Prev</a>-->
<!--    </li>-->
<!--    <li class="--><?php //if($data['attachment']['pageNo'] >= $data['attachment']['totalPages']){ echo 'disabled'; } ?><!--">-->
<!--        <a href="--><?php //if($data['attachment']['pageNo'] >= $data['attachment']['totalPages']){ echo '#'; } else { echo "?pageno=".($data['attachment']['pageNo'] + 1); } ?><!--">Next</a>-->
<!--    </li>-->
<!--    <li><a href="?pageno=--><?php //echo $data['attachment']['totalPages']; ?><!--">Last</a></li>-->
<!--</ul>-->

<div class="row">
    <div class="col-sm-6 text-left"><?php echo $data['pagination']; ?></div>
</div>

<script type="text/javascript">
        $('#button-filter').on('click', function () {
            var url = '/';

            var filter_name = $('input[name=\'filter_name\']').val();

            if (filter_name) {
                url += '?filter_name=' + encodeURIComponent(filter_name);
            }

            var filter_phone = $('input[name=\'filter_phone\']').val();

            if (filter_phone && filter_name) {
                url += '&filter_phone=' + encodeURIComponent(filter_phone);
            }
            if (filter_phone && !filter_name){
                url += '?filter_phone=' + encodeURIComponent(filter_phone);
            }
            location = url;
        });
</script>
</body>
</html>