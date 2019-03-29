<!DOCTYPE html>
<html>

<head>
    <title>Sham Center Contacts</title>
    <link rel="stylesheet" type="text/css" href="Style/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
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
        <input type="text" name="id" id="IdBox" readonly>
        <br>
        <button type="submit" name="submit" formaction="Methodes\InsertData.php">Add</button>
        <button type="submit" name="Update" formaction="Methodes\UpdataData.php">Update</button>
        <button type="submit" name="Delete" formaction="Methodes\DeleteData.php">Delete</button>
        <button type="submit" name="PrintUser" onclick="Printuser()">Print User</button>
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
                
            }
        }
    ?>
    </table>

    <script>
        function selectedRowToInput() {
            var rIndex, table = document.getElementById("table");
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
            var Fname = document.getElementById("Fname").value;
            if (IdValue) {
                var blob = new Blob([Fname], {type : "text/plain; charset=utf-8"});
                saveAs(blob, "text.txt");

            } else {
                alert("PLZ SELECT USER");
            }
        }
        selectedRowToInput();

    </script>
</body>

</html>
