```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Students</title>

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
            max-width: 1200px;
            margin: auto;
        }

        /* HEADER */
        .header {
            background: linear-gradient(135deg, #312e81, #6d28d9, #9333ea);
            color: white;
            padding: 30px 35px;
            border-radius: 20px 20px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .header h1 {
            font-size: 30px;
            margin-bottom: 5px;
        }

        .header p {
            color: #ede9fe;
            font-size: 14px;
        }

        .add-btn {
            background: white;
            color: #6d28d9;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            transition: 0.2s;
        }

        .add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* CONTENT */
        .content {
            background: #f9fafb;
            padding: 30px;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        /* SUCCESS MESSAGE */
        .success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        /* TABLE */
        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            overflow: hidden;
        }

        thead {
            background: #312e81;
            color: white;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            font-size: 14px;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            font-weight: 600;
            white-space: nowrap;
        }

        tbody tr:hover {
            background: #f5f3ff;
        }

        /* PROFILE PICTURE */
        .profile-picture {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #ede9fe;
            display: block;
        }

        .profile-placeholder {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #ede9fe;
            color: #6d28d9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
        }

        /* STUDENT INFO */
        .student-name {
            font-weight: 700;
            color: #312e81;
        }

        .student-id {
            font-family: monospace;
            color: #6b7280;
        }

        /* BADGE */
        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            background: #ede9fe;
            color: #6d28d9;
            font-size: 12px;
            font-weight: 700;
        }

        /* ACTIONS */
        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .view-btn,
        .edit-btn {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            transition: 0.2s;
        }

        /* VIEW BUTTON */
        .view-btn {
            background: #312e81;
        }

        .view-btn:hover {
            background: #4338ca;
            transform: translateY(-1px);
        }

        /* EDIT BUTTON */
        .edit-btn {
            background: #7c3aed;
        }

        .edit-btn:hover {
            background: #6d28d9;
            transform: translateY(-1px);
        }

        /* DELETE BUTTON */
        .delete-btn {
            border: none;
            padding: 7px 13px;
            border-radius: 8px;
            background: #dc2626;
            color: white;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s;
        }

        .delete-btn:hover {
            background: #b91c1c;
            transform: translateY(-1px);
        }

        /* EMPTY STATE */
        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #6b7280;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .empty h2 {
            color: #374151;
            margin-bottom: 8px;
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {

            body {
                padding: 20px 10px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                padding: 25px;
            }

            .content {
                padding: 20px;
            }

            th,
            td {
                padding: 12px;
            }

            .actions {
                flex-direction: column;
                align-items: stretch;
            }

            .view-btn,
            .edit-btn,
            .delete-btn {
                text-align: center;
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="container">

    {{-- HEADER --}}
    <div class="header">

        <div>
            <h1>Student Records</h1>

            <p>
                View and manage all registered students.
            </p>
        </div>

        <a
            href="{{ route('students.create') }}"
            class="add-btn"
        >
            + Register Student
        </a>

    </div>


    {{-- CONTENT --}}
    <div class="content">

        {{-- SUCCESS FLASH MESSAGE --}}
        @if (session('success'))

            <div class="success">
                {{ session('success') }}
            </div>

        @endif


        {{-- STUDENT TABLE --}}
        @if ($students->count() > 0)

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>Profile</th>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Program</th>
                            <th>Year Level</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($students as $student)

                            <tr>

                                {{-- PROFILE --}}
                                <td>

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

                                </td>


                                {{-- STUDENT ID --}}
                                <td>

                                    <span class="student-id">
                                        {{ $student->student_id }}
                                    </span>

                                </td>


                                {{-- NAME --}}
                                <td>

                                    <div class="student-name">

                                        {{ $student->first_name }}

                                        @if ($student->middle_name)
                                            {{ $student->middle_name }}
                                        @endif

                                        {{ $student->last_name }}

                                    </div>

                                </td>


                                {{-- EMAIL --}}
                                <td>
                                    {{ $student->email }}
                                </td>


                                {{-- MOBILE --}}
                                <td>
                                    {{ $student->mobile_number }}
                                </td>


                                {{-- PROGRAM --}}
                                <td>

                                    <span class="badge">
                                        {{ $student->program }}
                                    </span>

                                </td>


                                {{-- YEAR LEVEL --}}
                                <td>
                                    {{ $student->year_level }}
                                </td>


                                {{-- GENDER --}}
                                <td>
                                    {{ $student->gender }}
                                </td>


                                {{-- ACTIONS --}}
                                <td>

                                    <div class="actions">

                                        {{-- VIEW --}}
                                        <a
                                            href="{{ route('students.show', $student->id) }}"
                                            class="view-btn"
                                        >
                                            View
                                        </a>


                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('students.edit', $student->id) }}"
                                            class="edit-btn"
                                        >
                                            Edit
                                        </a>


                                        {{-- DELETE --}}
                                        <form
                                            action="{{ route('students.destroy', $student->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this student?');"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="delete-btn"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            {{-- EMPTY STATE --}}
            <div class="empty">

                <div class="empty-icon">
                    🎓
                </div>

                <h2>No Students Yet</h2>

                <p>
                    There are currently no registered students.
                </p>

            </div>

        @endif

    </div>

</div>

</body>
</html>
```
