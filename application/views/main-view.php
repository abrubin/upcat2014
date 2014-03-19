<!DOCTYPE html>
<html lang="en">
	<head>
		<title>UPCAT 2014 Qualifiers</title>

		<link rel="stylesheet" href="<?=base_url()?>stylesheets/bootstrap.css" type="text/css" />
		<link rel="stylesheet" href="<?=base_url()?>stylesheets/bootstrap-theme.css" type="text/css" />

		<script type="text/javascript" src="<?=base_url()?>scripts/jquery-2.0.3.js"></script>
		<script type="text/javascript" src="<?=base_url()?>scripts/bootstrap.js"></script>
		<script type="text/javascript" src="<?=base_url()?>scripts/tablesorter/jquery.tablesorter.js"></script>
		<script type="text/javascript">
			$(document).ready(function()	{
				$("#allstudents").tablesorter();
				$('#search_frm').tablesorter();
			});
		</script>

		<style type="text/css">
			#search_tbl	{
				padding: 10px;
			}
			#allstudents thead tr th 	{
				cursor: pointer;
			}
		</style>
	</head>
	<body>
		<div id="search_tbl" class="container col-md-2">
			<form id="search_frm" method="post" action="<?=base_url()?>main" role="form">
				<div class="form-group">
					<label for="studentno_inpt">Student Number</label>
					<input type="text" id="studentno_inpt" class="form-control" name="studentno" placeholder="2XXX-XXXXX">
				</div>
				<div class="form-group">
					<label for="name_inpt">Full Name</label>
					<input type="text" id="name_inpt" class="form-control" name="name" placeholder="Surname, Firstname Middlename">
				</div>
				<div class="form-group">
					<label for="campus_inpt">Campus</label>
					<input type="text" id="campus_inpt" class="form-control" name="campus" placeholder="Diliman">
				</div>
				<div class="form-group">
					<label for="degprog_inpt">Degree Program</label>
					<input type="text" id="degprog_inpt" class="form-control" name="degprog" placeholder="BS Computer Science">
				</div>
				<button type="submit" class="btn btn-primary">Search</button>
			</form>
		</div>

		<div id="result_tbl" class="container col-md-10">
			<table id="allstudents" class="tablesorter table table-striped">
				<thead>
					<tr>
						<th>Student Number</th>
						<th>Full Name</th>
						<th>Campus</th>
						<th>Degree Program</th>
					</tr>
				</thead>
				<tbody>
					<? if(!$students): ?>
						<tr>
							<td colspan="4" style="text-align: center;">No students found</td>
						</tr>
					<? else: ?>
						<? foreach($students as $student): ?>
							<tr>
								<td><?=$student['studentno']?></td>
								<td><?=$student['name']?></td>
								<td><?=$student['campus']?></td>
								<td><?=$student['degprog']?></td>
							</tr>
						<? endforeach ?>
					<? endif ?>
				</tbody>
			</table>
			<? if(isset($this->pagination)): ?>
				<?=$this->pagination->create_links()?>
			<? endif ?>
		</div>
	</body>
</html>