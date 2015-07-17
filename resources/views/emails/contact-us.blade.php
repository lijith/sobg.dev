@extends('emails.base-layout')

@section('content')

	<h2>{{ucwords($subject)}}</h2>


	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr style="padding-bottom: 10px;">
            <td style="text-align: right;padding-right: 10px;">
                  Name
            </td>
            <td style="text-align: left;padding-left: 10px;">
                  {{ ucwords($name) }}
            </td>
      </tr>

      <tr style="padding-bottom: 10px;">
            <td style="text-align: right;padding-right: 10px;">
                  E-mail
            </td>
            <td style="text-align: left;padding-left: 10px;">
                  {{ ucwords($email) }}
            </td>
      </tr>

      <tr style="padding-bottom: 10px;">
            <td style="text-align: right;padding-right: 10px;">
                  Contact Number
            </td>
            <td style="text-align: left;padding-left: 10px;">
                  {{ ucwords($contact_number) }}
            </td>
      </tr>

      <tr style="padding-bottom: 10px;">
            <td style="text-align: right;padding-right: 10px;">
                  Message
            </td>
            <td style="text-align: left;padding-left: 10px;">
                  {{ ucwords($mail_message) }}
            </td>
      </tr>

	</table>


@stop