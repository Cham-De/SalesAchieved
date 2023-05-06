<?php

require '../../Model/db-con.php';
require_once('../../TCPDF-main/tcpdf.php');

$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);  
//$pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$pdf->SetDefaultMonospacedFont('helvetica');  
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
$pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
$pdf->setPrintHeader(false);  
$pdf->setPrintFooter(false);  
$pdf->SetAutoPageBreak(TRUE, 10);  
$pdf->SetFont('helvetica', '', 12);  
$pdf->AddPage(); //default A4
//$pdf->AddPage('P','A5'); //when you require custome page size 

if(isset($_POST['generate'])){
	$subject = $_POST['subject'];
	$month = $_POST['month'];
	$year = $_POST['year'];

	if($subject == 'Products'){
		$current_date = date('Y-m-d');

		$content = ''; 

		$content .= '
			<ul style="list-style-type: none;">
			<li style="margin-bottom: 35px;">SalesAchieved</li>
			<li>+94 076 178 2258</li>
			<li>www.SalesAchieved.com</li>
			<li>Date: '.$current_date.'</li>
			<li></li>
			</ul>
			<h4 align="center">'.$subject.' Performance</h4>
			<h5 align="center">(For the month of '.$month.', '.$year.')</h4>
			<p></p>
			<table align="center" border="1px solid black">
			<thead>
			<tr>
			<th><b>Product</b></th>
			<th><b>Name</b></th>
			<th><b>Category</b></th>
			<th><b>Orders</b></th>
			</tr>
			</thead>';

			$sql = "SELECT DISTINCT p.productCode, SUM(o.quantity) as orders, p.productCategory, p.productName, orders.orderDate
			FROM order_product o 
			JOIN product p ON o.productCode = p.productCode
			JOIN orders ON o.orderID = orders.orderID
			WHERE MONTH(STR_TO_DATE(orders.orderDate, '%Y-%m-%d')) = MONTH(STR_TO_DATE(CONCAT('$year-', '$month', '-01'), '%Y-%M-%d'))
			AND YEAR(STR_TO_DATE(orders.orderDate, '%Y-%m-%d')) = '$year' 
			GROUP BY p.productCode, p.productCategory
			ORDER BY orders DESC;
			";	

			$query = mysqli_query($con, $sql);
			if(mysqli_num_rows($query) > 0 ){

				foreach($query as $thing){
					$content .= '
					<tr>
					<td>'.$thing['productCode'].'</td>
					<td>'.$thing['productName'].'</td>
					<td>'.$thing['productCategory'].'</td>
					<td>'.$thing['orders'].'</td>
					</tr>
					';
				}
			}
			$content .= '</table>';
	}
	elseif($subject == 'Sales'){
		$content = ''; 

		$content .= '
		<ul style="list-style-type: none;">
		<li style="margin-bottom: 35px;">SalesAchieved</li>
		<li>+94 076 178 2258</li>
		<li>www.SalesAchieved.com</li>
		<li>Date: sales</li>
		<li></li>
		</ul>
		<h4 align="center">'.$subject.' Performance</h4>
		<h5 align="center">(For the month of '.$month.', '.$year.')</h4>
		<p></p>
		<table align="center" border="1px solid black">
		<thead>
		<tr>
		<th><b>Product</b></th>
		<th><b>Name</b></th>
		<th><b>Category</b></th>
		<th><b>Orders</b></th>
		</tr>
		</thead>';

		$sql = "SELECT DISTINCT p.productCode, SUM(o.quantity) as orders, p.productCategory, p.productName, orders.orderDate
		FROM order_product o 
		JOIN product p ON o.productCode = p.productCode
		JOIN orders ON o.orderID = orders.orderID
		WHERE MONTH(STR_TO_DATE(orders.orderDate, '%Y-%m-%d')) = MONTH(STR_TO_DATE(CONCAT('$year-', '$month', '-01'), '%Y-%M-%d'))
		AND YEAR(STR_TO_DATE(orders.orderDate, '%Y-%m-%d')) = '$year' 
		GROUP BY p.productCode, p.productCategory
		ORDER BY orders DESC;
		";	

		$query = mysqli_query($con, $sql);
		if(mysqli_num_rows($query) > 0 ){

			foreach($query as $thing){
				$content .= '
				<tr>
				<td>'.$thing['productCode'].'</td>
				<td>'.$thing['productName'].'</td>
				<td>'.$thing['productCategory'].'</td>
				<td>'.$thing['orders'].'</td>
				</tr>
				';
			}
		}
		$content .= '</table>';
	}
	

}
elseif(isset($_POST['generateI'])){
	$current_date = date('Y-m-d');

		$content = ''; 

		$content .= '
			<ul style="list-style-type: none;">
			<li style="margin-bottom: 35px;">SalesAchieved</li>
			<li>+94 076 178 2258</li>
			<li>www.SalesAchieved.com</li>
			<li>Date: '.$current_date.'</li>
			<li></li>
			</ul>
			<h4 align="center">Product Inventory In Detail</h4>
			<p></p>
			<table align="center" border="1px solid black">
			<thead>
			<tr>
			<th><b>Product Code</b></th>
			<th><b>Name</b></th>
			<th><b>Category</b></th>
			<th><b>Expected Profit</b></th>
			<th><b>Available Quantity</b></th>
			</tr>
			</thead>';

			$sql = "SELECT *, (sellingPrice - buyingPrice) AS profit FROM product";	

			$query = mysqli_query($con, $sql);
			if(mysqli_num_rows($query) > 0 ){

				foreach($query as $thing){
					$content .= '
					<tr>
					<td>'.$thing['productCode'].'</td>
					<td>'.$thing['productName'].'</td>
					<td>'.$thing['productCategory'].'</td>
					<td>'.$thing['profit'].'</td>
					<td>'.$thing['count'].'</td>
					</tr>
					';
				}
			}
			$content .= '</table>';
}

