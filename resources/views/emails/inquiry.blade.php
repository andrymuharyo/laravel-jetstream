<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{ str_replace('_',' ',config('app.name')) }}</title>
  </head>
  <body class="" style="background-color: #f1f1f1; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 18px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f1f1f1;">
      <tr>
        <td style="font-family: sans-serif; font-size: 18px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 18px; vertical-align: top; display: block; Margin: 0 auto; max-width: 690px; padding: 10px; width: 690px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 690px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>
            <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">
              <!-- START MAIN LOGO AREA -->
                <tr>
                    <td class="wrapper" style="font-family: sans-serif; font-size: 18px; vertical-align: top; box-sizing: border-box;background:#fafafa;">
                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt;width:100%;">
                        <tr>
                            <td style="font-family: sans-serif; font-size: 18px; vertical-align: top;color:#bababa;text-align:center;">
                                <h3>{{ str_replace('_',' ',config('app.name')) }}</h3>
                            </td>
                        </tr>
                        </table>
                    </td>
                </tr>
              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 18px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt;width:100%;">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 18px; vertical-align: top;color:#555;">
                        {{-- Content --}}
                            <p style="font-family: sans-serif; font-size: 18px; font-weight: bold; margin: 0; Margin-bottom: 15px;">{{ __('email.greetings') }} {{ $firstname }} {{ $lastname }},</p>
                            <p style="font-family: sans-serif; font-size: 18px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                              {!! __('email.inquiry.description',array("attribute" => str_replace('_',' ',config('app.name')))) !!}
                            </p>
                            <table style="margin-bottom:15px;">
                                <tbody>
                                    <tr>
                                        <td style="font-weight:bold;">{{ __('label.firstname.name') }}</td>
                                        <td style="font-weight:bold;">:</td>
                                        <td>{{ $firstname }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">{{ __('label.lastname.name') }}</td>
                                        <td style="font-weight:bold;">:</td>
                                        <td>{{ $lastname }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">{{ __('label.phone.name') }}</td>
                                        <td style="font-weight:bold;">:</td>
                                        <td>{{ $phone }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">{{ __('label.email.name') }}</td>
                                        <td style="font-weight:bold;">:</td>
                                        <td>{{ $email }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">{{ __('label.subject.name') }}</td>
                                        <td style="font-weight:bold;">:</td>
                                        <td>{{ $subject }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        
                            <p><strong>{{ __('label.message.name') }} :</strong>
                            <br/>{!! $description !!}</p>
                            </br/>
                           
                        {{-- Content --}}
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
              <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    <p style="font-family: sans-serif; font-size: 12px; font-weight: normal; text-align:center; margin: 5px auto;color:#d43636;">{{ __('email.footer.noreply') }}</p>
                    Copyright &copy; {{ date('Y') }} 
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 18px; vertical-align: top;">&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
