<?php
  /*
    $variablesarray = explode("&",urldecode($_SERVER['QUERY_STRING']));
    foreach($variablesarray as $variable)
    {
        $variable = htmlentities($variable, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        parse_str($variable);
        $variable = "";
    }
    
    
    $productmenu = "";
    $query = "SELECT id, heading FROM products ORDER BY heading ASC";
    if($result = mysqli_query($link, $query))
    {
        while ($row = mysqli_fetch_row($result))
        {
            $menuid = $row[0];
            $menutitle = $row[1];
            
            $productmenu .= '<a class="dropdown-item" href="product.php?id='.$menuid.'">'.$menutitle.'</a>';
            
            $menuid = $menutitle = "";
        }
        mysqli_free_result($result);
    }
    */
    $productmenu = "";
    $products = $this->db->order_by('heading','asc')->get('products')->result();
    foreach($products as $product){
      $productmenu .= '<a class="dropdown-item" href="'.base_url("web/services/{$product->id}").'">'.$product->heading.'</a>';
    }
    $servicesmenu = "";
    $services = $this->db->order_by('heading','asc')->get('services')->result();
    foreach($services as $service){
      $servicesmenu .= '<a class="dropdown-item" href="'.base_url("web/products/{$service->id}").'">'.$service->heading.'</a>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>PIX-GURU</title>
    
    <script>
    	//$(document).ready(function(){
    //		$("#myModal").modal('show');
    //	});
        $(window).load(function(){
            setTimeout(function() {
                    $('#myModal').modal('show');
            }, 5000);
        });

    </script>
</head>
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,300,500);

body { 
  background-color: #c89438; 
  color: #fff;
  font-size: 100%;
  line-height: 1.5;
  font-family: "Roboto", sans-serif;
}

.button {
  font-weight: 300;
  color: #fff;
  font-size: 1.2em;
  text-decoration: none;
  border: 1px solid #efefef;
  padding: .5em;
  border-radius: 3px;
  
  position: relative;
  transition: all .3s linear;
}

.button:hover {
  background-color: #222;
  color: #fff;
}

p {
  font-size: 2em;
  text-align: center;
  font-weight: 400;
}

h1 {
  text-align: center;
  font-size: 15em;
  margin: 0;
  font-weight: 100;
  
}
@media (max-width: 500px) {
    h1 {
    text-align: center;
    font-size: 10em;
    margin: 0;
    font-weight: 100;
    padding-top: 10%;
    }
    p {
    font-size: 1.3em;
    text-align: center;
    font-weight: 400;
   }
}
</style>

<h1>404</h1>
<p>Oops! Something is wrong.</p>
<div style="text-align: center; margin: 0 auto; width: 100%">
<a class="button" href="<?php echo base_url('index');?>"><i class="icon-home"></i> Back to home page</a>
</div>


