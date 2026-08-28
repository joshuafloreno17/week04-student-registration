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



## Validation Rules

The system uses Laravel server-side validation to ensure that student information is complete, valid, and secure.

| Field | Validation Rule | Purpose |
|---|---|---|
| Student ID | Required, Unique | Prevents duplicate student records |
| First Name | Required, String, Max 100 | Ensures a valid first name |
| Middle Name | Nullable, String, Max 100 | Allows students without a middle name |
| Last Name | Required, String, Max 100 | Ensures a valid last name |
| Email | Required, Valid Email, Unique | Ensures a valid and unique email |
| Mobile Number | Required, Numeric | Ensures a valid contact number |
| Date of Birth | Required, Date | Ensures a valid birth date |
| Gender | Required | Prevents missing gender information |
| Program | Required | Ensures the student's program is provided |
| Year Level | Required | Ensures the student's year level is provided |
| Address | Required | Ensures complete address information |
| Profile Picture | Required, Image, JPG/JPEG/PNG, Max 2MB | Protects file uploads and limits file size |

### Importance of Validation

Server-side validation prevents invalid or incomplete data from being stored in the database. It also provides an additional layer of security because validation is performed by the Laravel application before processing the submitted information.