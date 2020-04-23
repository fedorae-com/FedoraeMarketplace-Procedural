<?php
  require('controllers/prodController.php');
  require('includes/dashheader.php');
 ?>

<?php if($_SESSION['verified']): ?>
<v-card
  class="mx-auto uk-margin-large-left uk-align-right uk-width-1-2"
  justify="right"
  max-width="1500"
  uk-grid
>

  <form class="uk-form-horizontal pull-right" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

  <div class="">
    <v-row class="uk-margin-large-left uk-align-right" align="right" justify="left">
      <v-btn><a href="add-product.php"><v-icon class="uk-link" uk-tooltip="New Product">mdi-plus-box</v-icon></a>
      <input type="hidden" name="delete_id" value="<?php echo $product['id']; ?>"></v-btn>
      <v-btn class="uk-danger" type="submit" name="delete" uk-tooltip="Delete Product"><v-icon class="uk-link">mdi-delete</v-icon></v-btn>
    </v-row>
  </div>


          <table class="uk-table uk-table-divider uk-margin-xlarge uk-margin-xlarge-right">
            <thead>
                <tr>
                  <?php foreach ($productheaders as $productheader): ?>
                    <th class="uk-table-shrink"><?php echo $productheader; ?></th>
                  <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product): ?>
                <tr class="">
                    <td><input class="uk-checkbox" type="checkbox" name="chkbox[]" value="<?php echo $product['id']; ?>"></td>
                    <td><img class="uk-border-circle" src="images/<?php echo $product['image']; ?>" width="40" alt=""></td>
                    <td class="uk-table-expand"><?php echo $product['name']; ?></td>
                    <td class=""><?php echo '$'.$product['price']; ?></td>
                    <td class="uk-text-nowrap"><?php echo $product['quantity']; ?></td>
                    <td class=""><?php echo $product['status']; ?></td>
                    <td class="uk-link"><a href="edit-product.php?id=<?php echo $product['id']; ?>"><v-icon>mdi-pencil</v-icon></a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>
  </div>
</form>
</v-card>
<?php endif; ?>

<?php if(!$_SESSION['verified']): ?>
  <?php include('components\verification-msg.php'); ?>
<?php endif; ?>


<?php
  require('includes/dashfooter.php');
?>
