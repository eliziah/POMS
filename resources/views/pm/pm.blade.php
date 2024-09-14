@extends('template.main')
@section('title', 'Project Managers')
@section('content')

        
<style type="text/css">
    /*Now the CSS*/
* {margin: 0; padding: 0;}
.tree {
    display: flex;
    justify-content: center;
}
.tree ul {
    padding-top: 20px; position: relative;
    
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

.tree li {
    float: left; text-align: center;
    list-style-type: none;
    position: relative;
    padding: 20px 5px 0 5px;
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
    content: '';
    position: absolute; top: 0; right: 50%;
    border-top: 1px solid #ccc;
    width: 50%; height: 20px;
}
.tree li::after{
    right: auto; left: 50%;
    border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
    display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
    border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
    border-right: 1px solid #ccc;
    border-radius: 0 5px 0 0;
    -webkit-border-radius: 0 5px 0 0;
    -moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
    border-radius: 5px 0 0 0;
    -webkit-border-radius: 5px 0 0 0;
    -moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
    content: '';
    position: absolute; top: 0; left: 50%;
    border-left: 1px solid #ccc;
    width: 0; height: 20px;
}

.tree li a{
    border: 1px solid #ccc;
    padding: 5px 10px;
    text-decoration: none;
    color: #666;
    font-family: arial, verdana, tahoma;
    font-size: 18px;
    display: inline-block;
    background-color: white;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15) !important;
    
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
    background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
    border-color:  #94a0b4;
}
.img-org {
    height: 70px;
    width: 70px;
}
#pms_gantt {
    display: flex;
    justify-content: center;
}
/*Thats all. I hope you enjoyed it.
Thanks :)*/
</style>
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12 mt-3 text-center">
                        <h3><b>IPG PMO Organizational Chart</b></h3>
                    </div>
                    <div class="col-12">
                        <!--
                        We will create a family tree using just CSS(3)
                        The markup will be simple nested lists
                        -->
                        <div class="tree">
                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="row d-block pt-3 pl-3 pr-3">
                                            <div class="col-lg-12">
                                                <img src="/assets/dist/img/rod.jpg" class="img-org elevation-2 mb-2" alt="User Image">
                                            </div>
                                            <div class="col-lg-12">
                                                <b>Rod Eliziah Molina</b>
                                            </div>
                                            <div class="col-lg-12">
                                                <h6><b>IPG PMO Head</b><h6>
                                            </div>
                                        </div>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="row d-block pt-3 pl-3 pr-3">
                                                    <div class="col-lg-12">
                                                        <img src="/assets/dist/img/girl-avatar.jpg" class="img-org elevation-2 mb-2" alt="User Image">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <b>Maan Tandoc</b>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>maan@gmail.com</h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>CPI: <span class="text-danger">0.63</span></h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>SPI: <span class="text-warning">0.79</span></h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>Artifacts: <span class="text-warning">78%</span></h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="row d-block pt-3 pl-3 pr-3">
                                                    <div class="col-lg-12">
                                                        <img src="/assets/dist/img/girl-avatar.jpg" class="img-org elevation-2 mb-2" alt="User Image">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <b>Monik Mahusay</b>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>monik@gmail.com</h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>CPI: <span class="text-warning">0.78</span></h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>SPI: <span class="text-warning">0.79</span></h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>Artifacts: <span class="text-danger">68%</span></h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="row d-block pt-3 pl-3 pr-3">
                                                    <div class="col-lg-12">
                                                        <img src="/assets/dist/img/boy-avatar.png" class="img-org elevation-2 mb-2" alt="User Image">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <b>Iman Ramos</b>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>iman@gmail.com</h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>CPI: <span class="text-success">2.3</span></h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>SPI: <span class="text-warning">0.76</span></h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>Artifacts: <span class="text-warning">75%</span></h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="row d-block pt-3 pl-3 pr-3">
                                                    <div class="col-lg-12">
                                                        <img src="/assets/dist/img/boy-avatar.png" class="img-org elevation-2 mb-2" alt="User Image">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <b>Rodil Ramos</b>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>odi@gmail.com</h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>CPI: <span class="text-warning">0.79</span></h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>SPI: <span class="text-success">3.4</span></h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>Artifacts: <span class="text-danger">54%</span></h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="row d-block pt-3 pl-3 pr-3">
                                                    <div class="col-lg-12">
                                                        <img src="/assets/dist/img/girl-avatar.jpg" class="img-org elevation-2 mb-2" alt="User Image">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <b>Carol Dela Cruz</b>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>carol@gmail.com</h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>CPI: <span class="text-danger">0.63</span></h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>SPI: <span class="text-warning">0.79</span></h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>Artifacts: <span class="text-warning">78%</span></h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="row d-block pt-3 pl-3 pr-3">
                                                    <div class="col-lg-12">
                                                        <img src="/assets/dist/img/boy-avatar.png" class="img-org elevation-2 mb-2" alt="User Image">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <b>Louie Linag</b>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>louie@gmail.com</h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>CPI: <span class="text-secondary">0.00</span></h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>SPI: <span class="text-secondary">0.00</span></h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h6>Artifacts: <span class="text-secondary">00%</span></h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                        
                            </ul>
                        </div>
                    </div>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load("current", {packages:["timeline"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {

    var date = new Date("2024-03-13");
    console.log(typeof(date));

    var container = document.getElementById('pms_gantt');
    var chart = new google.visualization.Timeline(container);
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn({ type: 'string', id: 'Project Manager' });
    dataTable.addColumn({ type: 'string', id: 'Project Name' });
    dataTable.addColumn({ type: 'date', id: 'Start' });
    dataTable.addColumn({ type: 'date', id: 'End' });

    var pm_caps = @json($pm_capacity);
    var datarows = [];

    for (var i = pm_caps.length - 1; i >= 0; i--) {
        datarows.push([
            pm_caps[i][0],
            pm_caps[i][1],
            new Date(pm_caps[i][2]),
            new Date(pm_caps[i][3]),
        ]);
    }
    
    dataTable.addRows(datarows);


    var options = {
        timeline: { colorByRowLabel: true },

        avoidOverlappingGridLines: false
      };

    chart.draw(dataTable, options);

                        }
                        </script>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-12 mt-3 text-center">
                                <h3><b>IPG PMO Current Capacity</b></h3>
                            </div>
                            <div class="col-lg-12 mt-3 text-center">
                                <div id="pms_gantt" class="pl-5 pr-5" style="height: 600px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>

@endsection
