<!--<div class="container" style="margin-top:30px;">-->
<?php $this->load->view('themes/default/includes/alerts');
	$main_categories = $this->category->get_parent_category(); //returns array of obj
  $sub_categories  = $this->category->get_sub_category();
	$slider          = $this->slider->get_slider();
	$banners         = $this->slider->get_home_banners();
	$hot_deals       = $this->product->get_hot_deals();
	$reviews         = $this->product->get_all_reviews();
 // $new_products    = $this->product->get_new(); //new arrival products
  $offer_products  = $this->product->get_special_offers(); //special offer products  
  $tags            = $this->product->get_new();  //to get all tags
  $sellers_products = $this->product->get_best_sellers();  //to get all tags
  $featured_products = $this->product->get_featured_products();  //to get all tags
//echo $category;
$abc = "<script>document.getElementByID('abc').value</script>";
 $new_products='<div id="abc" class="resultdiv"></div>';
echo $new_products;
  

//var_dump($new_products);
// $new_products    = $this->product->get_new($new_products); //new arrival products
if(is_object($new_products)){
  echo "kjd";
foreach ($new_products as  $value) {
echo $value['id'];
}
}

 ?>


<!-- ========================== ==================== HEADER : END ============================================== -->

<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">

          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
              <?php

              	foreach ($main_categories as $key => $main_category)
              	{
              	?>
              <li class="dropdown menu-item "> <a href="<?php echo base_url(); ?>#" class="dropdown-toggle" data-toggle="dropdown" id="<?php echo ($main_category->id); ?>"><i class="fa fa"></i><?php echo ucwords($main_category->name); ?></a>
                <ul class="dropdown-menu mega-menu" >
                  <li class="yamm-content ">
                    <div class="row customli">
                      <?php
                      	$counter = 0;

                      		foreach ($sub_categories as $key => $sub_category)
                      		{
                      			if ($sub_category->category_id == $main_category->id)
                      			{
                      	// if($sub_category->category_id){
                      				//    echo $sub_category->category_id;

                      			?>

                                <?php

                                				if ($counter < 4)
                                				{
                                				?>
                      <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li><a href="<?php echo base_url().'categories/get_sub_category_products/'.$sub_category->id; ?>"><?php echo ucwords($sub_category->name);
				$counter++; ?>
                                  </a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                      <?php
                      	}
                      				elseif ($counter >= 4)
                      				{
                      				?>
                      <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                         <li><a href="<?php echo base_url().'Categories/get_sub_category_products/'.$sub_category->id; ?>"><?php echo ucwords($sub_category->name);
				$counter++; ?>
                                  </a></li>
                        </ul>
                      </div>
                      <!-- /.col -->
                       <?php
                       	}
                       				else
                       				{
                       				?>
                      <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                         <li><a href="<?php echo base_url().'Categories/get_sub_category_products/'.$sub_categories->id; ?>"><?php echo ucwords($sub_category->name);
				$counter++; ?>
                                  </a></li>
                        </ul>
                      </div>
                       <?php
                       	}

                       			?>
<?php
	//}
			}
			else
			{
			?>

        <?php
        	}
        		}

        	?>
</div>
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
<?php
	}

