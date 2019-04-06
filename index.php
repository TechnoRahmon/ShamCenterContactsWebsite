<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Sham Center Contacts</title>
</head>

<body onload="">
    <input type="password" name="Passwordinputbox" id="Passwordinputbox" onchange="readFile()" placeholder="كلمة المرور" autocomplete="off">
    <div type="text" class="Passbox" style="display : none"></div>


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
