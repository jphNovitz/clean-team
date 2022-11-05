<!DOCTYPE html>
<html>

<head>

    <title>{{ trans('report.Products_report_title') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>

    <h1>{{ trans('report.Products_report_title') }}</h1>

    <p>{{ (new DateTime())->format('d-m-Y') }}</p>

    <p>{{ trans('report.Hello') }}, </p>
    <p><em>{{ trans('report.Introduction') }}</em></p>

    <table style="table-layout: auto; width: 100%; border-collapse: collapse;">
        <tbody>

            @foreach ($details['archive'] as $line)
                @if ($line->product->type_id == 2 || ($line->product->type_id == 1 && $line->quantity > 0))
                    <tr style="table-layout: fixed ; width: 500px ; border: 1 ; ">
                        <td
                            style="width: 50px ; border: 1px solid black;  white-space: nowrap; text-overflow: ellipsis; padding: 1rem">
                            @if ($line->product->type_id === 1)
                                {{ $line->quantity }}
                            @endif
                        </td>
                        <td
                            style="border: 1px solid black; overflow: hidden;  white-space: nowrap; text-overflow: ellipsis;  padding: 1rem">
                            {{ $line->product->name }}
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 2rem; margin-bottom:1rem">{{ trans('report.Salutations') }}</p>
    {{-- Signature : the members teams names --}}

    <span style="float: right">{{ trans('report.The_team') }}
        <ul style="margin-top: 2rem; float: right">
            @foreach ($details['members'] as $member)
                <li>{{ $member->name }} </li>
            @endforeach
        </ul>
    </span>
</body>

</html>
