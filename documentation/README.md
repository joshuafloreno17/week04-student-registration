# Week 4 Documentation

## Registration Flowchart

The Student Registration System follows a simple registration process. The user first opens the registration form and enters the required student information. After submitting the form, Laravel validates the submitted data. If the data is invalid, validation errors are displayed. If the data is valid, the student information and profile picture are processed and stored, followed by a success message and student profile page.

### Registration Process

User Opens Registration Page  
↓  
Fill Out Student Registration Form  
↓  
Submit Registration  
↓  
Laravel Validation  
↓  
Is the Data Valid?

**NO** → Display Validation Errors → Return to Registration Form

**YES** → Upload Profile Picture → Save Student Information to Database → Display Success Message → Student Profile Page


## Database Design

The Student Registration System uses a `students` table to store the information submitted through the registration form.

### Students Table Fields

| Field | Description |
|---|---|
| id | Primary key |
| student_id | Unique student identification number |
| first_name | Student's first name |
| middle_name | Student's middle name |
| last_name | Student's last name |
| email | Student's unique email address |
| mobile_number | Student's mobile number |
| date_of_birth | Student's date of birth |
| gender | Student's gender |
| program | Student's academic program |
| year_level | Student's current year level |
| address | Student's complete address |
| profile_picture | Path of the uploaded profile picture |
| created_at | Record creation timestamp |
| updated_at | Record update timestamp |