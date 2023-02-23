<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Mail\MemberMail2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\PricesModel;
use App\Models\MemberModel;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $price = PricesModel::where('status', 1)->orwhere('status', 0)->orderBy(DB::raw('case when status = 0 then 1 when status = 1 then 2 end'))->orderBy('id_quote', 'DESC')->get();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', Auth::guard('web')->user()->position)->first();
        $data = array(
            'price' => $price,
            'check' => $check,
        );
        return view('layouts/backend/prices/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $price = PricesModel::find($id);
        $data = array(
            'price' => $price,
        );
        return view('layouts/backend/prices/form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price = PricesModel::find($id);
        $data = array(
            'price' => $price,
        );
        return view('layouts/backend/prices/form2', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mail1 = PricesModel::find($id);
        $mail2 = MemberModel::where('id', $mail1->created_id)->first();
        $mail = new PHPMailer(true);
        try { 	                 
            //Server settings 	                 
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = "smtp.mailer2022@gmail.com";
            $mail->Password   = "krofcmafzshfkpsb";
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('smtp.mailer2022@gmail.com', 'Infinity Shipping');
            $mail->addAddress($mail2->email);
            // $mail->addReplyTo('', 'Information');
            // $mail->addCC('');
            // $mail->addBCC('');

            // // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Quotation confirmation email';
            $mail->Body    = "
            <html>

                <body>

                    <b>Dear $mail2->first_name $mail2->last_name,</b>

                    <br>

                    <br>

                    We please to inform you that your rate request has been approved.

                    <br>
                    
                    Please Log-in via website by Click at Booking menu to see the rate.

                    <br>
                    
                    <br>

                    Thank you for choosing us and look forward to your further support.

                </body>

            </html>";
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
	        // echo 'Message has been sent';

            $date = $request->VDT;
            $newDate = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
            if (isset($request->privilege)) {
                $privilege = 1;
            } else {
                $privilege = 0;
            }
            if (isset($request->privilege2)) {
                $privilege2 = 1;
            } else {
                $privilege2 = 0;
            }
            if (isset($request->additional_content)) {
                $additional = 1;
            } else {
                $additional = 0;
            }
            // $data_Membermail = [
            //     'email' => $mail2->email,
            //     'first_name' => $mail2->first_name,
            //     'last_name' => $mail2->last_name,
            // ];
            // Mail::send(new MemberMail2($data_Membermail));
            PricesModel::find($id)->update([
                'VDT' => $newDate,
                'rate' => $request->rate,
                'privilege' => $privilege,
                'privilege2' => $privilege2,
                'special_rate' => $request->special_rate,
                'additional_content' => $additional,
                'announce_content' => $request->announce_content,
                'save_datetime' => Carbon::now(),
                'status' => 1,
                'updated_at' => Carbon::now()
            ]);
            return redirect()->to('/backend/price')->with('success', 'Save Data Success');
        } catch (Exception $e) {
	        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reject($id)
    {
        PricesModel::find($id)->update([
            'status' => 2,
            'updated_at' => Carbon::now()
        ]);
        return redirect()->to('/backend/price')->with('success', 'Save Data Success');
    }
}
