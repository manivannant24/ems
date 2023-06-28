@extends('layouts.app')
@section('content')
    <style>
        .card {
            padding: 1.5em .5em .5em;
            border-radius: 2em;
            text-align: left;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        }

        .graph {
            margin: auto;

        }
    </style>
    <div class="card "style="background-color:wheat;">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <form>

                    <label for="fromdate">From Date</label>
                    <input type="date" id="fromdate" name="fromdate" value="<?php if (isset($_GET['fromdate'])) {
                        echo $_GET['fromdate'];
                    } ?>">
                    <label for="todate">To Date</label>
                    <input type="date" id="todate" name="todate" value="<?php if (isset($_GET['todate'])) {
                        echo $_GET['todate'];
                    } ?>">
                    <input type="submit" name="submit">
            </div>
        </div>
        </form>
    </div>
    </div>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <center><canvas id="chartId" aria-label="chart" height="350" width="580"></canvas></center>
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/helpers.esm.min.js"></script>

    <script>
        var chrt = document.getElementById("chartId").getContext("2d");
        var chartId = new Chart(chrt, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($date); ?>,
                datasets: [{
                    label: "Date Wise Visitors Count",

                    data: <?php echo json_encode($totaluser); ?>,
                    backgroundColor: ['skyblue'],
                    borderColor: ['blue'],
                    borderWidth: 2,
                    barPercentage: 0.25

                }],
            },
            options: {
                responsive: false,
            },
        });
    </script>

    <hr>


    <div class="container-flex">
        <div class="card">
            <h3 class="text-start px-4 mt-3 ">Total Login Details</h3>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead style="background-color:wheat;">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Total_Login</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($new as $data)
                                <tr>
                                    <td>{{ $data->namefromemail }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->totallogin }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="container-flex">
        <div class="card">
            <div class="card-body">
                <h4>Visitors Details Monthwise Table</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead style="background-color:wheat;">
                            <tr>
                                <th scope="col">Email</th>
                                <th scope="col">Jan</th>
                                <th scope="col">Feb</th>
                                <th scope="col">Mar</th>
                                <th scope="col">Apr</th>
                                <th scope="col">May</th>
                                <th scope="col">Jun</th>
                                <th scope="col">Jul</th>
                                <th scope="col">Aug</th>
                                <th scope="col">Sep</th>
                                <th scope="col">Oct</th>
                                <th scope="col">Nov</th>
                                <th scope="col">Dec</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dbdataforhome as $dt)
                                <tr>
                                    <td>{{ $dt->email }}</td>
                                    <td>
                                        @if ($dt->month == '01')
                                            <strong style="font-size: 20px;">{{ $dt->total_login }}</strong>
                                        @else
                                            *
                                    </td>
                            @endif
                            <td>
                                @if ($dt->month == '02')
                                    <strong style="font-size: 20px;">{{ $dt->total_login }}</strong>
                                @else
                                    *
                            </td>
                            @endif
                            <td>
                                @if ($dt->month == '03')
                                    <strong style="font-size: 20px;">{{ $dt->total_login }}</strong>
                                @else
                                    *
                            </td>
                            @endif
                            <td>
                                @if ($dt->month == '04')
                                    <strong style="font-size: 20px;">{{ $dt->total_login }}</strong>
                                @else
                                    *
                            </td>
                            @endif
                            <td>
                                @if ($dt->month == '05')
                                    <strong style="font-size: 20px;">{{ $dt->total_login }}</strong>
                                @else
                                    *
                            </td>
                            @endif
                            <td>
                                @if ($dt->month == '06')
                                    <strong style="font-size: 20px;">{{ $dt->total_login }}</strong>
                                @else
                                    *
                            </td>
                            @endif
                            <td>
                                @if ($dt->month == '07')
                                    <strong style="font-size: 20px;">{{ $dt->total_login }}</strong>
                                @else
                                    *
                            </td>
                            @endif
                            <td>
                                @if ($dt->month == '08')
                                    <strong style="font-size: 20px;">{{ $dt->total_login }}</strong>
                                @else
                                    *
                            </td>
                            @endif
                            <td>
                                @if ($dt->month == '09')
                                    <strong style="font-size: 20px;">{{ $dt->total_login }}</strong>
                                @else
                                    *
                            </td>
                            @endif
                            <td>
                                @if ($dt->month == '10')
                                    <strong style="font-size: 20px;">{{ $dt->total_login }}</strong>
                                @else
                                    *
                            </td>
                            @endif
                            <td>
                                @if ($dt->month == '11')
                                    <strong style="font-size: 20px;">{{ $dt->total_login }}</strong>
                                @else
                                    *
                            </td>
                            @endif
                            <td>
                                @if ($dt->month == '12')
                                    <strong style="font-size: 20px;">{{ $dt->total_login }}</strong>
                                @else
                                    *
                            </td>
                            @endif

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/helpers.esm.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
@endsection
