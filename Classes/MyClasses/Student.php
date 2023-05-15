<?php
require_once ( __DIR__ . '/../vendor/autoload.php' );

class Student {

  private $student_number;
  private $grade;
  private $course_list = array();
  private $mark_list = array();

  // Consructor
  // param: $sn: Integer
  // param: $grade: Integer
  public function __construct( $sn, $grade ) {
    $this->student_number = $sn;
    $this->grade = $grade;
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
  public function addCourse( $course_code, $section, $mark ) {
    array_push ( $this->course_list, $course_code."-".$section );
    array_push ( $this->mark_list, $mark );
  }


  public function getAverage() {
    // find the average

    return $average;
  }


}
