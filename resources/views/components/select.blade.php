<select {{ $attributes }}>


    {{--@foreach ($datas as $data)

        <option value="{{asset('assets/img/customMat/AppImg/fondo2.png')}}">$data</option>

    @endforeach--}}
    {{--<option value="{{asset('assets/img/customMat/AppImg/fondo2.png')}}">{{$datas}}</option>--}}

        {{ $slot }}

</select>