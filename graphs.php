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
        width: 95vw;
        height: 40vw;
    }
</style>

<h1 class="title">Graphs</h1>

<div class="chart">
    <canvas id="myChart"></canvas>
</div>

<script src="graphs.js"></script>