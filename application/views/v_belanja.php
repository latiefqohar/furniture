<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/template/'); ?>images/bg_4.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Produk Kami</span></p>
            <h1 class="mb-0 bread">Produk Kami</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container"> 
    		<!-- <div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="#" class="active">All</a></li>
    					<li><a href="#">Vegetables</a></li>
    					<li><a href="#">Fruits</a></li>
    					<li><a href="#">Juice</a></li>
    					<li><a href="#">Dried</a></li>
    				</ul>
    			</div>
    		</div> -->
    		<div class="row">
                <?php foreach($menu as $row){?> 
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="<?= base_url('uploads/').$row->foto; ?>" alt="Colorlib Template" >
    						<!-- <span class="status">30%</span> -->
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#"><?= $row->nama; ?></a></h3>
                            <p style="font-size:8pt"><?= $row->deskripsi; ?></p>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price">Rp. <?= number_format($row->harga,2); ?></span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="<?= base_url('Belanja/tambah_keranjang/'.$row->id); ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="<?= base_url('Belanja/bungkus/'.$row->id); ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
                </div>
                <?php } ?>
    		</div>
    		<!-- <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div> -->
    	</div>
    </section>
