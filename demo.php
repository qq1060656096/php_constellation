<?php
include 'constellation.php';
// header('content-type:text/html;charset=utf-8;');
$year = date('Y');
$data = Constellation::getConstellationList();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Constellation</title>
<style type="text/css">
body{
	text-align: center;
}
table {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #a9c6c9;
	border-collapse: collapse;
	width: 96%;
	margin: 0 auto ;
}
table th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.oddcolor{
	background-color:#d4e3e5;
}
.evencolor{
	background-color:#c3dde0;
}
pre{
	color: #999;
}
span{
	font-weight: bold;
	color: #369;
}
</style>
</head>
<body>
<table>
<tr>
    <th>number</th>
    <th>id</th>
    <th>name</th>
    <th>
        start date
    </th>
    <th>
        end date
    </th>
    <th>
        start date demo data
    </th>
    <th>
        end date demo data
    </th>

    <th>
        start date+1 demo data
    </th>
    <th>
        end date+1 demo data
    </th>
    <th>
        start date-1 demo data
    </th>
    <th>
        end date-1 demo data
    </th>
</tr>
<?php
foreach ($data as $key => $row) :
    $start_date      = $year . '-' . $row['start_date'];
    $end_date   = $year . '-' . $row['end_date'];
    $return     = Constellation::getDateToConstellation( $start_date );
    $return0    = print_r($return, true);

    $return     = Constellation::getDateToConstellation( $end_date );
    $return1    = print_r($return, true);

    $start_date1= date('Y-m-d',strtotime('+1 day',strtotime($start_date) ) ) ;
    $return     = Constellation::getDateToConstellation( $start_date1 );
    $return_add0= print_r($return, true);

    $end_date1  = date('Y-m-d',strtotime('+1 day',strtotime($end_date) ) ) ;
    $return     = Constellation::getDateToConstellation( $end_date1 );
    $return_add1= print_r($return, true);

    $start_date_minus   = date('Y-m-d',strtotime('-1 day',strtotime($start_date) ) ) ;
    $return             = Constellation::getDateToConstellation( $start_date_minus );
    $return_minus0      = print_r($return, true);

    $end_date_minus     = date('Y-m-d',strtotime('-1 day',strtotime($end_date) ) ) ;
    $return             = Constellation::getDateToConstellation( $end_date_minus );
    $return_minus1      = print_r($return, true);

    $row_class  = $key % 2 ? 'oddcolor' : 'evencolor';
    echo <<<str
    <tr class="{$row_class}">
        <td>{$key}</td>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['start_date']}</td>
        <td>{$row['end_date']}</td>

        <td>
            <pre>Constellation::\ngetDateToConstellation("<span>{$start_date}</span>")\n{$return0}</pre>
        </td>
        <td>
            <pre>Constellation::\ngetDateToConstellation("<span>{$end_date}</span>")\n{$return1}</pre>
        </td>

        <td>
            <pre>Constellation::\ngetDateToConstellation("<span>{$start_date1}</span>")\n{$return_add0}</pre>
        </td>
        <td>
            <pre>Constellation::\ngetDateToConstellation("<span>{$end_date1}</span>")\n{$return_add1}</pre>
        </td>

        <td>
            <pre>Constellation::\ngetDateToConstellation("<span>{$start_date_minus}</span>")\n{$return_minus0}</pre>
        </td>
        <td>
            <pre>Constellation::\ngetDateToConstellation("<span>{$end_date_minus}</span>")\n{$return_minus1}</pre>
        </td>
    </tr>
str;
endforeach
;
?>
</table>
</body>
</html>