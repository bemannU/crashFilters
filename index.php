<?php include("header.php");?>
<style>
    body{
        text-align:center;
    }

    .title{
        font-size:48pt;
        font-family: Comucan;
    }

        @font-face {
        font-family: Comucan;
        src: url(Comucan.otf);
    }
    .page button{
        padding: 10px;
    }
</style>
<h1 class="title">Total Crashes</h1>

<div class="container">
        <!-- <input type="text" id="search" onkeyup="searchPlayers()" placeholder="Search Players">
        <button class="button is-primary" onclick="getData('all')">Show All</button>
        <button class="button is-primary" onclick="getData('year')">Show Year 12</button> -->
        <table class="table is-bordered" id="dataOutput">
            <tr>
                <th>Crash ID</th>
                <th>Location ID</th>
                <th>Year</th>
                <th>Month</th>
                <th>Day</th>
                <th>Time</th>
                <th>Fatalities</th>
                <th>Minor Injuries</th>
                <th>Serious Injuries</th>
                <th>Road Surface</th>
                <th>Drugs Involved</th>
                <th>DUI Involved</th>
                <th>Crash Type</th>
            </tr>
        </table>
        <hr>
        
</div>
<div>
    <button id="prevButton" class="page button"><< prev</button>
    <button id="nextButton" class="page button">next >></button>
    <br>
</div>
        <script src="viewData.js"></script>
    </body>
</html>