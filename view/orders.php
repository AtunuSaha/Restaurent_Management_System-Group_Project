
<?php $TITLE = "Orders"; include "./partials/header.php"; ?>

<div class="order-page">
	<h3>Orders</h3>
</div>

<style>
	table {
	  border-collapse: collapse;
	  width: 100%;
	}
	
	th, td {
	  text-align: left;
	  padding: 8px;
	}
	
	tr:nth-child(even){background-color: #f2f2f2}
	
	th {
	  background-color: #484C94;
	  color: white;
	}
	</style>
	</head>
	<body>
	
	
	<table>
	  <tr>
		<th>OrderID</th>
		<th>Customer Name</th>
		<th>Price</th>
	  </tr>
	  <tr>
		<td>ck005</td>
		<td>Griffin</td>
		<td>$10</td>
	  </tr>
	  <tr>
		<td>ck006</td>
		<td>Griffin</td>
		<td>$15</td>
	  </tr>
	  <tr>
		<td>ck007</td>
		<td>Swanson</td>
		<td>$30</td>
	  </tr>
	  <tr>
		<td>ck008</td>
		<td>Brown</td>
		<td>$25</td>
	</tr>
	</table>