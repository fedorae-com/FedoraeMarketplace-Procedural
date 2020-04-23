<?php
  require('includes/dashheader.php');
 ?>


          <?php if(isset($_SESSION['message'])): ?>
              <template>
                <v-card
                  class="mx-auto"
                  max-width="430"
                >
                    <div class="text--primary">
                      <div class="uk-alert-success" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p>
                          <?php
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                            unset($_SESSION['alert-class']);
                          ?>
                        </p>
                      </div>
                    </div>
                  </v-card-text>
                </v-card>
              </template>
          <?php endif; ?>

            <?php if(!$_SESSION['verified']): ?>
              <?php include('components\verification-msg.php'); ?>
            <?php endif; ?>

<!-- Should only be shown if user is verified -->
            <?php if($_SESSION['verified']): ?>
              <?php require('components\layout.php'); ?>
              <?php include('components\profile-modal.php'); ?>
            <?php endif; ?>
          </div>

<!-- -->

<?php
  require('includes/dashfooter.php');
 ?>
