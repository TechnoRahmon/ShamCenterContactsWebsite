<!DOCTYPE html>
<html>

<head>
    <title>Sham Center Contacts</title>
    <link rel="stylesheet" type="text/css" href="Style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/FileSaver.js"></script>
</head>

<body>
    <form method="POST">
        <input type="text" name="FirstName" id="Fname" placeholder="Förenamn" autocomplete="off">
        <button id="Erase" onclick="EraseBoxes()">Erase</button>
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
        <button type="submit" name="submit" formaction="Methodes\InsertData.php">Add</button>
        <button type="submit" name="Update" onclick="CheckForUserId()" formaction="Methodes\UpdataData.php">Update</button>
        <button type="submit" name="Delete" onclick="CheckForUserId()" formaction="Methodes\DeleteData.php">Delete</button>
        <button type="button" name="PrintUser" onclick="Printuser()">Print User</button>
        <button type="button" name="PrintAll" onclick="Printall()">Print All</button>
    </form>


    <input type="text" id="SerachBox" onkeyup="SreachFilter()" placeholder="Sreach" autocomplete="off">

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
                echo "<tr><td>" . $Datas["Money"] .  "</td><td>" . $DateValues . "</td><td>" . $Datas["Email"] . "</td><td>" . $Datas["MobNum"] . "</td><td>" . $Datas["PostNum"] . "</td><td>" . $Datas["Adress"] . "</td><td>" . $Datas["PersNum"] . "</td><td>" . $Datas["LastName"] . "</td><td>" . $Datas["FirstName"] . $TnSidvar . $Datas["ContactID"] . "</td></tr>";
            }}
    ?>
    </table>

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
