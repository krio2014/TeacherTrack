<?Php
require 'studentObject.php';
require_once 'subjectObject.php';
require_once 'teacherObject.php';
//require 'addressObject.php';
//require 'addressObject.php';
require_once 'personObject.php';
require_once 'lessonObject.php';
echo '<pre>';
//$person1 = new person("adam","03/06/1987","328 worlemoor", "bs247ah","01275 400 650","07896983691","a@a.com");
//$student = new student("adam","03/06/1987","123 the road", "bs247ah","01275 400 652","07896983692","b@b.com");

//$subject = new subject();

//$var1 = $subject->getSubjectList();

//var_dump($var1);

//$student->addSubject("Maths",$var1);
//$student->addSubject("Maths1",$var1);
//$student->addSubject("History",$var1);
//$student->removeSubject("History");

//$es = $student->getEnrolledSubjects();
//var_dump($es);


//foreach($es as $subject)
//{
//    echo '<p>subject = '.$subject;
//}
//var_dump($es);



//$var = $subject->getSubjectList();

//var_dump($var);

//$subjectlist = $subject->getSubjectList();
//var_dump($subjectList);

//$student->addSubject("Maths",$subjectList);

//TESTING lesson Object

$teacher = new teacher("adam","03/06/1987","123 the road", "bs247ah","01275 400 652","07896983692","b@b.com");

//var_dump($teacher);

$lesson = new lesson();

$lesson->addLesson("maths","03/06/1987", $teacher);

//var_dump($lesson);
echo'</pre>';

?>

