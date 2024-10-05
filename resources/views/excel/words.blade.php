<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('Words Table')</title>
    <style>
        body {
            /*font-family: 'examplefont', sans-serif;*/
        }
    </style>
</head>
<body>

<div style="">
    <div style="border: 2px solid #007bff; padding: 10px; border-radius: 10px; background-color: #f8f9fa; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">

        <div style="">
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;text-transform: capitalize">
                <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;">@lang('SL')</th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;">@lang('words')</th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;">@lang('with_harakah')</th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;">@lang('meaning')</th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;">@lang('plural')</th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;">@lang('gender')</th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;">@lang('pop')</th>
                    <th style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;">@lang('data')</th>
                </tr>
                </thead>
                <tbody>
                @forelse($items as $i => $item)

                    <tr style="border: 1px solid #ddd;">
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;">{{$i+1}}</td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd; font-family: XBRiyaz">{{$item->name}}</td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd; font-family: XBRiyaz">{{$item->with_harakah}}</td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd; font-family: examplefont">{{$item->meaning}}</td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd; font-family: examplefont">{{$item->plural}}</td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;">{{$item->gender}}</td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;">{{$item->pop}}</td>
                        <td style="text-transform: capitalize; padding: 10px; border: 1px solid #ddd;">
                            @if(is_array($item->data))
                                @foreach($item->data as $key => $value)
                                    {{ $key }}: {{ $value. ', ' }}
                                @endforeach
                            @endif
                        </td>
                    </tr>
                @empty

                @endforelse


                </tbody>
            </table>

        </div>

    </div>

</div>
</body>
</html>


