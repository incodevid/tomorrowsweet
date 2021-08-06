<tr class="shipping">
							<th>Ongkir(Ongkos Kirim)</th>
							<td>
							<div style="display:none;">
								<input type="text" id="id_ko" name="id_ko" value="11">
								<input type="text" id="koto" name="koto" value="11">
							</div>
							 <script type="text/javascript">
	        function kir() { 
	           	var	id = document.getElementById("id_ko").value,
		        	kota = document.getElementById("koto").value,
		        	para = "";

		       if ( id != "" ){
	         		para = "id="+id;
	         	}
	         	if ( kota != "" ){
	         		para = "kota="+kota;
	         	}


			   	if (window.XMLHttpRequest) {
		            // code for IE7+, Firefox, Chrome, Opera, Safari
		            xmlhttp = new XMLHttpRequest();
		        } else {
		            // code for IE6, IE5
		            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		        }
		        xmlhttp.onreadystatechange = function() {
		            if (this.readyState == 4 && this.status == 200) {
		                document.getElementById("radiong").innerHTML = this.responseText;
		            }
		        };
		        xmlhttp.open("GET","ongkir.php?"+para,true);
		        xmlhttp.send();
		    }
	    	
		</script>
							<div class="price" id='radiong'>
									
							</div>

<script type="text/javascript">
function radio(x){
	var h =  x.split("-");
	var hs = h[2];
document.getElementById('hongkir').value = hs;
hasil();
}
</script>
							<div style="display: none;">
								<input type="text" id="hongkir" name="hongkir" value="0">
							</div>
							</td>
						</tr>