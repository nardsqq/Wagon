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
        <center><h2>TAITECH MARINE SALES AND SERVICES CORPORATION - VEHICLE REQUEST</h2></center>
        <br>
    </div>
    <table width="100%">
        <thead>
            <tr>
                <th class="text-center">Requesting Personnel</th>
                <th class="text-center">Travel Destination</th>
                <th class="text-center">Date of Departure</th>
                <th class="text-center">Date of Return</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">{{ $vehireq->pers->strPersFName }} {{ $vehireq->pers->strPersMName }} {{ $vehireq->pers->strPersLName }}</td>
                <td class="text-center">{{ $vehireq->strVehiReqLocation }}</td>
                <td class="text-center">{{ $vehireq->datDeparture->format('M. d, Y') }}</td>
                <td class="text-center">{{ $vehireq->datEstReturn->format('M. d, Y') }}</td>
            </tr>
        </tbody>
    </table>
    <div class="footer">
        <div class="col-md-6">
            Please return by: {{ $vehireq->datEstReturn->format('M. d, Y') }}<br>
            Approved by &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ______________________<br> 
        </div>
        <br>
        <br><br>
    </div>
</body>
</html>