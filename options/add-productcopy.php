<?php
  require('controllers/prodController.php');
  include('includes/dashheader.php');
?>

<?php if($_SESSION['verified']): ?>

<!-- new -->
<div class="uk-container uk-margin-xlarge-left uk-margin-remove-right uk-margin-bottom">
  <div class="uk-margin-small-bottom">
      <v-row class="uk-margin-xlarge-left uk-align-right" align="right" justify="left">
        <v-btn type="submit" name="save-product" class="uk-link" uk-tooltip="Save"><v-icon color="blue">mdi-content-save</v-icon></v-btn>
        <a href="products.php"><v-icon color="black" type="submit" name="cancel-products" class="uk-link" uk-tooltip="Cancel">mdi-reply</v-icon></a>
      </v-row>
  </div>
  <ul class="uk-subnav uk-tab uk-margin-xlarge-left" uk-switcher>
      <li><a href="#">General</a></li>
      <li><a href="#">Data</a></li>
      <li><a href="#">Images</a></li>
      <li><a href="#">SEO</a></li>
  </ul>
  <form class="uk-form-horizontal uk-margin-xlarge-left" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <button type="submit" name="save" class="uk-button uk-button-primary">Save</button>
<ul uk-accordion>
    <li class="uk-open">
        <a class="uk-accordion-title" href="#">General</a>
        <div class="uk-accordion-content">
            <p>
              <div class="uk-margin">
                  <label class="uk-form-label" for="form-horizontal-text">Product Name</label>
                  <div class="uk-form-controls">
                      <input class="uk-input" id="form-horizontal-text" type="text" name="product-name" placeholder="Product Name">
                  </div>
              </div>
              <div class="uk-margin">
                  <label class="uk-form-label" for="form-horizontal-text">Description</label>
                  <div class="uk-form-controls">
                    <textarea class="uk-textarea" id="form-horizontal-text" type="text" name="product-description" rows="5" placeholder=""></textarea>
                  </div>
              </div>
              <div class="uk-margin">
                  <label class="uk-form-label" for="form-horizontal-text">Meta Tag Title</label>
                  <div class="uk-form-controls">
                      <input class="uk-input" id="form-horizontal-text" type="text" name="meta-tag-title" placeholder="Meta Tag Title">
                  </div>
              </div>
              <div class="uk-margin">
                  <label class="uk-form-label" for="form-horizontal-text">Meta Tag Description</label>
                  <div class="uk-form-controls">
                    <textarea class="uk-textarea" id="form-horizontal-text" type="text" name="meta-tag-description" rows="3" placeholder="Meta Tag Description"></textarea>
                  </div>
              </div>
              <div class="uk-margin">
                  <label class="uk-form-label" for="form-horizontal-text">Meta Tag Keywords</label>
                  <div class="uk-form-controls">
                    <textarea class="uk-textarea" id="form-horizontal-text" type="text" name="meta-tag-keywords" rows="3" placeholder="Meta Tag Keywords"></textarea>
                  </div>
              </div>
            </p>
        </div>
    </li>
    <li class="">
        <a class="uk-accordion-title" href="#">Data</a>
        <div class="uk-accordion-content">
            <p>
              <div class="uk-margin">
                  <label class="uk-form-label" for="form-horizontal-text">SKU</label>
                  <div class="uk-form-controls">
                      <input class="uk-input" id="form-horizontal-text" type="text" name="sku" placeholder="SKU">
                  </div>
              </div>
              <div class="uk-margin">
                <label class="uk-form-label" for="form-horizontal-text">Price</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-horizontal-text" type="text" name="price" placeholder="Price">
                </div>
              </div>
              <div class="uk-margin">
                  <label class="uk-form-label" for="form-horizontal-text">Quantity</label>
                  <div class="uk-form-controls">
                      <input class="uk-input" id="form-horizontal-text" type="text" name="quantity" value="1">
                  </div>
              </div>
              <div class="uk-margin">
                  <label class="uk-form-label" for="form-horizontal-text">Out of Status</label>
                  <div class="uk-form-controls">
                    <select class="uk-select" name="out-of-status">
                        <option>2-3 Days</option>
                        <option>In Stock</option>
                        <option>Out of Stock</option>
                        <option>Pre-order</option>
                    </select>
                  </div>
              </div>
              <div class="uk-margin">
                  <label class="uk-form-label" for="form-horizontal-text">Weight</label>
                  <div class="uk-form-controls">
                      <input class="uk-input" id="form-horizontal-text" type="text" name="weight" placeholder="Weight">
                  </div>
              </div>
              <div class="uk-margin">
                  <label class="uk-form-label" for="form-horizontal-text">Status</label>
                  <div class="uk-form-controls uk-margin">
                    <select class="uk-select" name="status">
                      <option>Enabled</option>
                      <option>Disabled</option>
                    </select>
                  </div>
              </div>
            </p>
        </div>
    </li>
    <li class="">
        <a class="uk-accordion-title" href="#">Images</a>
        <div class="uk-accordion-content">
            <p>
              <div class="uk-form-controls">
                <img src="images\imageplaceholder.png" alt="" onclick="triggerClick()" id="profileDisplay">
                <input type="file" accept="image/*" name="image" onchange="loadFile(event)" id="profileImage" value="" class="uk-form-controls" style="display: none;">
              </div>
            </p>
        </div>
    </li>
    <li>
        <a class="uk-accordion-title" href="#">SEO</a>
        <div class="uk-accordion-content">
            <p>
              <div class="uk-margin">
                <label class="uk-form-label" for="form-horizontal-text">Keyword</label>
                <p class="uk-alert-warn"><span uk-icon="icon: warning"></span> Do not use spaces, instead replace spaces with - and make sure the SEO URL is globally unique.</p>
                <div class="uk-form-controls">
                  <input class="uk-input" id="form-horizontal-text" type="text" name="seo" placeholder="Keyword">
                </div>
              </div>
            </p>
        </div>
    </li>
  </ul>
</form>
</div>
<?php endif; ?>


<?php if(!$_SESSION['verified']): ?>
  <?php include('components\verification-msg.php'); ?>
<?php endif; ?>

<?php
 include('includes/dashfooter.php');
?>
