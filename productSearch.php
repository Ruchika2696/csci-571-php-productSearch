<html>
	<head>
		
		<style type="text/css">
			
			.form_div{
				align-self: center;
				height: 400px;
				width: 600px;
				margin:auto;
				border: 1px solid;
				display: inline;
				border:1px;
				
			}

			.inside-div{
				margin: auto;
				width: 550px;
				padding: 10px;
				border:solid;
				background-color:#E8E8E8;
			}

			.product-search-h1{
				margin: 0px;
				font-family: serif;
			}

			.form-titles{
				display: inline;
			}

			.keyword-textbox{
				width: 130px;
				border-style: ridge;
			}

			.miles-textbox{
				width: 40px;
			}

			select {
			    padding:1px;
			    margin: 0;
			    width: 210px;    
			}

			.condition-checkbox{
				margin-left: 15px;
			}

			.shipping-checkbox{
				margin-left: 30px;
			}

			ul{
				list-style-type: none;
				position: relative;
				margin: 0px;
				padding-left: 0px;
				
			}

			.miles-radio-button{

			  display: block;
			  position: relative;
			  padding-left: 35px;
			  cursor: pointer;
			  font-size: 5px;
			  
			}

			.miles-radio-button input {
			  position: absolute;
			  opacity: 0;
			  cursor: pointer;
			  left: -5px;
			}

			#mytable{
				border-right: 20px;
				border-left: 20px;
				border-top: 10px;
			}
			iframe {
			    display: none;
			}

			iframe.inUse {
			    display: block;
			}


