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
				$('#allstudents').tablesorter();
				$('#form_submt-small').click(function()	{
					$('#search_frm-small').submit();
				});
				$('#form_submt-medium').click(function()	{
					$('#search_frm-medium').submit();
				});
				$('#form_submt-large').click(function()	{
					$('#search_frm-large').submit();
				});
			});
		</script>

		<style type="text/css">
			html, body, body > .page, .off-canvas-wrap 	{
				height: 100%;
			}
			.off-canvas-wrap	{
				overflow-y: scroll;
			}
			.inner-wrap	{
				min-height: 100%
			}
			#allstudents	{
				width: 100%
			}
			thead, th 	{
				cursor: pointer;
			}
		</style>
	</head>
	<body class="antialiased hide-extras">
		<div class="page">
			<div class="off-canvas-wrap">
				<div class="inner-wrap">
					<nav class="top-bar hide-for-small" data-topbar>
						<ul class="title-area">
							<li class="name">
								<h1><a href="<?=base_url()?>">UPCAT 2014</a></h1>
							</li>
						</ul>
					</nav>

					<nav class="tab-bar show-for-small">
						<section class="left-small">
							<a class="left-off-canvas-toggle menu-icon"><span></span></a>
						</section>
						<section class="middle tab-bar-section">
							<h1 class="title">UPCAT 2014</h1>
						</section>
					</nav>

					<aside class="left-off-canvas-menu">
						<form id="search_frm-small" method="post" action"<?=base_url()?>main" role="form">
							<ul class="off-canvas-list">
								<li><label>Search</label></li>
								<li><input type="text" id="studentno_inpt" name="studentno" placeholder="Student Number" /></li>
								<li><input type="text" id="name_inpt" name="name" placeholder="Full Name" /></li>
								<li><input type="text" id="campus_inpt" name="campus" placeholder="Campus" /></li>
								<li><input type="text" id="degprog_inpt" name="degprog" placeholder="Degree Program" /></li>
								<li><a href="#" class="button radius middle" id="form_submt-small">Search</a></li>
							</ul>
						</form>
					</aside>

					<a class="exit-off-canvas"></a>

					<section class="main-section scroll-container">
						<div class="row">
							<div class="show-for-large large-4 columns">
								<form id="search_frm-large" method="post" action="<?=base_url()?>main" role="form">
									<fieldset>
										<legend>Search</legend>
										<div class="row">
											<label>
												Student Number
												<input type="text" placeholder="2XXX-XXXXX" name="studentno" />
											</label>
										</div>
										<div class="row">
											<label>
												Name
												<input type="text" placeholder="Last, First Middle" name="name" />
											</label>
										</div>
										<div class="row">
											<label>
												Campus
												<input type="text" placeholder="Diliman" name="campus" />
											</label>
										</div>
										<div class="row">
											<label>
												Degree Program
												<input type="text" placeholder="BS Computer Science" name="degprog" />
											</label>
										</div>
										<div class="row">
											<a href="#" class="button radius" id="form_submt-large">Search</a>
										</div>
									</fieldset>
								</form>
							</div>

							<div class="show-for-medium columns">
								<form id="search_frm-medium" method="post" action="<?=base_url()?>main" role="form">
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
												<a href="#" class="button radius right" id="form_submt-medium">Search</a>
											</div>
										</div>
									</fieldset>
								</form>
							</div>

							<div class="large-8 columns">
								<table id="allstudents" class="tablesorter">
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
									<div class="medium-7 medium-centered columns">
										<?=$this->pagination->create_links()?>
									</div>
								<? endif ?>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="<?=base_url()?>js/vendor/fastclick.js"></script>
		<script type="text/javascript" src="<?=base_url()?>js/foundation.min.js"></script>
		<script type="text/javascript">
			$(document).foundation();
		</script>
	</body>
</html>