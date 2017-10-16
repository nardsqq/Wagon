<!DOCTYPE html>
<html>
<head>
    <title>TAITECH MARINE SALES AND SERVICES CORPORATION - Vehicle Request Form</title>
</head>
    <style type="text/css">
        @page{
            margin-top: 1cm;
            margin-bottom: 0.25cm;
        }
        body{
            font-family: "SegoeUI","Sans-serif";
            font-size: 12px;
        }
        .header{
            font-size: 20px!important;
        }
        .page-break {
            page-break-after: always;
        }
        .center{
            text-align: center;
        }
        .col-md-12{
            width: 100%;
        }
        .col-md-6{
            width: 50%;
        }
        .border{
            border: 1px solid black;
        }
        .space {
            padding: 1px;
        }
        .text-center{
            text-align: center;
        }
        table{
            clear: both;
            border: 1px solid black
        }
        tbody tr{
            border: 1px solid black;
        }
        tr:nth-child(even) {
            background-color: #e6e6e6
        }
        thead th{
            background-color: black;
            color: white;
        }
        .footer{
            position: absolute;
            bottom: 0;
        }
        .footerd{
            font-size: 0.8em;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
<body>
    <div style="float:left">
        <center><h1>TAITECH MARINE SALES AND SERVICES CORPORATION VEHICLE REQUEST FORM</h1></center>
        <br>
    </div>
    <br>
    <br>
    <h2>REQUESTING PERSONNEL: <span style="float: right;">{{ $vehireq->pers->strPersLName }}, {{ $vehireq->pers->strPersFName }} {{ $vehireq->pers->strPersMName }}</span></h2>
    <h2>CONTACT DETAIL: <span style="float: right;">{{ $vehireq->pers->strPersMobNo }}</span></h2>
    <br>
    <table width="100%">
        <thead>
            <tr>
                <th class="text-center">Travel Destination</th>
                <th class="text-center">Date of Departure</th>
                <th class="text-center">Estimated Date of Return</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">{{ $vehireq->strVehiReqLocation }}</td>
                <td class="text-center">{{ $vehireq->datDeparture->format('M. d, Y') }}</td>
                <td class="text-center">{{ $vehireq->datEstReturn->format('M. d, Y') }}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <div>
        <h2>Reason or Purpose of Request:</h2>
        <div class="border">
            <h4 class="text-center">{{ $vehireq->txtVehiReqPurpose }}</h4>
        </div>
    </div>
    <div class="footer">
    </div>
</body>
</html>