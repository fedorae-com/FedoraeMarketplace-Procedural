<?php

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Sellers</title>
   </head>
   <body>
     <div class="uk-container">
       <div class="uk-card uk-card-body">
         <table class="uk-table uk-table-divider">
           <thead>
            <tr>
             <th class="uk-table-shrink">Sellers</th>
            </tr>
           </thead>
           <tbody>
             <?php foreach ($sellers as $seller): ?>
               <tr class="">
                   <td><input class="uk-checkbox" type="checkbox" name="chkbox[]"></td>
                   <td><img class="uk-border-circle" src="images/<?php echo $seller['image']; ?>" width="40" alt=""></td>
                   <td class="uk-table-expand"><?php echo $seller['name']; ?></td>
                   <td class=""><?php echo '$'.$seller['price']; ?></td>
                   <td class="uk-text-nowrap"><?php echo $seller['quantity']; ?></td>
                   <td class=""><?php echo $seller['status']; ?></td>
                   <td class="uk-link"><a href="edit-product.php?id=<?php echo $seller['id']; ?>"><v-icon>mdi-pencil</v-icon></a></td>
               </tr>
             <?php endforeach; ?>
           </tbody>
       </div>
     </div>

   </body>
 </html>
