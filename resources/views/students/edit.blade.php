```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Student</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, #312e81 0%, transparent 35%),
                radial-gradient(circle at bottom right, #7c3aed 0%, transparent 35%),
                #111827;
            padding: 50px 20px;
            color: #1f2937;
        }

        .container {
            width: 100%;
            max-width: 1050px;
            margin: auto;
        }

        /* HEADER */
        .header {
            padding: 40px;
            color: white;
            background: linear-gradient(135deg, #312e81, #6d28d9, #9333ea);
            border-radius: 24px 24px 0 0;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            right: -60px;
            top: -80px;
        }

        .header::after {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
            right: 120px;
            bottom: -100px;
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .logo {
            width: 55px;
            height: 55px;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
        }

        .header h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .header p {
            color: #ede9fe;
            font-size: 15px;
        }

        /* FORM CARD */
        .form-card {
            background: #f9fafb;
            padding: 40px;
            border-radius: 0 0 24px 24px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);
        }

        /* SECTION */
        .section {
            margin-bottom: 35px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 18px;
            font-weight: 700;
            color: #312e81;
            margin-bottom: 20px;
        }

        .section-title::before {
            content: "";
            width: 5px;
            height: 22px;
            border-radius: 10px;
            background: linear-gradient(#7c3aed, #a855f7);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .required {
            color: #ef4444;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #d1d5db;
            border-radius: 11px;
            background: white;
            color: #111827;
            font-size: 14px;
            outline: none;
            transition: all 0.2s ease;
        }

        input::placeholder,
        textarea::placeholder {
            color: #9ca3af;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.12);
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        /* FILE INPUT */
        input[type="file"] {
            padding: 10px;
            cursor: pointer;
        }

        input[type="file"]::file-selector-button {
            border: none;
            background: linear-gradient(135deg, #6d28d9, #9333ea);
            color: white;
            padding: 9px 14px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            margin-right: 10px;
        }

        /* PROFILE PREVIEW */
        .profile-preview {
            margin-top: 15px;
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 15px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
        }

        .profile-preview img {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #ede9fe;
        }

        .profile-preview-text {
            font-size: 13px;
            color: #6b7280;
        }

        .profile-preview-text strong {
            display: block;
            color: #374151;
            margin-bottom: 4px;
        }

        .profile-note {
            font-size: 12px;
            color: #6b7280;
            margin-top: 7px;
        }

        /* ERRORS */
        .error-box {
            background: #fff1f2;
            border: 1px solid #fecdd3;
            color: #9f1239;
            padding: 16px 18px;
            border-radius: 12px;
            margin-bottom: 30px;
        }

        .error-box strong {
            display: block;
            margin-bottom: 7px;
        }

        .error-box ul {
            margin-left: 20px;
            font-size: 14px;
        }

        /* BUTTONS */
        .button-container {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            border-top: 1px solid #e5e7eb;
            padding-top: 25px;
        }

        .btn {
            border: none;
            padding: 13px 24px;
            border-radius: 11px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .btn-primary {
            color: white;
            background: linear-gradient(135deg, #6d28d9, #9333ea);
            box-shadow: 0 7px 18px rgba(109, 40, 217, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(109, 40, 217, 0.4);
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {
            body {
                padding: 20px 10px;
            }

            .header {
                padding: 30px 25px;
            }

            .header h1 {
                font-size: 25px;
            }

            .form-card {
                padding: 28px 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: auto;
            }

            .button-container {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    {{-- HEADER --}}
    <div class="header">
        <div class="header-content">

            <div class="logo">
                ✏️
            </div>

            <h1>Edit Student</h1>

            <p>
                Update the student's information below.
            </p>

        </div>
    </div>


    {{-- FORM --}}
    <div class="form-card">

        {{-- VALIDATION ERRORS --}}
        @if ($errors->any())

            <div class="error-box">

                <strong>Please check the following:</strong>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('students.update', $student->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            {{-- PERSONAL INFORMATION --}}
            <div class="section">

                <div class="section-title">
                    Personal Information
                </div>

                <div class="form-grid">

                    {{-- STUDENT ID --}}
                    <div class="form-group">

                        <label for="student_id">
                            Student ID <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="student_id"
                            name="student_id"
                            value="{{ old('student_id', $student->student_id) }}"
                            required
                        >

                    </div>


                    {{-- DATE OF BIRTH --}}
                    <div class="form-group">

                        <label for="date_of_birth">
                            Date of Birth <span class="required">*</span>
                        </label>

                        <input
                            type="date"
                            id="date_of_birth"
                            name="date_of_birth"
                            value="{{ old('date_of_birth', $student->date_of_birth) }}"
                            required
                        >

                    </div>


                    {{-- FIRST NAME --}}
                    <div class="form-group">

                        <label for="first_name">
                            First Name <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            value="{{ old('first_name', $student->first_name) }}"
                            required
                        >

                    </div>


                    {{-- MIDDLE NAME --}}
                    <div class="form-group">

                        <label for="middle_name">
                            Middle Name
                        </label>

                        <input
                            type="text"
                            id="middle_name"
                            name="middle_name"
                            value="{{ old('middle_name', $student->middle_name) }}"
                        >

                    </div>


                    {{-- LAST NAME --}}
                    <div class="form-group">

                        <label for="last_name">
                            Last Name <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            value="{{ old('last_name', $student->last_name) }}"
                            required
                        >

                    </div>


                    {{-- GENDER --}}
                    <div class="form-group">

                        <label for="gender">
                            Gender <span class="required">*</span>
                        </label>

                        <select
                            id="gender"
                            name="gender"
                            required
                        >

                            <option value="">
                                Select Gender
                            </option>

                            <option
                                value="Male"
                                {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}
                            >
                                Male
                            </option>

                            <option
                                value="Female"
                                {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}
                            >
                                Female
                            </option>

                        </select>

                    </div>

                </div>

            </div>


            {{-- CONTACT INFORMATION --}}
            <div class="section">

                <div class="section-title">
                    Contact Information
                </div>

                <div class="form-grid">

                    {{-- EMAIL --}}
                    <div class="form-group">

                        <label for="email">
                            Email Address <span class="required">*</span>
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $student->email) }}"
                            required
                        >

                    </div>


                    {{-- MOBILE --}}
                    <div class="form-group">

                        <label for="mobile_number">
                            Mobile Number <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="mobile_number"
                            name="mobile_number"
                            value="{{ old('mobile_number', $student->mobile_number) }}"
                            required
                        >

                    </div>


                    {{-- ADDRESS --}}
                    <div class="form-group full-width">

                        <label for="address">
                            Complete Address <span class="required">*</span>
                        </label>

                        <textarea
                            id="address"
                            name="address"
                            required
                        >{{ old('address', $student->address) }}</textarea>

                    </div>

                </div>

            </div>


            {{-- ACADEMIC INFORMATION --}}
            <div class="section">

                <div class="section-title">
                    Academic Information
                </div>

                <div class="form-grid">

                    {{-- PROGRAM --}}
                    <div class="form-group">

                        <label for="program">
                            Program <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="program"
                            name="program"
                            value="{{ old('program', $student->program) }}"
                            required
                        >

                    </div>


                    {{-- YEAR LEVEL --}}
                    <div class="form-group">

                        <label for="year_level">
                            Year Level <span class="required">*</span>
                        </label>

                        <select
                            id="year_level"
                            name="year_level"
                            required
                        >

                            <option value="">
                                Select Year Level
                            </option>

                            <option
                                value="1st Year"
                                {{ old('year_level', $student->year_level) == '1st Year' ? 'selected' : '' }}
                            >
                                1st Year
                            </option>

                            <option
                                value="2nd Year"
                                {{ old('year_level', $student->year_level) == '2nd Year' ? 'selected' : '' }}
                            >
                                2nd Year
                            </option>

                            <option
                                value="3rd Year"
                                {{ old('year_level', $student->year_level) == '3rd Year' ? 'selected' : '' }}
                            >
                                3rd Year
                            </option>

                            <option
                                value="4th Year"
                                {{ old('year_level', $student->year_level) == '4th Year' ? 'selected' : '' }}
                            >
                                4th Year
                            </option>

                        </select>

                    </div>

                </div>

            </div>


            {{-- PROFILE INFORMATION --}}
            <div class="section">

                <div class="section-title">
                    Profile Information
                </div>

                <div class="form-grid">

                    <div class="form-group full-width">

                        <label for="profile_picture">
                            Profile Picture
                        </label>

                        {{-- FILE UPLOAD --}}
                        <input
                            type="file"
                            id="profile_picture"
                            name="profile_picture"
                            accept="image/jpeg,image/png,image/jpg,image/gif"
                        >

                        <span class="profile-note">
                            Choose a JPG, JPEG, PNG, or GIF image. Leave empty if you don't want to change the current picture.
                        </span>


                        {{-- CURRENT PROFILE PICTURE --}}
                        @if ($student->profile_picture)

                            <div class="profile-preview">

                                <img
                                    src="{{ asset('storage/' . $student->profile_picture) }}"
                                    alt="Current Profile Picture"
                                >

                                <div class="profile-preview-text">

                                    <strong>Current Profile Picture</strong>

                                    The picture above is currently saved for this student.

                                </div>

                            </div>

                        @endif


                        {{-- NEW IMAGE PREVIEW --}}
                        <div
                            class="profile-preview"
                            id="new-preview"
                            style="display: none;"
                        >

                            <img
                                id="preview-image"
                                src=""
                                alt="New Profile Picture Preview"
                            >

                            <div class="profile-preview-text">

                                <strong>New Profile Picture</strong>

                                This image will replace the current profile picture.

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- BUTTONS --}}
            <div class="button-container">

                <a
                    href="{{ route('students.index') }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Update Student
                </button>

            </div>

        </form>

    </div>

</div>


{{-- IMAGE PREVIEW SCRIPT --}}
<script>

    const profileInput = document.getElementById('profile_picture');

    const previewContainer = document.getElementById('new-preview');

    const previewImage = document.getElementById('preview-image');


    profileInput.addEventListener('change', function () {

        const file = this.files[0];

        if (file) {

            const reader = new FileReader();

            reader.onload = function (event) {

                previewImage.src = event.target.result;

                previewContainer.style.display = 'flex';

            };

            reader.readAsDataURL(file);

        } else {

            previewContainer.style.display = 'none';

            previewImage.src = '';

        }

    });

</script>

</body>

</html>
```
