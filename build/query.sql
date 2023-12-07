/*
  SQL query script for enrollment
  Programmer/s:
  1. CONGGAS, Emman Isaac D.
  2. GEREÑA, James Bernard O.

  Possible addition/s or questions:
  1. SQL views?
  2. Should the table be normalized:
    2.1. 1NF?
    2.2. 2NF?
    2.3. 3NF?
  3. 
*/

CREATE DATABASE enrollment; --Create database
USE enrollment; --Use database

-- ENROLLMENT SYSTEM TABLE CREATION --
CREATE TABLE enrollment_list --Student information
(
  student_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  --Create columns for student name as in this format: SURNAME, FIRST NAME, MIDDLE NAME/INITIAL
  student_lastname VARCHAR(100) NOT NULL,
  student_firstname VARCHAR(100) NOT NULL,
  student_middlename VARCHAR(100) NOT NULL,
  -- Lorem ipsum sit amet, consectetur adipiscing elit. Curabitur nunc lectus, sollicitudin sit amet turpis non, ultricies suscipit dolor.
  email VARCHAR(100) NOT NULL UNIQUE,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  course_id FOREIGN KEY REFERENCES courses(course_id)
)

CREATE TABLE courses --Course information
(
  course_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  course_name VARCHAR(100) NOT NULL
)  

-- CRUD OPERATIONS --
/*CREATE (Use 'INSERT INTO')*/
INSERT INTO enrollment_list
  VALUES("Conggas", "Emman Isaac", "Dacuba", "conggas.samples@email.com")
INSERT INTO courses
  VALUES("Bachelor of Science in Computer Science")

/*READ (Use 'SELECT * FROM table_name')*/
SELECT * FROM enrollment_list;
SELECT * FROM courses;

/*UPDATE (Use 'UPDATE TABLE table_name, SET col1 = val1 WHERE condition')*/
UPDATE TABLE enrollment_list
SET
  student_lastname = "Dela Cruz"
  student_firstname = "Juan"
  student_middlename = "Suarez"
  email = "jdc.sample@email.com"
WHERE student_id = 1;

UPDATE TABLE courses
SET
  course_name = "Bachelor of Science in Information Technology"
WHERE course_id = 1;

/*DELETE (Use 'DELETE FROM table_name WHERE condition')*/
DELETE FROM enrollment_list
  WHERE student_id = 1;
DELETE FROM courses
  WHERE course_id = 1;
