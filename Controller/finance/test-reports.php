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
// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// $pdf->Image('./saleslogo-final.png',40,30,80,0);
$pdf->SetFont('helvetica', '', 12);  
$pdf->AddPage(); //default A4
//$pdf->AddPage('P','A5'); //when you require custome page size 

if(isset($_POST['generate'])){
	$subject = $_POST['subject'];
	$month = $_POST['month'];
	$year = $_POST['year'];

	if($subject == 'Products'){

		$pdf->SetTitle("Product Report");
		$current_date = date('Y-m-d');

		$content = ''; 

		$content .= '
			<style>
			.hdpd{
				padding: 15px;
			  }
			</style>
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
			<th><b><br>Product</b><br></th>
			<th><b><br>Name</b></th>
			<th><b><br>Category</b></th>
			<th><b><br>Orders</b></th>
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
					<td><div><br>'.$thing['productCode'].'<br></div></td>
					<td><div><br>'.$thing['productName'].'</div></td>
					<td><div><br>'.$thing['productCategory'].'</div></td>
					<td><div><br>'.$thing['orders'].'</div></td>
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

	$pdf->SetTitle("Product Inventory Report");
	$current_date = date('Y-m-d');

		$content = ''; 

		$content .= '
			<style>
				.und{
					color : blue;
				}

			</style>
			<ul style="list-style-type: none;">
			<li style="margin-bottom: 35px;">SalesAchieved</li>
			<li>+94 076 178 2258</li>
			<li>www.SalesAchieved.com</li>
			<li>Date: '.$current_date.'</li>
			<li></li>
			</ul>
			<h4 align="center">Current Product Inventory<br><hr class="und"></h4>
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
					<td><br> '.$thing['productCode'].'<br> </td>
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

	$pdf->SetTitle("Sales Income Report");
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
			<h2 align="center"><u>Sales Income Statement</u></h2>
			<p></p>
			<table align="center">
				<tbody>
					<tr>
						<td colspan="3" align="left"><b>Sales By Products</b></td>
					</tr>
					<tr>
						<td colspan="3"></td>
					</tr>
				
			';

			$sql = "SELECT o.orderID, op.productCode, SUM(op.quantity * (p.sellingPrice - p.buyingPrice)) as totalRevenue
			FROM order_product op
			JOIN orders o ON o.orderID = op.orderID
			JOIN product p ON p.productCode = op.productCode
			WHERE o.orderStatus = 'Completed'
			GROUP BY p.productCode
			";	

			$query = mysqli_query($con, $sql);
			if(mysqli_num_rows($query) > 0 ){

				$total = 0;
				foreach($query as $thing){
					$total += $thing['totalRevenue'];
					$content .= '
					<tr>
						<td>'.$thing['productCode'].'</td>
						<td>--></td>
						<td>Rs. '.$thing['totalRevenue'].'</td>
					</tr>
					<tr>
						<td colspan="3"></td>
					</tr>
					';
				}

			}
			$content .= '
			<tr>
				<td colspan="3" align="left"><b>Sales By Sales Rep</b></td>
			</tr>
			<tr>
				<td colspan="3"></td>
			</tr>
			';
			$sql2 = "SELECT o.orderID, u.name, p.productCode, SUM(op.quantity * (p.sellingPrice - p.buyingPrice)) as totalSRevenue
			FROM order_product op
			JOIN orders o ON o.orderID = op.orderID
			JOIN product p ON p.productCode = op.productCode
			JOIN user u ON u.username = o.username
			WHERE o.orderStatus = 'Completed'
			GROUP BY u.name
			";

			$query2 = mysqli_query($con, $sql2);
			if(mysqli_num_rows($query2) > 0 ){

				foreach($query2 as $thing2){
					$content .= '
					<tr>
						<td>'.$thing2['name'].'</td>
						<td>--></td>
						<td>Rs. '.$thing2['totalSRevenue'].'</td>
					</tr>
					<tr>
						<td colspan="3"></td>
					</tr>
					';
				}

			}

			$content .= '
			<tr>
				<td colspan="3"><hr></td>
			</tr>
			<tr>
				<td>Total Sales Income</td>
				<td></td>
				<td>Rs. '.$total.'</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><hr></td>
			</tr>
			<tr>
				<td colspan="3"></td>
			</tr>
			<tr>
				<td>Expected Sales Income</td>
				<td></td>
				';
				$sql3 = "SELECT o.orderID, u.name, p.productCode, SUM(op.quantity * (p.sellingPrice - p.buyingPrice)) as totalSRevenue
				FROM order_product op
				JOIN orders o ON o.orderID = op.orderID
				JOIN product p ON p.productCode = op.productCode
				JOIN user u ON u.username = o.username
				";
				$query3 = mysqli_query($con, $sql3);
				if(mysqli_num_rows($query3) > 0 ){
	
					foreach($query3 as $thing3){
						$expectedRevenue = $thing3['totalSRevenue'];
					}
	
				}

				$content .= '
				<td>Rs. '.$expectedRevenue.'</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><hr></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><hr></td>
			</tr>
			</tbody>
			</table>';
}

elseif(isset($_POST['generateB'])){

	$pdf->SetTitle("Sales Forecast");
	$current_date = date('Y-m-d');
	$subject = $_POST['subject'];

		$content = ''; 

		$sql = "SELECT o.orderID, COUNT(DISTINCT MONTH(o.orderDate)) as months, o.orderStatus, op.productCode, SUM(op.quantity * (p.sellingPrice - p.buyingPrice)) as totalRevenue
		FROM order_product op
		JOIN orders o ON o.orderID = op.orderID
		JOIN product p ON p.productCode = op.productCode
		WHERE o.orderStatus = 'Completed' 
		";	

			$query = mysqli_query($con, $sql);
			if(mysqli_num_rows($query) > 0 ){
				foreach($query as $thing){
					$totalalesRevenue = $thing['totalRevenue'];
					$months = $thing['months'];
					$avgRev = round(($totalalesRevenue/$months),2);
				}
			}

		$content .= '
			<ul style="list-style-type: none;">
				<li style="margin-bottom: 35px;">SalesAchieved</li>
				<li>+94 076 178 2258</li>
				<li>www.SalesAchieved.com</li>
				<li>Date: '.$current_date.'</li>
				<li></li>
			</ul>
			<h3 align="center"><u>Sales Forecast For the Upcoming '.$subject.'</u></h3>
			<p></p>
			<table align="center">
			<tbody>
				<tr>
					<td>
						<b>Total Sales Revenue</b>
					</td>
					<td>
						RS. '.$totalalesRevenue.'
					</td>
				</tr>
				<tr>
					<td>
						
					</td>
					<td>
					     
					</td>
				</tr>
				<tr>
					<td>
						<b>Months</b>
					</td>
					<td>
					     '.$months.'
					</td>
				</tr>
				<tr>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<b>Average Sales Revenue</b>
					</td>
					<td>
						RS. '.$avgRev.'
					</td>
				</tr>
				<tr>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="2"><hr></td>
				</tr>
				<tr>
					<td>Sales Forecast for the next '.$subject.'</td>'
					; 
					if($subject === 'Quarter'){
						$Sales = $avgRev * 4;
					}
					else if($subject === 'Year')
						$Sales = $avgRev * (12 - date('n'));
					$content .='
					<td>RS. '.$Sales.'</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td><hr></td>
				</tr>
				<tr>
					<td></td>
					<td><hr></td>
				</tr>
			</tbody>';

			
			$content .= '</table>';
}


$pdf->writeHTML($content);

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Report.pdf', 'I');

?>