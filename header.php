<!--<nav class="navbar navbar-primary navbar-fixed-top" color-on-scroll=" " id="sectionsNav">-->
<style>
.page-header{
	height: 60vh !important;
}
</style>

<!--<nav class="navbar navbar-primary navbar-transparent navbar-fixed-top navbar-color-on-scroll">-->
<nav class="navbar navbar-default navbar-transparent navbar-fixed-top navbar-color-on-scroll" color-on-scroll="100" id="sectionsNav">
    	<div class="container" float="left">
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		</div>
<a class="navbar-brand" href="http://localhost/workspace2/hangxachtay/"><h6>Happy Feet</h6></a>
        	
						
        	<div class="collapse navbar-collapse">
        		<ul class="nav navbar-nav navbar-right">
				 <li><form class="navbar-form navbar-right" role="search">
	                        <div class="form-group form-white">
	                          <input type="text" class="form-control" placeholder="Search">
	                        </div>
	                        <button type="submit" class="btn btn-white btn-raised btn-fab btn-fab-mini"><i class="material-icons">search</i></button>
	                      </form>
						  </li> 
					<li>
					<?php if(isset($_SESSION["idUser"]))
						{
					
					require "block/formxinchao.php";
					}
					else {require "block/formlogin.php";}
					?>
					</li>	
					
					<li>
						<a href="http://localhost/workspace2/hangxachtay/examples/view-cart.php" type="button" class="btn btn-primary btn-round btn-rose" target="_blank"><div><i class="material-icons">shopping_cart</i>Cart <span class="badge"><?php if(isset($_SESSION["products"])){
						$total_items=count($_SESSION["products"]);
						echo $total_items;
						}
						else echo "0"; 
					?></span></div></a>
						
					
					
					</li>					
					
			
					<li class="button-container">
					
						
					</li>
					
					
        		</ul>
				</div>	
        	
		</div>	
    	
    </nav>
    <div class="page-header"  style="background-image: url('http://www.insuranceforashop.co.uk/includes/templates/Insuranceforashop/images/Womens-Shoes.jpg');"></div>
