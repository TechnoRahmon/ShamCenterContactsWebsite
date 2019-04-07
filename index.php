<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Sham Center Contacts</title>
    
    <style>
		
		.grid {
			
/*
			display: grid;
    grid-template-columns: 400px 1fr;
*/
			
			 -webkit-box-shadow: 3px 12px 29px 3px rgba(125,123,125,1);
-moz-box-shadow: 3px 12px 29px 3px rgba(125,123,125,1);
box-shadow: 3px 12px 29px 3px rgba(125,123,125,1);
			padding: 16px;
			 width: 50%;
  margin: 0 auto;
		}
	 input[type=password] {
  width: 70%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
border-radius: 10px;
}	
		
		#passwordBox {
				text-align: center;
		}
		
		.grid label {
			
			padding: 12px 20px;
  margin: 8px 0;

  box-sizing: border-box;
		}
		
		#img {
				
			text-align: center;
  margin: 24px 0 12px 0;
		}
		
	</style>
</head>

<body onload="">
  <div class="grid">
<div id="img"><img src="https://media.discordapp.net/attachments/352448837895585792/564386460573106231/image0.jpg?width=518&height=670" width="30%"></div>
   
   <div id="passwordBox">
    <input type="password" name="Passwordinputbox" id="Passwordinputbox" onchange="readFile()" placeholder="كلمة المرور" autocomplete="off">
       <label><b>:</b><b>كلمة المرور</b></label>
    <div type="text" class="Passbox" style="display : none"></div>
    </div>
    </div>


    <script type='text/javascript'>
        function readFile() {
            jQuery.get('Patches/SiPassword.txt', function(txt) {
                var password = document.getElementById('Passwordinputbox').value;
                if (password) {
                    if (password === txt) {
                        location.replace('http://lordofslomer-001-site1.itempurl.com/Main.php');
                    } else {
                        alert('كلمة المرور غير صحيحة');
                        location.reload();

                    }
                } else {
                    alert('Plz enter somthing');
                    location.reload();
                }
            });
        }

    </script>
</body>

</html>