elseif(isset($_POST['generateIn'])){
	$current_date = date('Y-m-d');

		$content = ''; 

		$content .= '
			<ul style="list-style-type: none;">
			<li style="margin-bottom: 35px;">SalesAchieved</li>
			<li>+94 076 178 2258</li>
			<li>www.SalesAchieved.com</li>
			<li>Date: '.$current_date.'</li>
			<li></li>
			</ul>
			<h4 align="center">Income Statement</h4>
			<h5 align="center">For the Year Ended 2022</h5>
			<p></p>
			<table align="center" border="1px solid black">
			<thead>
			<tr>
			<th><b>Product Code</b></th>
			<th><b>Name</b></th>
			<th><b>Category</b></th>
			<th><b>Expected Profit</b></th>
			<th><b>Available Quantity</b></th>
			</tr>
			</thead>';

			$sql = "SELECT *, (sellingPrice - buyingPrice) AS profit FROM product";	

			$query = mysqli_query($con, $sql);
			if(mysqli_num_rows($query) > 0 ){

				foreach($query as $thing){
					$content .= '
					<tr>
					<td>'.$thing['productCode'].'</td>
					<td>'.$thing['productName'].'</td>
					<td>'.$thing['productCategory'].'</td>
					<td>'.$thing['profit'].'</td>
					<td>'.$thing['count'].'</td>
					</tr>
					';
				}
			}
			$content .= '</table>';
}

elseif(isset($_POST['generateB'])){
	$current_date = date('Y-m-d');
	$subject = $_POST['subject'];

		$content = ''; 

		$content .= '
			<ul style="list-style-type: none;">
			<li style="margin-bottom: 35px;">SalesAchieved</li>
			<li>+94 076 178 2258</li>
			<li>www.SalesAchieved.com</li>
			<li>Date: '.$current_date.'</li>
			<li></li>
			</ul>
			<h4 align="center">Budget Forecast</h4>
			<h5 align="center">For the Upcoming '.$subject.'</h5>
			<p></p>
			<table align="center" border="1px solid black">
			<thead>
			<tr>
			<th><b>Product Code</b></th>
			<th><b>Name</b></th>
			<th><b>Category</b></th>
			<th><b>Expected Profit</b></th>
			<th><b>Available Quantity</b></th>
			</tr>
			</thead>';

			$sql = "SELECT *, (sellingPrice - buyingPrice) AS profit FROM product";	

			$query = mysqli_query($con, $sql);
			if(mysqli_num_rows($query) > 0 ){

				foreach($query as $thing){
					$content .= '
					<tr>
					<td>'.$thing['productCode'].'</td>
					<td>'.$thing['productName'].'</td>
					<td>'.$thing['productCategory'].'</td>
					<td>'.$thing['profit'].'</td>
					<td>'.$thing['count'].'</td>
					</tr>
					';
				}
			}
			$content .= '</table>';
}


$pdf->writeHTML($content);

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

?>