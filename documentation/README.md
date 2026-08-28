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