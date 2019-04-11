 
 <html>  
      <head>  
           <title>Webslesson Tutorial | Insert and Display Images From Mysql Database in PHP</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
			<script src="fun.js"></script>
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;"> 
<table>	

  <?php  
			$district=$_POST['category'];
			$cons=$_POST['subcategory'];
			
                $connect = mysqli_connect("localhost", "root", "", "mydatabase"); 				 
                $query = "SELECT image,party,fullname FROM candidate WHERE (district='$district') AND (constituency='$cons')";  
                $result = mysqli_query($connect, $query) or die( mysqli_error($connect));;  
                while($row = mysqli_fetch_array($result))  
				{
			
                     echo '  <tr> 
					 <td>
									<button value="'.$row['party'].'" onclick="count(value)" id="click"><img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200" class="img-thumnail" /> </button>
									'.$row['fullname'].'
									<br/>
									'.$row['party'].'
									<hr/>
						</td>
						
</tr>						
   
                     ';  
                }
				

				
                ?> 

                </table>  
           </div>  
      </body>  
 </html>  
 <script>
function count(str) {
window.alert("Thank you for voting "+str);
window.location.href = "index.htm";
    if (str.length == 0) { 
        document.getElementById("click").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("click").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("POST", "counting1.php?q=" + str, true);
        xmlhttp.send();
	
    }
}
</script>


