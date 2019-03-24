<!DOCTYPE html>
<html>

<head>
    <title>Sham Center Contacts</title>
    <style>
        td:hover {
            background-color: #f5f5f5;
            cursor: pointer;
        }

        td.Std,
        th.Std {
            border: none;
            color: transparent;
            width: 0px;
            position: absolute;
        }

        td.FixDateCol {}

    </style>
</head>

<body>
    <form method="POST">
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
        <input type="date" name="Date" id="Date">
        <br>
        <select type="text" name="Money" id="Money">
            <option value="0">0</option>
            <option value="50">50</option>
            <option value="75">75</option>
            <option value="100">100</option>
        </select>
        <br>
        <input type="text" name="id" id="IdBox" readonly style="display: none">
        <br>
        <button type="submit" name="submit" formaction="Methodes\InsertData.php">Add</button>
        <button type="submit" name="Update" formaction="Methodes\UpdataData.php">Update</button>
        <button type="submit" name="Delete" formaction="Methodes\DeleteData.php">Delete</button>
    </form>

    <table id="table" border="1">
        <tr>
            <th class="Std"></th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>PersNum</th>
            <th>Adress</th>
            <th>PostNum</th>
            <th>MobNum</th>
            <th>Email</th>
            <th>Date</th>
            <th>Money</th>
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
                echo $TnSidvar . $Datas["ContactID"] .  "</td><td>" . $Datas["FirstName"] . "</td><td>" . $Datas["LastName"] . "</td><td>" . $Datas["PersNum"] . "</td><td>" . $Datas["Adress"] . "</td><td>" . $Datas["PostNum"] . "</td><td>" . $Datas["MobNum"] . "</td><td>" . $Datas["Email"] . "</td><td>" . $DateValues . "</td><td>" . $Datas["Money"] . "</td></tr>";
                
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
                    document.getElementById("IdBox").value = (this.cells[0].innerHTML);
                    document.getElementById("Fname").value = (this.cells[1].innerHTML);
                    document.getElementById("Lname").value = (this.cells[2].innerHTML);
                    document.getElementById("PsNum").value = (this.cells[3].innerHTML);
                    document.getElementById("Adress").value = (this.cells[4].innerHTML);
                    document.getElementById("PoNum").value = (this.cells[5].innerHTML);
                    document.getElementById("MbNum").value = (this.cells[6].innerHTML);
                    document.getElementById("Email").value = (this.cells[7].innerHTML);
                    document.getElementById("Date").value = (this.cells[8].innerHTML);
                    document.getElementById("Money").value = (this.cells[9].innerHTML);
                }
            }
        }
        selectedRowToInput();

    </script>
</body>

</html>
