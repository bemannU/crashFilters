<?php include("header.php");?>

<style>
    body{
        text-align:center;
    }

    .reportTitle{
        font-size:48pt;
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
    }
</style>

<h1 class="reportTitle">Report a Crash</h1>
<div id="message"></div>
<form id="crashForm">

<p1>Location</p1><br>
<input class="inputBoxes" type="number" id="locationID" name="locationID" required> <br><br>

<p1>Year (YYYY)</p1><br>
<input class="inputBoxes" type="number" id="year" name="year" required> <br><br>

<p1>Month (MM)</p1><br>
<input class="inputBoxes" type="number" id="month" name="month" required> <br><br>

<p1>Day (DD)</p1><br>
<input class="inputBoxes" type="number" id="day" name="day" required> <br><br>

<p1>Time</p1><br>
<input class="inputBoxes" type="time" id="time" name="time" required> <br><br>

<p1>Total Fatalities</p1><br>
<input class="inputBoxes" type="number" id="totalFats" name="totalFats" required><br><br>

<p1>Total Minor Injuries</p1><br>
<input class="inputBoxes" type="number" id="totalMI" name="totalMI" required><br><br>

<p1>Total Serious Injuries</p1><br>
<input class="inputBoxes" type="number" id="totalSI" name="totalSI" required><br><br>

<p1>Road Condition</p1><br>
<select class="inputBoxes" id ="roadSurface">
    <option value= "sealed">Sealed Road</option>
    <option value= "unsealed">Unsealed Road</option>
    <option value= "unknown">Unknown</option>
</select> <br><br>

<p1>Drugs Involved</p1><br>
<select class="inputBoxes" id ="drugsInvolved">
    <option value= "yes">Yes</option>
    <option value= "no">No</option>
    <option value= "unknown">Unknown</option>
</select> <br><br>

<p1>DUI Involved</p1><br>
<select class="inputBoxes" id ="duiInvolved">
    <option value= "yes">Yes</option>
    <option value= "no">No</option>
    <option value= "unknown">Unknown</option>
</select> <br><br>

<p1>Crash Type</p1><br>
<input class="inputBoxes" type="text" id="crashType" name="crashType" required><br><br>

<button class="reportButton" id="reportBtn"required>REPORT</button><br><br>

</form>

<script src="script.js"></script>