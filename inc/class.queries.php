<?php

class Queries extends Essential {


    public static function myq1query() {
        echo "<div class='q_title'>Find department name, student name, CGPA-SSC, CGPA-HSC for all students.</div>";

        $query = Essential::runQuery('SELECT student.Dept as "Department Name", CONCAT(First_name, " ", Middle_name, " ", Last_name) as "Student Name", (SELECT Result FROM stu_aca WHERE Degree_name = "ssc" AND S_id = student.S_id) AS "CGPA-SSC", (SELECT Result FROM stu_aca WHERE Degree_name = "hsc" AND S_id = student.S_id) AS "CGPA-HSC" FROM student');

        Essential::makeTable($query);

    }
    public static function some() {
        echo "<div class='q_title'>Find student name, course-title, credit hour for all students.</div>";

        $query = Essential::runQuery('SELECT CONCAT(First_name, " ", Middle_name, " ", Last_name) as "Student Name", takes.Course_id AS "Course ID" ,(SELECT Title FROM course WHERE course.Course_id = takes.Course_id) AS "Title", (SELECT Cre_hr FROM course WHERE course.Course_id = takes.Course_id) AS "Credit Hours" FROM student, takes WHERE student.S_id = takes.S_id');
        Essential::makeTable($query);

    }
    public static function second() {
        echo "<div class='q_title'>Find student name, course-title, section id, room number, teacher name for all students.</div>";

        $query = Essential::runQuery('SELECT CONCAT(First_name, " ", Middle_name, " ", Last_name) as "Student Name", takes.Course_id AS "Course ID", (SELECT Title FROM course WHERE course.Course_id = takes.Course_id) AS "Course Title", takes.Sec_id AS "Section ID", (SELECT section.Room_no FROM section WHERE takes.Course_id = section.Course_id AND takes.Sec_id = section.Sec_id) AS "Room no", (SELECT CONCAT(First_name, " ", Middle_name, " ", Last_name) AS "Teacher Name" FROM teacher, teach WHERE teacher.T_id = teach.T_id AND teach.Course_id = takes.Course_id AND teach.Sec_id = takes.Sec_id) AS "Teacher Name" FROM student, takes WHERE student.S_id = takes.S_id');
        Essential::makeTable($query);

    }
    public static function third() {
        echo "<div class='q_title'>Find teacher name, course title, semester, year for all teachers.</div>";

        $query = Essential::runQuery('SELECT (SELECT CONCAT(First_name, " ", Middle_name, " ", Last_name) FROM teacher WHERE teach.T_id = teacher.T_id)  AS "Teacher Name", (SELECT course.Title FROM course WHERE course.Course_id = teach.Course_id) AS "Course Title", teach.Semester, teach.year FROM `teach`');
        Essential::makeTable($query);

    }
    public static function fourth() {
        echo "<div class='q_title'>Find student name, course-title, semester, year, and grade for all students.</div>";

        $query = Essential::runQuery('SELECT (SELECT CONCAT(First_name, " ", Middle_name, " ", Last_name) FROM `student` WHERE takes.S_id = student.S_id) AS "Student Name", takes.Course_id, (SELECT course.Title FROM `course` WHERE course.Course_id = takes.Course_id) AS "Course Title",takes.Semester, takes.Year, takes.Grade FROM `takes`');
        Essential::makeTable($query);
    }
    public static function fifth() {
        echo "<div class='q_title'>Find teacher name, major, minor, organization, from and to for all teachers.</div>";

        $query = Essential::runQuery('SELECT CONCAT(First_name, " ", Middle_name, " ", Last_name) AS "Teacher Name", (SELECT tea_gra.Major FROM tea_gra WHERE tea_gra.T_id = teacher.T_id) AS "Major", (SELECT tea_gra.Minor FROM tea_gra WHERE tea_gra.T_id = teacher.T_id) AS "Minor" FROM `teacher`');
        Essential::makeTable($query);

    }
    public static function sixth() {
        echo "<div class='q_title'>Find teacher name, title, volume, number and year of all publications of all teachers.</div>";

        $query = Essential::runQuery('SELECT (SELECT CONCAT(First_name, " ", Middle_name, " ", Last_name) FROM teacher WHERE tea_res_pub.T_id = teacher.T_id) AS "Teacher Name", Pub_info, Page_no, Year FROM `tea_res_pub` WHERE 1');
        Essential::makeTable($query);

    }
    public static function seventh() {
        echo "<div class='q_title'>Find the room number, status of the room at time slot-id = ‘T01’</div>";

        $query = Essential::runQuery("SELECT room_no, status from room where ts_id='0'");
        Essential::makeTable($query);
    }

    public static function tenth() {
        echo "<div class='q_title'>Find department id, department name, student id, student name, course id, course title, teacher id and teacher name for all departments.</div>";

        $query = Essential::runQuery("select dept_id,d.dept,S_id,s.First_name,course_id,title,t_id,t.Last_name from department as d, student as s, course as c, teacher as t ");
        Essential::makeTable($query);

    }

    public static function st_lis() {
        echo "<div class='q_title'>Find List of students</div>";

        $query = Essential::runQuery("SELECT * FROM student");
        Essential::makeTable($query);

    }

}
