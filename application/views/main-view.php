<!DOCTYPE html>
<html lang="en">
	<head>
		<title>UPCAT 2014 Qualifiers</title>

		<link rel="stylesheet" href="<?=base_url()?>css/normalize.css">
		<link rel="stylesheet" href="<?=base_url()?>css/foundation.css">

		<script type="text/javascript" src="<?=base_url()?>js/vendor/modernizr.js"></script>
		<script type="text/javascript" src="<?=base_url()?>js/vendor/jquery.js"></script>
		<script type="text/javascript" src="<?=base_url()?>js/tablesorter/jquery.tablesorter.js"></script>

		<script type="text/javascript">
			$(document).ready(function()	{
				$('#form_submt').click(function()	{
					$('#search_frm').submit();
				});
			});
		</script>
	</head>
	<body>
		<div class="sticky">
			<nav class="top-bar" data-topbar>
				<ul class="title-area">
					<li class="name">
						<h1><a href="<?=base_url()?>">UPCAT 2014</a></h1>
					</li>
				</ul>
			</nav>
		</div>

		<div class="small-10 small-centered columns">
			<form id="search_frm" method="post" action="<?=base_url()?>main" role="form">
				<fieldset>
					<legend>Search</legend>
					<div class="row">
						<div class="small-3 columns">
							<label for="studentno_inpt" class="right inline">Student Number</label>
						</div>
						<div class="small-9 columns">
							<input type="text" id="studentno_inpt" name="studentno" placeholder="2XXX-XXXXX" />
						</div>
					</div>

					<div class="row">
						<div class="small-3 columns">
							<label for="name_inpt" class="right inline">Name</label>
						</div>
						<div class="small-9 columns">
							<input type="text" id="name_inpt" name="name" placeholder="Surname, Firstname Middlename" />
						</div>
					</div>

					<div class="row">
						<div class="small-3 columns">
							<label for="campus_inpt" class="right inline">Campus</label>
						</div>
						<div class="small-9 columns">
							<input type="text" id="campus_inpt" name="campus" placeholder="Diliman" />
						</div>
					</div>

					<div class="row">
						<div class="small-3 columns">
							<label for="degprog_inpt" class="right inline">Degree Program</label>
						</div>
						<div class="small-9 columns">
							<input type="text" id="degprog_inpt" name="degprog" placeholder="BS Computer Science" />
						</div>
					</div>

					<div class="row">
						<div class="small-12 columns">
							<a href="#" class="button radius right" id="form_submt">Search</a>
						</div>
					</div>
				</fieldset>
			</form>
		</div>

		<!--
		<div id="result_tbl" class="container-fluid col-md-10">
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
		-->

		<script type="text/javascript" src="<?=base_url()?>js/vendor/fastclick.js"></script>
		<script type="text/javascript" src="<?=base_url()?>js/foundation.min.js"></script>
		<script type="text/javascript">
			$(document).foundation();
		</script>
	</body>
</html>