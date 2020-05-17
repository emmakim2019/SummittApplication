@extends('layouts.email')

@section('content')


<p style="font-family:'proxima-nova, sans-serif';font-size: 28px;line-height:1.6;font-weight:normal;margin:0 0 30px;padding:0;color:#662F8E;text-align:center;">Account Verification</p>
<hr class="line-footer">
<p class="bigger-bold" style="font-size: 18px;font-family: 'proxima-nova, sans-serif';text-align:center;">Hello {{ ucwords(strtolower($name)) ?: '' }},</p>

<p style="font-family: 'proxima-nova, sans-serif';font-size: 18px;line-height: 1.6;font-weight: normal;margin: 30px 0 30px;padding: 0;color:#7C7C7C;text-align:center;">
    Your account on {{ config('app.name', 'Summit Recruitment') }} has been created.</p>

  <p style="font-family: 'proxima-nova, sans-serif';font-size: 18px;line-height: 1.6;font-weight: normal;margin: 30px 0 30px;padding: 0;color:#7C7C7C;text-align:center;">
      In order to complete your registration and log in, please click on “Activate Account” to get it activated.</p>

<p style="font-family: 'proxima-nova, sans-serif';margin: 30px 0 30px; text-align:center;">
  <a href="{{$url}}" class="btn-drk-left" style="    background: #3069ab;
    padding: 10px 15px;
    color: #fff;
    font-size: 18px;
    text-decoration: none;">Activate Account
  </a>
</p>

<p style="font-family: 'proxima-nova, sans-serif';font-size: 18px;line-height: 1.6;font-weight: normal;margin: 30px 0 30px;padding: 0;color:#DD7D15;text-align:center;">
The activation link will expire in 24hrs
</p>

<p style="font-family: 'proxima-nova, sans-serif';font-size: 18px;line-height: 1.6;font-weight: normal;margin: 30px 0 30px;padding: 0;color:#7C7C7C;text-align:center;">
If you're unable to click on the link, you may copy and paste the link below into your browser. Kindly ignore this email incase you did not make this request.
</p>
<p style="font-family: 'proxima-nova, sans-serif';font-size: 18px;line-height: 1.6;font-weight: normal;margin: 30px 0 30px;padding: 0;color:#7C7C7C;text-align:center;">
  {{$url}}
</p>

<p style="font-family: 'proxima-nova, sans-serif';font-size: 18px;line-height: 1.6;font-weight: normal;margin: 30px 0 30px;padding: 0;color:#7C7C7C;text-align:center;">
 Kindly ignore this email incase you did not make this request.
</p>
<p style="font-family: 'proxima-nova, sans-serif';font-size: 18px;line-height: 1.6;font-weight: bold;margin: 20px 0 0;padding: 0;color:#7C7C7C;text-align:center;">
Best Regards,
</p>
<p style="font-family:'proxima-nova, sans-serif';font-size: 18px;line-height: 1.6;font-weight: bold;margin: 0 0 10px;padding: 0;color:#7C7C7C;text-align:center;">
  Summit Recruitment
</p>

<p style="font-family:'proxima-nova, sans-serif';font-size: 18px;line-height: 1.6;font-weight: bold;margin: 0 0 10px;padding: 0;color:#662F8E;text-align:center;">
 <!-- support@thebrandinside.com -->
</p>


@endsection