</style>

		<script type="text/javascript">
			var oldparameter = "";
			//Function to auto fill the form	
			function fillMyForm(keep_var) {
				var valueList = keep_var.split("#");
				for(var i=0; i<valueList.length;i++ ){
					var pair = valueList[i].split(":");
					if(pair[0] == "oldkeyword"){
						document.getElementById("keyword-textbox").value = pair[1];

					}
					if(pair[0] == "oldnearby"){
						document.getElementById("nearbySearch").checked = pair[1];
						if(pair[1]==false){
							document.getElementById("miles").value="";

						}
						enableNearBy();

					}
					if(pair[0] == "oldhere"){
						document.getElementById("here").checked = pair[1];

					}
					if(pair[0] == "oldfromzip"){
						document.getElementById("zip").checked = pair[1];
						if(pair[1]==true){
						document.getElementById("zip-val").disabled = false;
					}
					else{
						document.getElementById("zip-val").disabled = true;

					}

					}
					if(pair[0] == "oldzipval"){
						document.getElementById("zip-val").value = pair[1];
						document.getElementById("zip-val").disabled = false;

					}
					if(pair[0] == "oldcategory"){
						document.getElementById(pair[1]).selected = pair[1];

					}
					if(pair[0] == "oldlocalpick"){
						document.getElementById("LocalPickupOnly").checked = pair[1];

					}
					if(pair[0] == "oldfreeship"){
						document.getElementById("FreeShippingOnly").checked = pair[1];

					}
					if(pair[0] == "oldnew"){
						document.getElementById("New").checked = pair[1];

					}
					if(pair[0] == "oldused"){
						document.getElementById("Used").checked = pair[1];

					}
					if(pair[0] == "oldunspecified"){
						document.getElementById("Unspecified").checked = pair[1];

					}
					if(pair[0] == "oldmiles"){
						document.getElementById("miles").value= pair[1];

					}

				}
			
			}

			//Function to clear the form and screen

			function clearall(){
				var content = document.getElementById("table-div");
				content.innerHTML = "";
				document.getElementById("keyword-textbox").value="";
			}

			//Function called when user enables near by search
			function enableNearBy() {
				var nearbySearch = document.getElementById("nearbySearch").checked;
				var searchlocation = document.getElementById("miles");
				var here = document.getElementById("here");
				var zip = document.getElementById("zip");
				var zip_val = document.getElementById("zip-val");
				if(nearbySearch == true){
				
					searchlocation.disabled = false;
					here.disabled = false;
					zip.disabled = false;
					var grey = document.getElementById("nearbyspan");
					var miles_text = document.getElementById("miles_from");
					var here_text = document.getElementById("here_text");
					here_text.style.color = "black";
					miles_text.style.color = "black";
					grey.style.background = "transparent";
					// grey.style.display = "none" ;

				}
			
				else{
					searchlocation.disabled = true;
					searchlocation.value="";
					here.disabled = true;
					zip.disabled = true;
					zip_val.value="";
					zip_val.disabled = true;
					var grey = document.getElementById("nearbyspan");
					var miles_text = document.getElementById("miles_from");
					var here_text = document.getElementById("here_text");
					here_text.style.color = "#bec0c4";
					miles_text.style.color = '#bec0c4';
					grey.style.background = rgba(0,0,0,0.2);
					// grey.style.display = "block";
					
				}
			}

			//Function called when zip code feature is enabled
			function enableZip() {
				var zip = document.getElementById("zip");
				var zip_val = document.getElementById("zip-val");
				if (zip.disabled == false){
					if(zip.checked){
						zip_val.disabled = false;
						zip_val.required = true;
					}
					else{
						zip_val.disabled = true;
					}
				}

				
			}

			//Functiion called when zip code feature is unchecked
			function disableZip() {
				var here = document.getElementById("here");
				var zip_val = document.getElementById("zip-val");
				if(here.checked){
					zip_val.disabled = true;
				}
			}
			
		</script>
		
	</head>


	<body onload="getzip()">
		<div class="form_div">
			<div class="inside-div">
				<h1 align="center" class="product-search-h1"><i>Product Search</i></h1>
			<form class="myform" method="POST" id="search-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
				
				<hr>
				<h4 class="form-titles">Keyword  </h4><input class="keyword-textbox" type="text" name="keyword" required id="keyword-textbox" ><br><br>
				<h4 class="form-titles">Category</h4>
				
					<select name="category" id="category">
					<option value="-1" id="-1" selected>All Category</option>
					<option value="550" id="550">Art</option>
					<option value="2984" id="2984">Baby</option>
					<option value="267" id="267">Books</option>
					<option value="11450" id="11450">Clothing, Shoes & Accessories</option>
					<option value="58058" id="58058">Computers/Tablets & Networking</option>
					<option value="26395" id="26395">Health & Beauty</option>
					<option value="11233" id="11233">Music</option>
					<option value="1249" id="1249">Video Games & Consoles</option>
				</select>
	
				<br><br>
				<h4 class="form-titles">Condition</h4> 
              
        <input class="condition-checkbox" type="checkbox" name="condition[]" value="New" id="New">New      
        <input class="condition-checkbox" type="checkbox" name="condition[]" value="Used" id="Used">Used
        <input class="condition-checkbox" type="checkbox" name="condition[]" value="Unspecified" id="Unspecified">Unspecified    
        <br><br>
				<h4 class="form-titles">Shipping Options</h4> 
              
        <input class="shipping-checkbox" type="checkbox" name="shipping[]" value="LocalPickupOnly" id="LocalPickupOnly">Local Picking      
        <input class="shipping-checkbox" type="checkbox" name="shipping[]" value="FreeShippingOnly" id="FreeShippingOnly">Free Shipping

        <br><br>
        <input type="checkbox" name="location" value="location" id="nearbySearch" onchange="enableNearBy()">
				<h4 class="form-titles" >Enable Nearby Search</h4> 
				<input  type="number" name="miles" class="miles-textbox" style="margin-left: 20px; border:0.7px solid #dbdde0;" id="miles" disabled="true" placeholder="10"> <h4 style="display: inline;" class="form-titles"><p style="display: inline; color:#bec0c4;"id="miles_from">miles from</p></h4>
				<span style="float: right; padding-right: 150px; left: 20px; height:50px;    width: 80;" id = "nearbyspan">
					<ul style="height: 50px;">
						<li>
							<input  class="miles-radio-input" type="radio" name="from" value="here" id="here" disabled="true" checked = "true" onchange="disableZip()"><h4  style="padding-left: 15px; display: inline;margin:0; margin-top: 21px; font-weight: normal;"><p style="display: inline; color:#bec0c4"id="here_text">Here</p></h4>
						</li>
						<li style="top:5px; width: 180px;">
							<input  class="miles-radio-input" type="radio" name="from" value="zip code" id="zip" disabled="true" onchange="enableZip()" style="display: inline" ><input  style="margin-left: 15px; width: 70px;display: inline; border:1px solid #dbdde0;"type="text" name="zip" placeholder="zipcode" disabled="true" id="zip-val">
						</li>
			</ul></span><br><br>
			
             <div style="margin: auto; text-align: center; margin-top: 5px;"><span style="display: inline-block; margin-left: 140;"><input type="submit" name="submit"  value="Search" id="submit"> <input type="reset" onclick=" clearall()"name="Clear" value="clear"></span></div>
             <input type="hidden" name="myzipcode" id="myzipcode">
        
			</form>
		</div>
		</div>
		<div style="bottom: 300px; margin-top: 20px; text-align: center;" id = "table-div">

		<script type="text/javascript">
			//Function called to get current zip code of user from ip-api.com
			function getzip(){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {
		            if (xmlhttp.readyState === 4) {   
		                if (xmlhttp.status == 200) {
		                		document.getElementById("submit").disabled = false;
		                    location_json = xmlhttp.responseText;

		                    try{
		                        mylocation = JSON.parse(location_json);
		                    }
		                    catch(e){
		                        alert("Unable to find location. Try later");
		                    }

		                    
		                }
		                else{
		                    alert("Unable to find location. Try later");
		                }
		            }
	        	};

		        xmlhttp.open("GET",'http://ip-api.com/json',false);
		        xmlhttp.send();

		        console.log(mylocation['zip']);
		        var hiddeninput = document.getElementById("myzipcode");
		        hiddeninput.value = mylocation['zip'];
	      	}
					
	      	//Function to show results
	       function showTable(jsonObj, keep_var, val){
		       	html_text="";
		       	if(val=="1"){
		   
			       	if(jsonObj == undefined){

			       		document.getElementById('table-div').innerHTML = '<div style=\' width:100%\'><p style=\'background-color:#E8E8E8; width:50%; text-align:center; margin:auto;\'> No Records Found</p></div>';

			       	}
			       	try{

			       			
						html_text+="<table border='2' align='center' width=90%>";
						html_text+="<tr>";
			
		       			root=jsonObj.DocumentElement;
		       			var items =  jsonObj.findItemsAdvancedResponse[0].searchResult[0].item;

			       		if(items!=undefined || items.length>0){
							html_text+="<th>Index</th> <th>Photo</th> <th>Name</th> <th>Price</th> <th>Zip code</th> <th>Condition</th> <th>Shipping Options</th>";
			       			
			       			for(i=0; i<items.length;i++){
			       				html_text+="<tr>";
			       				html_text+="<td>" +(i+1) + "</td>";
			       				itemNodeList = items[i];
			       				if(itemNodeList.hasOwnProperty("galleryURL")){
			       					html_text+="<td><img style='object-fit:cover; height:150px; width:100px;' src='"+ itemNodeList.galleryURL +"'></td>";
			       				}
			       				else{
			       					html_text+="<td>N/A</td>";
			       				}
	   
			       				if(itemNodeList.hasOwnProperty("title")){
			       					if(itemNodeList.hasOwnProperty("itemId")){

			       						var item_id = itemNodeList.itemId[0]; 	
			       						var keyword = document.getElementById("keyword-textbox").value;
										var nearby = document.getElementById("nearbySearch").checked;
										var here = document.getElementById("here").checked ;
										var zip = document.getElementById("zip").checked ;
										var zipval =document.getElementById("zip-val").value;
										var category = document.getElementById("category").selected ;
										var localpick= document.getElementById("LocalPickupOnly").checked;
										var freeship = document.getElementById("FreeShippingOnly").checked;
										var newitem=document.getElementById("New").checked;
										var used=document.getElementById("Used").checked;
										var unspecified=document.getElementById("Unspecified").checked;
										var miles = document.getElementById("miles").value;
			 							var oldparameter ="&oldkeyword="+keyword+"&oldnearby="+nearby+"&oldhere="+here+"&oldzip="+zip+"&oldzipval="+zipval+"&oldcategory="+category+"&oldlocalpick="+localpick+"&oldfreeship="+freeship+"&oldnew="+newitem+"&oldused="+used+"&oldunspecified="+unspecified+"&oldmiles="+miles;
		       						
			       						html_text+="<td><a style='color:black; text-decoration:none;' href='productSearch.php?item_Id="+item_id+oldparameter+"'>"+itemNodeList.title+"</a></td>";	 
			       					}     				

			       	       			if(itemNodeList.hasOwnProperty("sellingStatus")){
			       						html_text+="<td>$"+ itemNodeList.sellingStatus[0].currentPrice[0].__value__ + "</td>";
			       					}
			       				}
			       				else{
			       					html_text+="<td>N/A</td>";
								}

			       				if(itemNodeList.hasOwnProperty("postalCode")){
			       					html_text+= "<td>" + itemNodeList.postalCode +"</td>";
			       				}
			       				else{
			       					html_text+="<td>N/A</td>";
								}

			       				if(itemNodeList.hasOwnProperty("condition")){
			       					html_text+= "<td>" + itemNodeList.condition[0].conditionDisplayName + "</td>";
			       				}
			       				else{
			       					html_text+="<td>N/A</td>";
								}

			       				if(itemNodeList.hasOwnProperty("shippingInfo")){
			       					html_text+= "<td>" + itemNodeList.shippingInfo[0].shippingType + "</td>";
			       				}
			       				else{
			       					html_text+="<td>N/A</td>";
								}
			       				
			       				html_text+="</tr>";

			       			}
			       		}
			       		else{
			       			html_text+="<td width=100% style='text-align:center;'>No Record has been found</td>";
			       		}
			       	

				

						html_text+="</tr>";

						html_text+="</tbody>";
						html_text+="</table>";
						var x = document.getElementById("table-div");
						x.innerHTML = html_text;

					}

					catch(err){
						html_text+= '<div style=\' width:100%;\'><p style=\'background-color:#E8E8E8; width:50%; text-align:center; margin:auto;\'> No Records Found</p></div>';
						var x = document.getElementById("table-div");
						x.innerHTML = html_text;
				
					}

					fillMyForm(keep_var);
				}


				else{
				html_text+= '<div style=\' width:100%;\'><p style=\'background-color:#E8E8E8; width:50%; text-align:center; margin:auto;\'> Invalid Zip code</p></div>';
				var x = document.getElementById("table-div");
					x.innerHTML = html_text;
					fillMyForm(keep_var);
				}

			}
		</script>
		<script type="text/javascript">

			//Function to provide product detail
			function showdetail(jsonObj, keep_var){
	
				html_text="";
				html_text+="<h1 align=center>Item Details</h1><table border='2' align='center' width=60%>";
				try{	
					var itm = jsonObj.Item;

					if(jsonObj.Item.PictureURL[0] != undefined){

						html_text+="<tr>";
						html_text+="<td><b>Photo</b></td>";
						html_text+="<td><img src='"+jsonObj.Item.PictureURL[0]+"' width='300px' height='300px'</td>";
						html_text+="</tr>";
					}

					if(jsonObj.Item.Title!= undefined){

						html_text+="<tr>";
						html_text+="<td><b>Title</b></td>";
						html_text+="<td>"+jsonObj.Item.Title+"</td>";
						html_text+="</tr>";

					}
					if(jsonObj.Item.Subtitle!= undefined){

						html_text+="<tr>";
						html_text+="<td><b>Subtitle</b></td>";
						html_text+="<td>"+jsonObj.Item.Subitle+"</td>";
						html_text+="</tr>";

					}
					if(jsonObj.Item.CurrentPrice.Value!= undefined){

						html_text+="<tr>";
						html_text+="<td><b>Price</b></td>";
						html_text+="<td>"+jsonObj.Item.CurrentPrice.Value+" USD</td>";
						html_text+="</tr>";

					}

					if(jsonObj.Item.Location!= undefined || jsonObj.Item.PostalCode!=undefined){

						html_text+="<tr>";
						html_text+="<td><b>Location</b></td>";
						html_text+="<td>"+jsonObj.Item.Location+", "+jsonObj.Item.PostalCode+"</td>";
						html_text+="</tr>";

					}

					if(jsonObj.Item.Seller.UserID!= undefined){

						html_text+="<tr>";
						html_text+="<td><b>Seller</b></td>";
						html_text+="<td>"+jsonObj.Item.Seller.UserID+"</td>";
						html_text+="</tr>";

					}

					if(jsonObj.Item.ReturnPolicy!= undefined){

						html_text+="<tr>";
						html_text+="<td><b>Return Policy(US)</b></td>";
						html_text+="<td>"+jsonObj.Item.ReturnPolicy.ReturnsAccepted+" within "+jsonObj.Item.ReturnPolicy.ReturnsWithin+"</td>";
						html_text+="</tr>";

					}

					try{
					if(jsonObj.Item.ItemSpecifics.NameValueList!= undefined){

						var item_specific_list = jsonObj.Item.ItemSpecifics.NameValueList
						for(var i=0; i<item_specific_list.length; i++){
						html_text+="<tr>";
						html_text+="<td><b>"+item_specific_list[i].Name+"</b></td>";
						try{
						html_text+="<td>"+item_specific_list[i].Value[0]+"</td>";
					}
					catch(err){
						html_text+="<td>"+item_specific_list[i].Value+"</td>";

					}
					html_text+="</tr>";

					}}}

				catch(err){
						html_text+="<tr><td><b>No Detail Info from Seller</b></td><td style='background-color:grey;'></td></tr>";
				}

				

				html_text+="</tbody>";
				html_text+="</table>";


				html_text+="<div id='seller_div'><p id='seller_msg' style='margin-bottom:5px;'>click to show seller message</p><img height=30px width=50px src='http://csci571.com/hw/hw6/images/arrow_down.png'></p></div><br>";
				// html_text+="<p id='empty_para'></p><br>";
				html_text+="<div id='similar_div'><p id='similar_id' style='margin-bottom:5px;'>click to show similar items</p><img height=30px width=50px src='http://csci571.com/hw/hw6/images/arrow_down.png'></p></a></div><br>";
				html_text+="<div id='similar_table_div' style=' text-align:center;'></div>";
				
				
				var x = document.getElementById("table-div");
				x.innerHTML = html_text;

				var seller = document.createElement('iframe');
				seller.setAttribute('id','seller_frame');
				seller.style.display = "none";
				seller.style.scrolling = "no";
					
				
				var similar = document.getElementById('similar_div');
				similar.parentNode.insertBefore(seller,similar);
				var empty_para = document.getElementById('empty_para');
	
				similar.addEventListener("click", function () {

					if(document.getElementById('similar_id').innerHTML == "click to show similar items"){
						similar.innerHTML = "<p id='similar_id' style='margin-bottom:5px;'>click to hide similar items</p><img height=30px width=50px src='http://csci571.com/hw/hw6/images/arrow_up.png'></p>";
						document.getElementById("similar-table").style.display = "block";
						document.getElementById("seller_div").innerHTML ="<p id='seller_msg' style='margin-bottom:5px;'>click to show seller message</p><img height=30px width=50px src='http://csci571.com/hw/hw6/images/arrow_down.png'></p></div><br>";
						document.getElementById("seller_frame").style.display="none";

					}
					else{
						similar.innerHTML = "<p id='similar_id' style='margin-bottom:5px;'>click to show similar items</p><img height=30px width=50px src='http://csci571.com/hw/hw6/images/arrow_down.png'></p>";
						var x = document.getElementById('similar-table');
						x.style.display='none';

						
					}
				})

				seller_div.addEventListener("click", function(){
					if(document.getElementById('seller_msg').innerHTML=="click to show seller message"){
						seller_div.innerHTML ="<p id='seller_msg' style='margin-bottom:5px;'>click to hide seller message</p><img height=30px width=50px src='http://csci571.com/hw/hw6/images/arrow_up.png'></p></div><br>";
						var x = document.getElementById('seller_frame');
						x.style.display='block';
						document.getElementById("similar-table").style.display = "none";
						document.getElementById("similar_div").innerHTML = "<p id='similar_id' style='margin-bottom:5px;'>click to show similar items</p><img height=30px width=50px src='http://csci571.com/hw/hw6/images/arrow_down.png'></p>";
						
						x.style.width='100%';
						
						if(jsonObj.Item.Description==undefined || jsonObj.Item.Description=="" || jsonObj.Item.Description==" "){
							x.contentWindow.document.write("No seller message available");
						
						}
						else{

							x.contentWindow.document.write(jsonObj.Item.Description);
							x.style.height=x.contentWindow.document.body.scrollHeight + 'px';
						}

					}
					else{
						seller_div.innerHTML ="<p id='seller_msg' style='margin-bottom:5px;'>click to show seller message</p><img height=30px width=50px src='http://csci571.com/hw/hw6/images/arrow_down.png'></p></div><br>";
						var x = document.getElementById('seller_frame');
						x.style.display='none';

					}
				});

				}
				catch(err){
					html_text = '<div style=\' width:100%\'><p style=\'background-color:#E8E8E8; width:50%; text-align:center; margin:auto;\'> Detailed Information is not available</p></div>';
					var x = document.getElementById("table-div");
					x.innerHTML = html_text;
				}

				fillMyForm(keep_var);

			}
	

			function showSimilar(jsonObj, keep_var) {
				try{
					if(jsonObj.getSimilarItemsResponse.itemRecommendations.item == undefined || (jsonObj.getSimilarItemsResponse.itemRecommendations.item).length==0){
						document.getElementById("similar_table_div").innerHTML = "<table id='similar-table' style='display:none; overflow-x:scroll;' width='40%' align='center'><tr><td>No similar items available</td></tr></table>";	

					}

					else{
						var itemArray = jsonObj.getSimilarItemsResponse.itemRecommendations.item;

						similar_html_text="<table id='similar-table' style='display:none; overflow-x:scroll;' width='40%' align='center'><tr>";
						for(var i =0; i<itemArray.length; i++){

							similar_html_text+="<td style='padding:20px;'><img src='"+itemArray[i].imageURL+"'><br>";
							similar_html_text+="<a style='color:black; text-decoration:none;'href='productSearch.php?item_Id="+itemArray[i].itemId+"&sim_itemId="+itemArray[i].itemId+"'>"+itemArray[i].title+"</a></td>";
						}
						similar_html_text+="</tr><tr>";
						for(var i =0; i<itemArray.length; i++){
							similar_html_text+="<td style='padding:20px;'><b>$"+itemArray[i].buyItNowPrice.__value__+"</td>";
						}
						similar_html_text+="</tr></table>";
						document.getElementById("similar_table_div").innerHTML =  similar_html_text;
					}
				}

				catch(err){
					document.getElementById("similar_table_div").innerHTML = "<table id='similar-table' style='display:none; overflow-x:scroll;' width='40%' align='center'><tr><td>No similar items available</td></tr></table>";

				}

			}

       	</script>
		<?php 
			$keep_var = "";
		if(isset($_POST["submit"])){
			unset($_GET["item_Id"]);

			$search_url = "https://svcs.ebay.com/services/search/FindingService/v1?SECURITY-APPNAME=RuchikaN-stockapp-PRD-516de56b6-11545f8b&OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&RESPONSE-DATA-FORMAT=JSON&RESTPAYLOAD&paginationInput.entriesPerPage=20&HideDuplicateItems=true";
			$i=0;
			
			if(isset($_POST["keyword"])){
				$keys = explode(" ", $_POST["keyword"]);
				$url=$keys[0];
				for($j=1;$j<count($keys);++$j) {
					$url = $url."%20".$keys[$j];
				}
				$keep_var = $keep_var."#oldkeyword:".$_POST["keyword"];
				
				$search_url = $search_url."&keywords=".$url;
			}

			if(isset($_POST["miles"])){
				$keep_var = $keep_var."#oldmiles:".$_POST["miles"];

				if($_POST["miles"]==""){
					$search_url = $search_url."&itemFilter(".$i.").name=MaxDistance&itemFilter(".$i.").value=10";
				}
				else{
				$search_url = $search_url."&itemFilter(".$i.").name=MaxDistance&itemFilter(".$i.").value=".$_POST["miles"]."";
				}
				$i = $i + 1;
			}

			if(isset($_POST["category"])){
				$keep_var = $keep_var."#oldcategory:".$_POST["category"];
				if($_POST["category"]!=-1){
				$search_url = $search_url."&itemFilter(".$i.").name=categoryID&itemFilter(".$i.").value=".$_POST[category];
				$i = $i + 1;
				}
			}

			if(isset($_POST["shipping"])){
				$all_delivery = "";

				if(count($_POST["shipping"]>0)){

					foreach ($_POST["shipping"] as $delivery) {

							if($delivery=="LocalPickupOnly"){
								$keep_var=$keep_var."#oldlocalpick:true";
							}
							if($delivery=="FreeShippingOnly"){
								$keep_var=$keep_var."#oldfreeship:true";
							}

							$all_delivery = $all_delivery. "&itemFilter(".$i.").name=".$delivery."&itemFilter(".$i.").value=true";
							$i=$i+1;
		
					}
					$search_url = $search_url."".$all_delivery;


				}


			}

			if(isset($_POST["condition"])){

				if(count($_POST["condition"]>0)){
					$all_condition= "&itemFilter(".$i.").name=Condition";


					foreach ($_POST["condition"] as $checked) {
						if($checked=="New"){
							$keep_var = $keep_var."#oldnew:"."true";
						}
						if($checked=="Used"){
							$keep_var = $keep_var."#oldused:"."true";
						}
						if($checked == "Unspecified"){
								$keep_var = $keep_var."#oldunspecified:"."true";	
						}

				
						$all_condition = $all_condition."&itemFilter(".$i.").value=".$checked;

			
					}

					$search_url = $search_url."".$all_condition;
					$i=$i+1;
				}



			}




			if(isset($_POST["location"])){
				$keep_var = $keep_var."#oldnearby:"."true";
				$here = $_POST["myzipcode"];
				if(isset($_POST["from"])){
					if($_POST["from"]=="here"){
					$keep_var = $keep_var."#oldhere:"."true";

					$search_url = $search_url . "&buyerPostalCode=".$here;
					}

					if(isset($_POST["zip"])){
						$keep_var = $keep_var."#oldfromzip:"."true";
						$keep_var = $keep_var."#oldzipval:".$_POST["zip"];
				
						if (!preg_match("/^(\d{5})?$/",$_POST["zip"])) {

	     				 	echo "<script> document.getElementById('table-div').innerHTML='<div style=\' width:100%;\'><p style=\'background-color:#E8E8E8; width:50%; text-align:center; margin:auto;\'> Zip code is invalid </p></div>'</script>";
	     				 
	    				}
	    			
						else{
							$search_url = $search_url . "&buyerPostalCode=".$_POST["zip"];
						}

					}

				
				}		
			}


			if((!isset($_POST["zip"])) || ((isset($_POST["zip"])) && preg_match("/^(\d{5})?$/",$_POST["zip"]) ))	{
				$response = file_get_contents($search_url);
				$formdata = "oldkeyword:".$_GET["oldkeyword"]."#oldcategory:".$_GET["oldcategory"]."#oldnearby:".$_GET["oldnearby"]."#oldzip:".$_GET["oldzip"]."#oldzipval:".$_GET["oldzip"]."#oldlocalpick:".$_GET["oldlocalpick"]."#oldfreeship:".$_GET["oldfreeship"]."#oldnew:".$_GET["oldnew"]."#oldused:".$oldused = $_GET["oldused"]."#oldunspecified:".$_GET["oldunspecified"]."#oldmiles:".$_GET["oldmiles"];
	 
	 			echo "<script>showTable(".$response.",'".$keep_var."',"."1".")</script>";


			}	
			else{

				$response = file_get_contents($search_url);
				$formdata = "oldkeyword:".$_GET["oldkeyword"]."#oldcategory:".$_GET["oldcategory"]."#oldnearby:".$_GET["oldnearby"]."#oldzip:".$_GET["oldzip"]."#oldzipval:".$_GET["oldzip"]."#oldlocalpick:".$_GET["oldlocalpick"]."#oldfreeship:".$_GET["oldfreeship"]."#oldnew:".$_GET["oldnew"]."#oldused:".$oldused = $_GET["oldused"]."#oldunspecified:".$_GET["oldunspecified"]."#oldmiles:".$_GET["oldmiles"];
					 
				echo "<script>showTable(".$response.",'".$keep_var."',"."2".")</script>";



			}

		}
	

		if(isset($_GET["item_Id"])){

			$product_detail_url = "http://open.api.ebay.com/shopping?callname=GetSingleItem&responseencoding=JSON&appid=RuchikaN-stockapp-PRD-516de56b6-11545f8b&siteid=0&version=967&ItemID=".$_GET['item_Id']."&IncludeSelector=Description,Details,ItemSpecifics";
			$similar_url = "http://svcs.ebay.com/MerchandisingService?OPERATION-NAME=getSimilarItems&SERVICE-NAME=MerchandisingService&SERVICE-VERSION=1.1.0&CONSUMER-ID=RuchikaN-stockapp-PRD-516de56b6-11545f8b&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&itemId=".$_GET['item_Id']."&maxResults=8";

	       	$product_detail_json = file_get_contents($product_detail_url);

	       	$similar_json = file_get_contents($similar_url);

	       	$formdata = "#oldkeyword:".$_GET["oldkeyword"]."#oldcategory:".$_GET["oldcategory"]."#oldnearby:".$_GET["oldnearby"]."#oldzip:".$_GET["oldzip"]."#oldzipval:".$_GET["oldzip"]."#oldlocalpick:".$_GET["oldlocalpick"]."#oldfreeship:".$_GET["oldfreeship"]."#oldnew:".$_GET["oldnew"]."#oldused:".$oldused = $_GET["oldused"]."#oldunspecified:".$_GET["oldunspecified"]."#oldmiles:".$_GET["oldmiles"];
	      
	       	echo "<script> showdetail(".$product_detail_json.",'".$formdata."')</script>";
	       	echo "<script> showSimilar(".$similar_json.",'".$formdata."')</script>";


		}
		if(isset($_POST[sim_itemId])){
			$product_detail_url = "http://open.api.ebay.com/shopping?callname=GetSingleItem&responseencoding=JSON&appid=RuchikaN-stockapp-PRD-516de56b6-11545f8b&siteid=0&version=967&ItemID=".$_GET['sim_itemId']."&IncludeSelector=Description,Details,ItemSpecifics";
			echo $product_detail_url;
			$product_detail_json = file_get_contents($product_detail_url);
			echo "<script> showdetail(".$product_detail_json.",".$keep_var.")</script>";

		}

	

       ?>


       </div>

	</body>
</html>