?>
            </ul>

            <!-- /.nav -->
          </nav>
          <!-- /.megamenu-horizontal -->
        </div>
        <!-- /.side-menu -->



        <!-- ================================== TOP NAVIGATION : END ================================== -->

        <!-- ============================================== HOT DEALS ============================================== -->
        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">hot deals</h3>
                                        <div id="countdowntimer"><span id="given_date"><span></div>

          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
          <?php

          	foreach ($hot_deals as $product)
          {
          	?> <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                
    
 
     <div class="image"> <img src="<?php echo base_url().$product['thumb_image']; ?>" alt="product" style="max-height:150px;max-width:223px;height:auto;width:auto;"></div>

                  <?php
                  	$percentage = ceil((($product['old_price'] - $product['new_price']) / $product['old_price']) * 100);
                  		$start      = date_create($product['start']);
                      $date1=date_format($start,"F d,yy h:i:s");
                  		$end        = date_create($product['end']);
                      $date2=date_format($end,"F d,yy h:i:s");
                  		$daydiff    = date_diff($end, $start);
                  	//	$hours      = $daydiff->h;
                  	///$minutes    = $daydiff->m;
                  	//	$seconds    = $daydiff->s;
                    $rem = strtotime($date2) - strtotime($date1);
                  	?>
                  <div class="sale-offer-tag"><span><?php echo $percentage.'%'; ?><br>
                    off</span></div>
                      <script>
                        
    // Set the date we're counting down to
     var countDownDate<?php echo $product['id'];?> = new Date("<?php echo $date2 ;?>").getTime();
     var now<?php echo $product['id'];?> = new Date("<?php echo $date1 ;?>").getTime();

      // Update the count down every 1 second
     var x<?php echo $product['id'];?> = setInterval(function() 
     {
        now<?php echo $product['id'];?> = now<?php echo $product['id'];?> + 1000;
        // Find the distance between now an the count down date
        var distance<?php echo $product['id'];?> = countDownDate<?php echo $product['id'];?> - now<?php echo $product['id'];?>;
        // Time calculations for days, hours, minutes and seconds
        var days<?php echo $product['id'];?> = Math.floor(distance<?php echo $product['id'];?> / (1000 * 60 * 60 * 24));
        var hours<?php echo $product['id'];?> = Math.floor((distance<?php echo $product['id'];?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes<?php echo $product['id'];?> = Math.floor((distance<?php echo $product['id'];?> % (1000 * 60 * 60)) / (1000 * 60));
        var seconds<?php echo $product['id'];?> = Math.floor((distance<?php echo $product['id'];?> % (1000 * 60)) / 1000);
        // If the count down is over, write some text 
        if (distance<?php echo $product['id'];?> < 0)
         {
            clearInterval(x<?php echo $product['id'];?>);
            document.getElementByClass("timing-wrapper").innerHTML="expired";
            
        }
        // Output the result in an element with id="demo"
        document.getElementById("days<?php echo $product['id'];?>").innerHTML = days<?php echo $product['id'];?> + "d " ;
             document.getElementById("hours<?php echo $product['id'];?>").innerHTML = hours<?php echo $product['id'];?> + "h " ;
             document.getElementById("min<?php echo $product['id'];?>").innerHTML = minutes<?php echo $product['id'];?> + "m " ;
             document.getElementById("sec<?php echo $product['id'];?>").innerHTML = seconds<?php echo $product['id'];?> + "s ";


    }, 1000);
    
    </script>

                  <div class="timing-wrapper">
                    <div class="box-wrapper">
<!--<?php echo $daydiff->format(' %a ') ?>-->
                      <div class="date box"> <span class="key" id="days<?php echo $product['id'];?>"></span> <span class="value">DAYS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="hour box"> <span class="key" id="hours<?php echo $product['id'];?>"></span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box"> <span class="key" id="min<?php echo $product['id'];?>"></span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper hidden-md">
                      <div class="seconds box"> <span class="key" id="sec<?php echo $product['id'];?>"></span> <span class="value">SEC</span> </div>
                    </div>
                  </div>
                </div>
                <!-- /.hot-deal-wrapper -->

                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="<?php echo base_url(); ?>#"><?php echo ucwords($product['name']); ?></a></h3>
                  <?php

                  		foreach ($reviews as $review)
                  		{
                  			if ($review['product_id'] == $product['id'])
                  			{
                  				$i = 1;

                  				for ($i; $i <= $review['star_rating']; $i++)
                  				{
                  				?>

                  <div class="fa fa-star" style="color: orange"></div>

                <?php
                	}

                				for ($i = $i; $i <= 5; $i++)
                			{
                				?>                  <div class="fa fa-star-o"></div>

                  <?php
                  	}
                  			}
                  		}

                  	?>
                  <div class="product-price"> <span class="price"><?php echo $product['new_price']; ?> </span> <span class="price-before-discount"><?php echo $product['old_price']; ?></span> </div>
                  <!-- /.product-price -->

                </div>
                <!-- /.product-info -->

                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </div>
                  </div>
                  <!-- /.action -->
                </div>
                <!-- /.cart -->

          </div>
          </div>
          <?php
          	}

          ?>
          </div>
          <!-- /.sidebar-widget -->
        </div>
        <!-- ============================================== HOT DEALS: END ============================================== -->

        <!-- ============================================== SPECIAL OFFER ============================================== -->

        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Offer</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
               <?php foreach ($offer_products as $offer_product)
               { 

               ?>
              <div class="item">
                <div class="products special-product">
                
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?php echo base_url(); ?>#"> <img src="<?php echo base_url().$offer_product['thumb_image']?>" alt=""> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?php echo base_url(); ?>#"><?php echo ucwords($offer_product['name']);?></a></h3>
                            <div class="product-price"> <span class="price"><?php echo $offer_product['new_price'];?></span> </div>
                            <!-- /.product-price -->
                  <?php

                      foreach ($reviews as $review)
                      {
                        if ($review['product_id'] == $offer_product['id'])
                        {
                          $i = 1;

                          for ($i; $i <= $review['star_rating']; $i++)
                          {
                          ?>

                  <div class="fa fa-star" style="color: orange"></div>

                <?php
                  }

                        for ($i = $i; $i <= 5; $i++)
                      {
                        ?>                  <div class="fa fa-star-o"></div>

                  <?php
                    }
                        }
                      }

                    ?>                            

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                  
                  
                </div>
              </div>
            <?php }?>
             
            </div>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== SPECIAL OFFER : END ============================================== -->
        <!-- ============================================== PRODUCT TAGS ============================================== -->
        <div class="sidebar-widget product-tag wow fadeInUp">
          <h3 class="section-title">Product tags</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="tag-list"> 
              <?php foreach ($tags as $tag) {
                
            ?>
              <a class="item" title="Phone" href="<?php echo base_url(); ?>category.html"><?php echo ucwords($tag['tags']);?></a>
              <?php 
          }
          ?>
           </div>
            <!-- /.tag-list -->
            
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== PRODUCT TAGS : END ============================================== -->
        <!-- ============================================== SPECIAL DEALS ============================================== -->

        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Deals</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
              <div class="item">
                <div class="products special-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?php echo base_url(); ?>#"> <img src="assets/themes/default/images/products/p28.jpg"  alt=""> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?php echo base_url(); ?>#">Floral Print Shirt</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?php echo base_url(); ?>#"> <img src="assets/themes/default/images/products/p15.jpg"  alt=""> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?php echo base_url(); ?>#">Floral Print Shirt</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?php echo base_url(); ?>#"> <img src="assets/themes/default/images/products/p26.jpg"  alt="image"> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?php echo base_url(); ?>#">Floral Print Shirt</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products special-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?php echo base_url(); ?>#"> <img src="assets/themes/default/images/products/p18.jpg" alt=""> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?php echo base_url(); ?>#">Floral Print Shirt</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?php echo base_url(); ?>#"> <img src="assets/themes/default/images/products/p17.jpg" alt=""> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?php echo base_url(); ?>#">Floral Print Shirt</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?php echo base_url(); ?>#"> <img src="assets/themes/default/images/products/p16.jpg" alt=""> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?php echo base_url(); ?>#">Floral Print Shirt</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products special-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?php echo base_url(); ?>#"> <img src="assets/themes/default/images/products/p15.jpg" alt="images">
                              <div class="zoom-overlay"></div>
                              </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?php echo base_url(); ?>#">Floral Print Shirt</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?php echo base_url(); ?>#"> <img src="assets/themes/default/images/products/p14.jpg"  alt="">
                              <div class="zoom-overlay"></div>
                              </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?php echo base_url(); ?>#">Floral Print Shirt</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?php echo base_url(); ?>#"> <img src="assets/themes/default/images/products/p13.jpg" alt="image"> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?php echo base_url(); ?>#">Floral Print Shirt</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== SPECIAL DEALS : END ============================================== -->
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
          <h3 class="section-title">Newsletters</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
            <form action="" id="news_letters" method="POST">
              <div class="form-group">
                <label class="sr-only" for="Subscribe_id">Email address</label>
                <input type="email" name="email" class="form-control" id="Subscribe_id" placeholder="Subscribe to our newsletter">
              </div>
              <button type="submit" id="newsletter"  class="btn btn-primary">Subscribe</button>

            </form>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== NEWSLETTER: END ============================================== -->

        <!-- ============================================== Testimonials============================================== -->
        <!--
        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
          <div id="advertisement" class="advertisement">
            <div class="item">
              <div class="avatar"><img src="assets/themes/default/images/testimonials/member1.png" alt="Image"></div>
              <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">John Doe <span>Abc Company</span> </div>
      /.container-fluid
            </div>
      /.item

            <div class="item">
              <div class="avatar"><img src="assets/themes/default/images/testimonials/member3.png" alt="Image"></div>
              <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
            </div>
    /.item

            <div class="item">
              <div class="avatar"><img src="assets/themes/default/images/testimonials/member2.png" alt="Image"></div>
              <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
              <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
    /.container-fluid
            </div>
    /.item

          </div>
/.owl-carousel
        </div>
-->
        <!-- ============================================== Testimonials: END ============================================== -->
<!--
        <div class="home-banner"> <img src="assets/themes/default/images/banners/LHS-banner.jpg" alt="Image"> </div>
      -->
      </div>

      <!-- /.sidemenu-holder -->
      <!-- ============================================== SIDEBAR : END ============================================== -->

      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        <!-- ========================================== SECTION – HERO ========================================= -->

        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
          <?php

          	foreach ($slider as $slider)
          	{
          	?>
              <div class="item" style="background-image: url(<?php echo base_url();
	echo $slider['image']; ?>)">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1"><?php echo ucwords($slider['title']); ?></div>
                  <div class="big-text fadeInDown-1">                                                                                                                                                                                         <?php echo ucwords($slider['sub_title']); ?></div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span><?php echo ucwords($slider['description']); ?></span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="#<?php echo base_url(); ?>index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption -->
              </div>
              <!-- /.container-fluid -->
            </div>
           <!-- /.owl-carousel -->
        <?php
        	}

        ?>
       </div>
        </div>

        <!-- ========================================= SECTION – HERO : END ========================================= -->

        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">money back</h4>
                    </div>
                  </div>
                  <h6 class="text">30 Days Money Back Guarantee</h6>
                </div>
              </div>
              <!-- .col -->

              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">Shipping on orders over $99</h6>
                </div>
              </div>
              <!-- .col -->

              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Special Sale</h4>
                    </div>
                  </div>
                  <h6 class="text">Extra $5 off on all items </h6>
                </div>
              </div>
              <!-- .col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.info-boxes-inner -->

        </div>
        <!-- /.info-boxes -->
        <!-- ============================================== INFO BOXES : END ============================================== -->
        <!-- ============================================== SCROLL TABS ============================================== -->

         <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">

            <h3 class="new-product-title pull-left">New Products</h3>
  <form method="post" action="<?php  echo base_url('home'); ?>">

            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">

              <li class="active"><a data-transition-type="backSlide" href="<?php echo base_url()."home?id=".'' ?>" data-id="" name=""  data-toggle="tab">All</a></li>
 
               <?php
                foreach ($main_categories as $key => $main_category)
                {

                ?> 
                   <!--<?php echo base_url()."products/get_new_products/". $main_category->id; ?>-->  
              <li class="item"><a  id="cat_id" data-transition-type="backSlide" href="<?php echo base_url()."home?id=". $main_category->id; ?>" data-id="<?php echo $main_category->id; ?>" name="<?php echo $main_category->id; ?>" data-toggle="tab"><?php echo ucwords($main_category->name); ?></a></li>

                    
             <?php            
              
            }
                         ?>
            </ul>
          </form>
            <!-- /.nav-tabs --> 
          </div>
         
          <div class="tab-content outer-top-xs">
              <div class="tab-pane in active" id="all">
              <div class="product-slider">
 <?php
          //  if(empty($new_products)){
 // echo "<center>No Products</center>";
//}
    ?>     
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
            
<?php
/**
foreach ($new_products as $product)
 {
  $created      = date_create($product['created_at']);
  $today        = date_create(date("Y-m-d h:i:sa"));
  $daydiff      = date_diff($today, $created);

  $days= $daydiff->format(' %a ') ;  
  if(sizeof($new_products)>7)
  { 
      if($days<30)
      {                   

**/?>
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">

                        <div class="product-image">
                         
                          <div class="image"> <a href="#"><img  src="" alt="" style="max-width: 189px;max-height: 142px"></a> </div>
                          <!-- /.image -->
                         <?php //if($product['is_hot']==1){?> 
                  
                          <div class="tag hot"><span>
                            HOT
                              </span></div>
                            <?php //}
                            //elseif ($product['is_hot']==1 || $product['is_sale']==1){?> 
                          <div class="tag sale"><span>
                            SALE
                              </span></div>
                            <?php //}
                            //else{?>

                             <div class="tag new"><span>
                            NEW
                              </span></div>
                            <?php //}
                            ?>

                        </div>

                        <!-- /.product-image -->
                        
                        <div  id="name" class="product-info text-left">
                          <h3 class="name"><a href="detail.html"><?php //echo ucwords($product['name']);?></a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price" id="price"> <span class="price"> <?php //echo ucwords($product['new_price']);?></span> <span class="price-before-discount"><?php ///echo ucwords($product['old_price']);?></span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
<?php
    //  }
       //  }else{?>
                    <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                         
                          <div class="image" id="image"> <a href="detail.html"><img  src="" alt="" style="max-width: 189px;max-height: 142px"></a> </div>
                          <!-- /.image -->
                         <?php //if($product['is_hot']==1){?> 
                          <div class="tag hot"><span>
                            HOT
                              </span></div>
                            <?php// }
                           // elseif ($product['is_hot']==1 || $product['is_sale']==1){?> 
                          <div class="tag sale"><span>
                            SALE
                              </span></div>
                            <?php// }
                            //else{?>

                             <div class="tag new"><span>
                            NEW
                              </span></div>
                            <?php// }
                            ?>

                        </div>

                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html"></a></h3>
                           <div class="description"></div>
                          <div class="product-price"> <span class="price"> </span> <span class="price-before-discount"></span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                    <?php

                      foreach ($reviews as $review)
                      {                          
                        if ($review['product_id'] == $product['id'])
                        {
                          $i = 1;

                          for ($i; $i <= $review['star_rating']; $i++)
                          {
                          ?>

                  <div class="fa fa-star" style="color: orange"></div>

                <?php
                  }

                        for ($i; $i <=5; $i++)
                      {
                        ?>                 
                         <div class="fa fa-star-o"></div>

                  <?php
                    }
                        }

                      }                   
                      //var_dump($reviews);
                      //echo $product['id'];

                    ?>  

                    
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                    
                  <!-- /.item -->
                  <?php
                  // }
                 //}?>
                  
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
           </div>
         
         </div>

              
        <!-- ============================================== SCROLL TABS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">

            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">

              <div class="item" style="background-image: url(<?php echo base_url() ?><?php echo $banners[0]['banner']; ?>)">

            </div>
           <!-- /.owl-carousel -->

                <div class="image"> <img class="img-responsive" src="<?php echo base_url() ?><?php echo $banners[0]['banner']; ?>"alt="">
                </div>
              </div>
              <!-- /.wide-banner -->
            </div>

            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="<?php echo base_url() ?><?php echo $banners[1]['banner']; ?>" alt=""> </div>
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->

          </div>
          <!-- /.row -->
        </div>
        <!-- /.wide-banners -->

        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">Featured products</h3>
         
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
       <?php
        foreach ($featured_products as $product)
       {
               
      ?>
            <div class="item item-carousel">
 
              <div class="products">
                <div class="product">
                  <div class="product-image">

                    <div class="image"> <a href="<?php echo base_url(); ?>detail.html"><img  src="<?php echo base_url().$product['thumb_image'];?>" style="max-height: 142px;max-width:189px;" alt="featured image"></a> </div>
                    <!-- /.image -->

<?php if($product['is_hot']==1){?> 
                  
                          <div class="tag hot"><span>
                            HOT
                              </span></div>
                            <?php }
                            elseif ($product['is_hot']==1 || $product['is_sale']==1){?> 
                          <div class="tag sale"><span>
                            SALE
                              </span></div>
                            <?php }
                            else{?>

                             <div class="tag new"><span>
                            NEW
                              </span></div>
                            <?php }
                            ?>

                        </div>

                                        
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name"><a href="<?php echo base_url(); ?>detail.html"><?php echo ucwords($product['name']);?></a></h3>
                          <div class="description"></div>
                    <div class="product-price"> <span class="price"> <?php echo $product['new_price'];?> </span> <span class="price-before-discount"><?php echo $product['old_price'];?></span> </div>
                    <!-- /.product-price -->
<?php
                      foreach ($reviews as $review)
                      {                           
                        if ($review['product_id'] == $product['id'])
                        {
                          $i = 1;

                          for ($i; $i <= $review['star_rating']; $i++)
                          {
                          ?>

                  <div class="fa fa-star" style="color: orange"></div>

                <?php
                  }

                        for ($i; $i <=5; $i++)
                      {
                        ?>                 
                         <div class="fa fa-star-o"></div>

                  <?php
                    }
                        }

                      }                   
                      //var_dump($reviews);
                      //echo $product['id'];

                    ?>  
              

                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="<?php echo base_url(); ?>detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="<?php echo base_url(); ?>detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->
</div>


          </div>

<?php }
?>
        </div>

          <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="<?php echo base_url().$banners[2]['banner']; ?>" alt="banner3"> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right"><?php echo ucwords($banners[2]['title']); ?><br>
                      <span class="shopping-needs"><?php echo ucwords($banners[2]['sub_title']); ?></span></h2>
                      <h5 style="color: orange;font-family: 'Montserrat', sans-serif;
    font-weight: normal;" class="text-right">
                      <span class="shopping-needs"><?php echo ucwords($banners[2]['description']); ?></span></h5>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label -->
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->

          </div>
          <!-- /.row -->
        </div>
        <!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
        <!-- ============================================== BEST SELLER ============================================== -->

        <div class="best-deal wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">Best seller</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
             <?php 
             $counter=0;

              foreach ($sellers_products as $product)
               {
            ?>
              <div class="item">
                <div class="products best-product">
                  <?php 
                 //if ($counter<3)
                                 //{
                  
                                        ?>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?php echo base_url().$product['thumb_image'];?>"> <img src="<?php echo base_url().$product['thumb_image'];?>" alt="best sellers product" style="max-width: 120.58px;max-height:120.58px"> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?php echo base_url(); ?>#"><?php echo ucwords($product['name']);  $counter++;
?></a></h3>
                            <div class="product-price"> <span class="price"><?php echo $product['new_price'];?> </span> </div>
                            <!-- /.product-price -->
                            <?php
                      foreach ($reviews as $review)
                      {                          
                        if ($review['product_id'] == $product['id'])
                        {
                          $i = 1;

                          for ($i; $i <= $review['star_rating']; $i++)
                          {
                          ?>

                  <div class="fa fa-star" style="color: orange"></div>

                <?php
                  }

                        for ($i; $i <=5; $i++)
                      {
                        ?>                 
                         <div class="fa fa-star-o"></div>

                  <?php
                    }
                        }

                      }                   
                      //var_dump($reviews);
                      //echo $product['id'];

                    ?>  


                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
<?php 
//}

//else{
?>


                  <?php
                //}
               //?>

                </div>
              </div>
       <?php 
        
      }
        ?>
              
          </div>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->

        <!-- ============================================== BEST SELLER : END ============================================== -->


      </div>
      <!-- /.homebanner-holder -->
      <!-- ============================================== CONTENT : END ============================================== -->
    </div>


<div id="data">
    <div class="template auctionbox"></div>
</div>
<script type="text/javascript">
  var BASE_URL = "<?php echo base_url(); ?>";

          var temp = document.querySelectorAll('.customli');
          var t = document.querySelector('.yamm-content');
         temp.forEach((e)=>{
          if(e.children.length === 0)
          {
          e.style.display='none';
          e.parentNode.style.display='none'
          var p = e.parentNode;
          p.parentNode.style.display='none'
          }
         })

//get new_arrival products
     $(document).ready(function()
     {
       $("#new-products-1 a").on("click", function()
       {
        var category_id = $(this).attr("data-id");
        var url = BASE_URL+"home/get_home_categories";
        $.post( url, { category : category_id })
       .done(function(data)
        {
                    $('.resultdiv').html(data);

          //console.log(JSON.parse(data));   // value
         // alert(data);
          var json=JSON.parse(data);
         var data = $.parseJSON(data);
var $template = $('.template');

//$(data).each(function() {


    var $element = $template.clone().removeClass('name').appendTo('#name');
    $element.attr('id', this.id);
    $element.html(this.name);
element.forEach(name => {
    console.log(name);
})
//});

         //<?php //echo ?>alert($p)<?php ?>
         products.forEach(function(product){


          //console.log(products);
 //$(".product").append(products);
          //console.log(data);
          
         })
      });  
    });
     
 </script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/core/libraries/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/plugins/forms/validation/validate.min.js'); ?>"></script>
<script type="text/javascript">
//news letters
   
$.validator.addMethod("emailExists", function(value, element)
{
    var mail_id = $(element).val();
    var ret_val = '';
    $.ajax({
        url:BASE_URL+'news_letters/email_exists',
        type: 'POST',
        data: { email: mail_id },
      //  async: false,
        success: function(data)
        {    console.log(data);
            if(msg==1)
            {
                ret_val = false;
            }
            else
            {
                ret_val = true;
            }
        }
    });

    return ret_val;

}, "<?php _el('email_exists')?>");

$("#news_letters").validate({
    rules: {       
        email: {
            required: true,
            email: true,
            emailExists: false,
        },
        
    },
    messages: {      
        email: {
            required:"<?php _el('please_enter_', _l('email'))?>",
            email:"<?php _el('please_enter_valid_', _l('email'))?>"
        },
       
    },
});

   //news letters
    $(document).ready(function ()
     {
        $("#newsletter").click(function(e) 
        {
            e.preventDefault();
            var email = $("#Subscribe_id").val();
            var url = BASE_URL+"news_letters";
               $.ajax({
                type: "POST",
                url: url,
                data : {"email" : email},
                dataType: "json",
                success: function (data)
                {
                    console.log(data);
                    $("#news_letters")[0].reset();
                     if(data)
                     {                                        
                     alert('Your are subscription successfully');
                     }

                }
          });
        });
    });
   </script>
<?php
$cat_id="<script> document.writeln(category_id);</script>";
//echo $cat_id;

?>

    
    <!-- /.row -->
