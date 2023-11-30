--SQL QUERY

--DATABASE AND TABLE CREATION
/*
CREATE DATABASE enrollmentDB;
*/

/*
CREATE TABLE students(
  student_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP 
  course_id INT NOT NULL PRIMARY KEY REFERENCES course(course_name)
);
*/

CREATE TABLE courses(
  course_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  course_name VARCHAR(96) NOT NULL
)

--CRUD OPERATIONS

--CREATING DATA ON TABLE
INSERT INTO students(
    "John Doe", "johndoe.123456@example.com"
  );

--READING OR RETURN OUTPUT
SELECT * FROM students WHERE id = 1; -- <== Specify which ID to retrieve data (where n is the id number)

--UPDATE DATA IN TABLE
UPDATE students
SET name = "Juan Dela Cruz", email = "delacruz.123456@example.com" ; -- <== Spcify which columns are to be updated (refer to CREATE TABLE portion)
WHERE id = n -- <== Specify which ID to retrieve data (for specificity)

--DELETING DATA IN TABLE3
DELETE FROM students WHERE id = 1 --<== Delete an entry in the table; use id (for specificity)
