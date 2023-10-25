<?php
require_once ( __DIR__ . '/../vendor/autoload.php' );

class Student {

  private $name;
  private $student_number;
  private $grade;
  private $course_list = array();

  // Consructor
  // param: $sn: Integer
  // param: $grade: Integer
  public function __construct( $student, $sn, $grade ) {
    $this->name = $student;
    $this->student_number = $sn;
    $this->grade = $grade;
  }


  // Returns student name
  public function getStudentName() {
    return $this->name;
  }


  // Returns student number
  public function getStudentNumber() {
    return $this->student_number;
  }


  // Returns student grade
  public function getStudentGrade() {
    return $this->grade;
  }


  // Add a course and mark to the list
  // param: $course_code: String
  // param: $section_number: Integer
  // param: $mark: Integer
  public function addCourse( $course_code, $section, $mark, $credit_count ) {
    array_push ( $this->course_list, array( $course_code."-".$section, $mark, $credit_count ) );
  }


  public function getAverage() {
    // find the average
    $course_list = array_filter($this->course_list);

    $mark_sum = 0;
    $credit_sum = 0;
    for ( $i = 0; $i < count($course_list); $i++ ) {
      if ( $course_list[$i][2] === 0 ) { // Change failed courses to a full credit for weighting average
        $course_list[$i][2] = 1;
      }
      if ( is_numeric( $course_list[$i][1] ) ) {
        $mark_sum += $course_list[$i][1] * $course_list[$i][2];
        $credit_sum += $course_list[$i][2];
      }
    }
    if ( $credit_sum > 0 ) {
      return round( $mark_sum / $credit_sum, 2 );
    } else {
      return 0;
    }

  }

  public function getCourseList() {
    $course_list = array_filter($this->course_list);

    $result = "";
    for ( $i = 0; $i < count($course_list); $i++ ) {
      $result = $result . $course_list[$i][0]." | ".$course_list[$i][1]." | ".$course_list[$i][2]."<br />";
    }

    return $result;

  }


}
