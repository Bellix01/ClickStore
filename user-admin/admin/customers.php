<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>Clients</h2>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Nom</th>
              <th>E-mail</th>
              <th>Portable</th>
              <th>Addresse</th>
            </tr>
          </thead>
          <tbody id="customer_list">
            <!-- <tr>
              <td>1</td>
              <td>ABC</td>
              <td>FDGR.JPG</td>
              <td>122</td>
              <td>eLECTRONCS</td>
              <td>aPPLE</td>
              <td><a class="btn btn-sm btn-info"></a><a class="btn btn-sm btn-danger">Delete</a></td>
            </tr> -->
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <h5 class="modal-title" id="exampleModalLabel">Ajouter un produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-product-form" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Nom de produit</label>
		        		<input type="text" name="product_name" class="form-control" placeholder="Entrez le nom du produit">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Nom de marque</label>
		        		<select class="form-control brand_list" name="brand_id">
		        			<option value="">Select Brand</option>
		        		</select>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Nom de catégorie</label>
		        		<select class="form-control category_list" name="category_id">
		        			<option value="">Choisir une catégorie</option>
		        		</select>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Description du produit</label>
		        		<textarea class="form-control" name="product_desc" placeholder="Entrez la desc du produit"></textarea>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Prix de produit</label>
		        		<input type="number" name="product_price" class="form-control" placeholder="Entrez le prix du produit">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Mots clés du produit <small>(eg: apple, iphone, mobile)</small></label>
		        		<input type="text" name="product_keywords" class="form-control" placeholder="Entrez les mots-clés du produit">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Image du produit<small>(format: jpg, jpeg, png)</small></label>
		        		<input type="file" name="product_image" class="form-control">
		        	</div>
        		</div>
        		<input type="hidden" name="add_product" value="1">
        		<div class="col-12">
        			<button type="button" class="btn btn-primary add-product">Ajouter un produit</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/customers.js"></script>