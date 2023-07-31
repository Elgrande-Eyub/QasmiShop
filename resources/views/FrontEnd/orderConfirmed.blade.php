<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Your Affinity order confirmation - R6500600</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic|Open+Sans:400,600,700,300,300italic,400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <style type="text/css">
      body {
        margin: 0;
        padding: 0;
        font-family: Helvetica Neue, Helvetica, sans-serif, 'Open Sans';
      }
      [style*="Open Sans"] {
        font-family: 'Open Sans', Helvetica Neue, Helvetica, sans-serif !important;
      }
      header {
        font-family: Helvetica Neue, Helvetica, sans-serif, 'Lato';
      }
      [style*="Lato"] {
        font-family: 'Lato', Helvetica Neue, Helvetica, sans-serif !important;
      }
      a[x-apple-data-detectors=true] {
        color: inherit !important;
        text-decoration: inherit !important;
      }
      a:link {
        text-decoration: none;
      }
      a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>

    <!-- Email header -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%" >
      <tr>
        <td style="border-top:5px solid #f99245;" align="center"></td>
      </tr>
    </table>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <td bgcolor="#ffffff" align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="90%" style="max-width: 600px;">
        {{--     <tr>
              <td align="center" valign="top" style="padding: 66px 0px 12px 0px;" colspan="3">
                <img src="{{ asset('assets/imgs/theme/Kasmifood-Distribution-logo-v2.png') }}" width="30%"  border="0" alt="Affinity" style="font-family:Arial, Helvetica, sans-serif; color:#2b2b2b;font-size:17px;font-weight:bold" />
              </td>
            </tr> --}}
            <tr>
                <td align="center" valign="top" style="padding: 66px 0px 12px 0px;display:flex;justify-content:center; align-items:center;color: #2b2b2b; font-family: Helvetica Neue,Helvetica,sans-serif,Lato; font-size: 34px; font-weight: 400; mso-line-height-rule:exactly; line-height:38px; margin: 0;
  " colspan="3">
               <i class="fa-regular fa-circle-check" style="margin-right:1rem;color: rgb(29, 165, 86);font-size:70px"></i>
            </td>
              </tr>
            <tr>
              <td align="center" valign="top" style="display:flex;justify-content:center; align-items:center;color: #2b2b2b; font-family: Helvetica Neue,Helvetica,sans-serif,Lato; font-size: 34px; font-weight: 400; mso-line-height-rule:exactly; line-height:38px; margin: 0; padding: 0px 0px 6px 0px;
" colspan="3">
               Merci Pour Votre Commande </td>
            </tr>
            <tr>
              <td align="center" valign="top" style="padding: 0px 0px 26px 0px; border-bottom:1px solid #dfe5e9; color: #9c9c9c; font-family: Helvetica Neue,Helvetica,sans-serif,Open Sans; font-size: 18px; font-weight: 400; mso-line-height-rule:exactly; line-height:27px; margin: 0
