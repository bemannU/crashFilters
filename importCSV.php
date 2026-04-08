<?php include("header.php");?>
<style>
    body{
        text-align:center;
    }

    .title{
        font-size:20pt;
        font-family: Comucan;
    }

    .inputBoxes{
        width:40vw;
        background-color:#223;
        color:white;
    }

    .reportButton{
        width:20vw;
        height:5vw;
        background-color:#446;
        color:white;
        border-radius:20px;
        border-width:0;
        font-family: Comucan;
    }
        @font-face {
        font-family: Comucan;
        src: url(Comucan.otf);
    }
</style>
    <div class="container">
    <h1 class="title">Import Data from CSV</h1>
        <form id="csvForm" enctype="multipart/form-data">
            <label>Select CSV File:</label><br>
            <input type ="file" id="csvFile" accept=".csv" name="csvfile"/>
            </br><br>
            <input class="reportButton" type="submit" name="submit" value="Import"/>
        </form>
    </div>
    <script src="import.js"></script>
</body>
</html>