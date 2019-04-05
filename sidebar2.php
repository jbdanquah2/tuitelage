<div id="mySidebar" class="sidebar">
    <br> <a style="font-size:16px; color:#999;" href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
    <br>
    <br> <a class="topic" href="lessonContent.php?lessonId=<?php echo $_SESSION['lessonId'] ?>">Overview</a>
    <?php

$topic=$lesson->readTopic($_SESSION['lessonId']);
while($topicRow = $topic->fetch(PDO::FETCH_ASSOC)) {

$topicId    = $topicRow['topicId'];
$topicName = $topicRow['topicName'];

echo '
<a class="topic" onclick="closeNav()" href="lesson-topic.php?topicId='.$topicId.'">'.$topicName.'</a>';

}
?> </div>
