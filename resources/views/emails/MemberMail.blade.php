<html>
    <body>
        <b>Dear {{$first_name}} {{$last_name}},</b>
        <br>
        คุณได้ทำการแจ้งลืมรหัสผ่านมายังอีเมลนี้
       <br> 
       กรุณาคลิกที่ลิงค์เพื่อไปยังหน้าเปลี่ยนรหัสผ่านของคุณ 
       <br>
       <a href="http://127.0.0.1:8000/member/Forgotpassword/{{$id}}">ยืนยันรหัสผ่าน</a>
    </body>
</html>