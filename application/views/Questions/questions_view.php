<?php include_once('Lib/layout/header.php');?>

<center><h1>Questions</h1></center>
	<div class="container-fluid">
		<center>
			<p><a href = '<?php echo base_url('index.php/quiz/add_question_view'); ?>'>
				<span class = "btn btn-primary btn-lg">
					<span class="glyphicon glyphicon-plus"></span>
						Add New Question
				</span></a>
			<br></p>
		</center>
		<table class = "table table-striped"> <!--width = 700px class = "table" border=1px cellspacing=0 cellpadding=0-->
			<thead bgcolor = "#0080FF"> <!--align = "center" bgcolor = "green"-->
				<tr>
					<th>Question ID</th>
					<th>Question Index</th>
					<th>Question</th>
					<th>Answer</th>
					<th>Category</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($questiontab as $row):?>
					<tr>
						<td><?php echo $row->questionId ?></td>
						<td><?php echo $row->qIndex ?></td>
						<td><?php print_r(json_decode($row->qAndA, TRUE)["question"]) ?></td>
						<td>
							<?php foreach (json_decode($row->qAndA, TRUE)["answer"] as $key => $value):?> 
								<li><?php print_r(json_decode($row->qAndA, TRUE)["answer"][$key]); ?> </li>
							<?php endforeach ?>
						</td>
						<td><?php print_r(json_decode($row->qAndA, TRUE)["qCat"]) ?></td>
						<td>
							<a onclick = "return confirm('Do you wish to view selected question?')" href = "<?php echo base_url('index.php/quiz/questions_view/'.$row->questionId);?>">VIEW</a>
							<a onclick = "return confirm('Do you wish to delete selected question?')" href = "<?php echo base_url('index.php/questionnaire/delComplete/'.$row->questionId);?>">DELETE</a>
						</td>
					</tr>
				<?php endforeach;?>

			</tbody>
		</table>
	</div>
	
	<script type="text/javascript" src="<?php echo base_url('Lib/js/quiz.js')?>" ></script>
</body>
</html>