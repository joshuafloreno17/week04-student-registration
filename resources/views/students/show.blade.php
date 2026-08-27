<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile</title>

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
            padding: 40px 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .profile-card {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);
        }

        .profile-header {
            background: linear-gradient(135deg, #312e81, #6d28d9, #9333ea);
            color: white;
            padding: 40px;
            text-align: center;
        }

        .profile-picture {
            width: 140px;
            height: 140px;
            object-fit: cover;
            border-radius: 50%;
            border: 6px solid white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
            margin-bottom: 18px;
        }

        .profile-placeholder {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: white;
            color: #6d28d9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            font-weight: 800;
            margin: 0 auto 18px;
            border: 6px solid white;
        }

        .profile-header h1 {
            font-size: 30px;
            margin-bottom: 5px;
        }

        .profile-header p {
            color: #ede9fe;
            font-size: 14px;
        }

        .content {
            padding: 35px;
        }

        .section-title {
            color: #312e81;
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ede9fe;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .info-box {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 16px;
        }

        .info-box.full {
            grid-column: span 2;
        }

        .label {
            display: block;
            color: #6b7280;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .value {
            color: #111827;
            font-size: 15px;
            font-weight: 600;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            background: #ede9fe;
            color: #6d28d9;
            font-size: 13px;
            font-weight: 700;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 22px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            transition: 0.2s;
        }

        .back-btn {
            background: #e5e7eb;
            color: #374151;
        }

        .back-btn:hover {
            background: #d1d5db;
            transform: translateY(-2px);
        }

        .edit-btn {
            background: #7c3aed;
            color: white;
        }

        .edit-btn:hover {
            background: #6d28d9;
            transform: translateY(-2px);
        }

        @media (max-width: 650px) {

            body {
                padding: 20px 10px;
            }

            .profile-header {
                padding: 30px 20px;
            }

            .content {
                padding: 25px 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .info-box.full {
                grid-column: span 1;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="profile-card">

        <div class="profile-header">

            @if ($student->profile_picture)

                <img
                    src="{{ asset('storage/' . $student->profile_picture) }}"
                    alt="Profile Picture"
                    class="profile-picture"
                >

            @else

                <div class="profile-placeholder">
                    {{ strtoupper(substr($student->first_name, 0, 1)) }}
                </div>

            @endif

            <h1>
                {{ $student->first_name }}
                {{ $student->middle_name }}
                {{ $student->last_name }}
            </h1>

            <p>
                Student Profile
            </p>

        </div>

        <div class="content">

            <div class="section-title">
                Personal Information
            </div>

            <div class="info-grid">

                <div class="info-box">
                    <span class="label">Student ID</span>
                    <span class="value">
                        {{ $student->student_id }}
                    </span>
                </div>

                <div class="info-box">
                    <span class="label">Gender</span>
                    <span class="badge">
                        {{ $student->gender }}
                    </span>
                </div>

                <div class="info-box">
                    <span class="label">First Name</span>
                    <span class="value">
                        {{ $student->first_name }}
                    </span>
                </div>

                <div class="info-box">
                    <span class="label">Middle Name</span>
                    <span class="value">
                        {{ $student->middle_name ?: 'N/A' }}
                    </span>
                </div>

                <div class="info-box">
                    <span class="label">Last Name</span>
                    <span class="value">
                        {{ $student->last_name }}
                    </span>
                </div>

                <div class="info-box">
                    <span class="label">Date of Birth</span>
                    <span class="value">
                        {{ $student->date_of_birth }}
                    </span>
                </div>

                <div class="info-box">
                    <span class="label">Email</span>
                    <span class="value">
                        {{ $student->email }}
                    </span>
                </div>

                <div class="info-box">
                    <span class="label">Mobile Number</span>
                    <span class="value">
                        {{ $student->mobile_number }}
                    </span>
                </div>

            </div>

            <div class="section-title" style="margin-top: 35px;">
                Academic Information
            </div>

            <div class="info-grid">

                <div class="info-box">
                    <span class="label">Program</span>
                    <span class="badge">
                        {{ $student->program }}
                    </span>
                </div>

                <div class="info-box">
                    <span class="label">Year Level</span>
                    <span class="value">
                        {{ $student->year_level }}
                    </span>
                </div>

                <div class="info-box full">
                    <span class="label">Address</span>
                    <span class="value">
                        {{ $student->address }}
                    </span>
                </div>

            </div>

            <div class="buttons">

                <a
                    href="{{ route('students.index') }}"
                    class="btn back-btn"
                >
                    ← Back to Students
                </a>

                <a
                    href="{{ route('students.edit', $student->id) }}"
                    class="btn edit-btn"
                >
                    Edit Profile
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>
