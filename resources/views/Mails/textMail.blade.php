@extends('Mails.mailLayout')

@section('css')
    <style>

        .text-left {
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
        .content {
            max-width: 600px;
            margin: auto;
        }
        .author {
            font-size: 90%;
            text-align: right;
            padding-bottom: 40px;
        }
        .bg-white, .bg-white tr, .bg-white td   {
            background-color: #f3f3f3 !important;
        }
        .font-90 {
            font-size: 90%;
        }
    </style>

@endsection

@section('body')
    <table class="content">
        <tr>
            <td>
                <h3 style="margin-bottom: 0">{{$title}}</h3>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <p>
                  {!! $content !!}
                </p>
            </td>
        </tr>
        <tr>
            <td style="padding: 40px 0">
            </td>
        </tr>
    </table>
@endsection
