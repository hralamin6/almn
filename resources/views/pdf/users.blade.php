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

    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>

<div style="margin: 20px auto; width: 80%;">

    <h2 style="text-align: center;">Company Details</h2>

    <div style="border: 2px solid #007bff; padding: 20px; border-radius: 10px; background-color: #f8f9fa; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div style="margin: 20px auto; width: 80%; display: flex; justify-content: space-between; align-items: center;">

            <!-- Logo -->
            <a href="{{$setup->site_url}}" style="flex: 1;">
                <img src="{{asset('images/avatar.jpg')}}" alt="Company Logo" style="max-width: 100px; height: auto;">
            </a>

            <!-- Company Details -->
            <div style="flex: 2; border: 2px solid #007bff; padding: 20px; border-radius: 10px; background-color: #f8f9fa; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div style="margin-bottom: 20px; text-align: center; align-items: center;">
                    <a href="{{$setup->site_url}}" style="flex: 1; ">
                        <p style="font-size: 18px; font-weight: bold;">{{$setup->site_name}}</p>
                        <center><img src="{{$setup->logo}}" alt="Company Logo" style="max-width: 100px; height: auto; align-items: center"></center>

                    </a>
                </div>
                <!-- Add other company details here -->
            </div>

            <!-- Social Links -->
            <div style="flex: 1; display: flex; justify-content: flex-end;">
                <a href="{{$setup->facebook}}" style="margin-right: 10px;"><img src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Facebook2_colored_svg-512.png" alt="Facebook"></a>
                <a href="{{$setup->twitter}}" style="margin-right: 10px;"><img src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Twitter3_colored_svg-512.png" alt="Twitter"></a>
                <a href="{{$setup->youtube}}"><img src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Youtube_colored_svg-512.png" alt="LinkedIn"></a>
            </div>

        </div>
        <div style="margin: 20px auto; width: 80%; display: flex; justify-content: space-between; align-items: center;">

            <div style="margin-bottom: 20px;">
                <h3 style="color: #007bff;">Admin Name</h3>
                <p style="font-size: 14px; font-weight: bold;">{{$setup->name}}</p>
            </div>

            <div style="margin-bottom: 20px;">
                <h3 style="color: #007bff;">Location</h3>
                <p style="font-size: 14px;">{{$setup->location}}</p>
            </div>

            <div style="margin-bottom: 20px;">
                <h3 style="color: #007bff;">Contact</h3>
                <p style="font-size: 14px;">Phone: {{$setup->phone}}</p>
                <p style="font-size: 14px;">Email: {{$setup->email}}</p>
            </div>

            <div style="margin-bottom: 20px;">
                <h3 style="color: #007bff;">About Us</h3>
                <p style="font-size: 14px;">{{$setup->about}}</p>
            </div>
        </div>

        <div style="">

            <h2 style="text-align: center;">User Table</h2>

            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Name</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Email</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Role</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Status</th>
                </tr>
                </thead>
                <tbody>
                @forelse($items as $i => $item)

                    <tr style="border: 1px solid #ddd;">
                        <td style="padding: 10px; border: 1px solid #ddd;">{{$item->id}}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{$item->name}}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{$item->email}}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{$item->type}}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{$item->status}}</td>
                    </tr>
                @empty

                @endforelse


                </tbody>
            </table>

        </div>

    </div>

</div>
</body>
</html>
