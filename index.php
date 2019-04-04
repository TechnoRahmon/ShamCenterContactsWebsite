<!DOCTYPE html>
<html>

<head>
    <title>Sham Center Contacts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="Style/style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/FileSaver.js"></script>
</head>

<body>
  <div class="grid">
   <div class="sideA">
    <form  method="POST">
       <button id="Erase" onclick="EraseBoxes()">
		   <i class="fa fa-close"></i>Erase</button>
        <input type="text" name="FirstName" id="Fname" placeholder="Förenamn" autocomplete="off">
        
        <br>
        <input type="text" name="LastName" id="Lname" placeholder="Efternamn" autocomplete="off">
        <br>
        <input type="text" name="PersNum" id="PsNum" placeholder="Personnummer" autocomplete="off">
        <br>
        <input type="text" name="Adress" id="Adress" placeholder="Adress" autocomplete="off">
        <br>
        <input type="text" name="PostNum" id="PoNum" placeholder="Post Nummer" autocomplete="off">
        <br>
        <input type="text" name="MobNum" id="MbNum" placeholder="Mobil Nummer" autocomplete="off">
        <br>
        <input type="text" name="Email" id="Email" placeholder="E-mail" autocomplete="off">
        <br>
        <input type="date" name="Date" id="Date" value="<?php echo date('Y-m-d'); ?>">
        <br>
        <select type="text" name="Money" id="Money">
            <option value="0">0</option>
            <option value="50">50</option>
            <option value="75">75</option>
            <option value="100">100</option>
        </select>
        <br>
        <input type="text" name="id" id="IdBox" readonly style="display : none">
        <br>
        <button type="submit" name="submit" formaction="Methodes\InsertData.php">
        <i class="fa fa-plus" aria-hidden="true"></i>Add</button>
        <button type="submit" name="Update" onclick="CheckForUserId()" formaction="Methodes\UpdataData.php">
        <i class="fa fa-repeat" aria-hidden="true"></i>Update</button>
        <button type="submit" name="Delete" onclick="CheckForUserId()" formaction="Methodes\DeleteData.php"><i class="fa fa-trash"></i>Delete</button>
        <button type="button" name="PrintUser" onclick="Printuser()">
        <i class="fa fa-download" aria-hidden="true"></i>Print User</button>
        <button type="button" name="PrintAll" onclick="Printall()">
        <i class="fa fa-print" aria-hidden="true"></i>Print All</button>
    </form>
    </div>

<div class="sideB">
   <form id="searchB">
    <input type="text" id="SerachBox" onkeyup="SreachFilter()" placeholder="Sreach" autocomplete="off"> 
    </form>
  

    <table id="table" border="1">
      
        <tr>
            <th>Money</th>
            <th>Date</th>
            <th>Email</th>
            <th>MobNum</th>
            <th>PostNum</th>
            <th>Adress</th>
            <th>PersNum</th>
            <th>LastName</th>
            <th>FirstName</th>
            <th class="Std"></th>
        </tr>
<div>
        <?php 
        include_once 'db\connect.php';
               $sql = "SELECT * FROM shamcenter";
        $result = mysqli_query($conn, $sql);
        $Datas = array();
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $Datas = $row;
                $DateValues = date('Y-m-d',strtotime($Datas["Date"]));
                $TnSidvar = file_get_contents('Patches\TbSID.txt');
                echo "<tr><td>" . $Datas["Money"] .  "kr</td><td>" . $DateValues . "</td><td>" . $Datas["Email"] . "</td><td>" . $Datas["MobNum"] . "</td><td>" . $Datas["PostNum"] . "</td><td>" . $Datas["Adress"] . "</td><td>" . $Datas["PersNum"] . "</td><td>" . $Datas["LastName"] . "</td><td>" . $Datas["FirstName"] . $TnSidvar . $Datas["ContactID"] . "</td></tr>";
            }}
    ?>
   </div>
    </table>
     
    </div>
    </div>
    

    <script>
        function Printall() {
            var table = document.getElementById("table");
            var DataValues = "";
            for (var i = 1; i < table.rows.length; i++) {
                for (var j = 8; j >= 0; j--) {
                    DataValues += table.rows[i].cells[j].innerHTML + '\r\n';
                }
                DataValues += '\r\n'
            }
            var blob = new Blob([DataValues], {
                type: "text/plain; charset=utf-8"
            });
            saveAs(blob, "All-Sham-Center-Contacts.txt");
        }
        var rIndex, table = document.getElementById("table");

        function selectedRowToInput() {

            for (var i = 1; i < table.rows.length; i++) {
                table.rows[i].onclick = function() {
                    rIndex = this.rowIndex;
                    document.getElementById("IdBox").value = (this.cells[9].innerHTML);
                    document.getElementById("Fname").value = (this.cells[8].innerHTML);
                    document.getElementById("Lname").value = (this.cells[7].innerHTML);
                    document.getElementById("PsNum").value = (this.cells[6].innerHTML);
                    document.getElementById("Adress").value = (this.cells[5].innerHTML);
                    document.getElementById("PoNum").value = (this.cells[4].innerHTML);
                    document.getElementById("MbNum").value = (this.cells[3].innerHTML);
                    document.getElementById("Email").value = (this.cells[2].innerHTML);
                    document.getElementById("Date").value = (this.cells[1].innerHTML);
                    document.getElementById("Money").value = (this.cells[0].innerHTML);
                }
            }
        }
        selectedRowToInput();

        function EraseBoxes() {
            document.getElementById("Fname").value = " ";
            document.getElementById("Lname").value = " ";
            document.getElementById("PsNum").value = " ";
            document.getElementById("Adress").value = " ";
            document.getElementById("PoNum").value = " ";
            document.getElementById("MbNum").value = " ";
            document.getElementById("Email").value = " ";
            document.getElementById("Date").value = " ";
            document.getElementById("Money").value = " ";
        }


        function Printuser() {
            var IdValue = document.getElementById("IdBox").value;
            var NewLine = '\r\n';
            var Fname = document.getElementById("Fname").value;
            var Lname = document.getElementById("Lname").value;
            var PsNum = document.getElementById("PsNum").value;
            var Adress = document.getElementById("Adress").value;
            var PoNum = document.getElementById("PoNum").value;
            var MbNum = document.getElementById("MbNum").value;
            var Email = document.getElementById("Email").value;
            var Date = document.getElementById("Date").value;
            var Money = document.getElementById("Money").value;
            var AllValues = Fname + NewLine + Lname + NewLine + PsNum + NewLine + Adress + NewLine + PoNum + NewLine + MbNum + NewLine + Email + NewLine + Date + NewLine + Money;
            if (IdValue) {
                var blob = new Blob([AllValues], {
                    type: "text/plain; charset=utf-8"
                });
                saveAs(blob, Fname + "-" + Lname + "-Sham-Center-Contact.txt");

            } else {
                alert("PLZ SELECT USER");
            }
        }

        function CheckForUserId() {
            var IdValue = document.getElementById("IdBox").value;
            if (IdValue) {} else {
                alert("PLZ Select USER!!");
            }
        }

        function SreachFilter() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("SerachBox");
            filter = input.value.toUpperCase();
            table = document.getElementById("table");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                // Hide the row initially.
                tr[i].style.display = "none";

                td = tr[i].getElementsByTagName("td");
                for (var j = 0; j < td.length; j++) {
                    var cell = tr[i].getElementsByTagName("td")[j];
                    if (cell) {
                        if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        }
                    }
                }
            }

        }

        selectedRowToInput();


    </script>
</body>

</html>
