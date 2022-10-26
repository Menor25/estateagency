<?php
session_start();
// error_reporting(0);
include('includes/config.php');
include('includes/db.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/result.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka&family=Lobster&family=Roboto:wght@300;400&family=Sansita+Swashed:wght@300;400&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    
    <title>Result Sheet</title>
</head>
<body>
    <div class="document">
		<div class="row breadcrumb-div">
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="../admin/home"><i class="fa fa-home"></i> Home</a></li>
                </ul>
            </div>

    	</div>
        <div class="document-container">
            <div class="result-head">
			<?php
								
				$pin = $_POST['pin'];
				$class_name = $_POST['class_name'];
                $schoolTerm = $_POST['schoolTerm'];
				$_SESSION['pin'] = $pin;
				$_SESSION['class_name'] = $class_name;
                $_SESSION['schoolTerm'] = $schoolTerm;
				$qery = "SELECT * FROM student WHERE student.pin = '".$pin."' AND student.class_name = '".$class_name."' LIMIT 1";
				// echo $qery;
							
				$resultss = mysqli_query($conn, $qery);
				$cnt=1;
				if($resultss->num_rows > 0)
					{
						foreach($resultss as $row)
								{   ?>
                <div class="upper-head container">
                    <div class="title-img container">
                        <img src="./images/header.png" alt="">
                    </div>
                    <div class="header-item">
                        <div class="logo">
                            <img src="./images/fagslogo.png" alt="">
                        </div>
                        <div class="detail">
                            <h2>(secondary)</h2>
                            <h4>A Christian School with a Difference</h4>
                            <h4>21, Adesuwa Grammar School Road, G.R.A, Benin City, Edo State.</h4>
                            <h4>website: www.fagsportal.com; Email: info@fagsportal.com</h4>
                        </div>
                        <div class="st-img">
							<img src="<?=htmlentities($row['photo']);?>" alt="<?= htmlentities($row['first_name']);?> photo">
                        </div>
                    </div>
                    <div class="school-term">
                        <div>Report sheet for</div> 
                        <div class="term">3rd Term</div> 
                        <div>2021/2022</div> 
                        <div>Academic Session</div>
                    </div>
                </div>
                <div class="lower-head container">

                    <div class="col-50 st-info">
                        <p>Name: &nbsp;<span class="st_name"><?php echo htmlentities($row['first_name']); ?> <?php echo htmlentities($row['middle_name']) ?> <?php echo htmlentities($row['last_name']) ?></span></p>
                        <p style="margin-top: 2px;">Class:&nbsp;<span><?php echo htmlentities($row['class_name']); ?></span></p>
						<p style="margin-top: 2px;">Position:&nbsp;<span><input type="text" class="small-input"><sup><input type="text" class="small-input"></sup></span></p>
                    </div>
                    <div class="col-50 present">
                        <div class="no_of_student">
                            <p class="tb-title">Total no. of <br>school days</p>
                            <p class="no-st"><input type="text" class="head-input school-days"></p>
                        </div>
                        <div class="absent">
                            <p class="tb-title">Days <br>absent</p>
                            <p class="abs"><input type="text" class="head-input days-absent"></p>
                        </div>
                        <div class="next-term">
                            <p class="resumption">Next term begins</p>
                            <p class="date"><input type="text" class="head-input resumption"></p>
                        </div>
                    </div>
                </div>
				<?php
						}
					}
				?>
            </div>
            <div class="result-body container">
                <table style="background-color: #ffffff;">
				<?php
                    $currentTerm = $_SESSION['schoolTerm'];
					// Code for result



  


					$query ="SELECT t.first_name, t.middle_name, t.last_name, t.pin, t.class_name, t.school_term, t.first_test, t.second_test, t.exam_score, t.term_total, t.first_term_ratio, t.second_term_ratio, t.third_term_ratio, t.total_term_ratio, id, subject.subject_name
					FROM (SELECT sts.first_name, sts.middle_name, sts.last_name, sts.pin, sts.class_name, tr.school_term, tr.first_test, tr.second_test, tr.exam_score, tr.term_total, tr.first_term_ratio, tr.second_term_ratio, tr.third_term_ratio, tr.total_term_ratio, subject_name
					FROM student AS sts JOIN third_term_result AS tr ON tr.student_id = sts.student_id) AS t JOIN subject ON subject.subject_name = t.subject_name
					WHERE (t.pin = '".$pin."' AND t.class_name = '".$class_name."')";
					//echo $query;
					$results = mysqli_query($conn, $query);
					if($results->num_rows > 0)
					{ 
                       
						$grand_total = 0;
						$count = 0;

						while ($row = mysqli_fetch_array($results)) {
                            $schoolTerm = $row['school_term'];
                            if($currentTerm === $schoolTerm){
							$total = htmlentities($row['first_term_ratio']) + htmlentities($row['second_term_ratio']) + htmlentities($row['third_term_ratio']);
							$grand_total += (int)$total;
							$count++;
                        }else {echo "Selected school term is not valid";}

					?>

					<?php
						}
					}
					$average = $grand_total / $count;
					$remark = $average;
					$comment = $remark
					?>
                    <thead>
                        <tr>
                            <th width="30%" rowspan="2">SUBJECT(S)</th>
                            <th rowspan="2">1st TEST<br>(15)</th>
							<th rowspan="2">2nd TEST<br>(15)</th>
                            <th rowspan="2">EXAM<br>(70)</th>
                            <th rowspan="2">TERM<br>TOTAL</th>
                            <th colspan="5">CUMULATIVE RESULT</th>
                        </tr>
                        <tr class="no-border">
                            <th rowspan="2">1ST TERM<br/> RATIO</th>
                            <th rowspan="2">2ND TERM<br/> RATIO</th>
                            <th rowspan="2">3RD TERM<br/> RATIO</th>
                            <th rowspan="2">TOTAL</th>
                            <th>GRADE</th>
                            <th rowspan="2">SUBJECT<br/> POSITION</th>
                        </tr>
                    </thead>
					<?php
						// Code for result
						$query1 ="SELECT t.first_name, t.middle_name, t.last_name, t.pin, t.class_name, t.school_term, t.first_test, t.second_test, t.exam_score, t.term_total, t.first_term_ratio, t.second_term_ratio, t.third_term_ratio, t.total_term_ratio, id, subject.subject_name
                        FROM (SELECT sts.first_name, sts.middle_name, sts.last_name, sts.pin, sts.class_name, tr.school_term, tr.first_test, tr.second_test, tr.exam_score, tr.term_total, tr.first_term_ratio, tr.second_term_ratio, tr.third_term_ratio, tr.total_term_ratio, subject_name
                        FROM student AS sts JOIN third_term_result AS tr ON tr.student_id = sts.student_id) AS t JOIN subject ON subject.subject_name = t.subject_name
                        WHERE (t.pin = '".$pin."' AND t.class_name = '".$class_name."')";
						// echo $query;
						$resultss = mysqli_query($conn, $query1);
						if($resultss->num_rows > 0)
						{ 

							$id = 0;

							while ($row = mysqli_fetch_array($resultss)) {
                                $schoolTerm = $row['school_term'];
                                if($currentTerm === $schoolTerm){

								//$total = htmlentities($row['firstTestRatio']) + htmlentities($row['secondTestRatio']) + htmlentities($row['exam']);
								//$grade = $total;

								$id++;

						?>
                    <tbody>
                        <tr>
                            <td style="text-align: left; padding-left: 5px;"><?php echo $row['subject_name'] ?></td>
                            <td class="yellow"><?php echo $row['first_test'] ?></td>
							<td class="yellow"><?php echo $row['second_test'] ?></td>
                            <td class="yellow"><?php echo $row['exam_score'] ?></td>
                            <td class="yellow"><?php echo ceil($row['term_total']) ?></td>
                            <td><?php echo $row['first_term_ratio'] ?></td>
                            <td><?php echo $row['second_term_ratio'] ?></td>
                            <td><?php echo $row['third_term_ratio'] ?></td>
                            <td><?php echo ceil($row['total_term_ratio']) ?></td>
                            <td class="yellow">
								<?php 
									if (ceil($row['total_term_ratio']) < 29) {
											echo "F";
										} elseif (ceil($row['total_term_ratio']) >= 0 && ceil($row['total_term_ratio']) <= 29) {
											echo "E";
										} elseif (ceil($row['total_term_ratio']) >= 30 && ceil($row['total_term_ratio']) <= 49) {
											echo "D";
										} elseif (ceil($row['total_term_ratio']) >= 50 && ceil($row['total_term_ratio']) <= 59) {
											echo "C";
										} elseif (ceil($row['total_term_ratio']) >= 60 && ceil($row['total_term_ratio']) <= 79) {
											echo "B";
										} elseif (ceil($row['total_term_ratio']) >= 80 && ceil($row['total_term_ratio']) <= 100) {
											echo "A";
										} else {
											echo "Enter grade";
										} 
								?>
							</td>
                            <td></td>
							<?php
                             }else {echo "Selected school term is not valid";}
							}
						}
						?>
                        </tr>
                        <tr>
                            <td>TOTAL</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="grey">
                            <td>GRAND TOTAL</td>
                            <td class="yellow" colspan="4"><?php echo ceil($grand_total) ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
							<td></td>
							<td></td>
                            <td></td>
                        </tr>
                        <tr class="grey">
                            <td>AVERAGE</td>
                            <td class="yellow" colspan="4"><?php echo round($average, 1) ?>%</td>
                            <td></td>
                            <td></td>
                            <td></td>
							<td></td>
							<td></td>
                            <td></td>
                        </tr>
                    </tbody>
					
                </table>
            </div>
            <div class="result-footer container">
                <div class="grade">
                    <div class="grade-setup">
                        GRADE: 
                        <span>A = Excellent</span>
                        <span>B = Good</span>
                        <span>C = Average</span>
                        <span>D = Below Average</span>
                        <span>E = Poor</span>
                    </div>
                    <div class="grade-setup2">
                        <span>GRADE DETAILS: </span> 
                        <span>A (100-80)</span>
                        <span>B (79-60)</span>
                        <span>C (59-50)</span>
                        <span>D (49-30)</span>
                        <span>E (29-0)</span>
                    </div>
                </div>
                <div class="char-skill">
                    <div class="char">
                        <table>
                            <thead>
                                <tr>
                                    <th width="60%" class="left">CHARACTER DEVELOPMENT</th>
                                    <th>A</th>
                                    <th>B</th>
                                    <th>C</th>
                                    <th>D</th>
                                    <th>E</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Neat and orderly in work</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Neat in appearance</td>
                                    <td>
                                        
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Attentiveness</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Respect Authority</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Consider feelings of others</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="skill">
                        <table>
                            <thead>
                                <tr>
                                    <th width="60%" class="left">PRACTICAL SKILL</th>
                                    <th>A</th>
                                    <th>B</th>
                                    <th>C</th>
                                    <th>D</th>
                                    <th>E</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Handwriting</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Sports</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Computer Skills</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>French</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Art</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="school-comment">
                    <div class="comment-teacher">
					<?php
						function tcomment($comment)
						{

							if ($comment < 39) {
								echo "You are brilliant but you need to pay more attention in class to bring at the best in you";
							} elseif ($comment >= 39 && $comment <= 44) {
								echo "You are intelligent but works below you capacity due to lack of concentration in class";
							} elseif ($comment >= 44 && $comment <= 49) {
								echo "You are brilliant, you just need to focus more in your academic work";
							} elseif ($comment >= 49 && $comment <= 59) {
								echo "Good performance but you are capable of achieving a higher grade. Keep making progress";
							} elseif ($comment >= 59 && $comment <= 69) {
								echo "A good performance, you have showed progress in all academic areas, keep it up";
							} elseif ($comment >= 69 && $comment <= 100) {
								echo "An excellent performance, always interested in learning and listens attentively";
							} else {
								echo "Enter grade";
							}
						}

									?>
                        Teacher's Comment: <span><?php echo tcomment($comment) ?></span>
                    </div>
                    <div class="comment-principal">
						<?php
							global $comment;
							function comment($comment)
							{
								if ($comment < 39) {
									echo "Very poor performance. You need to sit up next term";
								} elseif ($comment >= 39 && $comment <= 44) {
									echo "Fair performance. You need to sit up seriously next term";
								} elseif ($comment >= 44 && $comment <= 49) {
									echo "There is a need for serious improvement";
								} elseif ($comment >= 49 && $comment <= 59) {
									echo "Good performance but you need to work harder";
								} elseif ($comment >= 59 && $comment <= 69) {
									echo "A good performance. There is room for more improvement";
								} elseif ($comment >= 69 && $comment <= 100) {
									echo "An excellent performance keep it up";
								} else {
									echo "Enter grade";
								}
							}
									?>
                         Principal's comment: <span><?php echo comment($comment) ?></span>
                        <div class="signature">
							<p class="principal-signature"><img src="images/pr.png" alt=""></p>
							<p class="principal-name">Pst. Mrs. Josephine Iyamu</p>
						</div>
                    </div>
                </div>
                <h3 class="footer-text">Raising future leaders</h3>
            </div>
        </div>
    </div>

    

</body>
</html>