" colspan="3">
                numéro de Commande: R6500600
              </td>
            </tr>

            <!-- Email body -->
            <tr>
              <td align="center" valign="top" style="padding: 36px 0px 6px 0px; color: #2b2b2b; font-family: Helvetica Neue,Helvetica,sans-serif,Lato; font-size: 20px; font-weight: 400; mso-line-height-rule:exactly; line-height:30px; margin: 0; text-align:left" colspan="3">
                Salut {{ $Commande->name }}
              </td>
            </tr>
            <tr>
              <td align="center" valign="top" style="padding: 0px 0px 24px 0px; color: #777777; font-family: Helvetica Neue,Helvetica,sans-serif,Open Sans; font-size: 17px; font-weight: 400; mso-line-height-rule:exactly; line-height:25px; margin: 0; text-align:left" colspan="3">
                Merci pour votre achat. Veuillez trouver le résumé de votre commande ci-dessous. </td>
            </tr>
            <tr>
              <td align="center" valign="top" style="padding: 30px 30px 30px 30px; margin-bottom: 36px" bgcolor="#f9f9f9" colspan="3">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                  <tr>
                    <td colspan="3" style="color: #2b2b2b; font-family: Helvetica Neue,Helvetica,sans-serif,Lato; font-size: 20px; font-weight: 400; mso-line-height-rule:exactly; line-height: 30px; margin: 0; text-align:left; padding: 0px 0px 10px 0px;">Récapitulatif de Commande</td>
                  </tr>
                  <tr>
                    @php
                            $totalPrice = 0;
                            @endphp
                    @foreach ($checkoutProduct as $index => $product)

                        <tr>
                            <td style="color: #777777; font-family: Helvetica Neue,Helvetica,sans-serif,Open Sans; font-size: 15px; font-weight: 400; mso-line-height-rule:exactly; line-height: 22px; margin: 0; text-align:left;">
                              {{ $product['productName'] }}
                            </td>
                            <td style="color: #777777; font-family: Helvetica Neue,Helvetica,sans-serif,Open Sans; font-size: 15px; font-weight: 400; mso-line-height-rule:exactly; line-height: 22px; margin: 0;padding: 10px 0;  text-align:right;">{{ $product['quantity'] }}</td>
                            <td style="color: #777777; font-family: Helvetica Neue,Helvetica,sans-serif,Open Sans; font-size: 15px; font-weight: 400; mso-line-height-rule:exactly; line-height: 22px; margin: 0;padding: 10px 0;  text-align:right; ">€{{ number_format($product['quantity'] * $product['price'], 2, '.', '') }} </td>
                          </tr>

                          @php
                          $totalPrice += $product['quantity'] * $product['price'];
                          @endphp
                    @endforeach


                  <tr>
                    <td style="color: #2b2b2b; font-family: Helvetica Neue,Helvetica,sans-serif,Open Sans; font-size: 20px; font-weight: 400; mso-line-height-rule:exactly; line-height: 30px; margin: 0; border-top:1px solid #dfe5e9; padding: 10px 0px 0px 0px; text-align:left;" colspan="2">Total</td>
                    <td style="color: #2b2b2b; font-family: Helvetica Neue,Helvetica,sans-serif,Open Sans; font-size: 20px; font-weight: 400; mso-line-height-rule:exactly; line-height: 30px; margin: 0; border-top:1px solid #dfe5e9; text-align:right; padding: 10px 0px 0px 0px;">€{{ number_format($totalPrice, 2, '.', '') }} </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td style="padding: 0 0 24px 0" colspan="3"></td>
            </tr>

            <tr>
              <td align="center" valign="top" style="padding: 12px 0px 36px 0px;">
                <table border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;">
                  <tr>
                    <td align="center" bgcolor="#f99245" width="210" style="-moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;">
                      <a href="{{ route('index') }}" style="padding: 18px;width:210px;display: block;text-decoration: none;border:0;text-align: center;font-size: 14px;font-family: Helvetica Neue,Helvetica,sans-serif,Open Sans;letter-spacing:1px;color: #ffffff;background: #f99245;border: 1px solid #f99245;-moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px; mso-line-height-rule:exactly;line-height:17px;text-transform:uppercase;">
Retourner à Kasmi
                      </a>
                    </td>
                  </tr>
                </table>
              </td>
              <td width="5" style="width:3px">&nbsp;</td>

            </tr>


            <!-- Email footer -->
            <tr>
              <td style="padding: 0 0 36px 0; border-bottom:1px solid #dfe5e9" colspan="3"></td>
            </tr>
            <tr>
              <td align="center" valign="top" style="padding: 24px 0px 18px 0px; color: #777777; font-family: Helvetica Neue,Helvetica,sans-serif,Open Sans; font-size: 13px; font-weight: 400; mso-line-height-rule:exactly; line-height:19px; margin: 0;" colspan="3">


                <table cellpadding="0" cellspacing="0" border="0">

                </table>
                © 2023 Iker, All rights reserved<br />
                info@kasmi.be<br>

              </td>
            </tr>
          </table>


        </td>
      </tr>
    </table><br><br>
  </body>
</html>
