$topic=$lesson->readTopic($lessonId);
$count = $lesson->qRowCount($lessonId);
while($topicRow = $topic->fetch(PDO::FETCH_ASSOC)) {

$topicId = $topicRow['topicId'];
$topicName = $topicRow['topicName'];
$description = $topicRow['description'];
$videoUrl = $topicRow['videoUrl'];
echo $count;
