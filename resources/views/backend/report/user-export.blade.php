<html>
    <body>
        <table>
            <thead>
                <tr>
                    <th>SL.</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Profession</th>
                    <th>Institution</th>
                    <th>Social</th>
                    <th>About</th>
                    <th>Created Date</th>
                </tr>
            </thead>
            <tbody>
                @if($users)
                    @php $sl = 0; @endphp
                    @foreach($users as $user)
                        @if($user->profession == 'Job_Holder')
                            @php $profession = 'Job Holder'; @endphp
                        @else
                            @php $profession = $user->profession; @endphp    
                        @endif
                        <tr>
                            <td>{{++$sl}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->mobile}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->dob}}</td>
                            <td>{{$user->gender}}</td>
                            <td>{{$profession}}</td>
                            <td>{{$user->institution}}</td>
                            <td>{{$user->social}}</td>
                            <td>{{$user->about}}</td>
                            <td>@php $date = date('Y-m-d',strtotime($user->created_at)); @endphp {{$date}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </body>
</html>