<?php include("header.php");?>


<style>
    body{
        overflow: hidden;
    }

    .title{
        font-size:48pt;
        font-family: Comucan;
        text-align: center;
    }

        @font-face {
        font-family: Comucan;
        src: url(Comucan.otf);
    }
    .chart{
        width: 70vw;
        position: absolute;
        right: 0px;
        top: 10vw;
    }
    .chartFilters{
        width: 400px;
        background: #262c3b;
        color: #a4aab1 ;

    }
</style>

<h1 class="title">Graphs</h1>

<div>
    <p>Sort By:</p>
    <select name="chartFilters" class="chartFilters" id="chartFilters">
        <option id="locationFilter" value="getLocationData">Location</option>
        <option id="crashTypeFilter" value="getCrashTypeData">Crash Type</option>
        <option id="drugsFilter" value="getDrugsData">Drugs Involved</option>
        <option id="duiFilter" value="getDUIData">DUI Involved</option>
    </select>
</div>

<div class="chart">
    <canvas id="myChart"></canvas>
</div>

<script src="graphs.js"></script>