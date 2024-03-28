<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
    <style>
        body {
            font-family: 'examplefont', sans-serif;
            font-weight: 400;
            line-height: 1.5;
            color: black;
            text-align: left;
            background-color: #fff;
            font-size: 15px;
            margin: 36pt;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
    @vite(['resources/css/app.css'])

</head>
<body>

<h2>User Table</h2>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1</td>
        <td>পোস্ট বাছাই করে নেয়া হবে। Doe</td>
        <td>john@example.com</td>
        <td>Admin</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Jane Smith</td>
        <td>jane@example.com</td>
        <td>পোস্ট বাছাই করে নেয়া হবে।</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Michael Johnson</td>
        <td> <a href="{{route('home')}}">asdf</a> michael@example.com</td>
        <td><img src="https://imamhujur.hralamin.xyz/media/2/oReX6ahv00LFvh7Tx6XFZhXrBWk5RK-metaU2NyZWVuc2hvdF8yMDI0MDMyNy0wMDQ0MjVfQ3JlQXJ0LnBuZw==-.pngg" height="100px" width="100px"/></td>
{{--        <td><img src="{{asset('images/avatar.jpg')}}" height="100px" width="100px"/></td>--}}
    </tr>
    <!-- Add more rows as needed -->
    </tbody>
</table>
<div class="flex items-center gap-x-3">
    <h2 class="text-lg font-medium text-gray-800 dark:text-white">Team members</h2>

    <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">100 users</span>
</div>
</body>
</html>
