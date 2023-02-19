<html>

    <body>

        <b>Dear {{$first_name}} {{$last_name}},</b>

        <br>

        You have sent a forgotten password to this email.

       <br> 

       Please click on the link to go to the change your password page.

       <br>

       <a href="http://127.0.0.1:8000/member/Forgotpassword/{{$member_code}}">Confirm Password</a>
       {{-- <a href="https://infinity.co.th/member/Forgotpassword/{{$member_code}}">Confirm Password</a> --}}

    </body>

</html>