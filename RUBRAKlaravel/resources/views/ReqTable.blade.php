<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <title>Request Table</title>
    <style>
         table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

    </style>
</head>
<body>
    <header>

            <div class="logo">
            <img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}"  width="36" alt="imglogo">
            <h4>Rubrak</h4>
        </div>
        <ul>
            <li class="menu"><a href="{{route ('home')}}">Home</a></li>
            <li class="menu"><a href="{{route ('pets.index')}}">Pet</a></li>
            <li class="menu"><a href="{{route ('donate')}}">Donate</a></li>
            <li class="menu"><a href="{{route ('contact')}}">Contact Us</a></li>
            <li class="menu"><a href="{{route ('profile')}}">Profile</a></li>

        </ul>
    </header>

    <table>

    </table>

    <div class="header-stripe"></div>


    <div class="pic"><img src="{{ asset('Pic-rubrak/LogoRubRak.png.PNG') }}"  width="200" alt="imglogo"></div>
    <br><br>
    <h2>Table request here</h2><br>


    <table  >
        <th >
            <tr>
                <th>Form ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Pet Experience</th>
                <th>Other pets</th>
                <th>Adoption Reason</th>
                <th>Address</th>
                <th>Submit Date</th>
                <th>Statos</th>
            </tr>
        </th>
        <td>
            </tr>
        @foreach ($request as $item)
            <tr>
                <td>{{$item->number_req}}</td>
                <td>{{$item->user->name}}</td>
                <td>{{$item->user->email}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->pet_experience}}</td>
                <td>{{$item->other_pet}}</td>
                <td>{{$item->adopt_reason}}</td>
                <td>{{$item->address_user}}</td>
                <td>{{$item->created_at}}</td>
                {{-- <td>{{$item->status_request}}</td> --}}
                <td><a href="">Approve</a><br><br>
                <a href="">Reject</a>
                </td>

                {{-- <td><a href="{{route ('projects.form',$item->id)}}">Edit  </a>
                <a href="{{route ('projects.destroy',$item->id)}}">Deleted</a>
                </td> --}}


            </tr>
        @endforeach
        </td>
    </table>

</body>
</html>
