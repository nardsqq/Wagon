<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory Report | (Date)</title>
</head>
<body>
    <style>
        html, body {
            font-family: Arial, Helvetica, sans-serif;
        }
        body {
            margin: 1in;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .text-underline {
            text-decoration: underline;
        }
        table {
            table-layout: fixed;
            border-collapse: collapse;
        }
        table td {
            padding: 0 3px;
        }
    </style>
    
    <script>
            window.onload = function(){
                // window.focus();
                // window.print();
                // window.close();
            }
        </script>
</head>
<body>
    <h3 class="text-center">MARINE SALES AND SERVICES MANAGEMENT SYSTEM</h3>
    <center>Inventory Report</center>
    <br>
    <br>
    <br>
    (PRODUCT)
    <table border="1">
        <thead>
            <tr>
                <th style="width: 100px">Variant Name</th>
                <th style="width: 30px">Attrib1</th>
                <th style="width: 30px">Attrib2</th>
                <th style="width: 100px;">On-Hand(Start)</th>
                <th style="width: 100px;">In</th>
                <th style="width: 100px;">Out</th>
                <th style="width: 100px;">On-Hand(End)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>PRD-0001</td>
                <td>Value1</td>
                <td>Value2</td>
                <td>10</td>
                <td>5</td>
                <td>6</td>
                <td>9</td>
            </tr>
            <tr>
                <td>PRD-0002</td>
                <td>Value1</td>
                <td>Value3</td>
                <td>10</td>
                <td>5</td>
                <td>6</td>
                <td>9</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>20</td>
                <td>10</td>
                <td>12</td>
                <td>18</td>
            </tr>
        </tbody>
    </table>
</body>
</html>